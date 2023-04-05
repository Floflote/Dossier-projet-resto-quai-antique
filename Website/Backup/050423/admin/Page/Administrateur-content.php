<?php
try {
  $statementsetting = $pdo->prepare("SELECT * FROM website_setting_v2");
  $statementsetting->execute();
  $options = $statementsetting->fetchAll();
} catch (Exception $e) {
  file_put_contents('dblogs.log', $e->getMessage() . "\n", FILE_APPEND);
  echo 'Une erreur est survenue';
}

try {
  $statementschedule = $pdo->prepare("SELECT * FROM restaurant_schedule");
  $statementschedule->execute();
  $schedules = $statementschedule->fetchAll();
} catch (Exception $e) {
  file_put_contents('dblogs.log', $e->getMessage() . "\n", FILE_APPEND);
  echo 'Une erreur est survenue';
}
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

            <!-- Basics settings -->

            <?php

            foreach ($options as $option) {

            ?>

            <!-- <?php echo $option['setting_form']; ?> Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="<?php echo $option['setting_name']; ?>"><?php echo $option['setting_form']; ?></label>
              <input type="text" class="form-control"
                onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9@^éè^-]/g,'');"
                value="<?php echo $option['setting_value'] ?>" name="<?php echo $option['setting_name']; ?>">
              <?php
                $form_admin = 0;
                if (isset($_POST['save_website_setting'])) {
                  if (empty(test_input($_POST[$option['setting_name']]))) {
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

            <?php
            }
            ?>

            <hr class="rounded">

            <div style="margin-bottom: 1rem;">
              <p>Pour indiquer que le restaurant est fermé toute la journée, mettre 00:00 aux 4 horaires du jours !</p>
              <p>Pour indiquer que le restaurant est fermé soit le midi, soit le soir, mettre 00:00 aux 2 horaires du
                service concerné !</p>
            </div>

            <!-- Schedules settings -->

            <?php
            $i = 1;
            foreach ($schedules as $schedule) {

            ?>

            <!-- <?php echo $schedule['schedule_form']; ?> Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="<?php echo $schedule['schedule_day']; ?>"><?php echo $schedule['schedule_form']; ?></label>
              <input type="time" class="form-control" value="<?php echo $schedule['schedule_time']; ?>"
                name="<?php echo $schedule['schedule_day']; ?>">
            </div>

            <?php
              if (($i == 4)  || ($i == 8) || ($i == 12) || ($i == 16) || ($i == 20) || ($i == 24)) {
                echo '<hr class="rounded">';
              }
              $i++;
            }
            ?>

            <button type="submit" name="save_website_setting" class="btn btn-info float-end"
              style="border-radius: 30px; color: white;">
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

  try {
  foreach ($options as $option) {
    ${$option['setting_name'] . '_modify'} = test_input($_POST[$option['setting_name']]);
    $statementwebsitesettings = $pdo->prepare("UPDATE website_setting_v2 SET 
    setting_value = ? WHERE setting_name = ?");
    $statementwebsitesettings->execute(array(${$option['setting_name'] . '_modify'}, $option['setting_name']));
  }

  foreach ($schedules as $schedule) {
    ${$schedule['schedule_day'] . '_modify'} = $_POST[$schedule['schedule_day']];
    $statementschedulesetting = $pdo->prepare("UPDATE restaurant_schedule SET schedule_time = ? WHERE schedule_day = ?");
    $statementschedulesetting->execute(array(${$schedule['schedule_day'] . '_modify'}, $schedule['schedule_day']));
  }

?>
<!-- Modification du site validée -->

<script type="text/javascript">
Swal.fire("Validé", "Les valeurs du site ont bien été modifiées", "success").then((value) => {
  window.location.replace("Administrateur.php");
});
</script>
<?php
  } catch (Exception $e) {
    file_put_contents('dblogs.log', $e->getMessage() . "\n", FILE_APPEND);
    echo 'Une erreur est survenue';
  }
}