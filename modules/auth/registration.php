<?php
$client = R::dispense("clients");
$client->client_name = trim($_POST["first-name"]);
$client->client_last_name = trim($_POST["last-name"]);
$client->client_patronymic = trim($_POST["patronymic"]);
$client->client_phone = $_POST["phone"];
$client->client_passport = $_POST["passport"];
$client->client_email = trim($_POST["email"]);
$client->client_birthday = $_POST["birthday"];
$client->client_gender = $_POST["gender"];
$client->client_password = trim(password_hash($_POST["password"], PASSWORD_DEFAULT));
$default_role = R::findOne("roles", "role_type = ?", ["client"]);
$client->roles_id = $default_role->id;
$_SESSION["user"] = $client;

$location = R::dispense("locations");
$location->location_city = trim($_POST["city"]);
$location->location_street = trim($_POST["street"]);
$location->location_house = $_POST["house"];
$location->location_building = $_POST["building"];
$location->location_flat = $_POST["flat"];
$location->location_zipcode = $_POST["zip-code"];

R::storeAll([$client, $location]);

header("Location: ../index.php?page=home");