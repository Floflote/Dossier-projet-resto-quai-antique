<?php

try {
  $statement_website_setting_content = $pdo->prepare("SELECT * FROM website_setting");
  $statement_website_setting_content->execute();
  $website_setting_content = $statement_website_setting_content->fetch();
} catch (Exception $e) {
  file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
  echo 'Une erreur s\'est produite, veuillez réessayer: ';
}
?>

<!-- Top section -->

<section class="top-section-background">
  <div class="container">
    <div class="row" style="flex-wrap: nowrap;">
      <div style="padding-top: 50px; color: white;">
        <h1 style="font-family: Montserrat, sans-serif;">
          <?php echo $website_setting_content['setting_restaurant_name']; ?>,
        </h1>
        <h2>
          votre restaurant qui répond à vos attentes !
        </h2>
        <hr>
        <p>
          Notre cuisine surprendra vos papilles comme des papillons.
        </p>
        <div class="d-flex">
          <a href="#sectioncarte" class="btn see-product-btn me-3" style="text-transform: uppercase;">
            Voir la carte
          </a>
          <?php include('./Conf/Template/Btn-resa.php'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Introduce product section -->

<section class="intro-product" style="padding:100px 50px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="text-center">
          <img style="width: 230px;" src="./Picture/Picto-chef.svg" class="my-3">
          <h3>
            Nos chefs à votre écoute
          </h3>
          <p>
            Tous nos chefs sont à l’écoute de vos besoins et feront en sorte de vous servir le meilleur des plats dans
            les meilleurs conditions afin de vous satisfaire du mieux possible.
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="text-center">
          <img style="width: 230px;" src="./Picture/Picto-food.svg" class="my-3">
          <h3>
            Des produits de qualité
          </h3>
          <p>
            Tous nos produits proviennent d’éleveurs et d’agriculteurs de la région (pour la grande majorité des
            produits) afin de vous fournir la meilleure expérience gustative possible.
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="text-center">
          <img style="width: 230px;" src="./Picture/Picto-bio.svg" class="my-3">
          <h3>
            Des produits bio
          </h3>
          <p>
            Tous nos produits sont issus du commerce biologique afin que leur goût ne soit pas altéré par des produits
            chimiques et de rester en meilleure santé.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Product section -->

<section class="products py-4" id="sectioncarte" style="padding:100px 50px;">
  <div class="container">
    <h2 class="text-center mb-4">Notre carte</h2>

    <!-- Display products -->

    <div>

      <!-- Choice category -->

      <div>
        <ul class="text-center mb-4">
          <?php
          try {
            $statement_category = $pdo->prepare("SELECT * FROM category");
            $statement_category->execute();
            $categories = $statement_category->fetchAll();
          } catch (Exception $e) {
            file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
            echo 'Une erreur s\'est produite, veuillez réessayer: ';
          }

          $x = 0;

          foreach ($categories as $category) {
            if ($x == 0) {
              echo "<li class = 'product_category_name choice_category_link active_category' onclick=showCategoryProduct(event,'" . str_replace(' ', '', $category['category_name']) . "')>";
              echo "<h5>";
              echo $category['category_name'];
              echo "</h5>";
              echo "</li>";
            } else {
              echo "<li class = 'product_category_name choice_category_link' onclick=showCategoryProduct(event,'" . str_replace(' ', '', $category['category_name']) . "')>";
              echo "<h5>";
              echo $category['category_name'];
              echo "</h5>";
              echo "</li>";
            }

            $x++;
          }
          ?>
        </ul>
      </div>

      <!-- Show products -->

      <div>
        <?php

        $i = 0;

        foreach ($categories as $category) {

          if ($i == 0) {

            /* Product display block */

            echo '<div class="choice_category_content" id="' . str_replace(' ', '', $category['category_name']) . '" style=display:block>';

            try {
              $statement_product = $pdo->prepare("SELECT * FROM product WHERE category_id = ?");
              $statement_product->execute(array($category['category_id']));
              $products = $statement_product->fetchAll();
            } catch (Exception $e) {
              file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
              echo 'Une erreur s\'est produite, veuillez réessayer: ';
            }


            if ($statement_product->rowCount() == 0) {
              echo "<div classe='no_product m-auto'>Pas de produits disponibles encore, revenez bientôt !</div>";
            }

            echo "<div class='row'>";
            foreach ($products as $product) {
        ?>

        <div class="col-md-4 col-lg-3">
          <div class="thumbnail">
            <?php $source = "./admin/Picture/" . $product['product_picture']; ?>

            <div class="product-picture">
              <div class="picture-preview">
                <div style="background-image: url('<?php echo $source; ?>');"></div>
              </div>
            </div>

            <div class="product-text">
              <h5>
                <?php echo $product['product_name']; ?>
              </h5>
              <p>
                <?php echo $product['product_description']; ?>
              </p>
              <span class="product-price">
                <?php echo $product['product_price'] . " €"; ?>
              </span>
            </div>
          </div>
        </div>

        <?php
            }
            echo '</div>';

            echo '</div>';
          } else {

            /* Products display none */

            echo '<div class="choice_category_content" id="' . str_replace(' ', '', $category['category_name']) . '">';

            try {
              $statement_product = $pdo->prepare("SELECT * FROM product WHERE category_id = ?");
              $statement_product->execute(array($category['category_id']));
              $products = $statement_product->fetchAll();
            } catch (Exception $e) {
              file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
              echo 'Une erreur s\'est produite, veuillez réessayer: ';
            }

            if ($statement_product->rowCount() == 0) {
              echo "<div class = 'no_product m-auto'>Pas de produits disponibles encore, revenez bientôt !</div>";
            }

            echo "<div class='row'>";
            foreach ($products as $product) {
            ?>

        <div class="col-md-4 col-lg-3">
          <div class="thumbnail">
            <?php $source = "./admin/Picture/" . $product['product_picture']; ?>
            <div class="product-picture">
              <div class="picture-preview">
                <div style="background-image: url('<?php echo $source; ?>');"></div>
              </div>
            </div>
            <div class="product-text">
              <h5>
                <?php echo $product['product_name']; ?>
              </h5>
              <p>
                <?php echo $product['product_description']; ?>
              </p>
              <span class="product-price">
                <?php echo $product['product_price'] . " €"; ?>
              </span>
            </div>
          </div>
        </div>

        <?php
            }
            echo "</div>";

            echo '</div>';
          }

          $i++;
        }

        echo "</div>";

        ?>
      </div>
    </div>
  </div>
</section>

<!-- Menu section -->

<section class="py-4" id="sectionmenu">
  <div class="container-fluid">
    <h2 class="text-center mb-4">Nos Menus</h2>
    <div class="row justify-content-center">

      <?php
      try {
        $statement_menu = $pdo->prepare("SELECT * FROM menu");
        $statement_menu->execute();
        $menus = $statement_menu->fetchAll();
      } catch (Exception $e) {
        file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
        echo 'Une erreur s\'est produite, veuillez réessayer: ';
      }

      foreach ($menus as $menu) {
      ?>
      <div class="col-md-4 col-lg-3">
        <div class="text-center m-4">
          <h4 style="color: #a4872c">
            <?php echo $menu['menu_name']; ?>
          </h4>
          <h5 style="color: #726023">
            <?php echo $menu['menu_f_options']; ?>
          </h5>
          <p>
            <?php echo $menu['menu_f_description']; ?>
          </p>
          <p class="menu-price">
            <?php echo $menu['menu_f_price']; ?> €
          </p>

          <br>

          <?php

            if (!empty($menu['menu_s_options'])) {
            ?>

          <h5 style="color: #726023">
            <?php echo $menu['menu_s_options']; ?>
          </h5>
          <p>
            <?php echo $menu['menu_s_description']; ?>
          </p>
          <p class="menu-price">
            <?php echo $menu['menu_s_price']; ?> €
          </p>

          <?php
            }
            ?>

        </div>
      </div>

      <?php
      }
      ?>

    </div>
  </div>
</section>

<!-- Galerie section -->

<section class="py-4" id="sectiongalerie">
  <div class="container-fluid p-4">
    <h2 class="text-center mb-4">Galerie d'images</h2>

    <?php
    try {
      $statement_pictures_gal = $pdo->prepare("SELECT * FROM picture");
      $statement_pictures_gal->execute();
      $pictures_gal = $statement_pictures_gal->fetchAll();
    } catch (Exception $e) {
      file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
      echo 'Une erreur s\'est produite, veuillez réessayer: ';
    }

    echo "<div class = 'row justify-content-center'>";

    foreach ($pictures_gal as $picture_gal) {
      echo "<div class = 'col-md-4 p-4 content-gal' style='position: relative;'>";
      $source = "./admin/Picture/" . $picture_gal['picture_image'];
    ?>

    <div
      style="background-image: url('<?php echo $source; ?>');background-repeat: no-repeat;background-position: 50% 50%;background-size: cover;background-clip: border-box;box-sizing: border-box;overflow: hidden;height: 300px; border-radius: 30px; border: 6px solid #a4872c;">
    </div>
    <div class="content-gal-overlay">
      <h5 class="content-gal-text-overlay text-center"><?php echo $picture_gal['picture_name']; ?></h5>
    </div>

    <?php
      echo "</div>";
    }

    echo "</div>";
    ?>
  </div>
</section>

<!-- Btn resa section -->

<section class="py-4" id="sectionbtnresa">
  <div class="container-fluid p-4 text-center">
    <?php include('./Conf/Template/Btn-resa.php'); ?>
  </div>
</section>