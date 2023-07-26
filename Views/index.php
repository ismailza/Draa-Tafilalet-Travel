<?php

require_once '../Controllers/ActualiteController.class.php';
require_once '../Controllers/ArtisanatController.class.php';
require_once '../Controllers/CircuitVoyageController.class.php';
require_once '../Controllers/MaterielController.class.php';
require_once '../Controllers/MoussemController.class.php';
require_once '../Controllers/PlatController.class.php';

use Controllers\ActualiteController;
use Controllers\ArtisanatController;
use Controllers\CircuitVoyageController;
use Controllers\MaterielController;
use Controllers\MoussemController;
use Controllers\PlatController;

$ac = new ActualiteController;
$actualites = $ac->all();

$cvc = new CircuitVoyageController;
$circuits = $cvc->all();

$mtc = new MaterielController;
$materials = $mtc->all();

$msc = new MoussemController;
$moussems = $msc->all();

$arc = new ArtisanatController;
$artisanats = $arc->all();

$pc = new PlatController;
$plats = $pc->all();
?>
<!doctype html>
<html lang="fr">
<head>
	<title>Accueil</title>
  <?php include 'include/fonts_css.html'; ?>
</head>
<body data-spy="scroll" data-target="#main-navbar">
  <div class="page-loader"></div>
	<div class="body">
    <?php  include 'include/header.php';	?>
		<section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(../public/img/home-bg.jpg);">
			<div class="container">
			  <div class="caption text-center text-white" data-stellar-ratio="0.7">
          <div class="item  wow fadeInUp" data-wow-delay="0.3s">
					  <h1>Bienvenue à Drâa Tafilalet</h1>
						p>Découvrir le meilleur de la région et ses provinces</p>
					</div>
					<div id="owl-intro-text" class="owl-carousel wow bounceInLeft" data-wow-delay="0.4s">
            <?php foreach ($actualites as $actualite): ?>
							<div class="item actu-box">
                <div class="actu-box-item text-actu-box">
                  <h3><?= $actualite->titre_actualite; ?></h3>
                  <h4><?= $actualite->ville_depart." - ".$actualite->ville_arrivee; ?></h4>
                  <p>Départ le <?= $actualite->date_depart; ?></p>
                  <p>Durée: <?= $actualite->duree; ?> jours</p>
                  <h6>Seulement <?= $actualite->prix; ?> MAD</h6>
                  <p>Dérnier délai d'inscription : <?= $actualite->fin_reservation; ?></p>
                  <button class="btn btn-warning btn-sm" onclick="reservation_voyage_redirect(<?= $actualite->id_circuit; ?>);">Réserver</button>
                </div>
                <div class="actu-box-item img-actu-box">
                  <img class="img-circle" src="../public/img/targets/<?= $actualite->image_cover; ?>" alt="image d'annonce" >
                </div>
							</div>
              <?php endforeach; ?>
						</div>
				</div>
			</div>
		</section>
		<section id="about-section" class="page bg-style1">
        <div class="page-header-wrapper">
          <div class="container">
            <div class="page-header text-center wow fadeInUp" data-wow-delay="0.3s">
              <h2>A propos de Drâa-Tafilalet</h2>
              <div class="devider"></div>
              <p class="subtitle">Une petite histoire de la Région Drâa-Tafilalet</p>
              <div class="section-content">
                <div class="hist_txt">
                  <p>
                    Des innombrables kasbahs en pisé, des montagnes et plaines arides, des vallées et oasis verdoyants, des palmeraies et des villages de terre rouge ou ocre font le charme de cette région et lui donnent son attrait touristique, évoque à la fois les contreforts sud du Haut-Atlas et la proximité du désert.
                  </p>
                  <p>
                    La région de Draa-Tafilalet s’étend sur une superficie de 88 836 km² et représente ainsi 12,5% du territoire national. Elle est située dans le sud du Maroc, au sud du Haut Atlas et limitée dans le nord par les régions de Fès-Meknès et Béni Mellal-Khenifra, à l’est par la région de l’Oriental et l’Algérie. Quant à l’ouest, la région est bordée par la région de Marrakech-Safi et la région de Souss-Massa et par l’Algérie au Sud.
                  </p>
                  <p>
                    Le tout dans cette région est surprenant qui s'étend vers le sud, à commencer par le Sahara qui dévoile sa splendeur et sa beauté inégale, les spectacles, les caractères et contextes culturels de la région : Montagnes aux formes et couleurs rougeâtre originales, les oasis, les oueds et les immenses dunes de désert dont les plus grandes et vastes sont ceux nommés Ch'gaga.
                  </p> 
                </div>
                <div class="hist-img">
                  <img src="../public/img/region-draa-tafilalet-morocco-1024x1024.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>  
    <section>
        <div class="cards_title wow bounceInLeft" data-wow-delay="0.4s">
          <h2>Circuits</h2>
        </div>
        <div class="card-container" style="background-image: url(../public/img/road.jpg);">
          <?php 
            $i=0;
            foreach ($circuits as $circuit):
              $i++;
          ?>
          <div class="card wow fadeInUp" data-wow-delay="0.3s">
            <div class="img-box">
              <div id="cover-img<?= $i; ?>">
                <img src="../public/img/targets/<?= $circuit->image_cover; ?>" alt="">
              </div>
              <div id="carte-target<?= $i; ?>" style="display: none;">
                <?= $circuit->carte_trajet; ?>
              </div>
            </div>
            <div class="box-content">
              <div class="btn-top">
                <button class="btn btn-light btn-sm" onclick="resume(<?= $i; ?>);">Résumé</button>
                <button class="btn btn-light btn-sm" onclick="plusinfo(<?= $i; ?>);">Plus info</button>
              </div>
              <h3><?= $circuit->ville_depart." , ".$circuit->ville_arrivee; ?></h3>
              <div id="resume<?= $i; ?>" class="short-desc" style="display:none;">
                Départ le <?= $circuit->date_depart; ?><br>
                Durée : <?= $circuit->duree; ?> joours.
              </div>
              <div id="plus-info<?= $i; ?>" class="short-desc">
                <?= $circuit->trajet ?>
              </div>
              <div class="btn-bottom">
                <button class="btn btn-warning btn-sm" onclick="reservation_voyage_redirect(<?= $circuit->id_circuit; ?>);">Réserver</button>
                <button class="btn btn-warning btn-sm"><?= $circuit->prix; ?> MAD</button>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
    </section>
    <style>
        .material-box {
          margin-top: 20px;
          padding: 20px;
          display: flex;
          flex-wrap: wrap;
        }
        .item-box img {
          width: 400px;
          height: 300px;
        }
        .material-box .text-box-content {
          background-color: rgba(0, 0, 0, .3);
        }
        .material-box .text-box-content h3 {    
          color: #fff;
          font-family: 'Times New Roman', Times, serif;
          text-transform: uppercase;
          font-size: 30px;
        }
        .material-box .text-box-content p {
          text-align: justify;
          color: #fff;
          font-size: 16px;
        }
        .material-box .text-box-content h6 {
          color: lightseagreen;
          font-size: 20px;
          margin-top: 10px;margin-bottom: 60px;
        }
        .item-box {
          flex: 1 1 600px;
        }
        .item-box  h2{
          border-bottom: 2px solid lightseagreen;
        }
    </style>
    <section style=" background-color:black;">
        <div class="cards_title wow bounceInLeft" data-wow-delay="0.4s">
          <h2 align="center">Auto Sahara</h2>
        </div>
          <?php foreach ($materials as $material): ?>
        <div class="material-box">
          <div class="item-box">
            <div class="material-img wow fadeInUp" data-wow-delay="0.3s">
              <center><img src="../public/img/materials/<?= $material->image_materiel1; ?>" alt=""></center>
            </div>
          </div>
          <div class="item-box text-box">
            <div class="text-box-content wow bounceInUp" data-wow-delay="0.3s">
              <h3><?= $material->nom_materiel; ?></h3>
              <p><?= $material->description_materiel; ?></p>
              <h6>prix : <?= $material->prix_materiel ?> MAD</h6>
              <button class="btn btn-primary" onclick="reservation_materiel_redirect(<?= $material->id_materiel ?>);">Réserver</button>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
    </section>
    <section style="background-image: url(../public/img/artisanat-bg.jpg); background-attachment:fixed;">
        <div class="horizontal-box">
          <div class="item-box card-container">
            <?php foreach(array_slice($artisanats, 0, 4) as $artisanat ): ?>
            <div class="card small-card wow fadeInUp" data-wow-delay="0.3s">
              <div class="img-box">
                <img src="../public/img/artisanats/<?= $artisanat->image_artisanat; ?>" alt="">
              </div>   
              <div class="box-content">
                <h3><?= $artisanat->nom_artisanat; ?></h3>
              </div>                   
            </div>
            <?php endforeach; ?>
          </div>
          <div class="item-box text-box">
            <div class="cards_title wow bounceInRight" data-wow-delay="0.4s">
              <h2>Artisanats</h2>
            </div>
            <div class="text-box-content wow bounceInUp" data-wow-delay="0.3s">
              <p>
                Draa-Tafilalet est réputé pour ses artisans qui utilisent des techniques traditionnelles pour transformer l'artisanat en art. Pour une expérience plus concrète, vous pouvez participer à un atelier de poterie guidé par un artisan.
              </p>
            </div>
            <a href="artisanats"><button class="btn btn-light me-md-2 wow bounceInLeft" data-wow-delay="0.3s" style="float: right;">Voir plus</button></a>
          </div>
        </div>
    </section>
    <section>
        <div class="cards_title wow bounceInLeft" data-wow-delay="0.4s">
          <h2 align=right>Les moussems</h2>
        </div>
        <div class="card-container" style="background-image: url(../public/img/moussems/CvewhZoWcAQYzwy-1.jpg);">
          <?php foreach ($moussems as $moussem): ?>
          <div class="card large-card wow fadeInUp" data-wow-delay="0.3s">
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
    <section style="background-image: url(../public/img/sp-cul.jpg); background-attachment:fixed;">
        <div class="horizontal-box">
          <div class="item-box text-box">
            <div class="cards_title wow bounceInLeft" data-wow-delay="0.4s">
              <h2>Spécialité Culinaire</h2>
            </div>
            <div class="text-box-content wow bounceInUp" data-wow-delay="0.3s">
              <p>
                De par sa position géographique, Drâa Tafilalet a côtoyé au fil des siècles diverses civilisations, dont elle a hérité maintes facettes. Aux portes du Grand Sahara, la Région est dotée aussi d’une nature certes austère, mais riche en produits terroirs uniques et raffinés. Ces conditions ont donc façonné un art culinaire qui combine soigneusement couleurs et goûts, faisant ainsi de Drâa Tafilalet une contrée de gastronomie.
              </p>
              <p>
                Lors de votre voyage dans la Région, vous aurez l’occasion de régaler vos papilles avec des plats succulents et authentiques, concoctés selon des recettes ancestrales.
              </p>
            </div>
            <a href="plats"><button class="btn btn-light me-md-2 wow bounceInLeft" data-wow-delay="0.3s" style="float: right;">Voir plus</button></a>
          </div>
          <div class="item-box card-container">
            <?php foreach(array_slice($plats, 0, 4) as $plat ): ?>
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
        </div>
    </section>
    <div class="extra-space-l"></div>
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
  
    function reservation_voyage_redirect(id) {
      document.location.href= "reserver_voyage?id="+id;
    }

    function reservation_materiel_redirect(id) {
      document.location.href= "reserver_materiel?id="+id;
    }

    function resume(id) {
      document.getElementById('cover-img'+id).style.display = 'block';
      document.getElementById('carte-target'+id).style.display = 'none';
      document.getElementById('resume'+id).style.display = 'block';
      document.getElementById('plus-info'+id).style.display = 'none';
    }

    function plusinfo(id) {
      document.getElementById('cover-img'+id).style.display = 'none';
      document.getElementById('carte-target'+id).style.display = 'block';
      document.getElementById('resume'+id).style.display = 'none';
      document.getElementById('plus-info'+id).style.display = 'block';
    }
  </script>
</body> 
</html>