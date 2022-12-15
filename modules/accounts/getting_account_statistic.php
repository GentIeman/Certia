<?php
require_once "./modules/clients/getting_client_info.php";

$card_id = null;
if (isset($_GET["card_id"])) {
    $card_id = $_GET["card_id"];
    $card = R::load("cards", $card_id);
    $card_validity_date = date("d F Y", strtotime($card->card_validity_date));
} else {
    $account_id = $_GET["account_id"];
    $card = R::findOne("cards", "accounts_id = ?", [$account_id]);
    $card_validity_date = date("d F Y", strtotime($card->card_validity_date));
}
$account = ($card_id) ? R::load("accounts", R::load("cards", $card_id)->accounts_id) : R::load("accounts", $account_id);
if ($account->plans_id !== NULL) {
    $plan = R::load("plans", $account->plans_id);
}
$account_statistic = R::findOne("accountstatistics", "accounts_id = ?", [$account["id"]]);
$account_status = $account_statistic["account_statistic_status"];
$opening_date = date("d F Y", strtotime($account_statistic["account_statistic_opening_date"]));
if ($account_statistic["account_statistic_closing_date"] !== NULL) {
    $closing_date = date("d F Y", strtotime($account_statistic["account_statistic_closing_date"]));
}
if ($account_statistic["account_statistic_actual_closing_date"] !== NULL) {
    $actual_closing_date = date("d F Y", strtotime($account_statistic["account_statistic_actual_closing_date"]));
}
if ($account_status == 0) {
    $account_status = "Opened";
}
$activity = [];

$transactions = R::findAll("transactions", "accounts_id = " . $account->id);
foreach ($transactions as $transaction) {
    if ($transaction->transaction_type == "transfer") {
        $activity[] = [
            "client" => gettingInitials(R::load("clients", R::load("accounts", $transaction->transaction_to_account)->clients_id)),
            "date" => date("d F Y", strtotime($transaction->transaction_date)),
            "direction" => "-",
            "amount" => $transaction->transaction_amount,
            "type" => $transaction->transaction_type,
            "card" => gettingTransactionCard(R::load("accounts", $transaction->accounts_id))->card_number,
        ];
    } else {
        $activity[] = [
            "client" => gettingInitials(R::load("clients", R::load("accounts", $transaction->accounts_id)->clients_id)),
            "date" => date("d F Y", strtotime($transaction->transaction_date)),
            "direction" => "+",
            "amount" => $transaction->transaction_amount,
            "type" => $transaction->transaction_type,
            "card" => gettingTransactionCard(R::load("accounts", $transaction->accounts_id))->card_number,
        ];
    }
}

$pay_periods = R::findAll("creditpayperiods", "accounts_id = ?", [$account->id]);