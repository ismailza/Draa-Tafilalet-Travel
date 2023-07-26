<?php require_once '../../Controllers/scripts/admin-auth.inc.php'; ?>
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
    <!-- Settings panel -->
    <?php include 'partials/_settings-panel.html' ?>
    <!-- Sidebar -->
    <?php include 'partials/_sidebar.html' ?> 
    <div class="main-panel">
    <!-- Begin content-wrapper -->
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-12">
            <div class="home-tab">
              <!-- Begin form-container -->
              <div class="form_container">
                <form class="row g-3" action="../../Controllers/scripts/add-admin.php" method="POST" enctype="multipart/form-data">
                  <div class="titre">Ajouter Administrateur</div>  
                  <div class="col-md-6">
                    <label for="nom_admin" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom_admin" name="nom_admin" placeholder="Entrer le nom de l'administratur" required>
                  </div>  
                  <div class="col-md-6">
                    <label for="prenom_admin" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom_admin" name="prenom_admin" placeholder="Entrer le prénom de l'administrateur" required>
                  </div>
                  <div class="col-md-6">
                    <label for="email_admin" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email_admin" name="email_admin" placeholder="Entrer l'email de l'administrateur" required>
                  </div>
                  <div class="col-md-6">
                    <label for="login_admin" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="login_admin" name="login_admin" placeholder="Entrer le nom d'utilisateur" required>
                  </div>
                  <div class="col-md-6">
                    <label for="password_admin" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password_admin" name="password_admin" placeholder="Entrer le mot de passe" required>
                  </div>
                  <div class="col-md-6">
                    <label for="conf_password" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirmer le mot de passe" required>
                  </div>
                  
                  <div class="col-md-6">
                    <label for="photo_admin" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="photo_admin" name="photo_admin" >
                  </div>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <input class="btn btn-warning me-md-2" name="submit" type="submit" value="Ajouter">
                    <a href="show_admins" class="btn btn-warning" name="reset" type="reset">Annuler</a>
                  </div>
                </form> 
              </div>
              <!-- End form-container -->
            </div>
          </div>
        </div>
      </div>
      <!-- End content-wrapper -->
      <!-- Begin footer -->
      <?php include 'partials/_footer.html' ?>
      <!-- End footer -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
<!-- plugins js -->
<?php include 'partials/plugins.html' ?>
</body>
</html>