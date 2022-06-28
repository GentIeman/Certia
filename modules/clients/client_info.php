<?php
include("../modules/current_session.php");
require_once("movements.php");
require_once("check_debting.php");
$user = R::load("clients", $_SESSION["user"]->id);
$client_credits = R::getAll("SELECT * FROM clientsbankaccounts WHERE ClientId = :id AND AccountType = 'Credit'", [":id" => $user["id"]]);
$client_deposits = R::getAll("SELECT * FROM clientsbankaccounts WHERE ClientId = :id AND AccountType != 'Credit'", [":id" => $user["id"]]);
$client_cards = R::getAll("SELECT * FROM clientscards WHERE ClientId = :id", [":id" => $user["id"]]);