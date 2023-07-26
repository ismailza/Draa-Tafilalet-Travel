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
              <?php require_once 'alerts.php'; ?>
              <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                  <input type="radio" class="btn-check" name="status" id="btnradio1" value="En cours" autocomplete="off" onclick="send_ajax_request(this.value)" checked>
                  <label class="btn btn-outline-warning" for="btnradio1">En cours</label>

                  <input type="radio" class="btn-check" name="status" id="btnradio2" value="Refusée" autocomplete="off" onclick="send_ajax_request(this.value)">
                  <label class="btn btn-outline-danger" for="btnradio2">Refusées</label>

                  <input type="radio" class="btn-check" name="status" id="btnradio3" value="Acceptée" autocomplete="off" onclick="send_ajax_request(this.value)">
                  <label class="btn btn-outline-success" for="btnradio3">Acceptées</label>
              </div>
              <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card card-rounded">
                    <div class="card-body">
                      <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title card-title-dash title">Liste des reservations de materiel</h4>
                        </div>
                      </div>
                      <div class="table-responsive  mt-1">
                        <table class="table select-table" id="table">
                          <thead>
                            <tr>
                              <th>Date de reservation</th>
                              <th>Nom client</th>
                              <th>Télephone</th>
                              <th>Nom materiel</th>
                              <th>Date début</th>
                              <th>Date fin</th>
                              <th>Nombre</th>
                              <th>Paiement</th>
                              <th>Prix</th>
                              <th>Status</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody id="response">

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal" tabindex="-1" id="statusModal">
                <div class="modal-dialog">
                  <form class="modal-content alert alert-warning" method="post" action="../../Controllers/scripts/change-status.php">
                    <div class="modal-header p-2">
                      <h5 class="modal-title">Confirmation</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="status" value="">
                        <p>Vous voulez vraiment <span id="status"></span> cette réservation ?</p>
                      <p></p>
                    </div>
                    <div class="modal-footer p-2">
                      <button type="submit" name="materiel" class="btn btn-warning mb-0">Confirmer</button>
                      <button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal">Close</button>
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
    function openModal (id, status) {
      // Set the id value in the modal form
      document.querySelector("#statusModal input[name='id']").value = id;
      document.querySelector("#statusModal input[name='status']").value = status;
      document.querySelector("#statusModal #status").innerHTML = (status == 'Acceptée') ? 'accepter': 'refuser';
      // Show the modal
      $('#statusModal').modal('show');
    }

    send_ajax_request ('En cours');
  
    function send_ajax_request (status) {
      var data = { status: status };

      $.ajax({
        url: '../../Controllers/scripts/reservations-materiel.php',
        type: 'POST',
        data: JSON.stringify(data),
        contentType: 'application/json; charset=UTF-8',
        success: function (response) {
          var trHTML = '';
          var parsedResponse = JSON.parse(response);
          $.each(parsedResponse, function (i, item) {
            trHTML += '<tr>';
            trHTML += '<td>'+ item.date_reservation +'</td>'+
                      '<td>'+ item.nom_client +' '+ item.prenom_client +'</td>'+
                      '<td>'+ item.tel_client +'</td>'+
                      '<td>'+ item.nom_materiel +'</td>'+
                      '<td>'+ item.date_debut +'</td>'+
                      '<td>'+ item.date_fin +'</td>'+
                      '<td>'+ item.nb_personnes +'</td>'+
                      '<td>'+ item.type_paiement +'</td>'+
                      '<td>'+ item.prix +'</td>'+
                      '<td>'+ item.status +'</td>';
            if (status == 'En cours') {
              trHTML += '<td align="center">'+
                        '<input type="button" class="btn-check" id="btnradio2'+ item.id_reservation +'" autocomplete="off" checked>'+
                        '<label class="badge badge-opacity-warning" role="button" onclick="openModal('+ item.id_reservation +', \'Acceptée\');" for="btnradio2'+ item.id_reservation +'" title="Accépter"><i class="mdi mdi-check-decagram"></i></label>'+
                        '<input type="button" class="btn-check" id="btnradio3'+ item.id_reservation +'" autocomplete="off">'+
                        '<label class="badge badge-opacity-warning" role="button" onclick="openModal('+ item.id_reservation +', \'Refusée\');" for="btnradio3'+ item.id_reservation +'" title="Refuser"><i class="mdi mdi-close-circle"></i></label>'+
                        '</td>';
            }
            else trHTML += '<td></td>';
            trHTML += '</tr>';
          });
          $('#response').html(trHTML);
        }
      });
    }
  
  </script>

</body>
</html>
