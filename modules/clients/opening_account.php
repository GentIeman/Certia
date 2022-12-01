<?php
$client = $_SESSION["user"];
$received_plan_id = $_GET["plan_id"];
$plan = R::load("plans", $received_plan_id);

$account = R::dispense("accounts");
$account->plans_id = $plan->id;

$client = R::load("clients", $client->id);
$client->ownAccountsList[] = $account;

$start = new DateTime();
if ($plan->plan_type === "Loan") {
    $account->account_balance = $plan->plan_amount * -1;
    $account->account_number = rand(1000, 9999) . " " . rand(1000, 9999) . " " . rand(1000, 9999) . " " . rand(1000, 9999) . " " . rand(1000, 9999);
    $start->add(new DateInterval('P1M'));
    $end = new DateTime();
    $end->add(new DateInterval('P1M'));
    $interval = 'P' . $plan->plan_term . 'D';
    $total_interval = new DateInterval($interval);
    $end->add($total_interval);
    $step = new DateInterval('P1M');
    $period = new DatePeriod($start, $step, $end);
    $counter = 0;
    foreach ($period as $date) {
        $counter++;
    }
    $payment_value = round(($plan->plan_amount * (1 + ($plan->plan_percent / 100))) / $counter);
    foreach ($period as $datetime) {
        $payment = R::dispense("creditpayperiods");
        $payment->credit_pay_date = $datetime->format("Y-m-d");
        $payment->credit_pay_amount = $payment_value;
        $payment->credit_pay_status = "not paid";
        $payment->accounts = $account;
        R::store($payment);
    }
    $end->sub(new DateInterval('P1M'));
    $account_statistic = R::findOne("accountstatistics", "accounts_id = ?", [$account->id]);
    $account_statistic->account_statistic_closing_date = $end->format("Y-m-d");
    $payment = R::dispense("creditpayperiods");
    $payment->credit_pay_date = $account_statistic->account_statistic_closing_date;
    $payment->credit_pay_amount = $payment_value;
    $payment->credit_pay_status = "not paid";
    $payment->accounts = $account;
    R::storeAll([$payment, $account_statistic, $account, $client]);
    header("Location: ../index.php?page=account-info&account_id=" . $account->id);
} else {
    $selected_card = $_POST["selected-card"];
    $selected_account = R::load("accounts", R::findOne("cards", "card_number = ?" , [$selected_card])->id);
    $selected_account->account_balance -= $plan->plan_amount;
    $account->account_balance += $plan->plan_amount;
    $account->account_number = rand(1000, 9999) . " " . rand(1000, 9999) . " " . rand(1000, 9999) . " " . rand(1000, 9999) . " " . rand(1000, 9999);
    $closing_date = new DateTime();
    $closing_date->add(new DateInterval('P' . $plan->plan_term . 'D'));
    R::storeAll([$account, $selected_account, $client]);

    $account_statistic = R::findOne("accountstatistics", "accounts_id = ?", [$account->id]);
    $account_statistic->account_statistic_closing_date = $closing_date;
    R::store($account_statistic);

    $to = R::load("accounts", $account->id);
    $from = R::load("accounts", $selected_account->id);

    $transaction = R::dispense("transactions");
    $transaction->transaction_amount = $plan->plan_amount;
    $transaction->transaction_type = "transfer";
    $transaction->accounts_id = $from->id;
    $transaction->transaction_to_account = $to->id;
    R::store($transaction);

    $transaction = R::dispense("transactions");
    $transaction->accounts_id = $to->id;
    $transaction->transaction_type = "opening account";
    $transaction->transaction_amount = $plan->plan_amount;
    R::store($transaction);


    header("Location: ../index.php?page=account-info&account_id=" . $account->id);
}