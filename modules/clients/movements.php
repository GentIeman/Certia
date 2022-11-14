<?php
$summ = 0;
$credits = 0;
$deposits = 0;
$movemoney = [];
foreach ($client->ownBankaccountsList as $account) {
    $movemoney[] = R::findAll("movemoney", "from_whom = " . $account["id"] . " OR to_whom = " . $account["id"]);
}

foreach ($client->ownBankaccountsList as $account) {
    $summ = $summ + $account->amount_account;
    $account->amount_account > 0 ? $deposits++ : $credits++;
}

$ownIds = array_column($client->ownBankaccountsList, "id");
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
        $movement["operation"] = $mov->operation;
        $movement["direction"] = getOperationType($mov->from_whom, $ownIds);
        $movement["timestamp"] = $mov->timestamp;
        if ($mov["operation"] === "dept") $movement["direction"] = "Discharge ";
        if ($mov["operation"] != 'open') {
            $movements[] = $movement;
        }
    }
}

