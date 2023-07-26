<?php session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
  <title>Contact</title>
  <?php  include 'include/fonts_css.html';	?>
</head>
<body data-spy="scroll" data-target="#main-navbar">
  <div class="body">
    <?php  include 'include/header.php';	?>
  	<section id="contact-section" class="page text-white parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/map-bg.jpg);">
      <div class="cover"></div> 
        <div class="page-header-wrapper">
          <div class="container">
            <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
              <h2>Contact</h2>
              <div class="devider"></div>
              <p class="subtitle">Tout pour nous contacter</p>
            </div>
          </div>
        </div>
        <div class="contact wow bounceInRight" data-wow-delay="0.4s">
          </center><div class="container">
             <div class="row">
              </center><div class="col-sm-6">
                <div class="contact-form">
                  <h4>Écrivez-nous</h4>
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
                  <form action="../Controllers/scripts/contact.php" method="post" role="form">
                    <div class="form-group">
                      <input type="text" name="nom_red" class="form-control input-lg" placeholder="Votre Nom" required>
                    </div>
                    <div class="form-group">
                      <input type="email" name="email_red" class="form-control input-lg" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="sujet" class="form-control input-lg" placeholder="Sujet" required>
                    </div>
                    <div class="form-group">
                      <textarea name="message" class="form-control input-lg" rows="5" placeholder="Votre message" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn wow bounceInRight" data-wow-delay="0.8s">Envoyer</button>
                  </form>
                </div>
              </div> 	                                  
            </div>
          </div>
        </div>
      </section>
      <?php include 'include/footer.html'; ?>
    </div>
  <!-- Plugins JS - theme js-->
  <?php include 'include/plugins_js.html' ?>
</body> 
</html>
