<?php

require_once 'functions.php';
require_once '../RestaurantController.class.php';

use Controllers\RestaurantController;

if ((isset($_POST['submit']))) {
  session_start();
  $nom = $_POST['nom_rest'];
  $ville = $_POST['ville_rest'];
  $province = $_POST['province'];
  $image1 = $_FILES['image_rest1'];
  $image2 = $_FILES['image_rest2'];
  $image3 = $_FILES['image_rest3'];
  $localisation = $_POST['loc_rest'];
  $carte = $_POST['carte_rest'];
  $description = $_POST['description_rest'];

  if (
    !import_image($image1, '../../public/img/restaurants') ||
    !import_image($image2, '../../public/img/restaurants') ||
    !import_image($image3, '../../public/img/restaurants')
  ) {
    $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
    header("location: ../../Views/admin/add_restaurant");
    exit;
  }

  $ac = new RestaurantController;
  if ($ac->create($nom, $ville, $province, $image1['name'], $image2['name'], $image3['name'], $localisation, $carte, $description)) $_SESSION['success'] = "l'ajout du restaurant est effectué avec succès";
  else $_SESSION['error'] = "Un problème est survenu lors de l'ajout du restaurant";
  header("location: ../../Views/admin/show_restaurants");
} else header("location: ../../Views/admin/add_restaurant");
