<?php

use Controllers\ReservationMaterielController;
require_once '../ReservationMaterielController.class.php';

  $post_data = json_decode(file_get_contents('php://input'), true);

  $rhc = new ReservationMaterielController;
  $reservations = $rhc->allWithStatus($post_data['status']);

  echo json_encode($reservations);
 
