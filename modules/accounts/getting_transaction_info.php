<?php
$from = $_GET["from"];
$to = $_GET["to"];
$fromAccount = R::load("accounts", $from);
$toAccount = R::load("accounts", $to);
$transactions = R::find("transactions", "accounts_id = ?", [$fromAccount->id]);
$transaction = R::findLast("transactions", "accounts_id = ? AND transaction_type = ?", [$fromAccount->id, "transfer"]);
$transaction_date = date("d F Y", strtotime($transaction["transaction_date"]));
$card_to = "* " . substr(R::findOne("cards", "accounts_id = ?", [$toAccount->id])->card_number, -4);