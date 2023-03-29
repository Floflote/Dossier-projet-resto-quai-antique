<?php

$statementsetting = $pdo->prepare("SELECT * FROM website_setting");
$statementsetting->execute();
$options = $statementsetting->fetch();

?>

<div style="padding:20px">
  <h1 style="text-transform: uppercase;
  font-family: Montserrat, sans-serif;
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
  font-weight: bold;">
    Administrateur
  </h1>

  <div class="card">
    <div class="card-header" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
      Administration du site
    </div>
    <div class="card-body">
      <form method="POST" action="Administrateur.php" enctype="multipart/form-data">
        <div class="form-add-product">
          <div class="form-add-product-header">
            <div class="main-title">
              Modifier le site
            </div>
          </div>

          <div class="form-add-product-body">

            <!-- Restaurant name Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_name">Nom du restaurant</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z]/g,'');" value="<?php echo $options['setting_restaurant_name'] ?>" name="setting_restaurant_name">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_name']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <!-- Restaurant mail Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_mail">Mail du restaurant</label>
              <input type="text" class="form-control" value="<?php echo $options['setting_restaurant_mail'] ?>" name="setting_restaurant_mail">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_mail']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <!-- Restaurant phone Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_phone">Téléphone du restaurant</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" value="<?php echo $options['setting_restaurant_phone'] ?>" name="setting_restaurant_phone">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_phone']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <!-- Restaurant address Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_address">Adresse du restaurant</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9,-]/g,'');" value="<?php echo $options['setting_restaurant_address'] ?>" name="setting_restaurant_address">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_address']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <!-- Restaurant monday hours Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_monday_hours">Horaires du lundi</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9,-]/g,'');" value="<?php echo $options['setting_restaurant_monday_hours'] ?>" name="setting_restaurant_monday_hours">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_monday_hours']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <!-- Restaurant tuesday hours Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_tuesday_hours">Horaires du mardi</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9,-]/g,'');" value="<?php echo $options['setting_restaurant_tuesday_hours'] ?>" name="setting_restaurant_tuesday_hours">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_tuesday_hours']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <!-- Restaurant wednesday hours Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_wednesday_hours">Horaires du mercredi</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9,-]/g,'');" value="<?php echo $options['setting_restaurant_wednesday_hours'] ?>" name="setting_restaurant_wednesday_hours">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_wednesday_hours']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <!-- Restaurant thursday hours Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_thursday_hours">Horaires du jeudi</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9,-]/g,'');" value="<?php echo $options['setting_restaurant_thursday_hours'] ?>" name="setting_restaurant_thursday_hours">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_thursday_hours']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <!-- Restaurant friday hours Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_friday_hours">Horaires du vendredi</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9,-]/g,'');" value="<?php echo $options['setting_restaurant_friday_hours'] ?>" name="setting_restaurant_friday_hours">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_friday_hours']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <!-- Restaurant saturday hours Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_saturday_hours">Horaires du samedi</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9,-]/g,'');" value="<?php echo $options['setting_restaurant_saturday_hours'] ?>" name="setting_restaurant_saturday_hours">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_saturday_hours']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <!-- Restaurant sunday hours Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_sunday_hours">Horaires du dimanche</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9,-]/g,'');" value="<?php echo $options['setting_restaurant_sunday_hours'] ?>" name="setting_restaurant_sunday_hours">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_sunday_hours']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <!-- Restaurant number of customers hours Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="setting_restaurant_nbcustomers">Nombre de places</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" value="<?php echo $options['setting_restaurant_nbcustomers'] ?>" name="setting_restaurant_nbcustomers">
              <?php
              $form_admin = 0;
              if (isset($_POST['save_website_setting'])) {
                if (empty(test_input($_POST['setting_restaurant_nbcustomers']))) {
              ?>
                  <div class="invalid-feedback" style="display: block;">
                    Le champ ne doit pas être nul !
                  </div>
              <?php
                  $form_admin = 1;
                }
              }
              ?>
            </div>

            <button type="submit" name="save_website_setting" class="btn btn-info float-end" style="border-radius: 30px; color: white;">
              Modifier le site
            </button>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>

<?php
if (isset($_POST['save_website_setting']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $form_admin == 0) {
  $rest_name_m = test_input($_POST['setting_restaurant_name']);
  $rest_mail_m = test_input($_POST['setting_restaurant_mail']);
  $rest_phone_m = test_input($_POST['setting_restaurant_phone']);
  $rest_address_m = test_input($_POST['setting_restaurant_address']);
  $rest_monday_hours_m = test_input($_POST['setting_restaurant_monday_hours']);
  $rest_tuesday_hours_m = test_input($_POST['setting_restaurant_tuesday_hours']);
  $rest_wednesday_hours_m = test_input($_POST['setting_restaurant_wednesday_hours']);
  $rest_thursday_hours_m = test_input($_POST['setting_restaurant_thursday_hours']);
  $rest_friday_hours_m = test_input($_POST['setting_restaurant_friday_hours']);
  $rest_saturday_hours_m = test_input($_POST['setting_restaurant_saturday_hours']);
  $rest_sunday_hours_m = test_input($_POST['setting_restaurant_sunday_hours']);
  $rest_nbcustomers_m = test_input($_POST['setting_restaurant_nbcustomers']);

  try {
    $statementwebsitesettings = $pdo->prepare("UPDATE website_setting SET 
    setting_restaurant_name = ?,
    setting_restaurant_mail = ?,
    setting_restaurant_phone = ?,
    setting_restaurant_address = ?,
    setting_restaurant_monday_hours = ?,
    setting_restaurant_tuesday_hours = ?,
    setting_restaurant_wednesday_hours = ?,
    setting_restaurant_thursday_hours = ?,
    setting_restaurant_friday_hours = ?,
    setting_restaurant_saturday_hours = ?,
    setting_restaurant_sunday_hours = ?,
    setting_restaurant_nbcustomers = ?");
    $statementwebsitesettings->execute(array(
      $rest_name_m,
      $rest_mail_m,
      $rest_phone_m,
      $rest_address_m,
      $rest_monday_hours_m,
      $rest_tuesday_hours_m,
      $rest_wednesday_hours_m,
      $rest_thursday_hours_m,
      $rest_friday_hours_m,
      $rest_saturday_hours_m,
      $rest_sunday_hours_m,
      $rest_nbcustomers_m
    ));
?>
    <!-- Modification du menu validé-->

    <script type="text/javascript">
      swal("Validé", "Les valeurs du site ont bien été modifiées", "success").then((value) => {
        window.location.replace("Administrateur.php");
      });
    </script>
<?php
  } catch (Exception $e) {
    echo 'Une erreur s\'est produite, veuillez réessayer: ' . $e->getMessage();
  }
}
