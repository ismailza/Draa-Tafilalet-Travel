<?php

require_once '../Controllers/PlatController.class.php';

use Controllers\PlatController;

$pc = new PlatController;
$plats = $pc->all();
?>
<!doctype html>
<html lang="fr">
<head>
	<title>Spécialité Culinaire</title>
  <?php  include 'include/fonts_css.html';	?>
  <link rel="stylesheet" href="../public/css/plus_info.css">
</head>  
<body data-spy="scroll" data-target="#main-navbar">
  <div class="body">
    <?php  include 'include/header.php';?>
    <section class="title_header" style="background-image: url(../public/img/sp-cul.jpg);">
      <div class="overlay">
        <div class="wow bounceInLeft" data-wow-delay="0.4s">
          <h1>Spécialité Culinaire</h1>
          <h3>Découvrir les plats de la région</h3>
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
                <div class="col-sm-12 content-column">
                  <div class="single-container">
                    <section>
                      <div class="description">
                        <p>
                          De par sa position géographique, Drâa Tafilalet a côtoyé au fil des siècles diverses civilisations, dont elle a hérité maintes facettes. Aux portes du Grand Sahara, la Région est dotée aussi d’une nature certes austère, mais riche en produits terroirs uniques et raffinés. Ces conditions ont donc façonné un art culinaire qui combine soigneusement couleurs et goûts, faisant ainsi de Drâa Tafilalet une contrée de gastronomie.
                        </p>
                        <p>
                          Lors de votre voyage dans la Région, vous aurez l’occasion de régaler vos papilles avec des plats succulents et authentiques, concoctés selon des recettes ancestrales.
                        </p>
                      </div>
                      <div class="card-container">
                        <?php foreach ($plats as $plat): ?>
                        <div class="card medium-card wow fadeInUp" data-wow-delay="0.3s">
                          <a href="plat?id=<?= $plat->id_plat; ?>">
                            <div class="img-box">
                              <img src="../public/img/plats/<?= $plat->image_plat1; ?>" alt="">
                            </div>
                          </a>
                          <div class="box-content">
                            <h3><?= $plat->nom_plat; ?></h3>
                          </div>
                        </div>
                        <?php endforeach; ?>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </main>
          <div class="extra-space-l"></div>
        </div>
      </main>
    </div>
    <?php include 'include/footer.html'; ?>
  </div>
  <?php include 'include/plugins_js.html' ?>    
</body> 
</html>