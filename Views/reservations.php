<?php

require_once '../Controllers/scripts/auth.inc.php';

require_once '../Controllers/ReservationHotelController.class.php';
require_once '../Controllers/ReservationMaterielController.class.php';
require_once '../Controllers/ReservationVoyageController.class.php';

use Controllers\ReservationHotelController;
use Controllers\ReservationMaterielController;
use Controllers\ReservationVoyageController;

$rhc = new ReservationHotelController;
$reservations_hotels = $rhc->some($_SESSION['auth']->id_client);
$rvc = new ReservationVoyageController;
$reservations_voyage = $rvc->some($_SESSION['auth']->id_client);
$rmc = new ReservationMaterielController;
$reservations_materiel = $rmc->some($_SESSION['auth']->id_client);

?>
<!doctype html>
<html lang="fr">
<head>
  <title>Mes Reservations</title>
  <?php include 'include/fonts_css.html'; ?>
  <link rel="stylesheet" href="../public/css/plus_info.css">
</head>
<body data-spy="scroll" data-target="#main-navbar">
  <div class="body">
    <?php include 'include/header.php';  ?>
    <section class="client_account wow fadeInUp" data-wow-delay="0.3s">
      <h2>Mes Réservations</h2>
      <table>
        <h3 class="titre">Réservations d'hôtels</h3>
        <thead>
          <tr>
            <th>Date de reservation</th>
            <th>Nom d'Hôtel</th>
            <th>Ville d'Hôtel</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($reservations_hotels)) : ?>
            <tr>
              <td colspan="6">
                <center>Vous n'avez aucune réservation dans un hôtel</center>
                </th>
            </tr>
          <?php
          endif;
          foreach ($reservations_hotels as $reservation) :
          ?>
            <tr>
              <td><?= $reservation->date_reservation; ?></td>
              <td><?= $reservation->nom_hotel; ?></td>
              <td><?= $reservation->ville_hotel; ?></td>
              <td><?= $reservation->date_debut; ?></td>
              <td><?= $reservation->date_fin; ?></td>
              <td>
                <?=
                  $reservation->status == 'En cours' ? "<span class=\"text-warning\">$reservation->status</span>" :
                  ($reservation->status == 'Acceptée' ? "<span class=\"text-success\">$reservation->status</span>" :
                  "<span class=\"text-danger\">$reservation->status</span>");
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <table>
        <h3 class="titre">Reservations de voyages</h3>
        <thead>
          <tr>
            <th>Date de reservation</th>
            <th>Ville départ</th>
            <th>Ville arrivée</th>
            <th>Durée</th>
            <th>Trajet</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        <?php if (empty($reservations_voyage)) : ?>
            <tr>
              <td colspan="6">
                <center>Vous n'avez aucune réservation de voyage</center>
                </th>
            </tr>
          <?php
          endif;
          foreach ($reservations_voyage as $reservation) :
          ?>
            <tr>
              <td><?= $reservation->date_reservation; ?></td>
              <td><?= $reservation->ville_depart; ?></td>
              <td><?= $reservation->ville_arrivee; ?></td>
              <td><?= $reservation->duree; ?> jours</td>
              <td><?= $reservation->trajet; ?></td>
              <td>
                <?=
                  $reservation->status == 'En cours' ? "<span class=\"text-warning\">$reservation->status</span>" :
                  ($reservation->status == 'Acceptée' ? "<span class=\"text-success\">$reservation->status</span>" :
                  "<span class=\"text-danger\">$reservation->status</span>");
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <table>
        <h3 class="titre">Reservations de Materiels</h3>
        <thead>
          <tr>
            <th>Date de reservation</th>
            <th>Nom de materiel</th>
            <th>Date début</th>
            <th>Dare fin</th>
            <th>prix</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        <?php if (empty($reservations_materiel)) : ?>
            <tr>
              <td colspan="6">
                <center>Vous n'avez aucune réservation de matériel</center>
                </th>
            </tr>
          <?php
          endif;
          foreach ($reservations_materiel as $reservation) :
          ?>
            <tr>
              <td><?= $reservation->date_reservation; ?></td>
              <td><?= $reservation->nom_materiel; ?></td>
              <td><?= $reservation->date_debut; ?></td>
              <td><?= $reservation->date_fin; ?></td>
              <td><?= $reservation->prix; ?></td>
              <td>
                <?=
                  $reservation->status == 'En cours' ? "<span class=\"text-warning\">$reservation->status</span>" :
                  ($reservation->status == 'Acceptée' ? "<span class=\"text-success\">$reservation->status</span>" :
                  "<span class=\"text-danger\">$reservation->status</span>");
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <a href="account"><button type="button" class="btn btn-info">Mon Profile</button></a>
      <a href="../Controllers/scripts/logout.php"><button type="button" class="btn btn-danger">Déconnexion</button></a>
    </section>
    <?php include 'include/footer.html'; ?>
  </div>
  <?php include 'include/plugins_js.html' ?>
</body>
</html>