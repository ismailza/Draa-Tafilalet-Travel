<?php

namespace Controllers;

require_once __DIR__.'/../Models/ReservationVoyage.class.php';
use Models\ReservationVoyage;

class ReservationVoyageController
{

  public function create ($id_client, $id_circuit, $tel_client, $nb_personnes, $prix, $type_paiement) {
    $values = compact('id_client','id_circuit','tel_client','nb_personnes','prix', 'type_paiement');
    return ReservationVoyage::save($values);
  }

  public function all () {
    return ReservationVoyage::getAllReservation();
  }

  public function allWithStatus ($status) {
    return ReservationVoyage::getAllReservationWithStatus ($status);
  }

  public function one ($id) {
    return ReservationVoyage::getOneReservation($id);
  }

  public function some ($id) {
    return ReservationVoyage::getAllReservationOfClient($id);
  }

  public function countOfClient ($id) {
    return is_null($count = ReservationVoyage::nbReservationClient($id)) ? 0 : $count->nb_reservations;
  }

  public function countReservation () {
    return is_null($count = ReservationVoyage::count()) ? 0 : $count->nb_reservations;
  }

  public function changeStatus ($status, $id) {
    return ReservationVoyage::setStatus($status, $id);
  }

}