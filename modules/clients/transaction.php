<?php
$selected_card = $_POST["selected-card"];
$recipient_card = $_POST["recipient-card"];
$amount = $_POST["amount"];

function getAccountByCard($number)
{
    $client_card = R::findOne("cards", "card_number = ?", [$number]);
    if ($client_card) {
        return $client_card->accounts_id;
    } else {
        header("Location: ../index.php?page=transaction-info&event=account-not-found");
    }
}

function transferMoney($fromAccount, $toAccount, $amount)
{
    $transaction = R::dispense("transactions");
    $to = R::load("accounts", $toAccount);
    $from = R::load("accounts", $fromAccount);

    if ($from->account_balance < $amount) {
        header("Location: ../index.php?page=transaction-info&event=not-enough-money");
        return false;
    }

    if ($to->account_balance == 0 && $to->account_debt > 0) {
        $to->account_debt = $to->account_debt - $amount;
    } else {
        $to->account_balance += $amount;
    }

    $from->account_balance -= $amount;
    $transaction->transaction_amount = $amount;
    $transaction->transaction_type = "transfer";
    $transaction->accounts_id = $from->id;
    $transaction->transaction_to_account = $to->id;
    R::store($transaction);

    $transaction = R::dispense("transactions");
    $transaction->accounts_id = $to->id;
    $transaction->transaction_type = "receiving";
    $transaction->transaction_amount = $amount;
    R::store($transaction);

    R::storeAll([$to, $from]);
    header("Location: ../index.php?page=transaction-info&event=transaction-completed&from=" . $from->id . "&to=" . $to->id);
}

if (getAccountByCard($selected_card) > 0 && getAccountByCard($recipient_card) > 0) {
    transferMoney(getAccountByCard($selected_card), getAccountByCard($recipient_card), $amount);
} else {
    return false;
}