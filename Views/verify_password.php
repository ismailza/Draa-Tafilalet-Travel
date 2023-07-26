<?php
require_once '../Controllers/scripts/auth.inc.php';

if (isset($_POST['confirm'])) {
  if (password_verify($_POST['password'], $_SESSION['auth']->password_client)) {
    $_SESSION['update'] = true;
    header("location: account_update.php");
  }
  else $error = "Mot de passe incorrect!";
}
?>
<!doctype html>
<html lang="fr">
<head>
  <title>Mon Profil</title>
  <?php include 'include/fonts_css.html'; ?>
  <link rel="stylesheet" href="../public/css/plus_info.css">
</head>
<body data-spy="scroll" data-target="#main-navbar">
  <div class="body">
    <?php include 'include/header.php';  ?>
    <section class="client_account">
      <div class="info_client">
        <div class="avatar-flip">
          <img class="img-circle" src="../public/img/user-286.png" height="150" width="150">
        </div>
        <h2><?= $_SESSION['auth']->nom_client . " " . $_SESSION['auth']->prenom_client; ?></h2>
        <h4><?= $_SESSION['auth']->email_client; ?></h4>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
          <?php if (isset($error)): ?>
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
            <a href="account"><input type="button" class="btn btn-warning" value="Annuler"></a>
          </div>
        </form>
      </div>
    </section>
    <?php include 'include/footer.html'; ?>
  </div>
  <?php include 'include/plugins_js.html' ?>
</body>
</html>