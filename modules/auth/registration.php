<?php
$client = R::dispense("clients");
$client->fullname = trim($_POST["fullname"]);
$client->address = trim($_POST["address"]);
$client->phone = trim($_POST["phone"]);
$client->email = $_POST["email"];
$client->birthday = $_POST["birthday"];
$client->gender = $_POST["gender"];
$client->pswd = trim(password_hash($_POST["password"], PASSWORD_DEFAULT));
$client->role = "user";
$_SESSION["user"] = $client;

$bankaccount = R::dispense("bankaccounts");
$bankaccount->amount_account = 5000;
$bankaccount->opening_date = date("Y-m-d");
$bankaccount->status = "open";
$client->ownBankaccountsList[] = $bankaccount;

$last_card = R::findLast("cards");
$card = R::dispense("cards");
$card->name = "Visa";
$card->number = $last_card["number"] + 1;
$bankaccount->ownCardsList[] = $card;
echo "ok";

R::storeAll([$client, $bankaccount, $card]);