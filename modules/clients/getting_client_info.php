<?php
$client_id = $_SESSION["user"]->id;
$client = R::load("clients", $client_id);
$accounts = $client->ownAccountsList;
$locations = $client->ownLocationsList;
$cards = null;
$client_birthdate = date("d F Y", strtotime($client->client_birthday));

function gettingFullName($client) {
    return $client->client_last_name . " " . $client->client_name . " " . $client->client_patronymic;
}

function gettingInitials($client) {
    return $client->client_last_name . " " . strtoupper(mb_substr($client->client_name, 0, 1)) . ". " . strtoupper(mb_substr($client->client_patronymic, 0, 1)) . ".";
}

$fullname = gettingFullName($client);

function gettingClientAddress($locations) {
    foreach ($locations as $location) {
        if ($location->location_building) {
            $address = $location->location_zipcode . ", " . $location->location_city . ", " . $location->location_street . ", " . $location->location_house . "/ b." . $location->location_building .", " . $location->location_flat;
        } else {
            $address = $location->location_zipcode . ", " . $location->location_city . ", " . $location->location_street . ", " . $location->location_house . ", " . $location->location_flat;
        }
    }
    return $address;
}

$client_address = gettingClientAddress($locations);


function gettingClientCards($accounts) {
    foreach ($accounts as $account){
        $account_statistics = R::findAll("accountstatistics", "accounts_id = " . $account->id);
        foreach ($account_statistics as $statistic) {
            if ($statistic->account_statistic_status == 0) {
                $cards = R::findAll("cards", "accounts_id = ?", [$account->id]);
            }
        }
    }
    return $cards;
}
$client_cards = gettingClientCards($accounts);


function gettingTransactions($accounts) {
    $transactions = [];
    foreach ($accounts as $account) {
        $transactions[] = R::findAll("transactions", "accounts_id = " . $account->id . " OR transaction_to_account = " . $account->id);
    }
    return $transactions;
}

$transactions = gettingTransactions($accounts);

function gettingTransactionCard($account) {
    return R::findOne("cards", "accounts_id = ?", [$account->id]);
}

$activity = [];
$movement = [];
foreach ($transactions as $transaction) {
    foreach ($transaction as $move) {
        if ($move->transaction_type === "transfer") {
            $activity[] = [
                "client" => gettingInitials(R::load("clients", $move->transaction_to_account)),
                "date" =>date("d F Y", strtotime($move->transaction_date)),
                "direction" => "-",
                "amount" => $move->transaction_amount,
                "type" => $move->transaction_type,
                "card" => gettingTransactionCard(R::load("accounts", $move->transaction_to_account))->card_number,
            ];
        } else {
            $activity[] = [
                "client" => gettingInitials(R::load("clients", $move->accounts_id)),
                "date" =>date("d F Y", strtotime($move->transaction_date)),
                "direction" => "+",
                "amount" => $move->transaction_amount,
                "type" => $move->transaction_type,
                "card" => gettingTransactionCard(R::load("accounts",  $move->transaction_to_account))->card_number,
            ];
        }
    }
}