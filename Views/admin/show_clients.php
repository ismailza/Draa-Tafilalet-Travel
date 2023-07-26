<?php

require_once '../../Controllers/scripts/admin-auth.inc.php';
require_once '../../Controllers/ClientController.class.php';

use Controllers\ClientController;

$ac = new ClientController;
$clients = $ac->all();
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
                          <h4 class="card-title card-title-dash title">Liste des clients</h4>
                        </div>
                      </div>
                      <div class="table-responsive  mt-1">
                        <table class="table select-table" id="table">
                          <thead>
                            <tr>
                              <th></th>
                              <th>Nom</th>
                              <th>Prénom</th>
                              <th>Email</th>
                              <th>Username</th>
                              <th>Date d'ajout</th>
                              <th>Dernière modification à</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($clients as $client) : ?>
                              <tr>
                                <td>
                                  <img style="margin: 3px;border:1px solid black;" src="images/profile/user-286.png" alt="">
                                </td>
                                <td><?= $client->nom_client; ?></td>
                                <td><?= $client->prenom_client; ?></td>
                                <td><?= $client->email_client; ?></td>
                                <td><?= $client->username_client; ?></td>
                                <td><?= $client->createdAt; ?></td>
                                <td><?= is_null($lu = $client->lastUpdateAt) ? '<small>Non modifié</small>' : $lu; ?></td>
                                <td>
                                  <center>
                                    <input type="button" class="btn-check" id="btnradio3<?= $client->id_client; ?>" autocomplete="off">
                                    <label class="badge badge-opacity-warning" role="button" onclick="confirm_delete(<?= $client->id_client; ?>);" for="btnradio3<?= $client->id_client; ?>" title="Supprimer"><i class="mdi mdi-delete"></i></label>
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
      if (confirm('Vous voulez vraiment supprimer ce client?')) {
        window.location.href = "../../Controllers/scripts/delete-client.php?id=" + id;
      }
    }
  </script>
</body>

</html>