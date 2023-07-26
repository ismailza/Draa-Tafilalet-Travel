<?php

namespace Controllers;

require_once __DIR__.'/../Models/Hotel.class.php';
use Models\Hotel;

class HotelController
{

  public function create ($nom, $ville, $province, $image1, $image2, $image3, $localisation, $carte, $nb_chambre, $classe, $prix) {
    $values = compact('nom','ville','province','image1','image2','image3','localisation','carte','nb_chambre', 'classe', 'prix');
    return Hotel::save($values);
  }

  public function update ($nom, $ville, $province, $image1, $image2, $image3, $localisation, $carte, $nb_chambre, $classe, $prix, $id) {
    $values = compact('nom','ville','province','image1','image2','image3','localisation','carte','nb_chambre', 'classe', 'prix', 'id');
    return Hotel::update($values);
  }

  public function delete ($id) {
    return Hotel::delete($id);
  }

  public function all () {
    return Hotel::getAllHotels ();
  }
  
  public function one ($id) {
    return Hotel::getOneHotel($id);
  }

  public function some ($province) {
    return Hotel::getHotels($province);
  }

  public function countHotels () {
    return is_null($count = Hotel::count()) ? 0 : $count->nb_hotels;
  }
  
}