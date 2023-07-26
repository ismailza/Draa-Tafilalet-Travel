<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: show_materiels");
  exit;
}
require_once '../../Controllers/scripts/admin-auth.inc.php';
require_once '../../Controllers/MaterielController.class.php';

use Controllers\MaterielController;

$ac = new MaterielController;
$materiel = $ac->one($_GET['id']);
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
              <form class="row g-3" action="../../Controllers/scripts/update-materiel.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Modifier materiel</div>
                <div class="col-md-6">
                  <label for="nom" class="form-label">Nom materiel</label>
                  <input type="text" class="form-control" id="nom" name="nom" value="<?= $materiel->nom_materiel; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="image1" class="form-label">Image1</label>
                  <input type="file" class="form-control" id="image1" name="image1" value="<?= $materiel->image_materiel1; ?>">
                </div>
                <div class="col-md-6">
                  <label for="image2" class="form-label">Image2</label>
                  <input type="file" class="form-control" id="image2" name="image2" value="<?= $materiel->image_materiel2; ?>">
                </div>
                <div class="col-md-6">
                  <label for="image3" class="form-label">Image3</label>
                  <input type="file" class="form-control" id="image3" name="image3" value="<?= $materiel->image_materiel3; ?>">
                </div>
                <div class="col-md-6">
                  <label for="prix" class="form-label">Prix</label>
                  <input type="number" class="form-control" id="prix" name="prix" value="<?= $materiel->prix_materiel; ?>" required>
                </div>
                <div class="col-12">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="10" required><?= $materiel->description_materiel; ?></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <input type="text" name="id" value="<?= $materiel->id_materiel; ?>" hidden>
                  <button class="btn btn-warning me-md-2" name="update" type="submit">Modifier</button>
                  <a href="show_materiels.php"><button class="btn btn-warning">Annuler</button></a>
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