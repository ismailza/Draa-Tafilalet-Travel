<?php

namespace Models;

require_once 'DataBase.class.php';

class CircuitVoyage
{
  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO circuits_voyage VALUES ('', :ville_depart, :ville_arrivee, :trajet, :date_depart, :duree, :image_cover, :carte_trajet, :prix, :fin_reservation, CURRENT_TIMESTAMP, NULL)");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE circuits_voyage SET ville_depart = :ville_depart, ville_arrivee = :ville_arrivee, trajet = :trajet, date_depart = :date_depart, duree = :duree, image_cover = :image_cover, carte_trajet = :carte_trajet, prix = :prix, fin_reservation = :fin_reservation, lastUpdateAt = CURRENT_TIMESTAMP WHERE id_circuit = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM circuits_voyage WHERE id_circuit = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function getOneCircuit ($id) {
    $db = new DataBase;
    $db->query("SELECT * FROM circuits_voyage WHERE id_circuit = :id");
    $db->bind("id", $id);
    $db->execute();
    return $db->singleResult();
  }

  static public function getAllCircuits () {
    $db = new DataBase;
    $db->query("SELECT * FROM circuits_voyage ORDER BY createdAt DESC");
    $db->execute();
    return $db->allResults();
  }
}