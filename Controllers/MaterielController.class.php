<?php

namespace Controllers;

require_once __DIR__.'/../Models/Materiel.class.php';
use Models\Materiel;

class MaterielController
{

  public function create ($nom, $image1, $image2, $image3, $prix, $description) {
    $values = compact('nom','image1','image2','image3','prix','description');
    return Materiel::save($values);
  }

  public function update ($nom, $image1, $image2, $image3, $prix, $description, $id) {
    $values = compact('nom','image1','image2','image3','prix','description', 'id');
    return Materiel::update($values);
  }

  public function delete ($id) {
    return Materiel::delete($id);
  }

  public function all () {
    return Materiel::getAllMateriels ();
  }
  
  public function one ($id) {
    return Materiel::getOneMateriel($id);
  }
  
}