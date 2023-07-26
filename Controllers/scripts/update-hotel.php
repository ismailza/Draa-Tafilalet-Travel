<?php

require_once 'functions.php';
require_once '../HotelController.class.php';

use Controllers\HotelController;

if ((isset($_POST['update']))) {
  session_start();
  $nom = $_POST['nom_hot'];
  $ville = $_POST['ville_hot'];
  $province = $_POST['province_hot'];
  $image1 = $_FILES['image_hot1'];
  $image2 = $_FILES['image_hot2'];
  $image3 = $_FILES['image_hot3'];
  $localisation = $_POST['loc_hot'];
  $carte = $_POST['carte_hot'];
  $nb_chambre = $_POST['nbChambres'];
  $classe = $_POST['classe_hot'];
  $prix = $_POST['prix'];
  $id = $_POST['id'];

  $ac = new HotelController;
  $ld = $ac->one($id);
  if (is_uploaded_file($image1['tmp_name'])) {
    if (!import_image($image1, '../../public/img/hotels')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_hotel?id=".$id);
      exit;
    }
  }
  else $image1['name'] = $ld->image_hotel1;
  if (is_uploaded_file($image2['tmp_name'])) {
    if (!import_image($image2, '../../public/img/hotels')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_hotel?id=".$id);
      exit;
    }
  }
  else $image2['name'] = $ld->image_hotel2;
  if (is_uploaded_file($image3['tmp_name'])) {
    if (!import_image($image3, '../../public/img/hotels')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_hotel?id=".$id);
      exit;
    }
  }
  else $image3['name'] = $ld->image_hotel3;

  if ($ac->update($nom, $province, $ville, $image1['name'], $image2['name'], $image3['name'], $localisation, $carte, $nb_chambre, $classe, $prix, $id))
    $_SESSION['success'] = "la modification de l'hotel est effectuée avec succès";
  else {
    $_SESSION['error'] = "Un problème est survenu lors de la modification de l'hotel";
    header("location: ../../Views/admin/update_hotel?id=".$id);
    exit;
  }
}
header("location: ../../Views/admin/show_hotels");