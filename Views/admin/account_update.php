<?php
require_once '../../Controllers/scripts/admin-auth.inc.php';
if (!isset($_SESSION['update'])) {
  header("location: verify_password");
  exit;
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
                  <form action="../../Controllers/scripts/admin-account-update.php" method="POST" onsubmit="return verify_password()">
                    <?php if (isset($_SESSION['error'])) : ?>
                      <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                      </div>
                    <?php endif; ?>
                    <div class="form-group">
                      <label for="nom">Nom</label>
                      <input type="text" class="form-control" name="nom_admin" id="nom" value="<?= $_SESSION['admin']->nom_admin; ?>" placeholder="Nom" required>
                    </div>
                    <div class="form-group">
                      <label for="prenom">Prénom</label>
                      <input type="text" class="form-control" name="prenom_admin" id="prenom" value="<?= $_SESSION['admin']->prenom_admin; ?>" placeholder="Prénom" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email_admin" id="email" value="<?= $_SESSION['admin']->email_admin; ?>" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <label for="login">Nom d'utilisation</label>
                      <input type="text" class="form-control" name="login_admin" id="login" value="<?= $_SESSION['admin']->username_admin; ?>" placeholder="Nom d'utilisateur" required>
                    </div>
                    <div class="form-group">
                      <label for="photo">Photo</label>
                      <input type="file" class="form-control" name="photo_admin" value="<?= $_SESSION['admin']->image_admin; ?>" id="photo">
                    </div>
                    <div class="form-group">
                      <label for="password">Mot de passe</label>
                      <input type="password" class="form-control" name="password_admin" id="password" placeholder="Mot de passe" required>
                    </div>
                    <div class="form-group">
                      <label for="repassword">Confirmer le mot de passe</label>
                      <input type="password" class="form-control" name="repassword_admin" id="repassword" placeholder="Confirmer le mot de passe" required>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-warning" value="Enregistrer"></input>
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
  <script>
    function verify_password() {
      $password = document.querySelector('#password').value;
      $repassword = document.querySelector('#repassword').value;
      if ($password != $repassword) {
        alert('Mot de passe de confirmation est incorrect!');
        return false;
      }
      return true;
    }
  </script>
</body>

</html>