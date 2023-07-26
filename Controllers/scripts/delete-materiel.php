<?php

use Controllers\MaterielController;

require_once '../MaterielController.class.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: ../../Views/admin/show_materiels");
  exit;
}

session_start();
$ac = new MaterielController;
if ($ac->delete($_GET['id'])) $_SESSION['success'] = "Suppresseion efféctuée avec succès";
else $_SESSION['error'] = "Un problème est survenu!";
header("location: ../../Views/admin/show_materiels");