<?php

namespace Controllers;

require_once __DIR__.'/../Models/ReservationHotel.class.php';
use Models\ReservationHotel;

class ReservationHotelController
{

  public function create ($id_client, $id_hotel, $num_chambre, $tel_client, $nb_personnes, $date_debut, $date_fin, $prix, $type_paiement) {
    $values = compact('id_client','id_hotel','num_chambre','tel_client','nb_personnes','date_debut','date_fin','prix', 'type_paiement');
    return ReservationHotel::save($values);
  }

  public function all () {
    return ReservationHotel::getAllReservation();
  }

  public function allWithStatus ($status) {
    return ReservationHotel::getAllReservationWithStatus ($status);
  }

  public function one ($id) {
    return ReservationHotel::getOneReservation($id);
  }

  public function some ($id) {
    return ReservationHotel::getAllReservationOfClient($id);
  }

  public function countOfClient ($id) {
    return is_null($count = ReservationHotel::nbReservationClient($id)) ? 0 : $count->nb_reservations;
  }

  public function countReservation () {
    return is_null($count = ReservationHotel::count()) ? 0 : $count->nb_reservations;
  }

  public function changeStatus ($status, $id) {
    return ReservationHotel::setStatus($status, $id);
  }
  
}