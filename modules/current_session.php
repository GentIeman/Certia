<?php
require_once("../libs/rb.php");
require_once("../modules/database/ConnectDataBase.php");

$connectDB = new ConnectDataBase("dbconfig");
$connectDB->Connect();
$connectDB->startSession();
$user = $_SESSION["user"];