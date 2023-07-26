<?php

namespace Controllers;

require_once __DIR__.'/../Models/Moussem.class.php';
use Models\Moussem;

class MoussemController
{

  public function create ($nom, $ville, $image1, $image2, $image3, $description) {
    $values = compact('nom','ville','image1','image2','image3','description');
    return Moussem::save($values);
  }

  public function update ($nom, $ville, $image1, $image2, $image3, $description, $id) {
    $values = compact('nom','ville','image1','image2','image3','description', 'id');
    return Moussem::update($values);
  }

  public function delete ($id) {
    return Moussem::delete($id);
  }

  public function all () {
    return Moussem::getAllMoussems ();
  }
  
  public function one ($id) {
    return Moussem::getOneMoussem($id);
  }

  public function some ($ville) {
    return Moussem::getMoussems($ville);
  }

}