<?php

use Controllers\AdminController;

require_once '../AdminController.class.php';

$cc = new AdminController;
$cc->logout();

header("location: ../../Views/admin/login");