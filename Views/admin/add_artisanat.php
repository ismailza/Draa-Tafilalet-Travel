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
              <form class="row g-3" action="../../Controllers/scripts/add-artisanat.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Ajouter un artisanat</div>  
                <div class="col-md-6">
                    <label for="nom_art" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom_art" name="nom_art" placeholder="Nom de la destination" required>
                </div>  
                <div class="col-md-6">
                    <label for="image_art" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image_art" name="image_art" required>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-warning me-md-2" name="submit" type="submit">Ajouter</button>
                    <a href="show_artisanats" class="btn btn-warning">Annuler</a>
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