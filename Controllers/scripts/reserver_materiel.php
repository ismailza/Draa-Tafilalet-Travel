<?php

require_once '../ReservationMaterielController.class.php';
use Controllers\ReservationMaterielController;

if(isset($_POST['submit'])) {
  session_start();
  $id_client = $_POST['id_client'];
  $id_materiel = $_POST['id_materiel'];
  $tel = $_POST['tel'];
  $nb_personnes = $_POST['nb_personnes'];
  $date_debut = $_POST['date_debut'];
  $date_fin = $_POST['date_fin'];
  $prix = $_POST['prix'];
  $type_paiement = $_POST['type_paiement'];

  $rmc = new ReservationMaterielController;
  if ($rmc->create($id_client, $id_materiel, $tel, $nb_personnes, $date_debut, $date_fin, $prix, $type_paiement))
    $_SESSION['success'] = "Votre réservation est efféctuée avec succès";
  else $_SESSION['error'] = "Votre réservation n'est pas efféctuée";
  header("location: ../../Views/reserver_materiel?id=$id_materiel");
}
else header("location ../../Views/index");