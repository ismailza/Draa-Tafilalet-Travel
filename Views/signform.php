<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
  if (isset($_SESSION['auth']))
  {
    header("location: index");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Se cennecter</title>
  <link rel="icon" type="image/png" href="../public/favicon.ico">
  <link rel="stylesheet" href="../public/vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../public/css/logstyle.css">
</head>
<body>
  <div class="login-wrap">
    <div class="login-html">
      <?php if (isset($_SESSION['success'])): ?>
      <div class="alert alert-success" role="alert">
        <?php 
          echo $_SESSION['success']; 
          unset($_SESSION['success']);
        ?>
      </div>
      <?php 
        endif; 
        if (isset($_SESSION['error'])): 
      ?>
      <div class="alert alert-danger" role="alert">
        <?php 
          echo $_SESSION['error']; 
          unset($_SESSION['error']);
        ?>
      </div>
      <?php 
        endif; 
        if (isset($_SESSION['warning'])): 
      ?>
      <div class="alert alert-warning" role="alert">
        <?php 
          echo $_SESSION['warning']; 
          unset($_SESSION['warning']);
        ?>
      </div>
      <?php endif; ?>
      <a href="index.php" style="font-size: large;"><i class="mdi mdi-arrow-left"></i></a>
      <?php if (isset($_SESSION['inscription']) && $_SESSION['inscription']) : ?>
      <input id="tab-1" type="radio" name="tab" class="sign-in"><label for="tab-1" class="tab"> Se connecter</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">S'inscrire</label>
      <?php else : ?>
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"> Se connecter</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">S'inscrire</label>
      <?php endif; ?>
      <div class="login-form">
        <form action="../Controllers/scripts/signin.php" method="post" class="sign-in-htm" enctype="multipart/form-data"> 
          <div class="group">
            <label for="user" class="label">Nom d'utilisateur</label>
            <input id="user" type="text" name="login" class="input" required>
          </div>
          <div class="group">
            <label for="pass" class="label">Mot de passe</label>
            <input id="pass" type="password" name="password" class="input" data-type="password" required>
          </div>
          <div class="group">
            <input type="submit" name="submit" class="button" value="Connecter">
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <a href="forgot_password.php">Mot de passe oublier?</a>
          </div>
        </form>
        <form action="../Controllers/scripts/signup.php" method="post" class="sign-up-htm" enctype="multipart/form-data" onsubmit="return verify_password()">
          <div class="group">
            <label for="nom" class="label">Nom</label>
            <input id="nom" type="text" name="nom" class="input" required>
          </div>
          <div class="group">
            <label for="prenom" class="label">Prénom</label>
            <input id="prenom" type="text" name="prenom" class="input" required>
          </div>
          <div class="group">
            <label for="email" class="label">Email</label>
            <input id="email" type="email" name="email" class="input" required>
          </div>
          <div class="group">
            <label for="login" class="label">Nom d'utilisateur</label>
            <input id="login" type="text" name="login" class="input" required>
          </div>
          <div class="group">
            <label for="password" class="label">Mot de passe</label>
            <input id="password" type="password" name="password" class="input" data-type="password" required>
          </div>
          <div class="group">
            <label for="repassword" class="label">Confirmer le mot de passe</label>
            <input id="repassword" type="password" name="confirm_password" class="input" data-type="password" required>
          </div>
          <div class="group">
            <input type="submit" name="submit" class="button" value="S'inscrire">
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <label for="tab-1">Déjà membre ?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    function verify_password () {
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