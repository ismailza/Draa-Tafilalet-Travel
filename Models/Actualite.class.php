<?php

namespace Models;

require_once 'DataBase.class.php';

class Actualite
{
  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO actualites VALUES ('', ... )");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE actualites SET ... WHERE id_actualite = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM actualites WHERE id_actualite = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function getOneActualite ($id) {
    $db = new DataBase;
    $db->query("SELECT * FROM actualites A INNER JOIN circuits_voyage CV ON A.id_circuit = CV.id_circuit WHERE id_actualite = :id");
    $db->bind("id", $id);
    $db->execute();
    return $db->singleResult();
  }

  static public function getAllActualites () {
    $db = new DataBase;
    $db->query("SELECT * FROM actualites AC INNER JOIN circuits_voyage CV ON AC.id_circuit = CV.id_circuit ORDER BY CV.createdAt DESC");
    $db->execute();
    return $db->allResults();
  }
}