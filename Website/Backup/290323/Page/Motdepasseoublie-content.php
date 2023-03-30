<!-- Bandeau Top -->

<section style="
    background: url(./Picture/Burger.jpeg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
  <div class="text-center py-5">
    <h1
      style="font-size: 50px; color: white; text-transform: uppercase; paint-order: stroke fill; stroke-color: #a4872c; stroke-width: 5px; text-shadow: -1px -1px 0 #a4872c, 1px -1px 0 #a4872c, -1px 1px 0 #a4872c, 1px 1px 0 #a4872c;">
      Mot de passe oublié
    </h1>
  </div>

</section>

<!-- Form forget password -->

<section class="forget_compte_section p-5">
  <div class="container-fluid text-center">
    <h1>Votre identifiant</h1>
    <form method="POST" id="formpasswordforget" class="needs-validation" action="Motdepasseoublie.php"
      enctype="multipart/form-data" novalidate>

      <!-- Mail -->

      <div class="row col-sm-4 mx-auto" style="margin-bottom: 1rem;">
        <label for="forget_email" class="form-label">Identifiant (mail)</label>
        <input type="email" class="form-control" pattern="(\w+\.?|-?\w+?)+@\w+\.?-?\w+?(\.\w{2,3})+"
          value="<?php echo (isset($_POST['connect_email'])) ? htmlspecialchars($_POST['connect_email']) : '' ?>"
          placeholder="monmail@mail.com" name="forget_email" id="forget_email" required>
        <div class="invalid-feedback">
          Vous devez entrer une adresse mail valide !
        </div>
      </div>

      <?php
      if (isset($_POST['submit_forget_form']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $forget_mail = test_input($_POST['forget_email']);

        try {
          $statementcocompte = $pdo->prepare("SELECT * FROM customer WHERE customer_mail = ?");
          $statementcocompte->execute(array($forget_mail));
          $compte_customer = $statementcocompte->fetch();

          $statementverifadmin = $pdo->prepare("SELECT * FROM admin WHERE admin_email = ?");
          $statementverifadmin->execute(array($forget_mail));
          $compte_admin = $statementverifadmin->fetch();

          /* Verify admin */

          if ($compte_admin) {
      ?>
      <div style="color: #b02a37; margin-bottom: 1rem;">
        Identifiant invalide !
      </div>
      <?php

            /* Verify user account */

          } elseif ($compte_customer === false) {
          ?>
      <div style="color: #b02a37; margin-bottom: 1rem;">
        Identifiant invalide !
      </div>
      <?php

            /* ID valid */

          } else {
            $_SESSION['identifiant_forget_session'] = $forget_mail;
          ?>

      <script type="text/javascript">
      Swal.fire("Redirection", "Vous allez être redirigés afin de pouvoir changer le mot de passe !", "info").then((
        value) => {
        window.location.replace("Motdepasseoublie-phasetwo.php");
      });
      </script>

      <?php
            die();
          }
        } catch (Exception $e) {
          file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
          echo 'Une erreur s\'est produite, veuillez réessayer: ';
        }
      }
      ?>

      <div style="margin-bottom: 1rem;">
        <button type="submit" name="submit_forget_form" class="btn reserve-btn ms-3" style="text-transform: uppercase;">
          Envoyer
        </button>
      </div>
    </form>
  </div>
</section>