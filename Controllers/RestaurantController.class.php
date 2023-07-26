<?php

namespace Controllers;

require_once __DIR__.'/../Models/Restaurant.class.php';
use Models\Restaurant;

class RestaurantController
{

  public function create ($nom, $ville, $province, $image1, $image2, $image3, $localisation, $carte, $description) {
    $values = compact('nom','ville','province','image1','image2','image3','localisation','carte','description');
    return Restaurant::save($values);
  }

  public function update ($nom, $ville, $province, $image1, $image2, $image3, $localisation, $carte, $description, $id) {
    $values = compact('nom','ville','province','image1','image2','image3','localisation','carte','description', 'id');
    return Restaurant::update($values);
  }

  public function delete ($id) {
    return Restaurant::delete($id);
  }

  public function all () {
    return Restaurant::getAllRestaurants ();
  }
  
  public function one ($id) {
    return Restaurant::getOneRestaurant($id);
  }

  public function some ($province) {
    return Restaurant::getRestaurants($province);
  }

  public function countRestaurants () {
    return is_null($count = Restaurant::count()) ? 0 : $count->nb_restaurants;
  }
  
}