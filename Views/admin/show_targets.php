<?php
require_once '../../Controllers/scripts/admin-auth.inc.php';
require_once '../../Controllers/CircuitVoyageController.class.php';

use Controllers\CircuitVoyageController;

$ac = new CircuitVoyageController;
$circuits = $ac->all();
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

              <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title card-title-dash title">Liste des circuits</h4>
                        </div>
                        <div>
                          <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick="location.href='add_target'"><i class="mdi mdi-plus"></i>Ajouter circuit</button>
                        </div>
                      </div>
                      <div class="table-responsive  mt-1">
                        <table class="table select-table" id="table">
                          <thead>
                            <tr>
                              <th>Image</th>
                              <th>Ville Départ</th>
                              <th>Ville Arrivée</th>
                              <th>Trajet</th>
                              <th>Date départ</th>
                              <th>Durée</th>
                              <th>Date d'ajout</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($circuits as $circuit) : ?>
                              <tr>
                                <td>
                                  <img width="60px" height="60px" style="margin: 3px;border:1px solid black;" src="../../public/img/targets/<?= $circuit->image_cover; ?>" alt="">
                                </td>
                                <td><?= $circuit->ville_depart; ?></td>
                                <td><?= $circuit->ville_arrivee; ?></td>
                                <td><?= $circuit->trajet; ?></td>
                                <td><?= $circuit->date_depart; ?></td>
                                <td><?= $circuit->duree; ?></td>
                                <td><?= $circuit->createdAt; ?></td>
                                <td>
                                  <center>
                                    <input type="button" class="btn-check" id="btnradio2<?= $circuit->id_circuit; ?>" autocomplete="off" checked>
                                    <label class="badge badge-opacity-warning" role="button" onclick="document.location.href='update_target?id=<?= $circuit->id_circuit; ?>'" for="btnradio2<?= $circuit->id_circuit; ?>" title="Modifier"><i class="mdi mdi-lead-pencil"></i></label>
                                    <input type="button" class="btn-check" id="btnradio3<?= $circuit->id_circuit; ?>" autocomplete="off">
                                    <label class="badge badge-opacity-warning" role="button" onclick="confirm_delete(<?= $circuit->id_circuit; ?>);" for="btnradio3<?= $circuit->id_circuit; ?>" title="Supprimer"><i class="mdi mdi-delete"></i></label>
                                  </center>
                                </td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
  <script>
    function confirm_delete(id) {
      if (confirm('Vous voulez vraiment supprimer cette circuit?')) {
        window.location.href = "../../Controllers/scripts/delete-target.php?id=" + id;
      }
    }
  </script>
</body>

</html>