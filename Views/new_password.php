<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
$_SESSION['new'] = "";
if (!isset($_SESSION['new'])) {
  header("location: signform");
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
  <link rel="stylesheet" href="../public/css/forgot_pass.css">
</head>
<body>
  <div class="login-wrap">
    <div class="login-html">
      <a href="signform" style="font-size: large;"><i class="mdi mdi-arrow-left"></i></a>
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"> Changer votre mot de passe</label>
      <div class="login-form">
        <form action="../Controllers/scripts/new_password.php" method="post" class="sign-in-htm" onsubmit="return verify_password();">
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
          <?php endif; ?>
          <div class="alert-danger alert" role="alert" style="display: none;">
          </div>
          <div class="group">
            <label for="password" class="label">Mot de passe</label>
            <input id="password" type="password" name="password" class="input" required>
          </div>
          <div class="group">
            <label for="repassword" class="label">Confirmer le mot de passe</label>
            <input id="repassword" type="password" name="repassword" class="input" required>
          </div>
          <div class="group">
            <input type="hidden" name="email" value="<?= $_SESSION['new']; ?>">
            <input type="submit" name="submit" class="button" value="Connecter">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    function verify_password () {
      let password = document.querySelector('#password').value;
      let repassword = document.querySelector('#repassword').value;
      if (password != repassword) {
        alert('Mot de passe de confirmation est incorrect!');
        return false;
      }      
      return true;
    }
  </script>
</body>
</html>