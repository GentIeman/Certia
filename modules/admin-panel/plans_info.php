<?php
$plans = R::findAll("plans");
$plans_saving = R::findAll("plans", "plan_type = ?", ["Saving"]);
$plans_cumulative = R::findAll("plans", "plan_type = ?", ["Cumulative"]);
$accounts_saving = null;
$accounts_cumulative = null;
$saving_and_cumulative = null;

foreach ($plans_saving as $saving) {
    $accounts_saving = R::findAll("accounts", "plans_id = ?", [$saving->id]);
    $saving_and_cumulative[] = $accounts_saving;
}

foreach ($plans_cumulative as $cumulative) {
    $accounts_cumulative = R::findAll("accounts", "plans_id = ?", [$cumulative->id]);
    $saving_and_cumulative[] = $accounts_cumulative;
}

foreach ($saving_and_cumulative as $account) {
    foreach ($account as $account_data) {
        $account_statistics = R::findAll("accountstatistics", "accounts_id = ?", [$account_data->id]);
        foreach ($account_statistics as $statistic) {
            if ($statistic->account_statistic_status == 0) {
                $account_data->account_statistic_opening_date = $statistic->account_statistic_opening_date;
                $account_data->account_statistic_closing_date = $statistic->account_statistic_closing_date;
                $account_data->account_statistic_status = $statistic->account_statistic_status;
            }
        }
        foreach ($plans as $plan) {
            if ($account_data->plans_id == $plan->id) {
                $account_data->plan_type = $plan->plan_type;
            }
        }
    }
}

$sum_money_saving = 0;
foreach ($plans_saving as $saving) {
    $accounts = R::findAll("accounts", "plans_id = ?", [$saving->id]);
    foreach ($accounts as $account) {
        $sum_money_saving += $account->account_balance;
    }
}

$loans_plans = R::findAll("plans", "plan_type = ?", ["Loan"]);
$open_loans = null;
$sum_loans = 0;
foreach ($loans_plans as $loan) {
    $loans_accounts = R::findAll("accounts", "plans_id = ?", [$loan->id]);
    $opening_accounts = R::findAll("accountstatistics", "account_statistic_status = ?", [0]);
    foreach ($loans_accounts as $account) {
        foreach ($opening_accounts as $opening_loan) {
            if ($account->id == $opening_loan->accounts_id) {
                $open_loans[] = [
                    "account" => $account,
                    "opening_date" => $opening_loan->account_statistic_opening_date,
                ];
            }
        }
    }
}

foreach ($open_loans as $loan) {
    $sum_loans += $loan["account"]->account_balance * -1;
}