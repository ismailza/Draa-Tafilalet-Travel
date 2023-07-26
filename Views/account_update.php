<?php 
require_once '../Controllers/scripts/auth.inc.php'; 
if (!isset($_SESSION['update']))
{
  header("location: verify_password");
  exit;
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
        <form action="../Controllers/scripts/account_update.php" method="POST">
          <?php if (isset($_SESSION['error'])): ?>
          <div class="alert alert-danger" role="alert">
            <?php 
              echo $_SESSION['error']; 
              unset($_SESSION['error']);
            ?>
          </div>
          <?php endif; ?>
          <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom_client" id="nom" value="<?= $_SESSION['auth']->nom_client; ?>" placeholder="Nom" required>
          </div>
          <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name="prenom_client" id="prenom" value="<?= $_SESSION['auth']->prenom_client; ?>" placeholder="Prénom" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email_client" id="email" value="<?= $_SESSION['auth']->email_client; ?>" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="login">Nom d'utilisation</label>
            <input type="text" class="form-control" name="login_client" id="login" value="<?= $_SESSION['auth']->username_client; ?>" placeholder="Nom d'utilisateur" required>
          </div>
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" name="password_client" id="password" placeholder="Mot de passe" required>
          </div>
          <div class="form-group">
            <label for="repassword">Confirmer le mot de passe</label>
            <input type="password" class="form-control" name="repassword_client" id="repassword" placeholder="Confirmer le mot de passe" required>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-warning" value="Enregistrer">
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