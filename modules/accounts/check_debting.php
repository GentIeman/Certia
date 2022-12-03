<?php
$accounts_statistic = R::findAll("accountstatistics");
$plans = R::findAll("plans");
$accounts_for_check = [];
foreach ($client->ownAccountsList as $account) {
    foreach ($accounts_statistic as $statistic) {
        if ($account->id == $statistic->accounts_id && $statistic->account_statistic_status == 0 && $account->account_balance < 0) {
            $accounts_for_check[] = $account;
        }
    }
}

foreach ($accounts_for_check as $dept_account) {
    $payment = R::findOne("creditpayperiods", "accounts_id = " . $dept_account->id);
    $last_move_money = R::findLast("transactions", "accounts_id = " . $dept_account->id);
    $last_money_move_date = new DateTime($last_move_money->transaction_date);
    $today = new DateTime();
    $today->sub(new DateInterval('P2D'));
    $step = new DateInterval('P1M');
    $period = new DatePeriod($last_money_move_date, $step, $today);
    foreach ($period as $date) {
        $dept_account->account_debt -= $payment->credit_pay_amount * 2;
        $transaction = R::dispense("transactions");
        $transaction->transaction_to_account = $dept_account->id;
        $transaction->accounts_id = $dept_account->id;
        $transaction->transaction_amount = -1 * $payment->credit_pay_amount * 2;
        $transaction->transaction_type = "debt";
        R::store($transaction);
    }
    R::store($dept_account);
}