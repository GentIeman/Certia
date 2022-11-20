<?php
$client = R::findOne("clients", "client_phone = ?", array($_POST["phone"]));
if ($client) {
    if (password_verify($_POST["password"], $client->client_password)) {
        $_SESSION["user"] = $client;
        header("location: ../index.php?page=home");
    } else {
        header("location: ../index.php?page=login&wrong-password");
    }
} else {
    header("location: ../index.php?page=login&phone-not-found");
}