<?php 
if (!isset($_GET['id']) || empty($_GET['id']))
{
  header("location: destinations");
  exit;
}

require_once '../Controllers/DestinationController.class.php';
require_once '../Controllers/ActualiteController.class.php';
require_once '../Controllers/HotelController.class.php';
require_once '../Controllers/MoussemController.class.php';
require_once '../Controllers/RestaurantController.class.php';
use Controllers\DestinationController;
use Controllers\ActualiteController;
use Controllers\HotelController;
use Controllers\MoussemController;
use Controllers\RestaurantController;

$dc = new DestinationController;
$destination = $dc->one($_GET['id']);

$ac = new ActualiteController;
$actualites = $ac->all();

$mc = new MoussemController;
$moussems = $mc->some($destination->ville_destination);

$rc = new RestaurantController;
$restaurants = $rc->some($destination->province_destination);

$hc = new HotelController;
$hotels = $hc->some($destination->province_destination);
?>
<!doctype html>
<html lang="fr">
<head>
	<title><?= $destination->nom_destination; ?></title>
  <?php  include 'include/fonts_css.html';	?>
  <link rel="stylesheet" href="../public/css/plus_info.css">
</head>  
<body data-spy="scroll" data-target="#main-navbar">
  <div class="body">
    <?php  include 'include/header.php';?>
    <section class="title_header" style="background-image: url(../public/img/destinations/<?= $destination->image_destination1; ?>);">
      <div class="overlay">
        <div class="wow bounceInLeft" data-wow-delay="0.4s">
          <h1><?= $destination->nom_destination; ?></h1>
          <h2><?= $destination->ville_destination; ?></h2>
          <h3>Venez découvrir <?= $destination->nom_destination; ?></h3>
          <div class="extra-space-l"></div>
          <a id="scroltobottom" class="btn btn-blank page-scroll" href="#first-section" role="button"><i class="mdi mdi-arrow-down-thick"></i></a>
        </div>
      </div>
    </section>
    <div class="extra-space-l"></div>
    <div class="content-wrap">
      <main id="content" class="content-container">
        <div class="container layout-2-col layout-2-col-1 layout-right-side">
          <main id="content" class="content-container">
            <div class="container layout-2-col-1 layout-right-sidebar"> 
              <div class="row main-section">
                <div class="col-sm-8 content-column">
                  <div class="single-container">
                    <section class="wow bounceInLeft" id="first-section">
                      <div class="slider">
                        <img src="../public/img/destinations/<?= $destination->image_destination1; ?>" alt="image <?= $destination->nom_destination; ?>">
                        <img src="../public/img/destinations/<?= $destination->image_destination2; ?>" alt="image <?= $destination->nom_destination; ?>">
                        <img src="../public/img/destinations/<?= $destination->image_destination3; ?>" alt="image <?= $destination->nom_destination; ?>">
                      </div>
                      </section>
                      <section class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="description">
                          <?= $destination->description_destination; ?>
                        </div>
                        <div class="carte">
                          <?= $destination->carte_destination; ?>
                        </div>
                        <a class="mapmarker" href="<?= $destination->localisation_destination; ?>" title="localisation" target="_blank" ><i class="mdi mdi-map-marker-radius"></i></a>
                      </section>
                    </div>
                  </div>
                  <!-- asides -->
                  <div class="col-sm-4 sidebar-column-primary">
                    <div class="cards_title wow bounceInRight" data-wow-delay="0.4s">
                      <h2><span class="span-color">Actualitées</span></h2>
                    </div>
                    <div class="extra-space-l"></div>
                    <?php foreach($actualites as $actualite): ?>
                    <aside id="sidebar-primary-sidebar" class="sidebar wow fadeInUp" >
                      <div class="mini-actu-box">
                        <div>
                          <h4><?= $actualite->titre_actualite; ?></h4>
                          <h5><?= $actualite->ville_depart." , ".$actualite->ville_arrivee; ?></h5>
                          <p>Départ le <?= $actualite->date_depart; ?></p>
                          <p>Durée: <?= $actualite->duree; ?> jours</p>
                        </div>
                        <div>
                          <img class="img-circle" src="../public/img/targets/<?= $actualite->image_cover; ?>" alt="actualite image" width="120px" height="120px">
                        </div>
                      </div>
                    </aside>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </main>
            <div class="extra-space-l"></div>
            <div class="col-sm-12 post-related">
              <h4>VOUS POURRIEZ AUSSI AIMER</h4>
              <div class=" content-column">
                <!-- Begin moussems section -->
                <section>
                  <?php if (!empty($moussems)): ?>
                  <div class="cards_title wow bounceInLeft" data-wow-delay="0.4s">
                    <h2>Voir aussi <span class="span-color">les moussems</span> de <span class="span-color"><?= $destination->ville_destination; ?></span></h2>
                  </div>
                  <div class="card-container">
                    <?php foreach($moussems as $moussem): ?>
                    <div class="card wow fadeInUp" data-wow-delay="0.3s">
                      <a href="moussem?id=<?= $moussem->id_moussem; ?>">
                        <div class="img-box">
                          <img src="../public/img/moussems/<?= $moussem->image_moussem1; ?>" alt="">
                        </div>
                      </a>
                      <div class="box-content">
                        <h3><?= $moussem->nom_moussem; ?></h3>
                        <h6><?= $moussem->ville_moussem; ?></h6>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                </section>
                <!-- Begin restaurants section -->
                <section>
                  <?php if (!empty($restaurants)): ?>
                  <div class="cards_title wow bounceInLeft" data-wow-delay="0.4s">
                    <h2><span class="span-color">Restaurants</span></h2>
                  </div>  
                  <div class="card-container">
                    <?php foreach($restaurants as $restaurant): ?>
                    <div class="card wow fadeInUp" data-wow-delay="0.3s">
                      <a href="restaurant?id=<?= $restaurant->id_restaurant; ?>">
                        <div class="img-box">
                          <img src="../public/img/restaurants/<?= $restaurant->image_restaurant1; ?>" alt="">
                        </div>
                      </a>
                      <div class="box-content">
                        <h3><?= $restaurant->nom_restaurant; ?></h3>
                        <h6><?= $restaurant->ville_restaurant; ?></h6>
                        <p>
                          Localisation: <a href="<?= $restaurant->localisation_restaurant; ?>" title="localisation" target="_blank"><i class="mdi mdi-map-marker"></i></a>
                          <a class="info" href="restaurant?id=<?= $restaurant->id_restaurant; ?>" title="plus d'informations"><i class="mdi mdi-arrow-right"></i></a>
                        </p>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                </section>
                <!-- Begin hotels section -->
                <section>
                  <?php if (!empty($hotels)): ?>           
                  <div class="cards_title wow bounceInLeft" data-wow-delay="0.4s">
                    <h2><span class="span-color">Hôtels</span></h2>
                  </div>  
                  <div class="card-container">
                    <?php foreach ($hotels as $hotel): ?>
                    <div class="card wow fadeInUp" data-wow-delay="0.3s">
                      <a href="hotel?id=<?= $hotel->id_hotel; ?>">
                        <div class="img-box">
                          <img src="../public/img/hotels/<?= $hotel->image_hotel1; ?>" alt="">
                        </div>
                      </a>
                      <div class="box-content">
                        <h3><?= $hotel->nom_hotel; ?></h3>
                        <h6><?= $hotel->ville_hotel; ?></h6>
                        <h6>
                          <?php
                            for ($i = 0; $i < $hotel->classe_hotel; $i++) echo"<i class=\"mdi mdi-star\" style=\"color: orange;\"></i>";
                            for ($i = $hotel->classe_hotel; $i < 5; $i++) echo"<i class=\"mdi mdi-star\" style=\"color: grey;\"></i>";
                          ?>
                        </h6>
                        <p>
                          Localisation: <a href="<?= $hotel->localisation_hotel; ?>" title="localisation" target="_blank"><i class="mdi mdi-map-marker"></i></a>
                          <a class="info" href="hotel?id=<?= $hotel->id_hotel; ?>" title="plus d'informations"><i class="mdi mdi-arrow-right"></i></a>
                          <button type="button" class="btn btn-warning" style="float: right;"><?= $hotel->prix_hotel; ?> MAD</button>
                        </p>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                </section>
              </div>
            </div>
          </div>
        </main>
      </div>
      <!-- Begin footer -->
      <?php include 'include/footer.html'; ?>
    </div>
    <?php include 'include/plugins_js.html' ?>    
  <script>
    $('.slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
    });
  </script>
</body> 
</html>