<?php

namespace Controllers;

require_once __DIR__.'/../Models/Destination.class.php';
use Models\Destination;

class DestinationController
{

  public function create ($nom, $ville, $province, $image1, $image2, $image3, $localisation, $carte, $description) {
    $values = compact('nom','ville','province','image1','image2','image3','localisation','carte','description');
    return Destination::save($values);
  }

  public function update ($nom, $ville, $province, $image1, $image2, $image3, $localisation, $carte, $description, $id) {
    $values = compact('nom','ville','province','image1','image2','image3','localisation','carte','description', 'id');
    return Destination::update($values);
  }

  public function delete ($id) {
    return Destination::delete($id);
  }

  public function all () {
    return Destination::getAllDestinations ();
  }
  
  public function one ($id) {
    return Destination::getOneDestination($id);
  }
  
  public function some ($province) {
    return Destination::getDestinations($province);
  }

  public function countDestinations () {
    return is_null($count = Destination::count()) ? 0 : $count->nb_destinations;
  }

}