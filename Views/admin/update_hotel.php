<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: show_hotels");
  exit;
}
require_once '../../Controllers/scripts/admin-auth.inc.php';
require_once '../../Controllers/HotelController.class.php';

use Controllers\HotelController;

$ac = new HotelController;
$hotel = $ac->one($_GET['id']);
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
              <form class="row g-3" action="../../Controllers/scripts/update-hotel.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Modifier Hôtel</div>
                <div class="col-md-6">
                  <label for="nom_hot" class="form-label">Nom hotel</label>
                  <input type="text" class="form-control" id="nom_hot" name="nom_hot" value="<?= $hotel->nom_hotel; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="ville_hot" class="form-label">Ville</label>
                  <input type="text" class="form-control" id="ville_hot" name="ville_hot" value="<?= $hotel->ville_hotel; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="province_hot" class="form-label">Province</label>
                  <input type="text" class="form-control" id="province_hot" name="province_hot" value="<?= $hotel->province_hotel; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="image_hot" class="form-label">Image1</label>
                  <input type="file" class="form-control" id="image_hot1" name="image_hot1" value="<?= $hotel->image_hotel1; ?>">
                </div>
                <div class="col-md-6">
                  <label for="image_hot" class="form-label">Image2</label>
                  <input type="file" class="form-control" id="image_hot2" name="image_hot2" value="<?= $hotel->image_hotel2; ?>">
                </div>
                <div class="col-md-6">
                  <label for="image_hot" class="form-label">Image3</label>
                  <input type="file" class="form-control" id="image_hot3" name="image_hot3" value="<?= $hotel->image_hotel3; ?>">
                </div>
                <div class="col-md-6">
                  <label for="nbChambres" class="form-label">Nombre de chambres</label>
                  <input type="number" class="form-control" id="nbChambres" name="nbChambres" min="1" value="<?= $hotel->nb_chambre; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="classe_hot" class="form-label">Nombre d'étoiles</label>
                  <input type="number" class="form-control" id="classe_hot" name="classe_hot" min="0" max="5" value="<?= $hotel->classe_hotel; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="prix" class="form-label">Prix standard</label>
                  <input type="number" class="form-control" id="prix" name="prix" min="0" value="<?= $hotel->prix_hotel; ?>" required>
                </div>
                <div class="col-md-12">
                  <label for="loc_hot" class="form-label">Localisation</label>
                  <input type="text" class="form-control" id="loc_hot" name="loc_hot" value="<?= $hotel->localisation_hotel; ?>" required>
                </div>
                <div class="col-12">
                  <label for="carte_hot" class="form-label">Carte</label>
                  <textarea class="form-control" id="carte_hot" name="carte_hot" rows="10" required><?= $hotel->carte_hotel; ?></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <input type="text" name="id" value="<?= $hotel->id_hotel; ?>" hidden>
                  <button class="btn btn-warning me-md-2" name="update" type="submit">Modifier</button>
                  <a href="show_hotels.php"><button class="btn btn-warning">Annuler</button></a>
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