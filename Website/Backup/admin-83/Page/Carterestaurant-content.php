<?php
$task = '';
if (isset($_GET['do']) && in_array(htmlspecialchars($_GET['do']), array('Add', 'Modify'))) {
  $task = $_GET['do'];
} else {
  $task = 'Control';
}

if ($task == 'Control') {
  $statementproduct = $pdo->prepare("SELECT * FROM product, category WHERE category.category_id = product.category_id");
  $statementproduct->execute();
  $products = $statementproduct->fetchAll();
?>

<div style="padding:20px">
  <h1 style="text-transform: uppercase;
  font-family: Montserrat, sans-serif;
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
  font-weight: bold;">
    Carte du restaurant
  </h1>

  <div class="card">
    <div class="card-header" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
      Carte du restaurant
    </div>
    <div class="card-body">

      <!-- Button add new product -->

      <div class="above-table">
        <a href="Carterestaurant.php?do=Add" class="btn btn-success btn-sm"
          style="margin-bottom: 10px; border-radius: 30px;">
          <i class="fa fa-plus"></i>
          Ajouter un produit
        </a>
      </div>

      <!-- Product tab-->
      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="text-center">
            <tr>
              <th scope="col">Catégorie</th>
              <th scope="col">Nom du produit</th>
              <th scope="col">Description</th>
              <th scope="col">Prix</th>
              <th scope="col">Éditer</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($products as $product) {
                echo "<tr>";
                echo '<td class="text-center">';
                echo $product['category_name'];
                echo "</td>";
                echo "<td style = 'text-transform:capitalize'>";
                echo $product['product_name'];
                echo "</td>";
                echo "<td>";
                echo $product['product_description'];
                echo "</td>";
                echo '<td class="text-center">';
                echo $product['product_price'] . "€";
                echo "</td>";
                echo '<td class="text-center">';
                /* Divers buttons Editer tab */
                $delete_data = "delete_" . $product['product_id'];
                $view_data = "view_" . $product['product_id'];
              ?>

            <ul class="list-inline m-0">

              <!-- Button modify -->

              <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-title="Modifier" data-bs-placement="top">
                <button class="btn btn-success btn-sm">
                  <a href="Carterestaurant.php?do=Modify&product_id=<?php echo $product['product_id']; ?>"
                    style="color: white;">
                    <i class="fa fa-edit"></i>
                  </a>
                </button>
              </li>

              <!-- Button view -->

              <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-title="Voir" data-placement="top">
                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                  data-bs-target="#<?php echo $view_data; ?>">
                  <i class="fa fa-eye"></i>
                </button>

                <!-- Modal view -->

                <div class="modal fade" id="<?php echo $view_data; ?>" tabindex="-1"
                  aria-labelledby="<?php echo $view_data; ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="picture-modal-view">
                          <?php $source = "./Picture/" . $product['product_picture']; ?>
                          <img src="<?php echo $source; ?>">
                          <div class="caption">
                            <h3 class="text-start">
                              <span style="float: right;"><?php echo $product['product_price']; ?>€</span>
                              <span><?php echo $product['product_name']; ?></span>
                            </h3>
                            <p class="text-start">
                              <?php echo $product['product_description']; ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

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
                          Supprimer un produit
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                      </div>
                      <div class="modal-body">
                        Êtes-vous sur de vouloir supprimer ce produit
                        "<?php echo ($product['product_name']); ?>"?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" style="border-radius: 30px;"
                          data-bs-dismiss="modal">Annuler</button>
                        <button type="button" data-id="<?php echo $product['product_id']; ?>"
                          class="btn btn-warning delete_product_bttn" id="delete_product_bttn"
                          style="border-radius: 30px; color: white;">Supprimer</button>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

            </ul>

            <?php
                /* Divers buttons Editer tab */
                echo "</td>";
                echo "</tr>";
              }
              ?>

          </tbody>
        </table>
        <!-- End table -->
      </div>
      <!-- End card body -->
    </div>
    <!-- End card -->
  </div>
</div>

<?php
}

/*** Add new product ***/

