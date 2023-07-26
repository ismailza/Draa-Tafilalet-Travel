<?php
session_start();

use Controllers\ReservationHotelController;
use Controllers\ReservationMaterielController;
use Controllers\ReservationVoyageController;

require_once '../ReservationHotelController.class.php';
require_once '../ReservationMaterielController.class.php';
require_once '../ReservationVoyageController.class.php';

if (isset($_POST['hotel'])) {
  $rhc = new ReservationHotelController;
  if ($rhc->changeStatus($_POST['status'], $_POST['id'])) $_SESSION['success'] = "Reservation ".$_POST['status'];
  else $_SESSION['error'] = "Un problème survenu";
  header("location: ../../Views/admin/reservations_hotel");
}
elseif (isset($_POST['voyage'])) {
  $rvc = new ReservationVoyageController;
  if ($rvc->changeStatus($_POST['status'], $_POST['id'])) $_SESSION['success'] = "Reservation ".$_POST['status'];
  else $_SESSION['error'] = "Un problème survenu";
  header("location: ../../Views/admin/reservations_voyage");
}
elseif (isset($_POST['materiel'])) {
  $rmc = new ReservationMaterielController;
  if ($rmc->changeStatus($_POST['status'], $_POST['id'])) $_SESSION['success'] = "Reservation ".$_POST['status'];
  else $_SESSION['error'] = "Un problème survenu";
  header("location: ../../Views/admin/reservations_materiel");
}
else header("location: ../../Views/admin/index");