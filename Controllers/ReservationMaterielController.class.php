<?php

namespace Controllers;

require_once __DIR__.'/../Models/ReservationMateriel.class.php';
use Models\ReservationMateriel;

class ReservationMaterielController
{

  public function create ($id_client, $id_materiel, $tel_client, $nb_personnes, $date_debut, $date_fin, $prix, $type_paiement) {
    $values = compact('id_client','id_materiel','tel_client','nb_personnes','date_debut','date_fin','prix', 'type_paiement');
    return ReservationMateriel::save($values);
  }

  public function all () {
    return ReservationMateriel::getAllReservation();
  }

  public function allWithStatus ($status) {
    return ReservationMateriel::getAllReservationWithStatus ($status);
  }

  public function one ($id) {
    return ReservationMateriel::getOneReservation($id);
  }

  public function some ($id) {
    return ReservationMateriel::getAllReservationOfClient($id);
  }

  public function countOfClient ($id) {
    return is_null($count = ReservationMateriel::nbReservationClient($id)) ? 0 : $count->nb_reservations;
  }

  public function countReservation () {
    return is_null($count = ReservationMateriel::count()) ? 0 : $count->nb_reservations;
  }

  public function changeStatus ($status, $id) {
    return ReservationMateriel::setStatus($status, $id);
  }

}