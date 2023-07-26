<?php

require_once '../../Controllers/scripts/admin-auth.inc.php';

require_once '../../Controllers/ClientController.class.php';
require_once '../../Controllers/DestinationController.class.php';
require_once '../../Controllers/HotelController.class.php';
require_once '../../Controllers/RestaurantController.class.php';
require_once '../../Controllers/ReservationHotelController.class.php';
require_once '../../Controllers/ReservationMaterielController.class.php';
require_once '../../Controllers/ReservationVoyageController.class.php';

use Controllers\ClientController;
use Controllers\DestinationController;
use Controllers\HotelController;
use Controllers\ReservationHotelController;
use Controllers\ReservationMaterielController;
use Controllers\ReservationVoyageController;
use Controllers\RestaurantController;

$cc = new ClientController;
$nb_clients = $cc->countClients();
$rhc = new ReservationHotelController;
$nb_reservations_hotel = $rhc->countReservation();
$rvc = new ReservationVoyageController;
$nb_reservations_voyage = $rvc->countReservation();
$rmc = new ReservationMaterielController;
$nb_reservations_materiel = $rmc->countReservation();
$dc = new DestinationController;
$nb_destinations = $dc->countDestinations();
$hc = new HotelController;
$nb_hotels = $hc->countHotels();
$rc = new RestaurantController;
$nb_restaurants = $rc->countRestaurants();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Drâa Tafilalet Travel</title>
  <?php include 'partials/style.html'; ?>
  <script src="vendors/color-calendar/package/dist/bundle.js"></script>
  <link rel="stylesheet" href="vendors/color-calendar/package/dist/css/theme-basic.css">
  <link rel="stylesheet" href="vendors/color-calendar/package/dist/css/theme-glass.css">
</head>

<body>
  <!-- Begin navbar -->
  <?php include 'partials/_navbar.php'; ?>
  <!-- End navbar -->
  <div class="container-fluid page-body-wrapper">
    <!--Begin settings panel -->
    <?php include 'partials/_settings-panel.html'; ?>
    <!-- End settings panel -->
    <!-- Begin sidebar -->
    <?php include 'partials/_sidebar.html'; ?>
    <!-- End sidebar -->
    <!-- Begin main-panel -->
    <div class="main-panel">
      <!-- Begin content-wrapper -->
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-12">
            <div class="home-tab">
            <?php require_once 'alerts.php'; ?>
              <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="statistics-details d-flex align-items-center justify-content-center">
                        <div class="statics-box">
                          <div><i class="btn btn-info mdi mdi-account-group-outline"></i></div>
                          <div>
                            <h3 class="rate-percentage"><?= $nb_clients; ?></h3>
                            <p class="statistics-title">clients</p>
                          </div>
                        </div>
                        <div class="statics-box">
                          <div><i class="btn btn-success mdi mdi-checkbook"></i></div>
                          <div>
                            <h3 class="rate-percentage"><?= $nb_reservations_hotel; ?></h3>
                            <p class="statistics-title">réservations d'hôtel</p>
                          </div>
                        </div>
                        <div class="statics-box">
                          <div><i class="btn btn-success mdi mdi-checkbook"></i></div>
                          <div>
                            <h3 class="rate-percentage"><?= $nb_reservations_voyage; ?></h3>
                            <p class="statistics-title">réservations de voyage</p>
                          </div>
                        </div>
                        <div class="statics-box">
                          <div><i class="btn btn-success mdi mdi-checkbook"></i></div>
                          <div>
                            <h3 class="rate-percentage"><?= $nb_reservations_materiel; ?></h3>
                            <p class="statistics-title">réservations de materiel</p>
                          </div>
                        </div>
                        <div class="statics-box">
                          <div><i class="btn btn-primary mdi mdi-map-marker"></i></div>
                          <div>
                            <h3 class="rate-percentage"><?= $nb_destinations; ?></h3>
                            <p class="statistics-title">destinations</p>
                          </div>
                        </div>
                        <div class="statics-box">
                          <div><i class="btn btn-warning mdi mdi-silverware-variant"></i></div>
                          <div>
                            <h3 class="rate-percentage"><?= $nb_restaurants; ?></h3>
                            <p class="statistics-title">restaurants</p>
                          </div>
                        </div>
                        <div class="statics-box">
                          <div><i class="btn btn-secondary mdi mdi-bed"></i></div>
                          <div>
                            <h3 class="rate-percentage"><?= $nb_hotels; ?></h3>
                            <p class="statistics-title">hôtels</p>
                          </div>
                        </div>
                      </div> <!-- end statistics-details-bar -->
                    </div> <!-- end col-sm-12 -->
                  </div> <!-- end row -->
                 
                  <div class="row">
                    <div class="col-lg-8 d-flex flex-column">
                      <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                  <h4 class="card-title card-title-dash">Statistiques de réservations</h4>
                                </div>
                                <div>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="chartjs-bar-wrapper mt-3 chart-box">
                              <canvas id="reservationChart"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 d-flex flex-column">
                      <div class="row flex-grow">
                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                          <div class="card-rounded">
                            <div id="color-calendar"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End content-wrapper -->
      <!-- Begin footer -->
      <?php include 'partials/_footer.html' ?>
      <!-- End footer -->
    </div>
    <!-- End main-panel -->
  </div>
  <!-- page-body-wrapper ends -->
  <!-- plugins js -->
  <?php include 'partials/plugins.html' ?>
  <script>
    new Calendar({
      id: '#color-calendar',
      calendarSize: 'large',
      theme: 'glass',
      primaryColor: 'orange',
      headerColor: 'rgb(100, 0, 0)',
      headerBackgroundColor: 'orange',
      weekdayDisplayType: 'short',
      // short | long
      monthDisplayType: 'long',
      // 0 (Sun)
      startWeekday: 1,
      // disable month year pickers
      disableMonthYearPickers: false,
      // disable click on dates
      disableDayClick: false,
      // disable the arrows to navigate between months
      disableMonthArrowClick: false
    })
  </script>
</body>
</html>