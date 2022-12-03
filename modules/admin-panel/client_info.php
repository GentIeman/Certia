<?php
$loans_plans = R::findAll("plans", "plan_type = ?", ["Loan"] );
$current_month = date("m");
$accounts_with_debt = R::findAll("accounts", "account_debt < 0");
$current_year = date("Y");
$overdue_accounts = R::findAll("accountstatistics", "MONTH(account_statistic_closing_date) < $current_month OR account_statistic_closing_date < '$current_year'");
foreach ($overdue_accounts as $overdue_account) {
    foreach ($accounts_with_debt as $account) {
        if ($overdue_account->accounts_id == $account->id) {
            foreach ($loans_plans as $plan) {
                if ($account->plans_id == $plan->id) {
                    $debtors[] = [
                        "client" => R::load("clients", $account->clients_id),
                        "account" => $account
                    ];
                }
            }
        }
    }
}


// получение клиента с наибольшей суммой задолженности
$client_max_debt = R::findOne("clients", "id = ?", [min(R::findAll("accounts", "account_debt < 0"))->clients_id]);
// получение счета с наибольшей суммой задолженности
$account_max_debt = R::findOne("accounts", "id = ?", [min(R::findAll("accounts", "account_debt < 0"))->id]);

// получение клиента с наименьшей суммой задолженности
$client_min_debt = R::findOne("clients", "id = ?", [max(R::findAll("accounts", "account_debt < 0"))->clients_id]);
// получение счета с наименьшей суммой задолженности
$account_min_debt = R::findOne("accounts", "id = ?", [max(R::findAll("accounts", "account_debt < 0"))->id]);

// получение клиента с наибольшей суммой по кредиту
$client_max_sum_loan = R::findOne("clients", "id = ?", [min(R::findAll("accounts", "account_balance < 0"))->clients_id]);
// получение счета с наибольшей суммой по кредиту
$account_max_sum_loan = R::findOne("accounts", "id = ?", [min(R::findAll("accounts", "account_balance < 0"))->id]);

// получение клиента с наименьшей суммой по кредиту
$client_min_sum_loan = R::findOne("clients", "id = ?", [max(R::findAll("accounts", "account_balance < 0"))->clients_id]);
// получение счета с наименьшей суммой по кредиту
$account_min_sum_loan = R::findOne("accounts", "id = ?", [max(R::findAll("accounts", "account_balance < 0"))->id]);
