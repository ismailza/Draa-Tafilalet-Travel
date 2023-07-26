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
              <form class="row g-3" action="../../Controllers/scripts/add-destination.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Ajouter Destination</div>
                <div class="col-md-6">
                  <label for="nom_dest" class="form-label">Nom Destination</label>
                  <input type="text" class="form-control" id="nom_dest" name="nom_dest" placeholder="Nom de la destination" required>
                </div>
                <div class="col-md-6">
                  <label for="ville_dest" class="form-label">Ville</label>
                  <input type="text" class="form-control" id="ville_dest" name="ville_dest" placeholder="Ville de la destination" required>
                </div>
                <div class="col-md-6">
                  <label for="province" class="form-label">Province</label>
                  <input type="text" class="form-control" id="province" name="province" placeholder="Province de la destination" required>
                </div>
                <div class="col-md-6">
                  <label for="image_dest" class="form-label">Image1</label>
                  <input type="file" class="form-control" id="image_dest1" name="image_dest1" required>
                </div>
                <div class="col-md-6">
                  <label for="image_dest" class="form-label">Image2</label>
                  <input type="file" class="form-control" id="image_dest2" name="image_dest2" required>
                </div>
                <div class="col-md-6">
                  <label for="image_dest" class="form-label">Image3</label>
                  <input type="file" class="form-control" id="image_dest3" name="image_dest3" required>
                </div>
                <div class="col-md-12">
                  <label for="loc_dest" class="form-label">Localisation</label>
                  <input type="text" class="form-control" id="loc_dest" name="loc_dest" placeholder="Localisation de destination" required>
                </div>
                <div class="col-12">
                  <label for="carte_dest" class="form-label">Carte</label>
                  <textarea class="form-control" id="carte_dest" name="carte_dest" rows="10" placeholder="La carte de destination" required></textarea>
                </div>
                <div class="col-12">
                  <label for="description_dest" class="form-label">Description</label>
                  <textarea class="form-control" id="description_dest" name="description_dest" rows="10" required>Description de la destination</textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <button class="btn btn-warning me-md-2" name="submit" type="submit">Ajouter</button>
                  <a href="show_destinations" class="btn btn-warning">Annuler</a>
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