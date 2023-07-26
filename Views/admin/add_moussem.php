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
            <form class="row g-3" action="../../Controllers/scripts/add-moussem.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Ajouter Moussem</div>  
                <div class="col-md-6">
                  <label for="nom_moussem" class="form-label">Nom Moussen</label>
                  <input type="text" class="form-control" id="nom_moussem" name="nom_moussem" placeholder="Nom de la moussem" required>
                </div>  
                <div class="col-md-6">
                  <label for="ville_moussem" class="form-label">Ville</label>
                  <input type="text" class="form-control" id="ville_moussem" name="ville_moussem" placeholder="Ville de la moussem" required>
                </div>
                <div class="col-md-6">
                  <label for="image_moussem" class="form-label">Image1</label>
                  <input type="file" class="form-control" id="image_moussem1" name="image_moussem1" required>
                </div>
                <div class="col-md-6">
                  <label for="image_moussem" class="form-label">Image2</label>
                  <input type="file" class="form-control" id="image_moussem2" name="image_moussem2" required>
                </div>
                <div class="col-md-6">
                  <label for="image_moussem" class="form-label">Image3</label>
                  <input type="file" class="form-control" id="image_moussem3" name="image_moussem3" required>
                </div>
                <div class="col-12">
                  <label for="description_moussem" class="form-label">Description</label>
                  <textarea class="editor form-control" id="description_moussem" name="description_moussem" rows="10" placeholder="Description de moussem" required></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <input class="btn btn-warning me-md-2" name="submit" type="submit" value="Ajouter">
                  <a href="show_moussem.php" class="btn btn-warning" type="button">Annuler</a>
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