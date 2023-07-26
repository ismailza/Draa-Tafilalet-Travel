<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
require '../Controllers/HotelController.class.php';
use Controllers\HotelController;

$hc = new HotelController;
$hotels = $hc->all();

?>
<!doctype html>
<html lang="fr">
<head>
  <title>Hôtels</title>
  <?php  include 'include/fonts_css.html';	?>
</head>
<body data-spy="scroll" data-target="#main-navbar">
  <div class="body">
    <?php  include 'include/header.php';	?>
    <section class="title_header" style="background-image: url(../public/img/hotel-bg-page.jpg);">
      <div class="overlay">
        <div class="wow bounceInLeft" data-wow-delay="0.4s">
          <h1>Hôtels</h1>
          <h3>Découvrir les meillieurs hôtels de la région Drâa Tafilalet</h3>
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
          foreach ($hotels as $hotel):
           if ($hotel->province_hotel != $province):
            $province = $hotel->province_hotel;
        ?>
        <div class="devider wow fadeInDown" data-wow-delay="0.4s"></div>
        <h2 class="wow fadeInLeft" data-wow-delay="0.4s">Province <?php echo $hotel->province_hotel; ?></h2>
        <div class="devider wow fadeInUp" data-wow-delay="0.4s"></div>
        <?php endif; ?>
        <div class="card large-card wow fadeInUp" data-wow-delay="0.3s">
          <a href="hotel?id=<?= $hotel->id_hotel; ?>">
            <div class="img-box">
              <img src="../public/img/hotels/<?= $hotel->image_hotel1; ?>" alt="image hotel">
            </div>
          </a>
          <div class="box-content">
            <h3><?= $hotel->nom_hotel; ?></h3>
            <h6><?= $hotel->ville_hotel; ?></h6>
            <h6>
              <?php
                for ($i = 0; $i < $hotel->classe_hotel; $i++) echo "<i class=\"mdi mdi-star\" style=\"color: orange;\"></i>"; 
                for ( ; $i < 5; $i++) echo "<i class=\"mdi mdi-star\" style=\"color: grey;\"></i>";
              ?>
            </h6>
            <p>
              Localisation: <a href="<?= $hotel->localisation_hotel; ?>" title="localisation" target="_blank"><i class="mdi mdi-map-marker"></i></a>
              <a class="info" href="hotel.php?id=<?= $hotel->id_hotel; ?>" title="plus d'informations"><i class="mdi mdi-arrow-right"></i></a>
              <button type="button" class="btn btn-warning" style="float: right;"><?= $hotel->prix_hotel; ?> MAD</button>
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