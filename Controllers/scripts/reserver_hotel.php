<?php

require_once '../ReservationHotelController.class.php';
use Controllers\ReservationHotelController;

if(isset($_POST['submit'])) {
  session_start();
  $id_client = $_POST['id_client'];
  $id_hotel = $_POST['id_hotel'];
  $num_chambre = $_POST['chambre'];
  $tel = $_POST['tel'];
  $nb_personnes = $_POST['nb_personnes'];
  $date_debut = $_POST['date_debut'];
  $date_fin = $_POST['date_fin'];
  $prix = $_POST['prix'];
  $type_paiement = $_POST['type_paiement'];

  $rhc = new ReservationHotelController;
  if ($rhc->create($id_client, $id_hotel, $num_chambre, $tel, $nb_personnes, $date_debut, $date_fin, $prix, $type_paiement)) {
    $_SESSION['success'] = "Votre réservation est efféctuée avec succès";
    header("location: ../../Views/hotel?id=$id_hotel");
  }
  else {
    $_SESSION['error'] = "Votre réservation n'est pas efféctuée";
    header("location: ../../Views/reserver_hotel?id=$id_hotel");
  }
}
else header("location ../../Views/hotels");