<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: show_restaurants");
  exit;
}
require_once '../../Controllers/scripts/admin-auth.inc.php';
require_once '../../Controllers/RestaurantController.class.php';

use Controllers\RestaurantController;

$ac = new RestaurantController;
$restaurant = $ac->one($_GET['id']);
?>
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
              <form class="row g-3" action="../../Controllers/scripts/update-restaurant.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Modifier Restaurant</div>
                <div class="col-md-6">
                  <label for="nom_rest" class="form-label">Nom Restaurant</label>
                  <input type="text" class="form-control" id="nom_rest" name="nom_rest" value="<?= $restaurant->nom_restaurant; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="ville_rest" class="form-label">Ville</label>
                  <input type="text" class="form-control" id="ville_rest" name="ville_rest" value="<?= $restaurant->ville_restaurant; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="province" class="form-label">Province</label>
                  <input type="text" class="form-control" id="province" name="province" value="<?= $restaurant->province_restaurant; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="image_rest" class="form-label">Image1</label>
                  <input type="file" class="form-control" id="image_rest1" name="image_rest1" value="<?= $restaurant->image_restaurant1; ?>">
                </div>
                <div class="col-md-6">
                  <label for="image_rest" class="form-label">Image2</label>
                  <input type="file" class="form-control" id="image_rest2" name="image_rest2" value="<?= $restaurant->image_restaurant2; ?>">
                </div>
                <div class="col-md-6">
                  <label for="image_rest" class="form-label">Image3</label>
                  <input type="file" class="form-control" id="image_rest3" name="image_rest3" value="<?= $restaurant->image_restaurant3; ?>">
                </div>
                <div class="col-md-6">
                  <label for="loc_rest" class="form-label">Localisation</label>
                  <input type="text" class="form-control" id="loc_rest" name="loc_rest" value="<?= $restaurant->localisation_restaurant; ?>" required>
                </div>
                <div class="col-12">
                  <label for="carte_rest" class="form-label">Carte</label>
                  <textarea class="form-control" id="carte_rest" name="carte_rest" rows="10" required><?= $restaurant->carte_restaurant; ?></textarea>
                </div>
                <div class="col-12">
                  <label for="description_rest" class="form-label">Description</label>
                  <textarea class="editor form-control" id="description_rest" name="description_rest" rows="10" required><?= $restaurant->description_restaurant; ?></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <input type="text" name="id" value="<?= $restaurant->id_restaurant; ?>" hidden>
                  <button class="btn btn-warning me-md-2" name="update" type="submit">Modifier</button>
                  <a href="show_restaurants.php"><button class="btn btn-warning">Annuler</button></a>
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