<?php
$plan = R::load("plans", $_GET["plan_id"]);
$current_date = date("d F Y");
$end_date = date_format(date_add(new DateTime(), new DateInterval("P" . $plan->plan_term . "D")), "d F Y");