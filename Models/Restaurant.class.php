<?php

namespace Models;

require_once 'Article.class.php';

class Restaurant extends Article
{
  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO restaurants VALUES ('', :nom, :ville, :province, :image1, :image2, :image3, :localisation, :carte, :description, CURRENT_TIMESTAMP, NULL)");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE restaurants SET nom_restaurant = :nom, ville_restaurant = :ville, province_restaurant = :province, image_restaurant1 = :image1, image_restaurant2 = :image2, image_restaurant3 = :image3, localisation_restaurant = :localisation, carte_restaurant = :carte, description_restaurant = :description, lastUpdateAt = CURRENT_TIMESTAMP WHERE id_restaurant = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM restaurants WHERE id_restaurant = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function getOneRestaurant ($id) {
    $db = new DataBase;
    $db->query("SELECT * FROM restaurants WHERE id_restaurant = :id");
    $db->bind("id", $id);
    return $db->singleResult();
  }

  static public function getAllRestaurants () {
    $db = new DataBase;
    $db->query("SELECT * FROM restaurants ORDER BY province_restaurant");
    return $db->allResults();
  }

  static public function getRestaurants ($value) {
    $db = new DataBase;
    $db->query("SELECT * FROM restaurants WHERE province_restaurant = :value OR ville_restaurant = :value ORDER BY createdAt DESC");
    $db->bind("value", $value);
    return $db->allResults();
  }

  static public function count () {
    $db = new DataBase();
    $db->query("SELECT COUNT(*) 'nb_restaurants' FROM restaurants");
    return $db->singleResult();
  }

}