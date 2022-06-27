<?php
$entered_card = $_POST["card"];
$recipient_card = $_POST["recipient"];
$amount = $_POST["amount"];

function getAccountByCard($number)
{
    $client_card = R::findOne("cards", "number = $number");
    if ($client_card) {
        return $client_card->bankaccounts_id;
    } else {
        exit ('Card ' . $number . ' not found');
    }
}

function transferMoney($fromAccount, $toAccount, $amount)
{
    if ($fromAccount == $toAccount) exit ('transfer to the same card');

    $movement = R::dispense('movemoney');
    $movement->amount = $amount;
    $from = R::load('bankaccounts', $fromAccount);
    if ($from->amount_account < $amount) exit ('Balance too low');
    $from->amount_account -= $amount;

    $movement->from_whom = $from->id;
    $to = R::load('bankaccounts', $toAccount);
    $to->amount_account += $amount;
    $movement->to_whom = $to->id;
    R::storeAll([$to, $from, $movement]);
}

if (getAccountByCard($entered_card) > 0 && getAccountByCard($recipient_card) > 0) {
    transferMoney(getAccountByCard($entered_card), getAccountByCard($recipient_card), $amount);
    echo "ok";
} else {
    return false;
}