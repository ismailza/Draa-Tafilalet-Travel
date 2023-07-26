<?php

namespace Models;

require_once 'Article.class.php';

class Hotel extends Article
{
  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO hotels VALUES ('', :nom, :ville, :province, :image1, :image2, :image3, :localisation, :carte, :nb_chambre, :classe, :prix, CURRENT_TIMESTAMP, NULL)");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE hotels SET nom_hotel = :nom, ville_hotel = :ville, province_hotel = :province, image_hotel1 = :image1, image_hotel2 = :image2, image_hotel3 = :image3, localisation_hotel = :localisation, carte_hotel = :carte, nb_chambre = :nb_chambre, classe_hotel = :classe, prix_hotel = :prix, lastUpdateAt = CURRENT_TIMESTAMP WHERE id_hotel = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM hotels WHERE id_hotel = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function getOneHotel ($id) {
    $db = new DataBase;
    $db->query("SELECT * FROM hotels WHERE id_hotel = :id");
    $db->bind("id", $id);
    return $db->singleResult();
  }

  static public function getAllHotels () {
    $db = new DataBase;
    $db->query("SELECT * FROM hotels ORDER BY province_hotel");
    return $db->allResults();
  }

  static public function getHotels ($value) {
    $db = new DataBase;
    $db->query("SELECT * FROM hotels WHERE province_hotel = :value OR ville_hotel = :value ORDER BY createdAt DESC");
    $db->bind("value", $value);
    return $db->allResults();
  }

  static public function count () {
    $db = new DataBase();
    $db->query("SELECT COUNT(*) 'nb_hotels' FROM hotels");
    return $db->singleResult();
  }

}