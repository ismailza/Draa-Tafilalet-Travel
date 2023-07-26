<?php

use Controllers\AdminController;

require_once '../AdminController.class.php';

if (!isset($_GET['id'])|| empty($_GET['id'])) {
  header("location: ../../Views/admin/show_admins");
  exit;
}

session_start();
$ac = new AdminController;
if ($ac->delete($_GET['id'])) $_SESSION['success'] = "Suppresseion efféctuée avec succès";
else $_SESSION['error'] = "Un problème est survenu!";
header("location: ../../Views/admin/show_admins");