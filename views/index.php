<?php
require_once("../libs/rb.php");
require_once("../modules/database/ConnectDataBase.php");
require_once("../modules/individual-tasks/IndividualTasks.php");

$connectDB = new ConnectDataBase("dbconfig");
$connectDB->Connect();

$task = new IndividualTasks("dbconfig");

if (isset($_GET["section"])) {
    if ($_GET["section"] == "individual-tasks") {
        $task->gettingClientsInfo("debtors-more-month");
    }
}