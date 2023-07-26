<?php require_once '../../Controllers/scripts/admin-auth.inc.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Drâa Tafilalet Travel</title>
  <?php include 'partials/style.html' ?>
</head>
<body>
  <!-- Begin navbar -->
  <?php include 'partials/_navbar.php' ?>
  <!-- End navbar -->
  <div class="container-fluid page-body-wrapper">
    <!--Begin settings panel -->
    <?php include 'partials/_settings-panel.html' ?>
    <!-- End settings panel -->
    <!-- Begin sidebar -->
    <?php include 'partials/_sidebar.html' ?> 
    <!-- End sidebar -->
    <!-- Begin main-panel -->
    <div class="main-panel">
      <!-- Begin content-wrapper -->
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-12">
            <div class="home-tab">
              <form class="row g-3" action="../../Controllers/scripts/add-hotel.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Ajouter Hôtel</div>  
                <div class="col-md-6">
                  <label for="nom_hot" class="form-label">Nom Hôtel</label>
                  <input type="text" class="form-control" id="nom_hot" name="nom_hot" placeholder="Entrer le nom d'hôtel" required>
                </div>  
                <div class="col-md-6">
                  <label for="ville_hot" class="form-label">Ville</label>
                  <input type="text" class="form-control" id="ville_hot" name="ville_hot" placeholder="Entrer la ville de l'hôtel" required>
                </div>
                <div class="col-md-6">
                  <label for="province_hot" class="form-label">Province</label>
                  <input type="text" class="form-control" id="province_hot" name="province_hot" placeholder="Entrer la province de l'hôtel" required>
                </div>
                <div class="col-md-6">
                  <label for="image_hot" class="form-label">Image1</label>
                  <input type="file" class="form-control" id="image_hot1" name="image_hot1" required>
                </div>
                <div class="col-md-6">
                  <label for="image_hot" class="form-label">Image2</label>
                  <input type="file" class="form-control" id="image_hot2" name="image_hot2" required>
                </div>
                <div class="col-md-6">
                  <label for="image_hot" class="form-label">Image3</label>
                  <input type="file" class="form-control" id="image_hot3" name="image_hot3" required>
                </div>
                <div class="col-md-6">
                  <label for="nbChambres" class="form-label">Nombre de chambres</label>
                  <input type="number" class="form-control" id="nbChambres" name="nbChambres" min="1" placeholder="Nombre de chambres de l'hôtel" required>
                </div>
                <div class="col-md-6">
                  <label for="classe_hot" class="form-label">Nombre d'étoiles</label>
                  <input type="number" class="form-control" id="classe_hot" name="classe_hot" min="0" max="5" placeholder="Nombre de chambres de l'hôtel" required>
                </div>
                <div class="col-md-6">
                  <label for="prix" class="form-label">Prix standard</label>
                  <input type="number" class="form-control" id="prix" name="prix" min="0" placeholder="Le prix standard de l'hôtel" required>
                </div>
                <div class="col-md-12">
                  <label for="loc_hot" class="form-label">Localisation</label>
                  <input type="text" class="form-control" id="loc_hot" name="loc_hot" placeholder="Localisation de l'hôtel" required>
                </div>
                <div class="col-12">
                  <label for="carte_hot" class="form-label">Carte</label>
                  <input type="text" class="form-control" id="carte_hot" name="carte_hot" placeholder="La carte de l'hôtel" required>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <input class="btn btn-warning me-md-2" name="submit" type="submit" value="Ajouter">
                  <a href="show_hotels" class="btn btn-warning" type="button">Annuler</a>
                </div>
              </form>        
            </div>
          </div>
        </div>
      </div>
      <!-- End content-wrapper -->
      <!-- Begin footer -->
      <?php include 'partials/_footer.html' ?>
      <!-- End footer -->
    </div>
    <!-- End main-panel -->
  </div>
  <!-- page-body-wrapper ends -->
<!-- plugins js -->
<?php include 'partials/plugins.html' ?>
</body>
</html>