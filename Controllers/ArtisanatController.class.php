<?php

namespace Controllers;

require_once __DIR__.'/../Models/Artisanat.class.php';
use Models\Artisanat;

class ArtisanatController
{

  public function create ($nom, $image) {
    $values = compact('nom', 'image');
    return Artisanat::save($values);
  }

  public function update ($nom, $image, $id) {
    $values = compact('nom', 'image', 'id');
    return Artisanat::update($values);
  }

  public function delete ($id) {
    return Artisanat::delete($id);
  }

  public function all () {
    return Artisanat::getAllArtisanats ();
  }
  
  public function one ($id) {
    return Artisanat::getOneArtisanat($id);
  }
  
}