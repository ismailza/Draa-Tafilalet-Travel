<?php

require_once 'functions.php';
require_once '../RestaurantController.class.php';

use Controllers\RestaurantController;

if ((isset($_POST['update']))) {
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
  $id = $_POST['id'];

  $ac = new RestaurantController;
  $ld = $ac->one($id);
  if (is_uploaded_file($image1['tmp_name'])) {
    if (!import_image($image1, '../../public/img/restaurants')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_restaurant?id=".$id);
      exit;
    }
  }
  else $image1['name'] = $ld->image_restaurant1;
  if (is_uploaded_file($image2['tmp_name'])) {
    if (!import_image($image2, '../../public/img/restaurants')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_restaurant?id=".$id);
      exit;
    }
  }
  else $image2['name'] = $ld->image_restaurant2;
  if (is_uploaded_file($image3['tmp_name'])) {
    if (!import_image($image3, '../../public/img/restaurants')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_restaurant?id=".$id);
      exit;
    }
  }
  else $image3['name'] = $ld->image_restaurant3;

  if ($ac->update($nom, $province, $ville, $image1['name'], $image2['name'], $image3['name'], $localisation, $carte, $description, $id))
    $_SESSION['success'] = "la modification de la restaurant est effectuée avec succès";
  else {
    $_SESSION['error'] = "Un problème est survenu lors de la modification de la restaurant";
    header("location: ../../Views/admin/update_restaurant?id=".$id);
    exit;
  }
}
header("location: ../../Views/admin/show_restaurants");