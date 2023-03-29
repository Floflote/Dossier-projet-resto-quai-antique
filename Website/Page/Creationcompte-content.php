<!-- Bandeau Top -->

<section style="
    background: url(./Picture/Pizza-piment.jpeg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
  <div class="text-center py-5">
    <h1
      style="font-size: 50px; color: white; text-transform: uppercase; paint-order: stroke fill; stroke-color: #a4872c; stroke-width: 5px; text-shadow: -1px -1px 0 #a4872c, 1px -1px 0 #a4872c, -1px 1px 0 #a4872c, 1px 1px 0 #a4872c;">
      Création de compte
    </h1>
  </div>

</section>

<!-- Form create compte -->

<section class="create_compte_section p-5">
  <div class="container-fluid text-center">
    <h1>Créer son compte</h1>
    <form method="POST" id="formcreaco" class="needs-validation" action="Creationcompte.php"
      enctype="multipart/form-data" novalidate>

      <!-- Mail -->

      <div class="row col-sm-4 mx-auto" style="margin-bottom: 1rem;">
        <label for="creaco_email" class="form-label">Identifiant (mail)</label>
        <input type="email" class="form-control" pattern="(\w+\.?|-?\w+?)+@\w+\.?-?\w+?(\.\w{2,3})+"
          value="<?php echo (isset($_POST['creaco_email'])) ? htmlspecialchars($_POST['creaco_email']) : '' ?>"
          placeholder="monmail@mail.com" name="creaco_email" id="creaco_email" required>
        <div class="invalid-feedback">
          Vous devez entrer une adresse mail valide !
        </div>
      </div>

      <!-- Password -->

      <div class="row col-sm-4 mx-auto" style="margin-bottom: 1rem;">
        <label for="creaco_password" class="form-label">
          Mot de passe
          <br>
          <span style="font-size: 15px;">(doit contenir au moins un chiffre entre 0 et 9, une lettre minuscule, une
            lettre majuscule, pas
            d'espace et un caractère spécial et faire entre 8 et 16 caractères)</span>
        </label>
        <input type="password" class="form-control"
          pattern="^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$"
          value="<?php echo (isset($_POST['creaco_password'])) ? htmlspecialchars($_POST['creaco_password']) : '' ?>"
          placeholder="************" name="creaco_password" id="creaco_password" required>
        <div class="invalid-feedback">
          Vous devez entrer un mot de passe valide !
        </div>
      </div>

      <!-- Confirm password -->

      <div class="row col-sm-4 mx-auto" style="margin-bottom: 1rem;">
        <label for="creaco_password_conf" class="form-label">
          Confirmer le mot de passe
        </label>
        <input type="password" class="form-control"
          pattern="^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$"
          value="<?php echo (isset($_POST['creaco_password_conf'])) ? htmlspecialchars($_POST['creaco_password_conf']) : '' ?>"
          placeholder="************" name="creaco_password_conf" id="creaco_password_conf" required>
        <div class="invalid-feedback">
          Vous devez entrer un mot de passe valide !
        </div>
      </div>

      <!-- Nb customer -->

      <div class="row col-sm-4 mx-auto" style="margin-bottom: 1rem;">
        <label for="creaco_nbcustomer">Nombre de convives</label>
        <select class="form-select" aria-label="Select nombre convives" name="creaco_nbcustomer">
          <option value="1" <?php echo (isset($_POST['creaco_nbcustomer'])) ? "selected" : "";  ?>>
            1 personne
          </option>
          <option value="2" <?php echo (isset($_POST['creaco_nbcustomer'])) ? "selected" : "";  ?>>
            2 personnes
          </option>
          <option value="3" <?php echo (isset($_POST['creaco_nbcustomer'])) ? "selected" : "";  ?>>
            3 personnes
          </option>
          <option value="4" <?php echo (isset($_POST['creaco_nbcustomer'])) ? "selected" : "";  ?>>
            4 personnes
          </option>
        </select>
      </div>

      <!-- Allergen -->

      <div class="row col-sm-4 mx-auto" style="margin-bottom: 1rem;">
        <label for="creaco_allergen" class="form-label">
          Des allergènes à signaler ?
        </label>
        <textarea name="creaco_allergen" class="form-control" id="creaco_allergen"
          onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9éèê^,]/g,'');" minlength="4" maxlength="255"
          required><?php echo (isset($_POST['creaco_allergen'])) ? htmlspecialchars($_POST['creaco_allergen']) : ''; ?></textarea>
        <div class="invalid-feedback">
          Ce champ ne doit pas être vide ! Si vous n'en avez pas, mettre "Aucun".
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

      <?php

      /* Verify passwords are the same */

      if (isset($_POST['submit_create_compte_form']) && ((test_input($_POST['creaco_password'])) !== (test_input($_POST['creaco_password_conf']))) && $_SERVER['REQUEST_METHOD'] == 'POST') {
      ?>
      <div style="color: #b02a37; margin-bottom: 1rem;">
        Attention, le mot de passe est différent !
      </div>
      <?php

        /* Passwords are the same */

      } elseif (isset($_POST['submit_create_compte_form']) && ((test_input($_POST['creaco_password'])) == (test_input($_POST['creaco_password_conf']))) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $creaco_mail = test_input($_POST['creaco_email']);
        $creaco_password = test_input($_POST['creaco_password']);
        $creaco_nbcustomer = $_POST['creaco_nbcustomer'];
        $creaco_allerg = test_input($_POST['creaco_allergen']);

        /* Verify mail does not already exist */
        /* Check mail in database */

        try {
          $statementcustomail = $pdo->prepare("SELECT customer_mail FROM customer");
          $statementcustomail->execute();
          $verifycustomails = $statementcustomail->fetchAll();
          $mailexist = 0;
          $testmail = $creaco_mail;
        } catch (Exception $e) {
          file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
          echo 'Une erreur s\'est produite, veuillez réessayer: ';
        }

        foreach ($verifycustomails as $verifycustomail) {
          if ($testmail == $verifycustomail['customer_mail']) {
            $mailexist = 1;
          }
        }

        if ($mailexist == 1) {
        ?>
      <div style="color: #b02a37; margin-bottom: 1rem;">
        Votre email n’est pas autorisé à s’inscrire !
      </div>
      <?php
        } else {
          try {
            $statementaddcompt = $pdo->prepare("INSERT INTO customer (customer_id, customer_mail, customer_password,
          customer_nbconv, customer_allergen) VALUES (UUID(), :comptemail, :comptpassword, :comptnbconv, :comptallergen)");
            $statementaddcompt->bindValue(':comptemail', $creaco_mail, PDO::PARAM_STR);
            $statementaddcompt->bindValue(':comptpassword', password_hash($creaco_password, PASSWORD_BCRYPT), PDO::PARAM_STR);
            $statementaddcompt->bindValue(':comptnbconv', $creaco_nbcustomer, PDO::PARAM_INT);
            $statementaddcompt->bindValue(':comptallergen', $creaco_allerg, PDO::PARAM_STR);
            $statementaddcompt->execute();
          ?>

      <!-- Ajout du menu validé -->

      <script type="text/javascript">
      swal("Compte créé", "Vous pouvez dès maintenant l'utiliser !", "success").then((value) => {
        window.location.replace("Espaceconnexion.php");
      });
      </script>

      <?php
          } catch (Exception $e) {
            file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
            echo 'Une erreur s\'est produite, veuillez réessayer: ';
          }
        }
      }
      ?>

      <div style="margin-bottom: 1rem;">
        <button type="submit" name="submit_create_compte_form" class="btn reserve-btn ms-3"
          style="text-transform: uppercase;">
          Créer le compte
        </button>
      </div>
    </form>

  </div>
</section>