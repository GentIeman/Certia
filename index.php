<?php
require_once "./libs/rb.php";
require_once "./modules/database/ConnectDataBase.php";

$connectDB = new ConnectDataBase("dbconfig");
$connectDB->Connect();
$connectDB->startSession();

if (isset($_SESSION["user"]) === true) {
    $client = R::load("clients", $_SESSION["user"]->id);
}

if (isset($_GET["page"])) {
    switch ($_GET["page"]) {
        case "login":
            require_once "./modules/handlers/handler_auth.php";
            require_once "./views/login.php";
            break;
        case "registration":
            require_once "./modules/handlers/handler_auth.php";
            require_once "./views/registration.php";
            break;
        case "home":
            require_once "./views/home.php";
            break;
        case "company":
            require_once "./views/company.php";
            break;
        case "deposits":
            require_once "./views/deposits.php";
            break;
        case "account-processing":
            if (!$client) header("Location: ../index.php?page=login");
            require_once "./modules/handlers/handler_clients.php";
            require_once "./modules/accounts/getting_plan_info.php";
            require_once "./modules/clients/getting_client_info.php";
            require_once "./views/account_processing.php";
            break;
        case "loans":
            require_once "./views/loans.php";
            break;
        case "feedback":
            if (!$client) header("Location: ../index.php?page=login");
            require_once "./modules/clients/getting_client_info.php";
            require_once "./views/feedbacks.php";
            break;
        case "admin-panel":
            if (!$client) header("Location: ../index.php?page=login");
            require_once "./modules/handlers/handler_admin_panel.php";
            require_once "./views/admin.php";
            break;
        case "profile":
            if (!$client) header("Location: ../index.php?page=login");
            require_once "./modules/handlers/handler_clients.php";
            require_once "./modules/clients/getting_client_info.php";
            require_once "./modules/accounts/check_debting.php";
            require_once "./views/profile.php";
            break;
        case "account-info":
            if (!$client) header("Location: ../index.php?page=login");
            require_once "./modules/accounts/getting_account_statistic.php";
            require_once "./views/account_info.php";
            break;
        case "transaction-info":
            if (!$client) header("Location: ../index.php?page=login");
            require_once "./modules/handlers/handler_transaction.php";
            require_once "./views/transaction_info.php";
            break;
        case "logout":
            require_once "./modules/auth/logout.php";
            break;
        default:
            if (isset($_SESSION["user"]) === true) {
                header("Location: index.php?page=home");
            } else {
                header("Location: index.php?page=login");
            }
    }
}