<?php

require_once '../ReservationVoyageController.class.php';
use Controllers\ReservationVoyageController;

if(isset($_POST['submit'])) {
  session_start();
  $id_client = $_POST['id_client'];
  $id_circuit = $_POST['id_circuit'];
  $tel = $_POST['tel'];
  $nb_personnes = $_POST['nb_personnes'];
  $prix = $_POST['prix'];
  $type_paiement = $_POST['type_paiement'];

  $rhc = new ReservationVoyageController;
  if ($rhc->create($id_client, $id_circuit, $tel, $nb_personnes, $prix, $type_paiement))
    $_SESSION['success'] = "Votre réservation est efféctuée avec succès";
  else $_SESSION['error'] = "Votre réservation n'est pas efféctuée";
  header("location: ../../Views/reserver_voyage?id=$id_circuit");
}
else header("location ../../Views/index");