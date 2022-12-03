<?php
$plans = R::findAll("plans");
$feedbacks = R::findAll("feedbacks");
$clients = R::findAll("clients");
$accounts = R::findAll("accounts");
$account_statistics = R::findAll("accountstatistics");
$roles = R::findAll("roles");

$clients_with_feedbacks = [];
foreach ($clients as $client) {
    foreach ($feedbacks as $feedback) {
        if ($client->id == $feedback->clients_id) {
            $clients_with_feedbacks[] = $client;
        }
    }
}

$statistics = [];
foreach ($account_statistics as $statistic) {
    foreach ($accounts as $account) {
        if ($statistic->accounts_id == $account->id && $statistic->status == 0) {
            $statistics[] = $statistic;
        }
    }
}

$account_statistic = [];
foreach ($accounts as $account) {
    foreach($statistics as $statistic) {
        if ($account->id == $statistic->accounts_id && $statistic->account_statistic_status == 0) {
            $account_statistic[] = [
                "account" => $account,
                "statistic" => $statistic
            ];
        }
    }
}