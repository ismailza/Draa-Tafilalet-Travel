<?php

namespace Models;

require_once 'DataBase.class.php';

class Moussem
{
  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO moussems VALUES ('', :nom, :ville, :image1, :image2, :image3, :description, CURRENT_TIMESTAMP, NULL )");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }
  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE moussems SET nom_moussem = :nom, ville_moussem = :ville, image_moussem1 = :image1, image_moussem2 = :image2, image_moussem3 = :image3, description_moussem = :description, lastUpdateAt = CURRENT_TIMESTAMP WHERE id_moussem = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }
  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM moussems WHERE id_moussem = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function getOneMoussem ($id) {
    $db = new DataBase;
    $db->query("SELECT * FROM moussems WHERE id_moussem = :id");
    $db->bind("id", $id);
    return $db->singleResult();
  }

  static public function getAllMoussems () {
    $db = new DataBase;
    $db->query("SELECT * FROM moussems ORDER BY createdAt DESC");
    return $db->allResults();
  }

  static public function getMoussems ($ville) {
    $db = new DataBase;
    $db->query("SELECT * FROM moussems WHERE ville_moussem = :ville ORDER BY createdAt DESC");
    $db->bind("ville", $ville);
    return $db->allResults();
  }
}