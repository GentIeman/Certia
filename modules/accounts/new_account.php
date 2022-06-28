<?php
$user = $_SESSION["user"];
$plan = R::load("plans", $_GET["plan_id"]);

$account = R::dispense("bankaccounts");
$account->plans_id = $plan->id;
$account->status = "Open";
$account->clients_id = $user->id;
$account->opening_date = date("Y-m-d");
$last_card = R::findLast("cards");
$card = R::dispense("cards");
$card->name = "Visa";
$card->number = $last_card["number"] + 1;
$account->ownCardsList[] = $card;

$start = new DateTime();
if ($plan->type === "Credit") {
    $account->amount_account = $plan->amount * -1;
    $start->add(new DateInterval('P1M'));
    $end = new DateTime();
    $end->add(new DateInterval('P1M'));
    $interval = 'P' . $plan->term . 'D';
    $total_interval = new DateInterval($interval);
    $end->add($total_interval);
    $step = new DateInterval('P1M');
    $period = new DatePeriod($start, $step, $end);
    $counter = 0;
    foreach ($period as $date) {
        $counter++;
    }

    $payment_value = round(($plan->amount * (1 + ($plan->percent / 100))) / $counter);
    foreach ($period as $datetime) {
        $payment = R::dispense("loanpayments");
        $payment->date_debiting = $datetime->format("Y-m-d");
        $payment->bankaccount = $account;
        $payment->amount_debiting = $payment_value;
        R::store($payment);
    }
    $end->sub(new DateInterval('P1M'));
    $account->closing_date = $end->format("Y-m-d");
    R::storeAll([$account, $card]);
    $payment = R::dispense("loanpayments");
    $payment->date_debiting = $account->closing_date;
    $payment->bankaccount = $account;
    $payment->amount_debiting = $payment_value;
    R::store($payment);
    echo "ok";
} else {
    $selected_card = $_POST["card"];
    $selected_account = R::load("bankaccounts", R::findOne("cards", "number = " . $selected_card)->bankaccounts_id);
    $selected_account->amount_account -= $plan->amount;
    $selected_account->plans = $plan;
    $account->amount_account += $plan->amount;
    $closing_date = new DateTime();
    $closing_date->add(new DateInterval('P' . $plan->term . 'D'));
    $account->closing_date = $closing_date;
    R::storeAll([$account, $card, $selected_account]);

    $movemoney = R::dispense("movemoney");
    $movemoney->from_whom = $selected_account->id;
    $movemoney->to_whom = $account->id;
    $movemoney->amount = $plan->amount;
    $movemoney->status = "open";
    R::store($movemoney);
    echo "ok";
}
$_SESSION["user"] = R::load("clients", $_SESSION["user"]["id"]);