elseif ($task == 'Add') {
?>

<div style="padding:20px">
  <h1 style="text-transform: uppercase;
  font-family: Montserrat, sans-serif;
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
  font-weight: bold;">
    Carte du restaurant
  </h1>

  <div class="card">
    <div class="card-header" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
      Ajouter un produit
    </div>
    <div class="card-body">
      <form method="POST" action="Carterestaurant.php?do=Add" enctype="multipart/form-data">
        <div class="form-add-product">
          <div class="form-add-product-header">
            <div class="main-title">
              Ajouter un produit
            </div>
          </div>
          <div class="form-add-product-body">

            <!-- Choice categories -->

            <div style="margin-bottom: 1rem;">
              <?php
                $statementcat = $pdo->prepare("SELECT * FROM category");
                $statementcat->execute();
                $choice_categories = $statementcat->fetchAll();
                ?>
              <label for="product_category">Catégorie</label>
              <select class="form-select" name="product_category">
                <?php
                  foreach ($choice_categories as $category) {
                    echo "<option value = '" . $category['category_id'] . "'>";
                    echo ucfirst($category['category_name']);
                    echo "</option>";
                  }
                  ?>
              </select>
            </div>

            <!-- Product name -->

            <div style="margin-bottom: 1rem;">
              <label for="product_name">Nom du produit</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z]/g,'');"
                value="<?php echo (isset($_POST['product_name'])) ? htmlspecialchars($_POST['product_name']) : '' ?>"
                placeholder="Sushi au thon" name="product_name">
              <?php
                $check_add_product_form = 0;
                if (isset($_POST['add_new_product'])) {
                  if (empty(test_input($_POST['product_name']))) {
                ?>
              <div class="invalid-feedback" style="display: block;">
                Vous devez ajouter un nom au produit !
              </div>
              <?php
                    $check_add_product_form = 1;
                  }
                }
                ?>
            </div>

            <!-- Product description-->

            <div style="margin-bottom: 1rem;">
              <label for="product_description">Description du produit</label>
              <textarea class="form-control" name="product_description" style="resize: none;"
                placeholder="Sushi avec une tranche de thon dessus"><?php echo (isset($_POST['product_description'])) ? htmlspecialchars($_POST['product_description']) : ''; ?></textarea>
              <?php
                if (isset($_POST['add_new_product'])) {
                  if (empty(test_input($_POST['product_description']))) {
                ?>
              <div class="invalid-feedback" style="display: block;">
                Vous devez ajouter une description au produit !
              </div>
              <?php
                    $check_add_product_form = 1;
                  } elseif (strlen(test_input($_POST['product_description'])) > 255) {
                  ?>
              <div class="invalid-feedback" style="display: block;">
                La longueur de la description ne doit pas dépasser 255 caractères !
              </div>
              <?php
                    $check_add_product_form = 1;
                  }
                }
                ?>
            </div>

            <!-- Product price -->

            <div style="margin-bottom: 1rem;">
              <label for="product_price">Prix du produit (€)</label>
              <input type="text" class="form-control"
                value="<?php echo (isset($_POST['product_price'])) ? htmlspecialchars($_POST['product_price']) : '' ?>"
                placeholder="15.00" name="product_price">
              <?php
                if (isset($_POST['add_new_product'])) {
                  if (empty(test_input($_POST['product_price']))) {
                ?>
              <div class="invalid-feedback" style="display: block;">
                Vous devez ajouter un prix au produit !
              </div>
              <?php
                    $check_add_product_form = 1;
                  } elseif (!is_numeric(test_input($_POST['product_price']))) {
                  ?>
              <div class="invalid-feedback" style="display: block;">
                Format invalide !
              </div>
              <?php
                    $check_add_product_form = 1;
                  }
                }
                ?>
            </div>

            <!-- Product picture -->

            <div style="margin-bottom: 1rem;">
              <label for="product_picture">Image du produit</label>
              <div class="picture-upload">
                <div class="picture-edit">
                  <input type='file' name="product_picture" id="add_product_pictureUpload" accept=".png, .jpg, .jpeg" />
                  <label for="add_product_pictureUpload"></label>
                </div>
                <div class="picture-preview">
                  <div id="add_product_picturePreview">
                  </div>
                </div>
              </div>
              <?php
                if (isset($_POST['add_new_product']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                  $picture_Name = $_FILES['product_picture']['name'];
                  $picture_allowed_extension = array("jpeg", "jpg", "png");
                  $picture_split = explode('.', $picture_Name);
                  $extensionfile = end($picture_split);
                  $picture_extension = strtolower($extensionfile);

                  if (empty($_FILES['product_picture']['name'])) {
                ?>
              <div class="invalid-feedback" style="display: block;">
                Vous devez ajouter une image !
              </div>
              <?php
                    $check_add_product_form = 1;
                  }
                  if (!empty($_FILES['product_picture']['name']) && !in_array($picture_extension, $picture_allowed_extension)) {
                  ?>
              <div class="invalid-feedback" style="display: block;">
                Format d'image invalide. Les formats acceptés sont JPEG, JPG and PNG !
              </div>
              <?php
                    $check_add_product_form = 1;
                  }
                }
                ?>
            </div>
            <button type="submit" name="add_new_product" class="btn btn-info"
              style="border-radius: 30px; color: white;">
              Ajouter le produit
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
  /*** Add new product ***/

  if (isset($_POST['add_new_product']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $check_add_product_form == 0) {
    $product_name = test_input($_POST['product_name']);
    $product_category = $_POST['product_category'];
    $product_price = test_input($_POST['product_price']);
    $product_description = test_input($_POST['product_description']);
    $picturefile = rand(0, 100000) . '_' . $_FILES['product_picture']['name'];
    move_uploaded_file($_FILES['product_picture']['tmp_name'], "./Picture/" . $picturefile);

    try {
      $statementadddone = $pdo->prepare("INSERT INTO product(product_name,product_description,product_price,product_picture,category_id) VALUES(?,?,?,?,?) ");
      $statementadddone->execute(array($product_name, $product_description, $product_price, $picturefile, $product_category));
  ?>

<!-- Ajout du produit validé -->

<script type="text/javascript">
swal("Validé", "Le nouveau produit a bien été ajouté !", "success").then((value) => {
  window.location.replace("Carterestaurant.php");
});
</script>

<?php
    } catch (Exception $e) {
      echo 'Une erreur s\'est produite, veuillez réessayer: ' . $e->getMessage();
    }
  }
}

/*** Modify a product ***/

elseif ($task == 'Modify') {
  $product_id = (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) ? intval($_GET['product_id']) : 0;
  if ($product_id) {
    $statementmodify = $pdo->prepare('SELECT * FROM product WHERE product_id = ?');
    $statementmodify->execute(array($product_id));
    $product = $statementmodify->fetch();
    $count = $statementmodify->rowCount();
    if ($count > 0) {
    ?>

<div style="padding:20px">
  <h1 style="text-transform: uppercase;
  font-family: Montserrat, sans-serif;
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
  font-weight: bold;">
    Carte du restaurant
  </h1>

  <div class="card">
    <div class="card-header" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
      Modifier un produit
    </div>
    <div class="card-body">
      <form method="POST" action="Carterestaurant.php?do=Modify&product_id=<?php echo $product['product_id'] ?>"
        enctype="multipart/form-data">
        <div class="form-add-product">
          <div class="form-add-product-header">
            <div class="main-title">
              <?php echo $product['product_name']; ?>
            </div>
          </div>
          <div class="form-add-product-body">

            <!-- Id product -->

            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

            <!-- Choice categories Modify -->

            <div style="margin-bottom: 1rem;">
              <?php
                    $statementcat = $pdo->prepare("SELECT * FROM category");
                    $statementcat->execute();
                    $choice_categories = $statementcat->fetchAll();
                    ?>
              <label for="product_category">Catégorie</label>
              <select class="form-select" name="product_category">
                <?php
                      foreach ($choice_categories as $category) {
                        if ($category['category_id'] == $product['category_id']) {
                          echo "<option value = '" . $category['category_id'] . "' selected>";
                          echo ucfirst($category['category_name']);
                          echo "</option>";
                        } else {
                          echo "<option value = '" . $category['category_id'] . "'>";
                          echo ucfirst($category['category_name']);
                          echo "</option>";
                        }
                      }
                      ?>
              </select>
            </div>

            <!-- Product name Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="product_name">Nom du produit</label>
              <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z]/g,'');"
                value="<?php echo $product['product_name'] ?>" placeholder="Sushi au thon" name="product_name">
              <?php
                    $check_modify_product_form = 0;
                    if (isset($_POST['modify_product_sbmt'])) {
                      if (empty(test_input($_POST['product_name']))) {
                    ?>
              <div class="invalid-feedback" style="display: block;">
                Vous devez ajouter un nom au produit !
              </div>
              <?php
                        $check_modify_product_form = 1;
                      }
                    }
                    ?>
            </div>

            <!-- Product description Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="product_description">Description du produit</label>
              <textarea class="form-control" name="product_description" style="resize: none;"
                placeholder="Sushi avec une tranche de thon dessus"><?php echo $product['product_description']; ?></textarea>
              <?php
                    if (isset($_POST['modify_product_sbmt'])) {
                      if (empty(test_input($_POST['product_description']))) {
                    ?>
              <div class="invalid-feedback" style="display: block;">
                Vous devez ajouter une description au produit !
              </div>
              <?php
                        $check_modify_product_form = 1;
                      } elseif (strlen(test_input($_POST['product_description'])) > 255) {
                      ?>
              <div class="invalid-feedback" style="display: block;">
                La longueur de la description ne doit pas dépasser 255 caractères !
              </div>
              <?php
                        $check_modify_product_form = 1;
                      }
                    }
                    ?>
            </div>

            <!-- Product price Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="product_price">Prix du produit (€)</label>
              <input type="text" class="form-control" value="<?php echo $product['product_price'] ?>"
                placeholder="15.00" name="product_price">
              <?php
                    if (isset($_POST['modify_product_sbmt'])) {
                      if (empty(test_input($_POST['product_price']))) {
                    ?>
              <div class="invalid-feedback" style="display: block;">
                Vous devez ajouter un prix au produit !
              </div>
              <?php
                        $check_modify_product_form = 1;
                      } elseif (!is_numeric(test_input($_POST['product_price']))) {
                      ?>
              <div class="invalid-feedback" style="display: block;">
                Format invalide !
              </div>
              <?php

                        $check_modify_product_form = 1;
                      }
                    }
                    ?>
            </div>

            <!-- Product picture Modify -->

            <div style="margin-bottom: 1rem;">
              <label for="product_picture">Image du produit</label>
              <div class="picture-upload">
                <div class="picture-edit">
                  <input type='file' name="product_picture" id="modify_product_pictureUpload"
                    accept=".png, .jpg, .jpeg" />
                  <label for="modify_product_pictureUpload"></label>
                </div>
                <div class="picture-preview">
                  <?php $source = "./Picture/" . $product['product_picture']; ?>
                  <div style="background-image: url('<?php echo $source; ?>');" id="modify_product_picturePreview">
                  </div>
                </div>
              </div>
              <?php
                    if (isset($_POST['modify_product_sbmt']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                      $picture_Name_m = $_FILES['product_picture']['name'];
                      $picture_allowed_extension_m = array("jpeg", "jpg", "png");
                      $picture_split_m = explode('.', $picture_Name_m);
                      $extension_m = end($picture_split_m);
                      $picture_extension_m = strtolower($extension_m);

                      if (!empty($_FILES['product_picture']['name']) && !in_array($picture_extension_m, $picture_allowed_extension_m)) {
                    ?>
              <div class="invalid-feedback" style="display: block;">
                Format d'image invalide. Les formats acceptés sont JPEG, JPG and PNG !
              </div>
              <?php
                        $check_modify_product_form = 1;
                      }
                    }
                    ?>
            </div>
            <button type="submit" name="modify_product_sbmt" class="btn btn-info"
              style="border-radius: 30px; color: white;">
              Modifier le produit
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
      /*** Modify product ***/

      if (isset($_POST['modify_product_sbmt']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $check_modify_product_form == 0) {
        $product_id_m = test_input($_POST['product_id']);
        $product_name_m = test_input($_POST['product_name']);
        $product_category_m = $_POST['product_category'];
        $product_price_m = test_input($_POST['product_price']);
        $product_description_m = test_input($_POST['product_description']);

        if (empty($_FILES['product_picture']['name'])) {
          try {
            $statementmodifyone = $pdo->prepare("UPDATE product SET product_name = ?, product_description = ?, product_price = ?, category_id = ? where product_id = ? ");
            $statementmodifyone->execute(array($product_name_m, $product_description_m, $product_price_m, $product_category_m, $product_id_m));
      ?>

<!-- Modification du produit validé-->

<script type="text/javascript">
swal("Validé", "Le produit a bien été modifié", "success").then((value) => {
  window.location.replace("Carterestaurant.php");
});
</script>

<?php

          } catch (Exception $e) {
            echo 'Une erreur s\'est produite, veuillez réessayer: ' . $e->getMessage();
          }
        } else {
          $picture_m = rand(0, 100000) . '_' . $_FILES['product_picture']['name'];
          move_uploaded_file($_FILES['product_picture']['tmp_name'], "./Picture/" . $picture_m);
          try {
            $statementmodifypic = $pdo->prepare("UPDATE product  SET product_name = ?, product_description = ?, product_price = ?, category_id = ?, product_picture = ? WHERE product_id = ? ");
            $statementmodifypic->execute(array($product_name_m, $product_description_m, $product_price_m, $product_category_m, $picture_m, $product_id_m));

          ?>
<!-- SUCCESS MESSAGE -->

<script type="text/javascript">
swal("Validé", "Le produit a été modifié avec succès !", "success").then((value) => {
  window.location.replace("Carterestaurant.php");
});
</script>

<?php
          } catch (Exception $e) {
            echo 'Une erreur s\'est produite, veuillez réessayer: ' . $e->getMessage();
          }
        }
      }
    }
  }
}
?>