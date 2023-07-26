<?php

require_once '../Controllers/scripts/auth.inc.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: hotels");
  exit;
} 

require_once '../Controllers/HotelController.class.php';
require_once '../Controllers/ChambreController.class.php';

use Controllers\ChambreController;
use Controllers\HotelController;

$hc = new HotelController;
$hotel = $hc->one($_GET['id']);

$cc = new ChambreController;
$chambres = $cc->some($hotel->id_hotel);
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
        <h2 style="color: blue;"><?= $hotel->nom_hotel; ?></h2>
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
                            <img class="img-circle wow fadeInLeft" src="../public/img/hotels/<?= $hotel->image_hotel1; ?>" alt="" width="120px" height="120px">
                            <div class="extra-space-l"></div>
                          </div>
                          <div class="wow fadeInRight">
                            <h4><?= $hotel->nom_hotel; ?></h4>
                            <h5><?= $hotel->ville_hotel; ?></h5>
                            <h6>
                              <?php 
                              for ($i = 0; $i < $hotel->classe_hotel; $i++) echo"<i class=\"mdi mdi-star\" style=\"color: orange;\"></i>"; 
                                for ( ; $i < 5; $i++) echo"<i class=\"mdi mdi-star\" style=\"color: grey;\"></i>"; 
                              ?>
                            </h6>
                            <p>Nombre de chambres: <?= $hotel->nb_chambre; ?> chambres</p>
                          </div>
                        </div>
                      </aside>  
                      <div class="extra-space-l"></div>                            
                    </div>
                    <!-- End aside -->      
                    <div class="col-sm-8 content-column">
                      <div class="single-container">
                        <section class="container_res wow fadeInUp" data-wow-delay="0.3s">
                          <?php if (isset($_SESSION['error'])): ?>
                          <div class="alert alert-danger" role="alert">
                            <?php 
                              echo $_SESSION['error']; 
                              unset($_SESSION['error']);
                            ?>
                          </div>
                          <?php endif; ?>
                          <form action="../Controllers/scripts/reserver_hotel.php" method="POST" onsubmit="return verify_submission()">
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
                            <h4>Chambre</h4>
                            <div class="row">
                              <div class="input-group">
                                <h6>Chambres</h6>
                                <select name="chambre" id="chambre" onchange="calculPrix();">
                                  <script>
                                    var type_chambre = [];
                                  </script>
                                  <?php foreach ($chambres as $chambre): ?>
                                  <option value="<?= $chambre->num_chambre; ?>"><?= $chambre->num_chambre; ?> - <?= $chambre->type_chambre; ?></option>
                                  <script>
                                    type_chambre[<?= $chambre->num_chambre; ?>] = <?= $chambre->prix_chambre; ?>;
                                  </script>
                                  <?php endforeach; ?>
                                </select>
                              </div> 
                              <div class="input-group">
                                <h6>Nombre de personnes</h6>
                                <input type="number" name="nb_personnes" id="nbre_personnes" min="1" max="6" value="1" onchange="calculPrix();" placeholder="nombre de personnes" required>
                              </div> 
                            </div>
                            <h4>Durée</h4>
                            <div class="row">  
                              <div class="input-group">
                                <h6>Date début</h6>
                                <input type="date" id="dateD" name="date_debut" onchange="calculPrix();" required>
                              </div>  
                              <div class="input-group">
                                <h6>Date fin</h6>
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
                                  id = document.getElementById('chambre').value;
                                  nbre_personnes = document.getElementById('nbre_personnes').value;

                                  function GetDays(){
                                    var dateD = new Date(document.getElementById('dateD').value);
                                    var dateF = new Date(document.getElementById('dateF').value);
                                    if (dateF > dateD) return parseInt((dateF - dateD) / (24 * 3600 * 1000));
                                    return 0;
                                  }

                                  if(GetDays() != 0){

                                    prix = type_chambre[id]*nbre_personnes*GetDays();
                                    document.getElementById('prix').value = prix+" MAD";
                                    document.getElementById('prixtot').value = prix;
                                    return prix;
                                  }
                                  document.getElementById('prix').value = "Vérifier la date que vous avez entrée!";
                                  return 0;
                                }
                            </script>
                            <div class="row">  
                              <div class="input-group">
                                <input type="text" id="prix" placeholder="Prix total" style="text-align:center;font-weight:bold;font-size:18px;" disabled>
                                <input type="text" id="prixtot" name="prix" hidden>
                              </div>  
                            </div>
                            <h4>Paiement</h4>
                            <div class="row">  
                              <div class="input-group">
                                <input type="button" id="cach_btn" value="Paiement à l'Hôtel" onclick="cachPaye();">
                              </div>  
                              <div class="input-group">
                                <input type="button" id="onligne_btn" value="Paiement par carte" onclick="onlignePaye();">
                              </div>  
                            </div>
                            <div id="cachBox">
                              <h5 align=center>Vous pouvez payer espèces à l'hôtel</h5>
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
                              <input type="text" name="id_hotel" value="<?= $_GET['id']; ?>" hidden>
                              <input type="text" id="type_paiement" name="type_paiement" value="Espèces" hidden>
                              <div class="input-group">
                                <input type="submit" name="submit" value="Réserver">
                              </div>
                              <div class="input-group">
                                <a href="hotel.php?id=<?= $_GET['id']; ?>"><input type="button" value="Annuler"></a> 
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