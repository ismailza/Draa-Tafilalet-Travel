<?php

require_once '../Controllers/ArtisanatController.class.php';
use Controllers\ArtisanatController;

$arc = new ArtisanatController;
$artisanats = $arc->all();
?>
<!doctype html>
<html lang="fr">
<head>
  <title>Artisanat</title>
  <?php include 'include/fonts_css.html';  ?>
  <link rel="stylesheet" href="css/plus_info.css">
</head>
<body data-spy="scroll" data-target="#main-navbar">
  <div class="body">
    <?php include 'include/header.php'; ?>
    <section class="title_header" style="background-image: url(../public/img/artisanat-bg.jpg);">
      <div class="overlay">
        <div class="wow bounceInLeft" data-wow-delay="0.4s">
          <h1>Artisanat</h1>
          <h3>Découvrir l'artisanat de la région</h3>
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
                      <div class="card-container">
                        <?php foreach ($artisanats as $artisanat) : ?>
                          <div class="card wow fadeInUp" data-wow-delay="0.3s">
                            <div class="img-box">
                              <img src="../public/img/artisanats/<?php echo $artisanat->image_artisanat; ?>" alt="">
                            </div>
                            <div class="box-content">
                              <h3><?php echo $artisanat->nom_artisanat; ?></h3>
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