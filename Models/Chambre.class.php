<?php

namespace Models;

require_once 'DataBase.class.php';

class Chambre
{
  static public function getAllChambreOfHotel ($id_hotel) {
    $db = new DataBase;
    $db->query("SELECT * FROM chambres WHERE id_hotel = :id ORDER BY num_chambre");
    $db->bind("id", $id_hotel);
    return $db->allResults();
  }

}