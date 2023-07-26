<?php

use Controllers\MoussemController;

require_once '../MoussemController.class.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: ../../Views/admin/show_moussems");
  exit;
}

session_start();
$ac = new MoussemController;
if ($ac->delete($_GET['id'])) $_SESSION['success'] = "Suppresseion efféctuée avec succès";
else $_SESSION['error'] = "Un problème est survenu!";
header("location: ../../Views/admin/show_moussems");