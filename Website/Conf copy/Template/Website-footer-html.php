<?php
$statement_website_setting = $pdo->prepare("SELECT * FROM website_setting");
$statement_website_setting->execute();
$website_setting_footer = $statement_website_setting->fetch();
?>

</main>

<!-- Footer -->

<section class="widget_section" style="background-color: #D9D9D9;padding: 100px 0;" id="sectioncontact">
  <footer>
    <div class="container-fluid">
      <div class="row d-flex justify-content-around align-items-center">

        <!-- Logo and social -->

        <div class="col-lg-4 col-md-6 mb-4 text-center">
          <img src="./Picture/Logo.svg" alt="Logo Quai Antique" class="logo-footer mb-4">
          <ul class="list-inline">
            <li class="list-inline-item mx-4"><a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Facebook"><i class="fa-brands fa-facebook fa-2x"></i></a></li>
            <li class="list-inline-item mx-4"><a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Instagram"><i class="fa-brands fa-instagram fa-2x"></i></a></li>
            <li class="list-inline-item mx-4"><a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Twitter"><i class="fa-brands fa-twitter fa-2x"></i></a></li>
          </ul>
        </div>

        <!-- Join us -->

        <div class="col-lg-4 col-md-6 mb-4 text-center">
          <h3 style="font-family: Montserrat, sans-serif; font-weight: bold;">Nous joindre</h3>
          <ul class="list-group list-group-flush">
            <li class="list-group-item" style="background:rgba(0,0,0,0);">
              <span class="underline-text">Notre adresse:</span>
              <?php echo $website_setting_footer['setting_restaurant_address']; ?>
            </li>
            <li class="list-group-item" style="background:rgba(0,0,0,0);">
              <span class="underline-text">Notre mail:</span>
              <a class="custom-link" href="mailto:<?php echo $website_setting_footer['setting_restaurant_mail']; ?>">
                <?php echo $website_setting_footer['setting_restaurant_mail']; ?>
              </a>
            </li>
            <li class="list-group-item" style="background:rgba(0,0,0,0);">
              <span class="underline-text">Notre téléphone:</span>
              <a class="custom-link" href="tel:<?php echo $website_setting_footer['setting_restaurant_phone']; ?>">
                <?php echo $website_setting_footer['setting_restaurant_phone']; ?>
              </a>
            </li>
          </ul>
        </div>

        <!-- Open hours -->

        <div class="col-lg-4 col-md-6 mb-4">
          <h3 style="font-family: Montserrat, sans-serif; font-weight: bold;" class="text-center">Horaires d'ouverture
          </h3>
          <ul class="list-group list-group-flush text-sm-center text-lg-start">
            <li class="list-group-item" style="background:rgba(0,0,0,0);"><span class="underline-text">Lundi:</span>
              <?php echo $website_setting_footer['setting_restaurant_monday_hours']; ?></li>
            <li class="list-group-item" style="background:rgba(0,0,0,0);"><span class="underline-text">Mardi:</span>
              <?php echo $website_setting_footer['setting_restaurant_tuesday_hours']; ?></li>
            <li class="list-group-item" style="background:rgba(0,0,0,0);"><span class="underline-text">Mercredi:</span>
              <?php echo $website_setting_footer['setting_restaurant_wednesday_hours']; ?></li>
            <li class="list-group-item" style="background:rgba(0,0,0,0);"><span class="underline-text">Jeudi:</span>
              <?php echo $website_setting_footer['setting_restaurant_thursday_hours']; ?></li>
            <li class="list-group-item" style="background:rgba(0,0,0,0);"><span class="underline-text">Vendredi:</span>
              <?php echo $website_setting_footer['setting_restaurant_friday_hours']; ?></li>
            <li class="list-group-item" style="background:rgba(0,0,0,0);"><span class="underline-text">Samedi:</span>
              <?php echo $website_setting_footer['setting_restaurant_saturday_hours']; ?></li>
            <li class="list-group-item" style="background:rgba(0,0,0,0);"><span class="underline-text">Dimanche:</span>
              <?php echo $website_setting_footer['setting_restaurant_sunday_hours']; ?></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </footer>
</section>