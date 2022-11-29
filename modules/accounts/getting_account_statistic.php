<?php
$card_id = $_GET["card_id"];
$account = R::load("accounts", $card_id);
if ($account->plans_id !== NULL) {
    $plan = R::load("plans", $account->plans_id);
}
$account_statistic = R::findOne("accountstatistics", "accounts_id = ?", [$account["id"]]);
$account_status = $account_statistic["account_statistic_status"];
$opening_date = date("d F Y", strtotime($account_statistic["account_statistic_opening_date"]));
if ($account_statistic["account_statistic_closing_date"] !== null) {
    $closing_date = date("d F Y", strtotime($account_statistic["account_statistic_closing_date"]));
}
if ($account_statistic["account_statistic_actual_closing_date"] !== null) {
    $actual_closing_date = date("d F Y", strtotime($account_statistic["account_statistic_actual_closing_date"]));
}
if ($account_status == 0) {
    $account_status = "Opened";
} else {
    $account_status = "Closed";
}