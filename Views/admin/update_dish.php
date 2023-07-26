<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: show_dishs");
  exit;
}
require_once '../../Controllers/scripts/admin-auth.inc.php';
require_once '../../Controllers/PlatController.class.php';

use Controllers\PlatController;

$ac = new PlatController;
$plat = $ac->one($_GET['id']);
?>
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
                            <form class="row g-3" action="../../Controllers/scripts/update-dish.php" method="POST" enctype="multipart/form-data">
                                <div class="titre">Modifier Plat</div>  
                                <div class="col-md-6">
                                    <label for="nom_plat" class="form-label">Nom Plat</label>
                                    <input type="text" class="form-control" id="nom_plat" name="nom_plat" value="<?= $plat->nom_plat; ?>" required>
                                </div>  
                                <div class="col-md-6">
                                    <label for="image_plat" class="form-label">Image1</label>
                                    <input type="file" class="form-control" id="image_plat1" name="image_plat1"  value="<?= $plat->image_plat1; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="image_plat" class="form-label">Image2</label>
                                    <input type="file" class="form-control" id="image_plat2" name="image_plat2" value="<?= $plat->image_plat2; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="image_plat" class="form-label">Image3</label>
                                    <input type="file" class="form-control" id="image_plat3" name="image_plat3" value="<?= $plat->image_plat3; ?>">
                                </div>
                                <div class="col-12">
                                    <label for="description_plat" class="form-label">Description</label>
                                    <textarea class="editor form-control" id="description_plat" name="description_plat" rows="10" required><?= $plat->description_plat; ?></textarea>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <input type="text" name="id" value="<?= $plat->id_plat; ?>" hidden>
                                    <button class="btn btn-warning me-md-2" name="update" type="submit">Modifier</button>
                                    <a href="show_dishs.php" class="btn btn-warning">Annuler</a>
                                </div>
                            </form>  
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
<script src="vendors/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
<script src="vendors/tinymce/js/tinymce/tinymce.js" type="text/javascript"></script>
</body>
</html>