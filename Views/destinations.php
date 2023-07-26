<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
require '../Controllers/DestinationController.class.php';
use Controllers\DestinationController;

$dc = new DestinationController;
$destinations = $dc->all();

?>
<!doctype html>
<html lang="fr">
<head>
  <title>Destinations</title>
  <?php  include 'include/fonts_css.html';	?>
</head>
<body data-spy="scroll" data-target="#main-navbar">
  <div class="body">
    <?php  include 'include/header.php';	?>
    <section class="title_header" style="background-image: url(../public/img/destination-bg-page.jpg);">
      <div class="overlay">
        <div class="wow bounceInLeft" data-wow-delay="0.4s">
          <h1>Destinations</h1>
          <h3>Découvrir les meillieurs destinations de la région Drâa Tafilalet</h3>
          <div class="extra-space-l"></div>
          <a id="scroltobottom" class="btn btn-blank page-scroll" href="#first-section" role="button"><i class="mdi mdi-arrow-down-thick"></i></a>
        </div>
      </div>
    </section>
    <div class="extra-space-l"></div>
    <section id="first-section">       
      <div class="card-container" style="background-image: url();">
        <?php 
          $province = "";
          foreach ($destinations as $destination):
           if ($destination->province_destination != $province):
            $province = $destination->province_destination;
        ?>
        <div class="devider wow fadeInDown" data-wow-delay="0.4s"></div>
        <h2 class="wow fadeInLeft" data-wow-delay="0.4s">Province <?php echo $destination->province_destination; ?></h2>
        <div class="devider wow fadeInUp" data-wow-delay="0.4s"></div>
        <?php endif; ?>
        <div class="card large-card wow fadeInUp" data-wow-delay="0.3s">
          <a href="destination?id=<?= $destination->id_destination; ?>">
            <div class="img-box">
              <img src="../public/img/destinations/<?= $destination->image_destination1; ?>" alt="image destination">
            </div>
          </a>
          <div class="box-content">
            <h3><?= $destination->nom_destination; ?></h3>
            <h6><?= $destination->ville_destination; ?></h6>
            <p>
              Localisation: <a href="<?= $destination->localisation_destination; ?>" title="localisation" target="_blank"><i class="mdi mdi-map-marker"></i></a>
              <a class="info" href="destination.php?id=<?= $destination->id_destination; ?>" title="plus d'informations"><i class="mdi mdi-arrow-right"></i></a>
            </p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>
    <?php include 'include/footer.html'; ?>
  </div>
  <?php include 'include/plugins_js.html' ?>
</body> 
</html>