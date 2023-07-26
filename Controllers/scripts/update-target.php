<?php

require_once 'functions.php';
require_once '../CircuitVoyageController.class.php';

use Controllers\CircuitVoyageController;

if ((isset($_POST['update']))) {
  session_start();
  $ville_depart = $_POST['ville_depart'];
  $ville_arrivee = $_POST['ville_arrivee'];
  $trajet = $_POST['trajet'];
  $date_depart = $_POST['date_depart']." ".$_POST['heure_depart'];
  $duree = $_POST['duree'];
  $image_cover = $_FILES['image_cover'];
  $carte_trajet = $_POST['carte_trajet'];
  $prix = $_POST['prix'];
  $fin_reservation = $_POST['fin_reservation'];
  $id = $_POST['id'];

  $ac = new CircuitVoyageController;
  $ld = $ac->one($id);
  if (is_uploaded_file($image_cover['tmp_name'])) {
    if (!import_image($image_cover, '../../public/img/targets')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_target?id=".$id);
      exit;
    }
  }
  else $image_cover['name'] = $ld->image_cover;

  if ($ac->update($ville_depart, $ville_arrivee, $trajet, $date_depart, $duree, $image_cover['name'], $carte_trajet, $prix, $fin_reservation, $id))
    $_SESSION['success'] = "la modification du circuit est effectuée avec succès";
  else {
    $_SESSION['error'] = "Un problème est survenu lors de la modification du circuit";
    header("location: ../../Views/admin/update_target?id=".$id);
    exit;
  }
}
header("location: ../../Views/admin/show_targets");