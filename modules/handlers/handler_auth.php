<?php
if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "auth":
            require_once "./modules/auth/login.php";
            break;
        case "registration":
            require_once "./modules/auth/registration.php";
            break;
    }
}