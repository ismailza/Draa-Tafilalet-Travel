<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
require '../Controllers/RestaurantController.class.php';
use Controllers\RestaurantController;

$rc = new RestaurantController;
$restaurants = $rc->all();

?>
<!doctype html>
<html lang="fr">
<head>
  <title>Restaurants</title>
  <?php  include 'include/fonts_css.html';	?>
</head>
<body data-spy="scroll" data-target="#main-navbar">
  <div class="body">
    <?php  include 'include/header.php';	?>
    <section class="title_header" style="background-image: url(../public/img/restaurant-bg-page.jpg);">
      <div class="overlay">
        <div class="wow bounceInLeft" data-wow-delay="0.4s">
          <h1>Restaurants</h1>
          <h3>Découvrir les meillieurs restaurants de la région Drâa Tafilalet</h3>
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
          foreach ($restaurants as $restaurant):
           if ($restaurant->province_restaurant != $province):
            $province = $restaurant->province_restaurant;
        ?>
        <div class="devider wow fadeInDown" data-wow-delay="0.4s"></div>
        <h2 class="wow fadeInLeft" data-wow-delay="0.4s">Province <?php echo $restaurant->province_restaurant; ?></h2>
        <div class="devider wow fadeInUp" data-wow-delay="0.4s"></div>
        <?php endif; ?>
        <div class="card large-card wow fadeInUp" data-wow-delay="0.3s">
          <a href="restaurant?id=<?= $restaurant->id_restaurant; ?>">
            <div class="img-box">
              <img src="../public/img/restaurants/<?= $restaurant->image_restaurant1; ?>" alt="image restaurant">
            </div>
          </a>
          <div class="box-content">
            <h3><?= $restaurant->nom_restaurant; ?></h3>
            <h6><?= $restaurant->ville_restaurant; ?></h6>
            <p>
              Localisation: <a href="<?= $restaurant->localisation_restaurant; ?>" title="localisation" target="_blank"><i class="mdi mdi-map-marker"></i></a>
              <a class="info" href="restaurant.php?id=<?= $restaurant->id_restaurant; ?>" title="plus d'informations"><i class="mdi mdi-arrow-right"></i></a>
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