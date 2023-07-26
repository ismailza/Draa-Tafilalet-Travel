<?php

use Controllers\DestinationController;

require_once '../DestinationController.class.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: ../../Views/admin/show_destinations");
  exit;
}

session_start();
$ac = new DestinationController;
if ($ac->delete($_GET['id'])) $_SESSION['success'] = "Suppresseion efféctuée avec succès";
else $_SESSION['error'] = "Un problème est survenu!";
header("location: ../../Views/admin/show_destinations");