<?php
$client_id = $_SESSION["user"]->id;
$client = R::load("clients", $client_id);
$accounts_for_check = [];
foreach ($client->ownAccountsList as $account) {
    if ($account->status === 1 && $account->plans->plan_type === "Loan" && $account->account_balance < 0) {
        $accounts_for_check[] = $account;
    }
}
foreach ($accounts_for_check as $dept_account) {

    $payment = R::findOne('creditpayperiods', "account_id = " . $dept_account->id);
    $last_move_money = R::findLast('transactions', "account_id = " . $dept_account->id);
    $last_money_move_date = new DateTime($last_move_money->timestamp);
    $today = new DateTime();
    $today->sub(new DateInterval('P2D'));
    $step = new DateInterval('P1M');
    $period = new DatePeriod($last_money_move_date, $step, $today);
    foreach ($period as $date) {
        $dept_account->account_balance -= $payment->credit_pay_amount * 2;
        $transaction = R::dispense('transactions');
        $transaction->transaction_to_account = $dept_account->id;
        $transaction->accounts_id = $dept_account->id;
        $transaction->transaction_amount = -1 * $payment->credit_pay_amount * 2;
        $transaction->transaction_type = "dept";
        R::store($transaction);
    }
    R::store($dept_account);
}