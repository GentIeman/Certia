<?php
function checkingAvailability($data, $field) {
    if (R::count("clients", "client_" . $field .  " = ?", [$data]) > 0) {
        header("Location: ../index.php?page=registration&error=$field");
    } else {
        return $data;
    }
}

$client = R::dispense("clients");
$client->client_name = trim($_POST["first-name"]);
$client->client_last_name = trim($_POST["last-name"]);
$client->client_patronymic = trim($_POST["patronymic"]);
$client->client_phone = checkingAvailability($_POST["phone"], "phone");
$client->client_passport = checkingAvailability($_POST["passport"], "passport");
$client->client_email = checkingAvailability($_POST["email"], "email");
$client->client_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
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
$client->ownLocationsList[] = $location;

$account = R::dispense("accounts");
$account->account_number = rand(1000, 9999) . " " . rand(1000, 9999) . " " . rand(1000, 9999) . " " . rand(1000, 9999) . " " . rand(1000, 9999);
$client->ownAccountsList[] = $account;

R::storeAll([$client, $location, $account]);

header("Location: ../index.php?page=home");