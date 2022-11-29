<?php
if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "send-feedback":
            require_once "./modules/clients/send_feedback.php";
            break;
        case "transaction":
            require_once "./modules/clients/transaction.php";
            break;
    }
}