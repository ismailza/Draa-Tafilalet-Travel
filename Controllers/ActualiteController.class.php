<?php

namespace Controllers;

use Models\Actualite;

require_once __DIR__.'/../Models/Actualite.class.php';

class ActualiteController
{
  public function all () {
    return Actualite::getAllActualites();
  }

  public function one ($id) {
    return Actualite::getOneActualite($id);
  }
}