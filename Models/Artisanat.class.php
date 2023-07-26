<?php

namespace Models;

require_once 'DataBase.class.php';

class Artisanat
{
  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO artisanats VALUES ('', :nom, :image, CURRENT_TIMESTAMP, NULL)");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }
  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE artisanats SET nom_artisanat = :nom, image_artisanat = :image, lastUpdateAt = CURRENT_TIMESTAMP WHERE id_artisanat = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }
  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM artisanats WHERE id_artisanat = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function getOneArtisanat ($id) {
    $db = new DataBase;
    $db->query("SELECT * FROM artisanats WHERE id_artisanat = :id");
    $db->bind("id", $id);
    return $db->singleResult();
  }

  static public function getAllArtisanats () {
    $db = new DataBase;
    $db->query("SELECT * FROM artisanats ORDER BY createdAt DESC");
    return $db->allResults();
  }

}