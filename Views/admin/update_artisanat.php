<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: show_artisanats");
  exit;
}
require_once '../../Controllers/scripts/admin-auth.inc.php';
require_once '../../Controllers/ArtisanatController.class.php';

use Controllers\ArtisanatController;

$ac = new ArtisanatController;
$artisanat = $ac->one($_GET['id']);
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
              <?php require_once 'alerts.php'; ?>
              <form class="row g-3" action="../../Controllers/scripts/update-artisanat.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Modifier Artisanat</div>
                <div class="col-md-6">
                  <label for="nom_artisanat" class="form-label">Nom</label>
                  <input type="text" class="form-control" id="nom_artisanat" name="nom_artisanat" value="<?= $artisanat->nom_artisanat; ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="image_artisanat" class="form-label">Image</label>
                  <input type="file" class="form-control" id="image_artisanat" name="image_artisanat" value="<?= $artisanat->image_artisanat; ?>">
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <input type="text" name="id" value="<?= $artisanat->id_artisanat; ?>" hidden>
                  <button class="btn btn-warning me-md-2" name="update" type="submit">Modifier</button>
                  <a href="show_dish.php"><button class="btn btn-warning">Annuler</button></a>
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