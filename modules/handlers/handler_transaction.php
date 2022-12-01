<?php
$isEnoughMoney = false;
$isAccountNotFound = false;
if (isset($_GET["event"])) {
    switch ($_GET["event"]) {
        case "not-enough-money":
            $isEnoughMoney = true;
            break;
        case "account-not-found":
            $isAccountNotFound = true;
            break;
        case "transaction-completed":
            require_once "./modules/accounts/getting_transaction_info.php";
            break;
    }
}