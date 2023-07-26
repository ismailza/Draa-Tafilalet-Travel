<?php 
require_once '../Controllers/scripts/auth.inc.php';

require_once '../Controllers/ReservationHotelController.class.php';
require_once '../Controllers/ReservationMaterielController.class.php';
require_once '../Controllers/ReservationVoyageController.class.php';

use Controllers\ReservationHotelController;
use Controllers\ReservationMaterielController;
use Controllers\ReservationVoyageController;

$rhc = new ReservationHotelController;
$nb_reservations_hotel = $rhc->countOfClient($_SESSION['auth']->id_client);
$rvc = new ReservationVoyageController;
$nb_reservations_voyage = $rvc->countOfClient($_SESSION['auth']->id_client);
$rmc = new ReservationMaterielController;
$nb_reservations_materiel = $rmc->countOfClient($_SESSION['auth']->id_client);

?>
<!doctype html>
<html lang="fr">
<head>
	<title>Mon Profil</title>
  <?php  include 'include/fonts_css.html'; ?>
  <link rel="stylesheet" href="../public/css/plus_info.css">
</head>
<body data-spy="scroll" data-target="#main-navbar">
  <div class="body">
    <?php  include 'include/header.php';	?>
    <section class="client_account wow fadeInUp" data-wow-delay="0.3s">
      <div class="info_client">
        <div class="avatar-flip">
          <img class="img-circle" src="../public/img/user-286.png" height="150" width="150">
        </div>
        <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success" role="alert">
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" role="alert">
          <?php 
            echo $_SESSION['error']; 
            unset($_SESSION['error']);
          ?>
        </div>
        <?php endif; ?>
        <h2><?= $_SESSION['auth']->nom_client." ".$_SESSION['auth']->prenom_client; ?></h2>
        <h4><?= $_SESSION['auth']->email_client; ?></h4>
        <p>Nom d'utilisateur : <?= $_SESSION['auth']->username_client; ?></p>
        <p>Réservations effectuées : 
        <ul>
          <li><?= $nb_reservations_hotel; ?> réservation d'hôtel</li>
          <li><?= $nb_reservations_voyage; ?> réservation de voyage</li>
          <li><?= $nb_reservations_materiel; ?> réservation de materiel</li>
        </ul>
        </p>
        <a href="verify_password"><button type="button" class="btn btn-warning">Modifier</button></a>
        <a href="reservations"><button type="button" class="btn btn-info">Mes Reservations</button></a>
      </div>
      <center><a href="../Controllers/scripts/logout.php"><button type="button" class="btn btn-danger">Déconnexion</button></a></center>
    </section>
    <?php include 'include/footer.html'; ?>
  </div>
  <?php include 'include/plugins_js.html' ?>
</body>   
</html>