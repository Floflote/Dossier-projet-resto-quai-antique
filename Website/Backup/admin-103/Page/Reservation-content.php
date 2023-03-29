<?php
$statementresa = $pdo->prepare("SELECT * FROM reservation");
$statementresa->execute();
$reservations = $statementresa->fetchAll();
?>

<div style="padding:20px">
  <h1 style="text-transform: uppercase;
  font-family: Montserrat, sans-serif;
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
  font-weight: bold;">
    Réservations
  </h1>

  <div class="card">
    <div class="card-header" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
      Réservations
    </div>
    <div class="card-body">

      <!-- Categories tab -->
      <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Horaires</th>
              <th scope="col">Nombres</th>
              <th scope="col">Allergènes</th>
              <th scope="col">Mail</th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($reservations as $reservation) {
              echo "<tr>";
              echo "<td>";
              echo date_format_dd_mmmm_yyyy($reservation['reservation_date']);
              echo "</td>";
              echo "<td>";
              echo $reservation['reservation_hour'];
              echo "<td>";
              echo $reservation['reservation_nbcustomer'];
              echo "</td>";
              echo "<td>";
              echo $reservation['reservation_allergen'];
              echo "</td>";
              echo "<td>";
              echo $reservation['reservation_mail'];
              echo "</td>";
              echo "</td>";
              echo "<td>";
              /* Delete button */
              $delete_data = "delete_" . $reservation["reservation_id"];
            ?>
            <ul class="list-inline m-0">

              <!-- Button delete-->

              <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-title="Supprimer" data-bs-placement="top">
                <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal"
                  data-bs-target="#<?php echo $delete_data; ?>">
                  <i class="fa fa-trash"></i>
                </button>

                <!-- Modal delete -->

                <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1"
                  aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" style="text-transform: uppercase;
                        font-family: Montserrat, sans-serif;
                        font-weight: bold;
                        font-size: 1rem;">
                          Supprimer une réservation
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                      </div>
                      <div class="modal-body">
                        Êtes-vous sur de vouloir supprimer cette réservation du
                        "<?php echo date_format_dd_mmmm_yyyy($reservation['reservation_date']); ?>" à
                        "<?php echo ($reservation['reservation_hour']); ?>" ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" style="border-radius: 30px;"
                          data-bs-dismiss="modal">Annuler</button>
                        <button type="button" data-id="<?php echo $reservation['reservation_id']; ?>"
                          class="btn btn-warning delete_reservation_btn"
                          style="border-radius: 30px; color: white;">Supprimer</button>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
            <?php
              /* Delete button */
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>