<?php
$client_id = $_SESSION["user"]->id;
$client = R::load("clients", $client_id);
$feedback = R::dispense("feedbacks");
$feedback->feedback_message = trim($_POST["message"]);
$client->ownFeedbacksList[] = $feedback;
R::storeAll([$client, $feedback]);