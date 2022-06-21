<?php
$client = R::dispense("clients");
$client->fullname = trim($_POST["fullname"]);
$client->address = trim($_POST["address"]);
$client->phone = trim($_POST["phone"]);
$client->email = $_POST["email"];
$client->birthday = $_POST["birthday"];
$client->gender = $_POST["gender"];
$client->pswd = trim(password_hash($_POST["password"], PASSWORD_DEFAULT));
$client->role = "user";

// создание аккаунта в момент регистрации
R::store($client);
header('Location:home.php');