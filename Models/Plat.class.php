<?php

namespace Models;

require_once 'DataBase.class.php';

class Plat
{
  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO plats VALUES ('', :nom, :image1, :image2, :image3, :description, CURRENT_TIMESTAMP, NULL)");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }
  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE plats SET nom_plat = :nom, image_plat1 = :image1, image_plat2 = :image2, image_plat3 = :image3, description_plat = :description, lastUpdateAt = CURRENT_TIMESTAMP WHERE id_plat = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }
  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM plats WHERE id_plat = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function getOneplat ($id) {
    $db = new DataBase;
    $db->query("SELECT * FROM plats WHERE id_plat = :id");
    $db->bind("id", $id);
    return $db->singleResult();
  }

  static public function getAllplats () {
    $db = new DataBase;
    $db->query("SELECT * FROM plats ORDER BY createdAt DESC");
    return $db->allResults();
  }

}