<!-- Bandeau Top -->

<section style="
    background: url(./Picture/Burger.jpeg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
  <div class="text-center py-5">
    <h1 style="font-size: 50px; color: white; text-transform: uppercase; paint-order: stroke fill; stroke-color: #a4872c; stroke-width: 5px; text-shadow: -1px -1px 0 #a4872c, 1px -1px 0 #a4872c, -1px 1px 0 #a4872c, 1px 1px 0 #a4872c;">
      Mot de passe oublié
    </h1>
  </div>

</section>

<!-- Form forget password -->

<section class="forget_compte_section_ph2 p-5">
  <div class="container-fluid text-center">
    <h1>Changement du mot de passe</h1>
    <form method="POST" id="formpasswordforgetph2" class="needs-validation" action="Motdepasseoublie-phasetwo.php" enctype="multipart/form-data" novalidate>

      <!-- Password -->

      <div class="row col-sm-4 mx-auto" style="margin-bottom: 1rem;">
        <label for="forget_password_ph2" class="form-label">
          Votre nouveau mot de passe
          <br>
          <span style="font-size: 15px;">(doit contenir au moins un chiffre entre 0 et 9, une lettre minuscule, une
            lettre majuscule, pas
            d'espace, un caractère spécial et faire entre 8 et 16 caractères)</span>
        </label>
        <input type="password" class="form-control" pattern="^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$" value="<?php echo (isset($_POST['forget_password_ph2'])) ? htmlspecialchars($_POST['forget_password_ph2']) : '' ?>" placeholder="************" name="forget_password_ph2" id="forget_password_ph2" required>
        <div class="invalid-feedback">
          Vous devez entrer un mot de passe valide !
        </div>
      </div>

      <!-- Confirm password -->

      <div class="row col-sm-4 mx-auto" style="margin-bottom: 1rem;">
        <label for="forget_password_ph2_conf" class="form-label">
          Confirmer le nouveau mot de passe
        </label>
        <input type="password" class="form-control" pattern="^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$" value="<?php echo (isset($_POST['forget_password_ph2_conf'])) ? htmlspecialchars($_POST['forget_password_ph2_conf']) : '' ?>" placeholder="************" name="forget_password_ph2_conf" id="forget_password_ph2_conf" required>
        <div class="invalid-feedback">
          Vous devez entrer un mot de passe valide !
        </div>
      </div>

      <?php

      /* Verify passwords are the same */

      if (isset($_POST['submit_forget_form_ph2']) && ((test_input($_POST['forget_password_ph2'])) !== (test_input($_POST['forget_password_ph2_conf']))) && $_SERVER['REQUEST_METHOD'] == 'POST') {
      ?>
        <div style="color: #b02a37; margin-bottom: 1rem;">
          Attention, le mot de passe est différent !
        </div>
        <?php

        /* Passwords are the same */

      } elseif (isset($_POST['submit_forget_form_ph2']) && ((test_input($_POST['forget_password_ph2'])) == (test_input($_POST['forget_password_ph2_conf']))) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $forget_mail_ph2 = $_SESSION['identifiant_forget_session'];
        $forget_password_ph2 = test_input($_POST['forget_password_ph2']);

        try {
          $statementmodifycustomeracc = $pdo->prepare("UPDATE customer SET customer_password = :forgetpassword WHERE customer_mail = :forgetmail");
          $statementmodifycustomeracc->bindValue(':forgetmail', $forget_mail_ph2, PDO::PARAM_STR);
          $statementmodifycustomeracc->bindValue(':forgetpassword', password_hash($forget_password_ph2, PASSWORD_BCRYPT), PDO::PARAM_STR);
          $statementmodifycustomeracc->execute();
        ?>

          <!-- Modify account valid -->

          <script type="text/javascript">
            Swal.fire("Compte modifié", "Le changement du mot de passe a été effectuée avec succès !", "success").then((
              value) => {
              window.location.replace("Espaceconnexion.php");
            });
          </script>

      <?php
          //Unset variables
          session_unset();

          //Destroy Session
          session_destroy();
          exit();
        } catch (Exception $e) {
          file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
          echo 'Une erreur s\'est produite, veuillez réessayer: ';
        }
      }
      ?>

      <div style="margin-bottom: 1rem;">
        <button type="submit" name="submit_forget_form_ph2" class="btn reserve-btn ms-3" style="text-transform: uppercase;">
          <i class="fa-solid fa-right-left pe-2"></i>Changer le mot de passe
        </button>
      </div>
    </form>
  </div>
</section>