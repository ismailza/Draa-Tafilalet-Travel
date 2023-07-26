<?php require_once '../../Controllers/scripts/admin-auth.inc.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Drâa Tafilalet Travel</title>
  <!-- style -->
  <?php include 'partials/style.html' ?>
  <link rel="stylesheet" href="css/acount_style.css">
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
              <div class="admin_account wow fadeInUp" data-wow-delay="0.3s">
                <div class="info_admin">
                  <div class="avatar-flip">
                    <img class="img-circle" src="images/profile/<?= is_null($img = $_SESSION['admin']->image_admin) ? 'user-286.png' : $img; ?>" height="150" width="150">
                  </div>
                  <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success" role="alert">
                      <?php
                      echo $_SESSION['success'];
                      unset($_SESSION['success']);
                      ?>
                    </div>
                  <?php
                  endif;
                  if (isset($_SESSION['error'])) :
                  ?>
                    <div class="alert alert-danger" role="alert">
                      <?php
                      echo $_SESSION['error'];
                      unset($_SESSION['error']);
                      ?>
                    </div>
                  <?php endif; ?>
                  <h2><?= $_SESSION['admin']->nom_admin . " " . $_SESSION['admin']->prenom_admin; ?></h2>
                  <h4><?= $_SESSION['admin']->email_admin; ?></h4>
                  <p>Nom d'utilisateur : <?= $_SESSION['admin']->username_admin; ?></p>
                  <a href="verify_password"><button type="button" class="btn btn-warning">Modifier</button></a>
                </div>
                <center><a href="../../Controllers/scripts/admin-logout.php"><button type="button" class="btn btn-danger">Déconnexion</button></a></center>
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