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
        case "deposit-processing":
            require_once "./views/deposit-processing.php";
            break;
        case "loans":
            require_once "./views/loans.php";
            break;
        case "loan-processing":
            require_once "./views/loan-processing.php";
            break;
        case "feedback":
            require_once "./modules/handlers/handler_clients.php";
            require_once "./views/feedbacks.php";
            break;
        case "admin-panel":
            require_once "./views/admin.php";
            break;
        case "profile":
            require_once "./views/profile.php";
            break;
    }
} else {
    require_once "./views/login.php";
}