<?php

require_once '../../Controllers/scripts/admin-auth.inc.php';
require_once '../../Controllers/MessageController.class.php';

use Controllers\MessageController;

$ac = new MessageController;
$messages = $ac->all();
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
                          <h4 class="card-title card-title-dash title">Liste des messages</h4>
                        </div>
                      </div>
                      <div class="table-responsive  mt-1">
                        <table class="table select-table" id="table">
                          <thead>
                            <tr>
                              <th>Date du message</th>
                              <th>Nom</th>
                              <th>Email</th>
                              <th>Sujet</th>
                              <th>Message</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($messages as $message) : ?>
                              <tr>
                                <td><?= $message->createdAt; ?></td>
                                <td><?= $message->nom_redacteur; ?></td>
                                <td><?= $message->email_redacteur; ?></td>
                                <td><?= $message->sujet; ?></td>
                                <td><?= $message->message; ?></td>
                                <td>
                                  <span title="Répondre"><a href="mailto:<?= $message->email_redacteur; ?>?subject=Reponse : '<?= $message->sujet; ?>'"><i class="mdi mdi-send-circle menu-icon"></i></a></span>
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
</body>

</html>