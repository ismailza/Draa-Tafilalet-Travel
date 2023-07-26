<?php

require_once '../Controllers/scripts/auth.inc.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: index");
  exit;
} 

require_once '../Controllers/MaterielController.class.php';

use Controllers\MaterielController;

$mc = new MaterielController;
$materiel = $mc->one($_GET['id']);

?>
  <!doctype html>
  <html lang="fr">
  <head>
    <title>Hôtels</title>
    <?php  include 'include/fonts_css.html';	?>
    <link rel="stylesheet" href="../public/css/plus_info.css">
    <link rel="stylesheet" href="../public/css/reservation.css">
  </head>
  <body data-spy="scroll" data-target="#main-navbar">
    <div class="body">
      <?php  include 'include/header.php';	?>
      <div class="extra-space-l"></div>
      <div class="extra-space-l"></div>
      <div class="extra-space-l"></div>
      <div class="cards_title wow bounceInLeft" data-wow-delay="0.4s">
        <h2 style="color: blue;"><?= $materiel->nom_materiel; ?></h2>
      </div>
      <div class="content-wrap">
        <main id="content" class="content-container">
          <div class="container layout-2-col layout-2-col-1 layout-right-side">
            <main id="content" class="content-container">
              <div class="container layout-2-col-1 layout-right-sidebar"> 
                <div class="row main-section">
                  <!-- Begin asides -->
                  <div class="col-sm-4 sidebar-column-primary">
                    <div class="extra-space-l"></div>
                      <aside id="sidebar-primary-sidebar" class="wow fadeInUp" >
                        <div>
                          <div>
                            <img class="img-circle wow fadeInLeft" src="../public/img/materials/<?= $materiel->image_materiel1; ?>" alt="" width="120px" height="120px">
                            <div class="extra-space-l"></div>
                          </div>
                          <div class="wow fadeInRight">
                            <h4><?= $materiel->nom_materiel; ?></h4>
                            <p>Prix : <?= $materiel->prix_materiel; ?> MAD</p>
                          </div>
                        </div>
                      </aside>  
                      <div class="extra-space-l"></div>                            
                    </div>
                    <!-- End aside -->  
                    <div class="col-sm-8 content-column">
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
                      <div class="single-container">
                        <section class="container_res wow fadeInUp" data-wow-delay="0.3s">
                          <form action="../Controllers/scripts/reserver_materiel.php" method="POST" onsubmit="return verify_submission()">
                            <h4>Info personnels</h4>
                            <div class="row">
                              <div class="input-group input-group-icon">
                                <input type="text" value="<?= $_SESSION['auth']->nom_client; ?>" placeholder="Votre Nom" disabled/>
                                <div class="input-icon"><i class="mdi mdi-account"></i></div>
                              </div>
                              <div class="input-group input-group-icon">
                                <input type="text" value="<?= $_SESSION['auth']->prenom_client; ?>" placeholder="Votre Prénom" disabled/>
                                <div class="input-icon"><i class="mdi mdi-account"></i></div>
                              </div>
                              <div class="input-group input-group-icon">
                                <input type="email" value="<?= $_SESSION['auth']->email_client; ?>" placeholder="Votre email" disabled/>
                                <div class="input-icon"><i class="mdi mdi-gmail"></i></div>
                              </div>
                              <div class="input-group input-group-icon">
                                <input type="tel" name="tel" placeholder="Votre numéro du téléphone" required/>
                                <div class="input-icon"><i class="mdi mdi-phone"></i></div>
                              </div>
                            </div>
                            <h4>Nombre de personnes</h4>
                            <div class="row">
                              <div class="input-group">
                                <input type="number" name="nb_personnes" id="nbre_personnes" min="1" max="6" value="1" onchange="calculPrix();" placeholder="nombre de personnes" required>
                              </div>  
                            </div>
                            <h4>Durée</h4>
                            <div class="row">  
                              <div class="input-group">
                                <h6>Date début de location</h6>
                                <input type="date" id="dateD" name="date_debut" onchange="calculPrix();" required>
                              </div>  
                              <div class="input-group">
                                <h6>Date fin de location</h6>
                                <input type="date" id="dateF" name="date_fin" onchange="calculPrix();" required>
                              </div>  
                            </div>
                            <h4>Prix Total</h4>
                            <script>
                              var today = new Date();
                                var dd = today.getDate();
                                var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
                                var yyyy = today.getFullYear();
                                if(dd < 10) dd = '0' + dd;
                                if(mm < 10) mm = '0' + mm;
                                today = yyyy+'-'+mm+'-'+dd;
                                document.getElementById("dateD").setAttribute("min", today);
                                document.getElementById("dateF").setAttribute("min", today);
                                
                                function calculPrix() {
                                  nbre_personnes = document.getElementById('nbre_personnes').value;
                                  prixm = document.getElementById('prix').value;
                                  function GetDays(){
                                    var dateD = new Date(document.getElementById('dateD').value);
                                    var dateF = new Date(document.getElementById('dateF').value);
                                    if (dateF > dateD) return parseInt((dateF - dateD) / (24 * 3600 * 1000));
                                    return 0;
                                  }

                                  if (GetDays() != 0){

                                    prix = prixm * nbre_personnes * GetDays();
                                    document.getElementById('affichePrix').value = prix+" MAD";
                                    document.getElementById('prixtot').value = prix;
                                    return prix;
                                  }
                                  document.getElementById('affichePrix').value = "Vérifier la date que vous avez entrée!";
                                  return 0;
                                }
                            </script>
                            <div class="row">  
                              <div class="input-group">
                                <input type="text" id="prix" value="<?= $materiel->prix_materiel; ?>" hidden>
                                <input type="text" id="affichePrix" placeholder="Prix total" value="<?= $materiel->prix_materiel; ?>" style="text-align:center;font-weight:bold;font-size:18px;" disabled>
                                <input type="text" id="prixtot" name="prix" value="<?= $materiel->prix_materiel; ?>" hidden>
                              </div>  
                            </div>
                            <h4>Paiement</h4>
                            <div class="row">  
                              <div class="input-group">
                                <input type="button" id="cach_btn" value="Paiement à l'agence" onclick="cachPaye();">
                              </div>  
                              <div class="input-group">
                                <input type="button" id="onligne_btn" value="Paiement par carte" onclick="onlignePaye();">
                              </div>  
                            </div>
                            <div id="cachBox">
                              <h5 align=center>Vous pouvez payer espèces à l'agence</h5>
                            </div>
                            <div id="onligneBox">
                              <div class="card_logo">
                                <img src="../public/img/credit-card-visa-logo.png" alt="visa" />
                                <img src="../public/img/mastercard-logo-credit-card.png" alt="mastercard" />
                                <img src="../public/img/maestro.png" alt="maestro" />
                              </div>
                              <div class="row">
                                <div class="input-group input-group-icon">
                                  <input type="text" name="num_carte" id="num_carte" size="14" placeholder="Numéro de la carte">
                                  <div class="input-icon"><i class="mdi mdi-credit-card"></i></div>
                                </div>
                                <div class="col-half">
                                  <div class="input-group input-group-icon">
                                    <input type="text" name="cvc" id="cvc" size="3" placeholder="CVC">
                                    <div class="input-icon"><i class="mdi mdi-account"></i></div>
                                  </div>
                                </div>
                                <div class="col-half">
                                  <h6>Expiration</h6>
                                  <div class="input-group">
                                    <input class="inputCard" type="text" name="expiration" id="expiration" placeholder="dd/yy">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <input type="text" name="id_client" value="<?= $_SESSION['auth']->id_client; ?>" hidden>
                              <input type="text" name="id_materiel" value="<?= $_GET['id']; ?>" hidden>
                              <input type="text" id="type_paiement" name="type_paiement" value="Espèces" hidden>
                              <div class="input-group">
                                <input type="submit" name="submit" value="Réserver">
                              </div>
                              <div class="input-group">
                                <a href="index"><input type="button" value="Annuler"></a> 
                              </div>
                            </div>
                          </form>
                        </section>
                      </div>
                    </div>
                  </div>
                </div>
              </main>
            </div>
          </main>
        </div>
      <?php include 'include/footer.html'; ?>
    </div>
    <!-- Plugins JS - theme js-->
    <?php include 'include/plugins_js.html' ?>
  <script>
    cach_btn = document.getElementById('cach_btn');
    onligne_btn = document.getElementById('onligne_btn');
    cachBox = document.getElementById('cachBox');
    onligneBox = document.getElementById('onligneBox');
    onligneBox.style.display = 'none'; 
    document.getElementById(type_paiement).value = "Espèces";
    function cachPaye(){
      cachBox.style.display = 'block';
      onligneBox.style.display = 'none';
      document.getElementById('type_paiement').value = "Espèces";
    }
    function onlignePaye(){
      cachBox.style.display = 'none';
      onligneBox.style.display = 'block';
      document.getElementById('type_paiement').value = "Par carte";
    }

    function verify_submission () {
      if (!calculPrix()) return false;
      if (document.getElementById('type_paiement').value == "Par carte")
      {
        if ((document.getElementById('num_carte').value == "") ||
            (document.getElementById('cvc').value == "") ||
            (document.getElementById('expiration').value == "")) 
          return false;
      }
      return true;
    }
  </script>
  </body>   
  </html>