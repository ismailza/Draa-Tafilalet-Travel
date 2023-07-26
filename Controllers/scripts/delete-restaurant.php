<?php

use Controllers\RestaurantController;

require_once '../RestaurantController.class.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: ../../Views/admin/show_restaurants");
  exit;
}

session_start();
$ac = new RestaurantController;
if ($ac->delete($_GET['id'])) $_SESSION['success'] = "Suppresseion efféctuée avec succès";
else $_SESSION['error'] = "Un problème est survenu!";
header("location: ../../Views/admin/show_restaurants");