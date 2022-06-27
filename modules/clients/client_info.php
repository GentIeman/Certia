<?php
include("../modules/current_session.php");
$user = R::load("clients", $_SESSION["user"]->id);
$summ = 0;
$credits = 0;
$deposits = 0;
$client_credits = R::getAll("SELECT * FROM clientsbankaccounts WHERE ClientId = :id AND AccountType = 'Credit'", [":id" => $user["id"]]);
$client_deposits = R::getAll("SELECT * FROM clientsbankaccounts WHERE ClientId = :id AND AccountType != 'Credit'", [":id" => $user["id"]]);
$client_cards = R::getAll("SELECT * FROM clientscards WHERE ClientId = :id", [":id" => $user["id"]]);
$activity = null;
$movemoney = [];
foreach ($user->ownBankaccountsList as $account) {
    $movemoney[] = R::findAll("movemoney", "from_whom = " . $account["id"] . " OR to_whom = " . $account["id"]);
}
$summ = 0;
foreach ($user->ownBankaccountsList as $account) {
    $summ = $summ + $account->amount_account;
    $account->amount_account > 0 ? $deposits++ : $credits++;
}


$ownIds = array_column($user->ownBankaccountsList, "id");
function getOperationType($source, $ids)
{
    return (array_search($source, $ids)) ? "-" : "+";
}

$movements = [];
$movement = [];
foreach ($movemoney as $move) {
    foreach ($move as $mov) {
        $movement["from"] = $mov->from_whom === null ? "Attachment" : $mov->from_whom;
        $movement["to"] = $mov->to_whom === null ? "Debit" : $mov->to_whom;
        $movement["amount"] = $mov->amount;
        $movement["direction"] = getOperationType($mov->from_whom, $ownIds);
        $movement["timestamp"] = $mov->timestamp;
        if ($mov["operation"] != 'open') {
            $movements[] = $movement;
        }
    }
}

