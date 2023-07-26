<?php
session_start();

if (!isset($_SESSION['reset'])) {
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
      <a href="index.php" style="font-size: large;"><i class="mdi mdi-arrow-left"></i></a>
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"> Code de vérification</label>
      <div class="login-form">
        <form action="../Controllers/scripts/reset_code.php" method="post" class="sign-in-htm" enctype="multipart/form-data">
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
          <div class="group">
            <label for="code" class="label">Code</label>
            <input id="code" type="number" min="0" name="code" class="input" required>
            <input type="hidden" name="email" value="<?= $_SESSION['reset']; ?>">
          </div>
          <div class="group">
            <input type="submit" name="code_check" class="button" value="Continue">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>