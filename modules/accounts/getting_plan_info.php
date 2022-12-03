<?php
if (isset($_GET["plan_id"])) {
    $plan = R::load("plans", $_GET["plan_id"]);
    $current_date = date("d F Y");
    $end_date = date_format(date_add(new DateTime(), new DateInterval("P" . $plan->plan_term . "D")), "d F Y");
}

$plans_info = [];
if (isset($_POST["first-date"]) && isset($_POST["second-date"])) {
    $first_date = $_POST["first-date"];
    $second_date = $_POST["second-date"];

    $statistic_accounts = R::findAll("accountstatistics", "account_statistic_status = 0 AND account_statistic_opening_date BETWEEN ? AND ?", ['2022-12-01', '2022-12-04']);
    $accounts = R::findAll("accounts");
    $plans = R::findAll("plans", "plan_type = ?", ["Loan"]);
    foreach($accounts as $account) {
        foreach ($plans as $plan) {
            if ($account->plans_id == $plan->id) {
                foreach ($statistic_accounts as $statistic) {
                    if ($account->id == $statistic->accounts_id) {
                        $plans_info[] = [
                            "statistic" => $statistic,
                            "account" => $account,
                        ];
                    }
                }
            }
        }
    }
}