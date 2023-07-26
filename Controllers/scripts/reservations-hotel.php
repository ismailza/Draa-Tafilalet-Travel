<?php

use Controllers\ReservationHotelController;
require_once '../ReservationHotelController.class.php';

  $post_data = json_decode(file_get_contents('php://input'), true);

  $rhc = new ReservationHotelController;
  $reservations = $rhc->allWithStatus($post_data['status']);

  echo json_encode($reservations);
 
