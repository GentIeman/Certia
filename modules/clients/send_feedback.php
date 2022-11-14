<?php
$client = R::load("clients", $_GET["user_id"]);
$feedback = R::dispense("feedbacks");
$feedback->username = $_POST["username"];
$feedback->email = $_POST["email"];
$feedback->phone = $_POST["phone"];
$feedback->content = trim($_POST["content"]);
$client->ownFeedbacksList[] = $feedback;
R::storeAll([$client, $feedback]);
echo "ok";