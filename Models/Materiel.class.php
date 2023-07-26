<?php

namespace Models;

require_once 'DataBase.class.php';

class Materiel
{
  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO materiels VALUES ('', :nom, :image1, :image2, :image3, :prix, :description, CURRENT_TIMESTAMP, NULL)");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }
  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE materiels SET nom_materiel = :nom, image_materiel1 = :image1, image_materiel2 = :image2, image_materiel3 = :image3, prix_materiel = :prix, description_materiel = :description, lastUpdateAt = CURRENT_TIMESTAMP WHERE id_materiel = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }
  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM materiels WHERE id_materiel = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function getOneMateriel ($id) {
    $db = new DataBase;
    $db->query("SELECT * FROM materiels WHERE id_materiel = :id");
    $db->bind("id", $id);
    return $db->singleResult();
  }

  static public function getAllMateriels () {
    $db = new DataBase;
    $db->query("SELECT * FROM materiels ORDER BY createdAt DESC");
    return $db->allResults();
  }

}