<?php
$feedback = R::dispense("feedbacks");
$feedback->feedback_message = trim($_POST["message"]);
$client->ownFeedbacksList[] = $feedback;
R::storeAll([$client, $feedback]);