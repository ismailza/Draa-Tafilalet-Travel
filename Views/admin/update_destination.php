<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: show_destinations");
  exit;
}
require_once '../../Controllers/scripts/admin-auth.inc.php';
require_once '../../Controllers/DestinationController.class.php';

use Controllers\DestinationController;

$ac = new DestinationController;
$destination = $ac->one($_GET['id']);
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
              <form class="row g-3" action="../../Controllers/scripts/update-destination.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Modifier Destination</div>
                <div class="col-md-6">
                  <label for="nom_dest" class="form-label">Nom Destination</label>
                  <input type="text" class="form-control" id="nom_dest" name="nom_dest" value="<?= $destination->nom_destination; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="ville_dest" class="form-label">Ville</label>
                  <input type="text" class="form-control" id="ville_dest" name="ville_dest" value="<?= $destination->ville_destination; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="province" class="form-label">Province</label>
                  <input type="text" class="form-control" id="province" name="province" value="<?= $destination->province_destination; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="image_dest" class="form-label">Image1</label>
                  <input type="file" class="form-control" id="image_dest1" name="image_dest1" value="<?= $destination->image_destination1; ?>">
                </div>
                <div class="col-md-6">
                  <label for="image_dest" class="form-label">Image2</label>
                  <input type="file" class="form-control" id="image_dest2" name="image_dest2" value="<?= $destination->image_destination2; ?>">
                </div>
                <div class="col-md-6">
                  <label for="image_dest" class="form-label">Image3</label>
                  <input type="file" class="form-control" id="image_dest3" name="image_dest3" value="<?= $destination->image_destination3; ?>">
                </div>
                <div class="col-md-12">
                  <label for="loc_dest" class="form-label">Localisation</label>
                  <input type="text" class="form-control" id="loc_dest" name="loc_dest" value="<?= $destination->localisation_destination; ?>" required>
                </div>
                <div class="col-12">
                  <label for="carte_dest" class="form-label">Carte</label>
                  <textarea class="form-control" id="carte_dest" name="carte_dest" rows="10" required><?= $destination->carte_destination; ?></textarea>
                </div>
                <div class="col-12">
                  <label for="description_dest" class="form-label">Description</label>
                  <textarea class="form-control" id="description_dest" name="description_dest" rows="10" required><?= $destination->description_destination; ?></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <input type="text" name="id" value="<?= $destination->id_destination; ?>" hidden>
                  <button class="btn btn-warning me-md-2" name="update" type="submit">Modifier</button>
                  <a href="show_dest.php"><button class="btn btn-warning">Annuler</button></a>
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