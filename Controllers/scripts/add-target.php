<?php

require_once 'functions.php';
require_once '../CircuitVoyageController.class.php';

use Controllers\CircuitVoyageController;

if ((isset($_POST['submit']))) {
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

  if (!import_image($image_cover, '../../public/img/targets')) {
    $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
    header("location: ../../Views/admin/add_target");
    exit;
  }

  $ac = new CircuitVoyageController;
  if ($ac->create($ville_depart, $ville_arrivee, $trajet, $date_depart, $duree, $image_cover['name'], $carte_trajet, $prix, $fin_reservation)) $_SESSION['success'] = "l'ajout du circuit est effectué avec succès";
  else $_SESSION['error'] = "Un problème est survenu lors de l'ajout du circuit";
  header("location: ../../Views/admin/show_targets");
} else header("location: ../../Views/admin/add_target");
