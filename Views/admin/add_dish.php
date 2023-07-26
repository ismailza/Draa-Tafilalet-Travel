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
              <form class="row g-3" action="../../Controllers/scripts/add-dish.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Ajouter un Plat</div>  
                <div class="col-md-6">
                  <label for="nom_plat" class="form-label">Nom Plat</label>
                  <input type="text" class="form-control" id="nom_plat" name="nom_plat" placeholder="Nom de la plat" required>
                </div>  
                <div class="col-md-6">
                  <label for="image_plat" class="form-label">Image1</label>
                  <input type="file" class="form-control" id="image_plat1" name="image_plat1" required>
                </div>
                <div class="col-md-6">
                  <label for="image_plat" class="form-label">Image2</label>
                  <input type="file" class="form-control" id="image_plat2" name="image_plat2" required>
                </div>
                <div class="col-md-6">
                  <label for="image_plat" class="form-label">Image3</label>
                  <input type="file" class="form-control" id="image_plat3" name="image_plat3" required>
                </div>
                <div class="col-12">
                  <label for="description_plat" class="form-label">Description</label>
                  <textarea class="editor form-control" id="description_plat" name="description_plat" rows="10" placeholder="Description de plat" required></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <input class="btn btn-warning me-md-2" name="submit" type="submit" value="Ajouter">
                  <a href="show_dishs" class="btn btn-warning" type="button">Annuler</a>
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