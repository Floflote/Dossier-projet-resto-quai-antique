<!-- Bandeau Top -->

<section style="
    background: url(./Picture/Burger-zoom.jpeg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
  <div class="text-center py-5">
    <h1
      style="font-size: 50px; color: white; text-transform: uppercase; paint-order: stroke fill; stroke-color: #a4872c; stroke-width: 5px; text-shadow: -1px -1px 0 #a4872c, 1px -1px 0 #a4872c, -1px 1px 0 #a4872c, 1px 1px 0 #a4872c;">
      Espace connexion
    </h1>
  </div>

</section>

<!-- Form connect compte -->

<section class="connect_compte_section p-5">
  <div class="container-fluid text-center">
    <h1>Se connecter à votre compte</h1>
    <form method="POST" id="formconnect" class="needs-validation" action="Espaceconnexion.php"
      enctype="multipart/form-data" novalidate>

      <!-- Mail -->

      <div class="row col-sm-4 mx-auto" style="margin-bottom: 1rem;">
        <label for="connect_email" class="form-label">Identifiant (mail)</label>
        <input type="email" class="form-control" pattern="(\w+\.?|-?\w+?)+@\w+\.?-?\w+?(\.\w{2,3})+"
          value="<?php echo (isset($_POST['connect_email'])) ? htmlspecialchars($_POST['connect_email']) : '' ?>"
          placeholder="monmail@mail.com" name="connect_email" id="connect_email" required>
        <div class="invalid-feedback">
          Vous devez entrer une adresse mail valide !
        </div>
      </div>

      <!-- Password -->

      <div class="row col-sm-4 mx-auto" style="margin-bottom: 1rem;">
        <label for="connect_password" class="form-label">
          Mot de passe
        </label>
        <input type="password" class="form-control"
          pattern="^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$"
          value="<?php echo (isset($_POST['connect_password'])) ? htmlspecialchars($_POST['connect_password']) : '' ?>"
          placeholder="************" name="connect_password" id="connect_password" required>
        <div class="invalid-feedback">
          Vous devez entrer un mot de passe valide !
        </div>
      </div>

      <?php
      if (isset($_POST['submit_connect_form']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $connect_mail = test_input($_POST['connect_email']);
        $connect_password = test_input($_POST['connect_password']);

        try {
          $statementcocompte = $pdo->prepare("SELECT * FROM customer WHERE customer_mail = ?");
          $statementcocompte->execute(array($connect_mail));
          $compte_customer = $statementcocompte->fetch();

          $statementverifadmin = $pdo->prepare("SELECT * FROM admin WHERE admin_email = ?");
          $statementverifadmin->execute(array($connect_mail));
          $compte_admin = $statementverifadmin->fetch();

          /* Verify admin */

          if ($compte_admin) {
            if (password_verify($connect_password, $compte_admin['admin_password'])) {
              $_SESSION['identifiant_co_session_admin'] = $connect_mail;
              $_SESSION['password_co_session_admin'] = $connect_password;
      ?>

      <!-- Connexion validée -->

      <script type="text/javascript">
      swal("Connecté", "Bonjour administrateur !", "success").then((value) => {
        window.location.replace("./admin/index.php");
      });
      </script>
      <?php
              die();
            }
          }

          /* Verify user account */

          if ($compte_customer === false) {
            ?>
      <div style="color: #b02a37; margin-bottom: 1rem;">
        Identifiant et / ou mot de passe invalide !
      </div>
      <?php

            /* Verify password */

          } else {
            if (password_verify($connect_password, $compte_customer['customer_password'])) {
              $recup_nbconv = $compte_customer['customer_nbconv'];
              $recup_allergen = $compte_customer['customer_allergen'];

              $_SESSION['identifiant_co_session'] = $connect_mail;
              $_SESSION['password_co_session'] = $connect_password;
              $_SESSION['nbcustomers_co_session'] = $recup_nbconv;
              $_SESSION['allergen_co_session'] = $recup_allergen;
              $_SESSION['user_connected'] = 1;
            ?>

      <!-- Connexion validée -->

      <script type="text/javascript">
      swal("Connecté", "Vous pouvez réserver une table dès maintenant !", "success").then((value) => {
        window.location.replace("Reserve-table.php");
      });
      </script>

      <?php
              die();
            } else {
            ?>
      <div style="color: #b02a37; margin-bottom: 1rem;">
        Identifiant et / ou mot de passe invalide !
      </div>
      <?php
            }
          }
        } catch (Exception $e) {
          file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
          echo 'Une erreur s\'est produite, veuillez réessayer: ';
        }
      }
      ?>

      <div style="margin-bottom: 1rem;">
        <button type="submit" name="submit_connect_form" class="btn reserve-btn ms-3"
          style="text-transform: uppercase;">
          Se connecter
        </button>
      </div>
    </form>
  </div>
</section>

<!-- Links -->

<section>
  <div class="container-fluid text-center">
    <p>Mot de passe oublié ?
      <a class="links" href="#">Cliquer ici</a>
    </p>
    <p>Pas encore de compte ?
      <a class="links" href="./Creationcompte.php">En créer un ici</a>
    </p>
  </div>
</section>