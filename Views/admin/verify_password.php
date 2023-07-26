<?php
require_once '../../Controllers/scripts/admin-auth.inc.php';

if (isset($_POST['confirm'])) {
  if (password_verify($_POST['password'], $_SESSION['admin']->password_admin)) {
    $_SESSION['update'] = true;
    header("location: account_update.php");
  } else $error = "Mot de passe incorrect!";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Drâa Tafilalet Travel</title>
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
              <div class="admin_account">
                <div class="info_admin">
                  <div class="avatar-flip">
                    <img class="img-circle" src="images/profile/<?= is_null($img = $_SESSION['admin']->image_admin) ? 'user-286.png' : $img; ?>" height="150" width="150">
                  </div>
                  <h2><?= $_SESSION['admin']->nom_admin . " " . $_SESSION['admin']->prenom_admin; ?></h2>
                  <h4><?= $_SESSION['admin']->email_admin; ?></h4>
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <?php if (isset($error)) : ?>
                      <div class="alert alert-danger" role="alert">
                        <?php
                        echo $error;
                        unset($error);
                        ?>
                      </div>
                    <?php endif; ?>
                    <div class="form-group">
                      <label for="password">Mot de passe</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="confirm" class="btn btn-warning" value="Continue">
                      <a href="account.php"><input type="button" class="btn btn-warning" value="Annuler"></a>
                    </div>
                  </form>
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