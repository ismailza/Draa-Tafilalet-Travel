<?php

use Controllers\CircuitVoyageController;

require_once '../CircuitVoyageController.class.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: ../../Views/admin/show_targetss");
  exit;
}

session_start();
$ac = new CircuitVoyageController;
if ($ac->delete($_GET['id'])) $_SESSION['success'] = "Suppresseion efféctuée avec succès";
else $_SESSION['error'] = "Un problème est survenu!";
header("location: ../../Views/admin/show_targets");