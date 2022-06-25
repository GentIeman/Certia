<?php
$client = R::findOne("clients", "phone = ?", array($_POST["phone"]));
if ($client) {
    if (password_verify($_POST["password"], $client->pswd)) {
        $_SESSION["user"] = $client;
        echo "ok";
    } else {
        exit("Invalid password");
    }
} else {
    exit("User not found");
}