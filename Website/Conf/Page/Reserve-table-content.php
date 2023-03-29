<!-- Bandeau Top -->

<section style="
    background: url(./Picture/viande-planche.jpeg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
  <div class="text-center py-5">
    <h1
      style="font-size: 50px; color: white; text-transform: uppercase; paint-order: stroke fill; stroke-color: #a4872c; stroke-width: 5px; text-shadow: -1px -1px 0 #a4872c, 1px -1px 0 #a4872c, -1px 1px 0 #a4872c, 1px 1px 0 #a4872c;">
      Réserver une table
    </h1>
  </div>

</section>

<!-- Links -->

<?php
if ($user_connected == 0) {
?>
<section class="p-5">
  <p><strong>Vous pouvez réserver une table avec un compte client afin d’être plus rapide.
    </strong></p>
  <p><strong>Vous avez un compte et n’êtes pas connecté ?
    </strong><a class="links" href="./Espaceconnexion.php">Se connecter</a></p>
  <p><strong>Pas encore de compte ?
    </strong><a class="links" href="./Creationcompte.php">En créer un ici</a></p>
</section>
<?php
}
?>

<!-- Form reservation -->

<section class="table_reservation_section p-5">
  <div class="container-fluid">

    <?php
    if (isset($_POST['submit_table_reservation_form']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
      $selected_date = $_POST['selected_date']; /* YYYY-MM-DD */
      $selected_hour = $_POST['selected_hour'];
      $nbcustomer = $_POST['reservation_nbcustomer'];
      $customer_mail = test_input($_POST['customer_email']);
      $customer_allerg = test_input($_POST['customer_allergen']);

      try {
        $statementaddresa = $pdo->prepare("INSERT INTO reservation (reservation_date, reservation_hour, reservation_nbcustomer, reservation_mail, reservation_allergen) VALUES (?,?,?,?,?) ");
        $statementaddresa->execute(array($selected_date, $selected_hour, $nbcustomer, $customer_mail, $customer_allerg));
    ?>

    <!-- Ajout du menu validé -->

    <script type="text/javascript">
    swal("Réservé", "Votre réservation a bien été prise en compte !", "success").then((value) => {
      window.location.replace("Reserve-table.php");
    });
    </script>

    <?php
      } catch (Exception $e) {
        file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
        echo 'Une erreur s\'est produite, veuillez réessayer: ';
      }
    }
    ?>
    <div>
      <h5>
        Sélectionner une date, un horaire et le nombre de convives
      </h5>
    </div>

    <!-- Form ask nb customers -->

    <form method="POST" action="Reserve-table.php">
      <div class="row">

        <div class="col-md-3 col-xs-6">
          <div style="margin-bottom: 1rem;">
            <label for="reservation_date">Date</label>
            <input type="date"
              value="<?php echo (isset($_POST['reservation_date'])) ? $_POST['reservation_date'] : date('Y-m-d');  ?>"
              class="form-control" name="reservation_date">
          </div>
        </div>

        <div class="col-md-3 col-xs-6">
          <div style="margin-bottom: 1rem;">
            <label for="reservation_hour">Horaires</label>
            <input type="time"
              value="<?php echo (isset($_POST['reservation_hour'])) ? $_POST['reservation_hour'] : date('H:i');  ?>"
              class="form-control" name="reservation_hour">
          </div>
        </div>

        <div class="col-md-3 col-xs-6">
          <div style="margin-bottom: 1rem;">
            <label for="reservation_nbcustomer">Nombre de convives</label>
            <select class="form-select" aria-label="Select nombre convives" name="reservation_nbcustomer">
              <option value="1"
                <?php echo (isset($nbcustomers_co_session) && ($nbcustomers_co_session == 1)) ? "selected" : "";  ?>>
                1 personne
              </option>
              <option value="2"
                <?php echo (isset($nbcustomers_co_session) && ($nbcustomers_co_session == 2)) ? "selected" : "";  ?>>
                2 personnes
              </option>
              <option value="3"
                <?php echo (isset($nbcustomers_co_session) && ($nbcustomers_co_session == 3)) ? "selected" : "";  ?>>
                3 personnes
              </option>
              <option value="4"
                <?php echo (isset($nbcustomers_co_session) && ($nbcustomers_co_session == 4)) ? "selected" : "";  ?>>
                4 personnes
              </option>
            </select>
          </div>
        </div>

        <div class="col-lg-3 col-md-3col-xs-6">
          <div style="margin-bottom: 1rem;">
            <label for="check_availability_submit" style="visibility: hidden;">Vérification de tables
              disponibles</label>
            <input type="submit" class="form-control btn reserve-btn ms-3" style="text-transform: uppercase;"
              name="check_availability_submit">
          </div>
        </div>
      </div>
    </form>

    <!-- Form check availability -->

    <?php
    if (isset($_POST['check_availability_submit'])) {
      $selected_date = $_POST['reservation_date']; /* YYYY-MM-DD */
      $weekday = strtolower(date('l', strtotime($selected_date))); /* monday etc */
      $selected_hour = $_POST['reservation_hour'];
      $nbcustomer = $_POST['reservation_nbcustomer'];

      try {
        $statement_website_set = $pdo->prepare('SELECT * FROM website_setting');
        $statement_website_set->execute();
        $website_set_form = $statement_website_set->fetch();

        $statement_check_nb = $pdo->prepare('SELECT SUM(reservation_nbcustomer) AS totalnb FROM reservation WHERE reservation_date = ?');
        $statement_check_nb->execute(array($selected_date));
        $total_of_the_date = $statement_check_nb->fetch();
        $total_of_the_date_and_form = $total_of_the_date['totalnb'] + $nbcustomer;
      } catch (Exception $e) {
        file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
        echo 'Une erreur s\'est produite, veuillez réessayer: ';
      }

      /* Resto closed */
      if (($website_set_form['setting_restaurant_' . $weekday . '_hours'] == "Ferme") || ($website_set_form['setting_restaurant_' . $weekday . '_hours'] == "Fermé")) {
    ?>

    <div>
      <span><strong>Le restaurant est fermé à cette date, désolé !</strong></span>
    </div>

    <?php
        /* Out of place */
      } elseif ($total_of_the_date_and_form > $website_set_form['setting_restaurant_nbcustomers']) {
      ?>

    <div>
      <span><strong>Plus de places disponibles à cette date</strong></span>
    </div>

    <?php
        /* Availability ok */
      } else {
      ?>

    <form method="POST" id="formresatab" class="needs-validation" action="Reserve-table.php" novalidate>
      <input type="hidden" name="selected_date" value="<?php echo $selected_date ?>">
      <input type="hidden" name="selected_hour" value="<?php echo $selected_hour ?>">
      <input type="hidden" name="reservation_nbcustomer" value="<?php echo $nbcustomer ?>">

      <div>

        <!-- Email -->

        <div class="row" style="margin-bottom: 1rem;">
          <div class="col-sm-6">
            <label for="customer_email" class="form-label">
              <h5>Votre adresse mail</h5>
            </label>
            <input type="email" name="customer_email" id="customer_email" class="form-control"
              placeholder="monmail@mail.com" pattern="(\w+\.?|-?\w+?)+@\w+\.?-?\w+?(\.\w{2,3})+"
              value="<?php echo $identifiant_co_session; ?>" required>
            <div class="invalid-feedback">
              Format de l'email invalide !
            </div>
          </div>
        </div>

        <!-- Allergen -->

        <div class="row" style="margin-bottom: 1rem;">
          <div class="col-sm-6">
            <label for="customer_allergen" class="form-label">
              <h5>Des allergènes à signaler ?</h5>
            </label>
            <textarea name="customer_allergen" class="form-control" id="customer_allergen"
              onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9éèê^,]/g,'');" minlength="4" maxlength="255"
              required><?php echo $allergen_co_session; ?></textarea>
            <div class="invalid-feedback">
              Vous devez précisez vos allergènes. Si aucun, mettre Aucun !
            </div>
          </div>
        </div>
      </div>

      <!-- Checkbox -->

      <div class="col-12 mb-4">
        <div class="form-check"></div>
        <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck" required>
        <label class="form-check-label" for="gridCheck">
          Veuillez accepter d'être contacté(e) par votre adresse email
        </label>
        <div class="invalid-feedback">Veuillez accepter la condition.</div>
        <div class="valid-feedback">
          J'accepte d'être contacté(é) par mon adresse mail
        </div>
      </div>

      <div style="margin-bottom: 1rem;">
        <button type="submit" name="submit_table_reservation_form" class="btn reserve-btn ms-3"
          style="text-transform: uppercase;">
          Faire une réservation
        </button>
      </div>
    </form>
    <?php
      }
    }
    ?>
  </div>
</section>