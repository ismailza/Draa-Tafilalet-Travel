<?php

require_once '../../Controllers/scripts/admin-auth.inc.php';
require_once '../../Controllers/AdminController.class.php';

use Controllers\AdminController;

$ac = new AdminController;
$admins = $ac->all();
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
                          <h4 class="card-title card-title-dash title">Liste des admins</h4>
                        </div>
                        <div>
                          <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick="location.href='add_admin'"><i class="mdi mdi-plus"></i>Ajouter admin</button>
                        </div>
                      </div>
                      <div class="table-responsive  mt-1">
                        <table class="table select-table" id="table">
                          <thead>
                            <tr>
                              <th>Image</th>
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
                            <?php foreach ($admins as $admin) : ?>
                              <tr>
                                <td>
                                  <img style="margin: 3px;border:1px solid black;" src="images/profile/<?= is_null($img = $admin->image_admin)? 'user-286.png': $img; ?>" alt="">
                                </td>
                                <td><?= $admin->nom_admin; ?></td>
                                <td><?= $admin->prenom_admin; ?></td>
                                <td><?= $admin->email_admin; ?></td>
                                <td><?= $admin->username_admin; ?></td>
                                <td><?= $admin->createdAt; ?></td>
                                <td><?= is_null($lu = $admin->lastUpdateAt) ? '<small>Non modifié</small>' : $lu; ?></td>
                                <td>
                                  <?php if ($admin->id_admin != $_SESSION['admin']->id_admin) : ?>
                                    <center>
                                      <input type="button" class="btn-check" id="btnradio3<?= $admin->id_admin; ?>" autocomplete="off">
                                      <label class="badge badge-opacity-warning" role="button" onclick="confirm_delete(<?= $admin->id_admin; ?>);" for="btnradio3<?= $admin->id_admin; ?>" title="Supprimer"><i class="mdi mdi-delete"></i></label>
                                    </center>
                                  <?php endif; ?>
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
      if (confirm('Vous voulez vraiment supprimer cette admin?')) {
        window.location.href = "../../Controllers/scripts/delete-admin.php?id=" + id;
      }
    }
  </script>
</body>

</html>