<?php

namespace Controllers;

require_once __DIR__.'/../Models/Plat.class.php';
use Models\Plat;

class PlatController
{

  public function create ($nom, $image1, $image2, $image3, $description) {
    $values = compact('nom','image1','image2','image3','description');
    return Plat::save($values);
  }

  public function update ($nom, $image1, $image2, $image3, $description, $id) {
    $values = compact('nom','image1','image2','image3','description', 'id');
    return Plat::update($values);
  }

  public function delete ($id) {
    return Plat::delete($id);
  }

  public function all () {
    return Plat::getAllPlats ();
  }
  
  public function one ($id) {
    return Plat::getOnePlat($id);
  }
  
}