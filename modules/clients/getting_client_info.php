<?php
$accounts = $client->ownAccountsList;
$locations = $client->ownLocationsList;
$cards = null;
$client_birthdate = date("d F Y", strtotime($client->client_birthday));

function gettingFullName($client) {
    return $client->client_last_name . " " . $client->client_name . " " . $client->client_patronymic;
}

$fullname = gettingFullName($client);

function gettingInitials($client) {
    return $client->client_last_name . " " . strtoupper(substr($client->client_name, 0, 1)) . ". " . strtoupper(substr($client->client_patronymic, 0, 1)) . ".";
}

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
    foreach ($accounts as $account) {
        $account_statistics = R::findAll("accountstatistics", "accounts_id = " . $account->id);
        foreach ($account_statistics as $statistic) {
            if ($statistic->account_statistic_status == 0) {
                $cards[] = R::findOne("cards", "accounts_id = ?", [$account->id]);
            }
        }
    }
    return $cards;
}
$client_cards = gettingClientCards($accounts);

function gettingTransactions($accounts) {
    $transactions = null;
    foreach ($accounts as $account) {
        $transactions[] = R::findAll("transactions", "accounts_id = " . $account->id);
    }
    return $transactions;
}

$transactions = gettingTransactions($accounts);

function gettingTransactionCard($account) {
    return R::findOne("cards", "accounts_id = ?", [$account->id]);
}

$activity = [];

foreach ($transactions as $transaction) {
    foreach ($transaction as $move) {
        if ($move->transaction_type === "transfer" && $move->transaction_to_account !== NULL && $move->transaction_accounts_id !== NULL) {
            $activity[] = [
                "client" => gettingInitials(R::load("clients", R::load("accounts", $move->transaction_to_account)->clients_id)),
                "date" =>date("d F Y", strtotime($move->transaction_date)),
                "direction" => "-",
                "amount" => $move->transaction_amount,
                "type" => $move->transaction_type,
                "card" => gettingTransactionCard(R::load("accounts", $move->accounts_id))->card_number,
            ];
        } else {
            $activity[] = [
                "client" => gettingInitials(R::load("clients", R::load("accounts", $move->accounts_id)->clients_id)),
                "date" =>date("d F Y", strtotime($move->transaction_date)),
                "direction" => "+",
                "amount" => $move->transaction_amount,
                "type" => $move->transaction_type,
                "card" => gettingTransactionCard(R::load("accounts", $move->accounts_id))->card_number,
            ];
        }
    }
}

function gettingDebitAccounts($accounts) {
    $debit_accounts = null;
    foreach ($accounts as $account) {
        if ($account->plans_id == 0) {
            $debit_accounts[] = [
                "account" => $account->account_number,
                "balance" => $account->account_balance,
                "id" => $account->id,
                "plan" => $account->plans_id
            ];
        }
    }
    return $debit_accounts;
}

$debit_accounts = gettingDebitAccounts($accounts);

if (isset($_POST["client-data"]) && isset($_POST["option"])) {
    $client_info = null;
    $client_data = trim($_POST["client-data"]);
    $option = $_POST["option"];
    $client_info = gettingClientInfoOnOptions($client_data, $option);
}

function gettingClientInfoOnOptions($data, $option) {
    switch ($option) {
        case "client_age":
            $client_year = date("Y") - $data;
            return $client_info = R::findAll("clients", "client_birthday Like ?", ["$client_year%"]);
        case "client_last_name" :
            return $client_info = R::findAll("clients", "client_last_name = ?", [$data]);
        case "client_gender" :
            return $client_info = R::findAll("clients", "client_gender = ?", [$data]);
        case "account":
            $account = R::findOne("accounts", "account_number = ?", [$data]);
            return $client_info = R::findAll("clients", "id = ?", [$account->clients_id]);
        case "client_phone":
            return $client_info = R::findAll("clients", "client_phone = ?", [$data]);
    }
}