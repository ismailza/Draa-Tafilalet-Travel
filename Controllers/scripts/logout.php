<?php

use Controllers\ClientController;

require_once '../ClientController.class.php';

$cc = new ClientController;
$cc->logout();

header("location: ../../Views/signform");