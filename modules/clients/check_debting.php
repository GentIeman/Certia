<?php
$accounts_for_check = [];
foreach ($user->ownBankaccountsList as $account) {
    if ($account->status === "Closed" && $account->plans->type === "Credit" && $account->amount_account < 0) {
        $accounts_for_check[] = $account;
    }
}
foreach ($accounts_for_check as $dept_account) {

    $payment = R::findOne('loanpayments', "bankaccount_id = " . $dept_account->id);
    $last_move_money = R::findLast('movemoney', "to_whom = " . $dept_account->id);
    $last_money_move_date = new DateTime($last_move_money->timestamp);
    $today = new DateTime();
    $today->sub(new DateInterval('P2D'));
    $step = new DateInterval('P1M');
    $period = new DatePeriod($last_money_move_date, $step, $today);
    foreach ($period as $date) {
        $dept_account->amount_account -= $payment->amount_debiting * 2;
        $move_money = R::dispense('movemoney');
        $move_money->from_whom = $dept_account->id;
        $move_money->to_whom = $dept_account->id;
        $move_money->amount = -1 * $payment->amount_debiting * 2;
        $move_money->operation = "dept";
        R::store($move_money);
    }
    R::store($dept_account);
}