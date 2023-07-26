<?php 
if (!isset($_GET['id'])) {
  header("location: index");
  exit;
}

require_once '../Controllers/ActualiteController.class.php';
require_once '../Controllers/ArtisanatController.class.php';
require_once '../Controllers/MoussemController.class.php';
require_once '../Controllers/PlatController.class.php';

use Controllers\ActualiteController;
use Controllers\ArtisanatController;
use Controllers\MoussemController;
use Controllers\PlatController;

$pc = new PlatController;
$plat = $pc->one($_GET['id']);

$ac = new ActualiteController;
$actualites = $ac->all();

$msc = new MoussemController;
$moussems = $msc->all();

$arc = new ArtisanatController;
$artisanats = $arc->all();
?>
<!doctype html>
<html lang="fr">
<head>
	<title><?= $plat->nom_plat; ?></title>
  <?php  include 'include/fonts_css.html'; ?>
  <link rel="stylesheet" href="../public/css/plus_info.css">
</head>  
<body data-spy="scroll" data-target="#main-navbar">
  <div class="body">
    <?php  include 'include/header.php';?>
    <section class="title_header" style="background-image: url(../public/img/plats/<?= $plat->image_plat1; ?>);">
      <div class="overlay">
        <div class="wow bounceInLeft" data-wow-delay="0.4s">
          <h1><?= $plat->nom_plat; ?></h1>
          <h3>Venez découvrir <?= $plat->nom_plat; ?></h3>
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
                        <img src="../public/img/plats/<?= $plat->image_plat1; ?>" alt="image <?= $plat->nom_plat; ?>">
                        <img src="../public/img/plats/<?= $plat->image_plat2; ?>" alt="image <?= $plat->nom_plat; ?>">
                        <img src="../public/img/plats/<?= $plat->image_plat3; ?>" alt="image <?= $plat->nom_plat; ?>">
                      </div>
                    </section>
                    <section class="wow fadeInUp" data-wow-delay="0.3s">
                      <div class="description">
                        <?= $plat->description_plat; ?>
                      </div>
                    </section>
                  </div>
                </div>
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
                        <img class="img-circle" src="../public/img/targets/<?= $actualite->image_cover; ?>" alt="" width="120px" height="120px">
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
              <section>
                <div class="cards_title wow bounceInLeft" data-wow-delay="0.4s">
                  <h2><span class="span-color">les moussems</span></h2>
                </div>
                <div class="card-container">
                  <?php foreach ($moussems as $moussem): ?>
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
              </section>
              <section>
                <div class="cards_title wow bounceInLeft" data-wow-delay="0.4s">
                  <h2><span class="span-color">Artisanat</span></h2>
                </div>         
                <div class="card-container">
                  <?php foreach($artisanats as $artisanat): ?>
                  <div class="card wow fadeInUp" data-wow-delay="0.3s">
                    <div class="img-box">
                      <img src="../public/img/artisanats/<?= $artisanat->image_artisanat; ?>" alt="">
                    </div>
                    <div class="box-content">
                      <h3><?= $artisanat->nom_artisanat; ?></h3>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
              </section>
            </div>
          </div>
        </div>
      </main>
    </div>
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