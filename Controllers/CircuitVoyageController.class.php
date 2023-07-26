<?php

namespace Controllers;

use Models\CircuitVoyage;

require_once __DIR__.'/../Models/CircuitVoyage.class.php';

class CircuitVoyageController
{

  public function create ($ville_depart, $ville_arrivee, $trajet, $date_depart, $duree, $image_cover, $carte_trajet, $prix, $fin_reservation) {
    $values = compact('ville_depart','ville_arrivee','trajet','date_depart','duree','image_cover','carte_trajet','prix','fin_reservation');
    return CircuitVoyage::save($values);
  }

  public function update ($ville_depart, $ville_arrivee, $trajet, $date_depart, $duree, $image_cover, $carte_trajet, $prix, $fin_reservation, $id) {
    $values = compact('ville_depart','ville_arrivee','trajet','date_depart','duree','image_cover','carte_trajet','prix','fin_reservation','id');
    return CircuitVoyage::update($values);
  }

  public function delete ($id) {
    return CircuitVoyage::delete($id);
  }

  public function all () {
    return CircuitVoyage::getAllCircuits();
  }

  public function one ($id) {
    return CircuitVoyage::getOneCircuit($id);
  }
}