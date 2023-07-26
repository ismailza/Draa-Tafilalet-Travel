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
              <form class="row g-3" action="../../Controllers/scripts/add-restaurant.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Ajouter Restaurant</div>  
                <div class="col-md-6">
                  <label for="nom_rest" class="form-label">Nom Restaurant</label>
                  <input type="text" class="form-control" id="nom_rest" name="nom_rest" placeholder="Nom de restaurant" required>
                </div>  
                <div class="col-md-6">
                  <label for="ville_rest" class="form-label">Ville</label>
                  <input type="text" class="form-control" id="ville_rest" name="ville_rest" placeholder="Ville de restaurant" required>
                </div>
                <div class="col-md-6">
                  <label for="province" class="form-label">Province</label>
                  <input type="text" class="form-control" id="province" name="province" placeholder="Ville de restaurant" required>
                </div>
                <div class="col-md-6">
                  <label for="image_rest" class="form-label">Image1</label>
                  <input type="file" class="form-control" id="image_rest1" name="image_rest1" required>
                </div>
                <div class="col-md-6">
                  <label for="image_rest" class="form-label">Image2</label>
                  <input type="file" class="form-control" id="image_rest2" name="image_rest2" required>
                </div>
                <div class="col-md-6">
                  <label for="image_rest" class="form-label">Image3</label>
                  <input type="file" class="form-control" id="image_rest3" name="image_rest3" required>
                </div>
                <div class="col-md-6">
                  <label for="loc_rest" class="form-label">Localisation</label>
                  <input type="text" class="form-control" id="loc_rest" name="loc_rest" placeholder="Localisation de restaurant" required>
                </div>
                <div class="col-12">
                  <label for="carte_rest" class="form-label">Carte</label>
                  <input type="text" class="form-control" id="carte_rest" name="carte_rest" placeholder="La carte de restaurant" required>
                </div>
                <div class="col-12">
                  <label for="description_rest" class="form-label">Description</label>
                  <textarea class="editor form-control" id="description_rest" name="description_rest" rows="10" placeholder="Description de restaurant" required></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <input class="btn btn-warning me-md-2" name="submit" type="submit" value="Ajouter">
                  <a href="show_restaurants.php" class="btn btn-warning" type="button">Annuler</a>
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
<script src="vendors/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
<script src="vendors/tinymce/js/tinymce/tinymce.js" type="text/javascript"></script>
</body>
</html>