<?php
require_once("../libs/rb.php");
require_once("../modules/database/ConnectDataBase.php");

$connectDB = new ConnectDataBase("dbconfig");
$connectDB->Connect();
$connectDB->startSession();
if (isset($_SESSION["user"]) === true) $client = R::load("clients", $_SESSION["user"]->id);