<?php
$client = R::findOne("clients", "phone = ?", array($_POST["phone"]));
if ($client) {
    if (password_verify($_POST["password"], $client->pswd)) {
        $_SESSION["user"] = $client;
        header("Location:profile.php");
    } else {
        header("Location:signin.php?passwordError");
    }
} else {
    header("Location:signin.php?authError");
}