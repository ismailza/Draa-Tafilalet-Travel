<?php

namespace Controllers;

require_once __DIR__.'/../Models/Chambre.class.php';
use Models\Chambre;

class ChambreController
{
  public function some ($id) {
    return Chambre::getAllChambreOfHotel($id);
  }

}