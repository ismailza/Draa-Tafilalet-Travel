<?php
require_once '../../Controllers/scripts/admin-auth.inc.php';
require_once '../../Controllers/PlatController.class.php';

use Controllers\PlatController;

$ac = new PlatController;
$plats = $ac->all();
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
                          <h4 class="card-title card-title-dash title">Liste des plats</h4>
                        </div>
                        <div>
                          <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick="location.href='add_dish'"><i class="mdi mdi-plus"></i>Ajouter plat</button>
                        </div>
                      </div>
                      <div class="table-responsive  mt-1">
                        <table class="table select-table" id="table">
                          <thead>
                            <tr>
                              <th>Images</th>
                              <th>Nom</th>
                              <th>Date d'ajout</th>
                              <th>Dernière modification à</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($plats as $plat) : ?>
                              <tr>
                                <td>
                                  <img width="60px" height="60px" style="margin: 3px;border:1px solid black;" src="../../public/img/plats/<?= $plat->image_plat1; ?>" alt="">
                                  <img width="60px" height="60px" style="margin: 3px;border:1px solid black;" src="../../public/img/plats/<?= $plat->image_plat2; ?>" alt="">
                                  <img width="60px" height="60px" style="margin: 3px;border:1px solid black;" src="../../public/img/plats/<?= $plat->image_plat3; ?>" alt="">
                                </td>
                                <td><?= $plat->nom_plat; ?></td>
                                <td><?= $plat->createdAt; ?></td>
                                <td><?= is_null($lu = $plat->lastUpdateAt) ? '<small>Non modifié</small>' : $lu; ?></td>
                                <td>
                                  <center>
                                    <input type="button" class="btn-check" id="btnradio2<?= $plat->id_plat; ?>" autocomplete="off" checked>
                                    <label class="badge badge-opacity-warning" role="button" onclick="document.location.href='update_dish?id=<?= $plat->id_plat; ?>'" for="btnradio2<?= $plat->id_plat; ?>" title="Modifier"><i class="mdi mdi-lead-pencil"></i></label>
                                    <input type="button" class="btn-check" id="btnradio3<?= $plat->id_plat; ?>" autocomplete="off">
                                    <label class="badge badge-opacity-warning" role="button" onclick="confirm_delete(<?= $plat->id_plat; ?>);" for="btnradio3<?= $plat->id_plat; ?>" title="Supprimer"><i class="mdi mdi-delete"></i></label>
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
      if (confirm('Vous voulez vraiment supprimer ce plat?')) {
        window.location.href = "../../Controllers/scripts/delete-dish.php?id=" + id;
      }
    }
  </script>
</body>
</html>