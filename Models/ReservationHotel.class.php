<?php

namespace Models;

require_once 'DataBase.class.php';
use Models\DataBase;

class ReservationHotel
{
  static public function getAllReservation () {
    $db = new DataBase;
    $db->query("SELECT * FROM reservations_hotel RH INNER JOIN hotels H INNER JOIN chambres Ch INNER JOIN clients Cl ON RH.id_hotel = H.id_hotel AND RH.num_chambre = Ch.num_chambre AND RH.id_client = Cl.id_client ORDER BY date_reservation DESC");
    return $db->allResults();
  }

  static public function getAllReservationWithStatus ($status) {
    $db = new DataBase;
    $db->query("SELECT * FROM reservations_hotel RH INNER JOIN hotels H INNER JOIN chambres Ch INNER JOIN clients Cl ON RH.id_hotel = H.id_hotel AND RH.num_chambre = Ch.num_chambre AND RH.id_client = Cl.id_client WHERE RH.status = :status ORDER BY date_reservation DESC");
    $db->bind("status", $status);
    return $db->allResults();
  }

  static public function getAllReservationOfClient ($id_client) {
    $db = new DataBase;
    $db->query("SELECT * FROM reservations_hotel RH INNER JOIN hotels H INNER JOIN chambres Ch ON RH.id_hotel = H.id_hotel AND RH.num_chambre = Ch.num_chambre WHERE id_client = :id ORDER BY date_reservation DESC");
    $db->bind("id", $id_client);
    return $db->allResults();
  }

  static public function getOneReservation ($id) {
    $db = new DataBase;
    $db->query("SELECT * FROM reservations_hotel RH INNER JOIN hotels H INNER JOIN chambres Ch ON RH.id_hotel = H.id_hotel AND RH.num_chambre = Ch.num_chambre WHERE id_reservation = :id ORDER BY date_reservation DESC");
    $db->bind("id", $id);
    return $db->singleResult();
  }

  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO reservations_hotel VALUES ('', :id_client, :id_hotel, :num_chambre, :tel_client, :nb_personnes, :date_debut, :date_fin, :prix, :type_paiement, CURRENT_TIMESTAMP, 'En cours')");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE reservations_hotel SET id_hotel = :id_hotel, num_chambre = :num_chambre, tel_client = :tel_client, nb_personnes = :nb_personnes, date_debut = :date_debut, date_fin = :date_fin, prix = :prix, type_paiement = :type_paiement, date_reservation = CURRENT_TIMESTAMP WHERE id_reservation = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM reservations_hotel WHERE id_reservation = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function setStatus ($status, $id) {
    $db = new DataBase;
    $db->query("UPDATE reservations_hotel SET status = :status WHERE id_reservation = :id");
    $db->bind("status", $status);
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function nbReservationClient ($id) {
    $db = new DataBase;
    $db->query("SELECT COUNT(*) 'nb_reservations' FROM reservations_hotel WHERE id_client = :id");
    $db->bind("id", $id);
    return $db->singleResult();
  }

  static public function count () {
    $db = new DataBase;
    $db->query("SELECT COUNT(*) 'nb_reservations' FROM reservations_hotel");
    return $db->singleResult();
  }

}