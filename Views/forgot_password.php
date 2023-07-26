<?php session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start(); ?>
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
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"> Récupérer votre mot de passe</label>
        <div class="login-form">
          <form action="../Controllers/scripts/forgot_password.php" method="post" class="sign-in-htm" enctype="multipart/form-data"> 
          <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert">
              <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']);
              ?>
            </div>
          <?php endif; ?>
          <div class="group">
            <label for="email" class="label">Email</label>
            <input id="email" type="email" name="email" class="input" required>
          </div>
          <div class="group">
            <input type="submit" name="check" class="button" value="Envoyer">
          </div>
        </form>
      </div>
    </div>	
  </div>
</body>
</html>