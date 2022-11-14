<?php
$client_credits = R::getAll("SELECT * FROM clientsbankaccounts WHERE ClientId = :id AND AccountType = 'Credit'", [":id" => $client["id"]]);
$client_deposits = R::getAll("SELECT * FROM clientsbankaccounts WHERE ClientId = :id AND AccountType != 'Credit'", [":id" => $client["id"]]);
$client_cards = R::getAll("SELECT * FROM clientscards WHERE ClientId = :id", [":id" => $client["id"]]);