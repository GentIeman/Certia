<?php
$roles = R::findAll("roles");
if (isset($_GET["section"])) {
    switch ($_GET["section"]) {
        case "dashboard":
            require_once "./modules/admin-panel/dashboard_info.php";
            $isDashboard = true;
            break;
        case "clients-info":
            require_once "./modules/admin-panel/client_info.php";
            $isClientsInfo = true;
            break;
        case "plans-info":
            require_once "./modules/admin-panel/plans_info.php";
            $isPlansInfo = true;
            break;
        case "settings":
            $isSettings = true;
            break;
        default:
            $isDashboard = true;
    }
}

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "get-clients-info":
            require_once "./modules/clients/getting_client_info.php";
            break;
        case "get-plans-info":
            require_once "./modules/accounts/getting_plan_info.php";
            break;
    }
}