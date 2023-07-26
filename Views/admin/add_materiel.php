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
              <form class="row g-3" action="../../Controllers/scripts/add-materiel.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Ajouter Materiel</div>  
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                </div>  
                <div class="col-md-6">
                    <label for="image1" class="form-label">Image1</label>
                    <input type="file" class="form-control" id="image1" name="image1" required>
                </div>
                <div class="col-md-6">
                    <label for="image2" class="form-label">Image2</label>
                    <input type="file" class="form-control" id="image2" name="image2" required>
                </div>
                <div class="col-md-6">
                    <label for="image3" class="form-label">Image3</label>
                    <input type="file" class="form-control" id="image3" name="image3" required>
                </div>
                <div class="col-md-6">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="text" class="form-control" id="prix" name="prix" required>
                </div>
                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="10" required>Description</textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-warning me-md-2" name="submit" type="submit">Ajouter</button>
                    <a href="show_materiels.php" class="btn btn-warning">Annuler</a>
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