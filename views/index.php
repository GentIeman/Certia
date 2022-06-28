<?php
require_once("../libs/rb.php");
require_once("../modules/database/ConnectDataBase.php");
require_once("../modules/individual-tasks/IndividualTasks.php");

$connectDB = new ConnectDataBase("dbconfig");
$connectDB->Connect();
$connectDB->timeLifeSession(900000);
$connectDB->startSession();
$task = new IndividualTasks("dbconfig");

if (isset($_GET["section"])) {
    switch ($_GET["section"]) {
        case "individual-tasks":
            $task->gettingClientsInfo("debtors-more-month");
            break;
        case "registration":
            require_once("../modules/auth/registration.php");
            break;
        case "login":
            require_once("../modules/auth/login.php");
            break;
        case "logout":
            require_once("../modules/auth/logout.php");
            break;
        case "feedback":
            require_once("../modules/clients/send_feedback.php");
            break;
        case "update-avatar":
            require_once("../modules/clients/update_avatar.php");
            break;
        case "transfer-money":
            require_once("../modules/clients/transfer_money.php");
            break;
        case "new-account":
            require_once("../modules/accounts/new_account.php");
            break;
    }
}