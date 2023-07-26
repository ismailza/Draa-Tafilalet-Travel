<?php

namespace Models;

require_once 'Article.class.php';

class Destination extends Article
{
  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO destinations VALUES ('', :nom, :ville, :province, :image1, :image2, :image3, :localisation, :carte, :description, CURRENT_TIMESTAMP, NULL)");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE destinations SET nom_destination = :nom, ville_destination = :ville, province_destination = :province, image_destination1 = :image1, image_destination2 = :image2, image_destination3 = :image3, localisation_destination = :localisation, carte_destination = :carte, description_destination = :description, lastUpdateAt = CURRENT_TIMESTAMP WHERE id_destination = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM destinations WHERE id_destination = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function getOneDestination ($id) {
    $db = new DataBase;
    $db->query("SELECT * FROM destinations WHERE id_destination = :id");
    $db->bind("id", $id);
    return $db->singleResult();
  }

  static public function getAllDestinations () {
    $db = new DataBase;
    $db->query("SELECT * FROM destinations ORDER BY province_destination");
    return $db->allResults();
  }

  static public function getDestinations ($value) {
    $db = new DataBase;
    $db->query("SELECT * FROM destinations WHERE province_destination = :value OR ville_destination = :value ORDER BY createdAt DESC");
    $db->bind("value", $value);
    return $db->allResults();
  }

  static public function count () {
    $db = new DataBase();
    $db->query("SELECT COUNT(*) 'nb_destinations' FROM destinations");
    return $db->singleResult();
  }

}