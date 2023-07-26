<?php

use Controllers\ArtisanatController;

require_once '../ArtisanatController.class.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: ../../Views/admin/show_artisanats");
  exit;
}

session_start();
$ac = new ArtisanatController;
if ($ac->delete($_GET['id'])) $_SESSION['success'] = "Suppresseion efféctuée avec succès";
else $_SESSION['error'] = "Un problème est survenu!";
header("location: ../../Views/admin/show_artisanats");