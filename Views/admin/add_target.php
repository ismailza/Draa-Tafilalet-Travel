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
              <form class="row g-3" action="../../Controllers/scripts/add-target.php" method="POST" enctype="multipart/form-data">
                <div class="titre">Ajouter un circuit</div>
                <div class="col-md-6">
                  <label for="ville_depart" class="form-label">Ville Départ</label>
                  <input type="text" class="form-control" id="ville_depart" name="ville_depart" placeholder="Ville de départ" required>
                </div>
                <div class="col-md-6">
                  <label for="ville_arrivee" class="form-label">Ville Arrivée</label>
                  <input type="text" class="form-control" id="ville_arrivee" name="ville_arrivee" placeholder="Ville d'arrivée" required>
                </div>
                <div class="col-md-12">
                  <label for="trajet" class="form-label">Trajet</label>
                  <textarea class="form-control" id="trajet" name="trajet" rows="10" required>Le trajet du voyage</textarea>
                </div>
                <div class="col-md-6">
                  <label for="date_depart" class="form-label">Date départ</label>
                  <input type="datetime-local" class="form-control" id="date_depart" name="date_depart" placeholder="Date départ du voyage" required>
                </div>
                <div class="col-md-6">
                  <label for="heure_depart" class="form-label">Heure départ</label>
                  <input type="time" class="form-control" id="heure_depart" name="heure_depart" placeholder="Date départ du voyage" required>
                </div>
                <div class="col-6">
                  <label for="duree" class="form-label">Durée</label>
                  <input type="text" class="form-control" id="duree" name="duree" placeholder="Durée" required>
                </div>
                <div class="col-md-6">
                  <label for="image_cover" class="form-label">Image Cover</label>
                  <input type="file" class="form-control" id="image_cover" name="image_cover" required>
                </div>
                <div class="col-md-12">
                  <label for="carte_trajet" class="form-label">Carte Trajet</label>
                  <input type="text" class="form-control" id="carte_trajet" name="carte_trajet" required>
                </div>
                <div class="col-6">
                  <label for="prix" class="form-label">Prix</label>
                  <input type="number" min="0" step="any" class="form-control" id="prix" name="prix" placeholder="Prix du voyage" required>
                </div>
                <div class="col-6">
                  <label for="fin_reservation" class="form-label">Fin de réservation</label>
                  <input type="date" min="0" step="any" class="form-control" id="fin_reservation" name="fin_reservation" placeholder="Date de fin de réservation" required>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <input class="btn btn-warning me-md-2" name="submit" type="submit" value="Ajouter">
                  <a href="show_targets.php" class="btn btn-warning" type="button">Annuler</a>
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