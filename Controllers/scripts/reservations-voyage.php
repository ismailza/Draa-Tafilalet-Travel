<?php

use Controllers\ReservationVoyageController;
require_once '../ReservationVoyageController.class.php';

  $post_data = json_decode(file_get_contents('php://input'), true);

  $rhc = new ReservationVoyageController;
  $reservations = $rhc->allWithStatus($post_data['status']);

  echo json_encode($reservations);
 
