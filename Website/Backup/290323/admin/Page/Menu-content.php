<?php
$task = '';
if (isset($_GET['do']) && in_array(htmlspecialchars($_GET['do']), array('Add', 'Modify'))) {
  $task = $_GET['do'];
} else {
  $task = 'Control';
}

if ($task == 'Control') {
  try {
    $statementmenu = $pdo->prepare("SELECT * FROM menu");
    $statementmenu->execute();
    $menus = $statementmenu->fetchAll();
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
      Menus du restaurant
    </h1>

    <div class="card">
      <div class="card-header" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
        Menus du restaurant
      </div>
      <div class="card-body">

        <!-- Button add new product -->

        <div class="above-table">
          <a href="Menu.php?do=Add" class="btn btn-success btn-sm" style="margin-bottom: 10px; border-radius: 30px;">
            <i class="fa fa-plus"></i>
            Ajouter un menu
          </a>
        </div>

        <!-- Product tab-->
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="text-center">
              <tr>
                <th scope="col">Nom du menu</th>
                <th scope="col">Nom formule 1</th>
                <th scope="col">Description 1</th>
                <th scope="col">Prix 1</th>
                <th scope="col">Nom formule 2</th>
                <th scope="col">Description 2</th>
                <th scope="col">Prix 2</th>
                <th scope="col">Éditer</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($menus as $menu) {
                echo "<tr>";
                echo '<td class="text-center">';
                echo $menu['menu_name'];
                echo "</td>";
                echo "<td>";
                echo $menu['menu_f_options'];
                echo "</td>";
                echo "<td>";
                echo $menu['menu_f_description'];
                echo "</td>";
                echo '<td class="text-center">';
                echo $menu['menu_f_price'] . "€";
                echo "</td>";
                echo "<td>";
                echo $menu['menu_s_options'];
                echo "</td>";
                echo "<td>";
                echo $menu['menu_s_description'];
                echo "</td>";
                echo '<td class="text-center">';
                if ($menu['menu_s_price'] == null) {
                  echo "";
                } else {
                  echo $menu['menu_s_price'] . "€";
                }
                echo "</td>";
                echo '<td class="text-center">';
                /* Divers buttons Editer tab */
                $delete_data = "delete_" . $menu['menu_id'];
                $view_data = "view_" . $menu['menu_id'];
              ?>

                <ul class="list-inline m-0">

                  <!-- Button modify -->

                  <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-title="Modifier" data-bs-placement="top">
                    <button class="btn btn-success btn-sm">
                      <a href="Menu.php?do=Modify&menu_id=<?php echo $menu['menu_id']; ?>" style="color: white;">
                        <i class="fa fa-edit"></i>
                      </a>
                    </button>
                  </li>

                  <!-- Button delete-->

                  <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-title="Supprimer" data-bs-placement="top">
                    <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#<?php echo $delete_data; ?>">
                      <i class="fa fa-trash"></i>
                    </button>

                    <!-- Modal delete -->

                    <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1" aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" style="text-transform: uppercase;
                        font-family: Montserrat, sans-serif;
                        font-weight: bold;
                        font-size: 1rem;">
                              Supprimer un menu
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                          </div>
                          <div class="modal-body">
                            Êtes-vous sur de vouloir supprimer ce menu
                            "<?php echo ($menu['menu_name']); ?>"?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" style="border-radius: 30px;" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" data-id="<?php echo $menu['menu_id']; ?>" class="btn btn-warning delete_menu_button" id="delete_menu_button" style="border-radius: 30px; color: white;">Supprimer</button>
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

/*** Add new menu ***/

elseif ($task == 'Add') {
?>

  <div style="padding:20px">
    <h1 style="text-transform: uppercase;
  font-family: Montserrat, sans-serif;
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
  font-weight: bold;">
      Menus du restaurant
    </h1>

    <div class="card">
      <div class="card-header" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
        Ajouter un menu
      </div>
      <div class="card-body">
        <form method="POST" action="Menu.php?do=Add" enctype="multipart/form-data">
          <div class="form-add-product">
            <div class="form-add-product-header">
              <div class="main-title">
                Ajouter un menu
              </div>
            </div>
            <div class="form-add-product-body">

              <!-- Menu name -->

              <div style="margin-bottom: 1rem;">
                <label for="menu_name">Nom du menu</label>
                <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9éèê^]/g,'');" value="<?php echo (isset($_POST['menu_name'])) ? htmlspecialchars($_POST['menu_name']) : '' ?>" placeholder="Menu du marché" name="menu_name">
                <?php
                $check_add_menu_form = 0;
                if (isset($_POST['add_new_menu'])) {
                  if (empty(test_input($_POST['menu_name']))) {
                ?>
                    <div class="invalid-feedback" style="display: block;">
                      Vous devez ajouter un nom au menu !
                    </div>
                <?php
                    $check_add_menu_form = 1;
                  }
                }
                ?>
              </div>

              <!-- Menu formule 1 -->

              <div style="margin-bottom: 1rem;">
                <label for="menu_f_options">Nom de la formule 1</label>
                <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9éèê^]/g,'');" value="<?php echo (isset($_POST['menu_f_options'])) ? htmlspecialchars($_POST['menu_f_options']) : '' ?>" placeholder="Formule du midi" name="menu_f_options">
                <?php
                $check_add_menu_form = 0;
                if (isset($_POST['add_new_menu'])) {
                  if (empty(test_input($_POST['menu_f_options']))) {
                ?>
                    <div class="invalid-feedback" style="display: block;">
                      Vous devez ajouter un nom a la formule 1 !
                    </div>
                <?php
                    $check_add_menu_form = 1;
                  }
                }
                ?>
              </div>

              <!-- Menu description 1 -->

              <div style="margin-bottom: 1rem;">
                <label for="menu_f_description">Description de la formule 1</label>
                <textarea class="form-control" name="menu_f_description" style="resize: none;" placeholder="Du lundi au vendredi, entrée + plat + dessert"><?php echo (isset($_POST['menu_f_description'])) ? htmlspecialchars($_POST['menu_f_description']) : ''; ?></textarea>
                <?php
                if (isset($_POST['add_new_menu'])) {
                  if (empty(test_input($_POST['menu_f_description']))) {
                ?>
                    <div class="invalid-feedback" style="display: block;">
                      Vous devez ajouter une description a la formule 1 !
                    </div>
                  <?php
                    $check_add_menu_form = 1;
                  } elseif (strlen(test_input($_POST['menu_f_description'])) > 255) {
                  ?>
                    <div class="invalid-feedback" style="display: block;">
                      La longueur de la description ne doit pas dépasser 255 caractères !
                    </div>
                <?php
                    $check_add_menu_form = 1;
                  }
                }
                ?>
              </div>

              <!-- Menu price 1 -->

              <div style="margin-bottom: 1rem;">
                <label for="menu_f_price">Prix de la formule 1 (€)</label>
                <input type="text" class="form-control" value="<?php echo (isset($_POST['menu_f_price'])) ? htmlspecialchars($_POST['menu_f_price']) : '' ?>" placeholder="30.00" name="menu_f_price">
                <?php
                if (isset($_POST['add_new_menu'])) {
                  if (empty(test_input($_POST['menu_f_price']))) {
                ?>
                    <div class="invalid-feedback" style="display: block;">
                      Vous devez ajouter un prix a la formule 1 !
                    </div>
                  <?php
                    $check_add_menu_form = 1;
                  } elseif (!is_numeric(test_input($_POST['menu_f_price']))) {
                  ?>
                    <div class="invalid-feedback" style="display: block;">
                      Format invalide !
                    </div>
                <?php
                    $check_add_menu_form = 1;
                  }
                }
                ?>
              </div>

              <!-- Menu formule 2 -->

              <div style="margin-bottom: 1rem;">
                <label for="menu_s_options">Nom de la formule 2</label>
                <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Zéèê^0-9]/g,'');" value="<?php echo (isset($_POST['menu_s_options'])) ? htmlspecialchars($_POST['menu_s_options']) : '' ?>" placeholder="Formule du soir" name="menu_s_options">
              </div>

              <!-- Menu description 2 -->

              <div style="margin-bottom: 1rem;">
                <label for="menu_s_description">Description de la formule 2</label>
                <textarea class="form-control" name="menu_s_description" style="resize: none;" placeholder="Du lundi au vendredi, entrée + plat + dessert"><?php echo (isset($_POST['menu_s_description'])) ? htmlspecialchars($_POST['menu_s_description']) : ''; ?></textarea>
                <?php
                if (isset($_POST['add_new_menu'])) {
                  if (strlen(test_input($_POST['menu_s_description'])) > 255) {
                ?>
                    <div class="invalid-feedback" style="display: block;">
                      La longueur de la description ne doit pas dépasser 255 caractères !
                    </div>
                <?php
                    $check_add_menu_form = 1;
                  }
                }
                ?>
              </div>

              <!-- Menu price 2 -->

              <div style="margin-bottom: 1rem;">
                <label for="menu_s_price">Prix de la formule 2 (€)</label>
                <input type="text" class="form-control" value="<?php echo (isset($_POST['menu_s_price'])) ? htmlspecialchars($_POST['menu_s_price']) : '' ?>" placeholder="40.00" name="menu_s_price" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');">
              </div>

              <button type="submit" name="add_new_menu" class="btn btn-info float-end" style="border-radius: 30px; color: white;">
                Ajouter le menu
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  /*** Add new menu ***/

  if (isset($_POST['add_new_menu']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $check_add_menu_form == 0) {
    $menu_name = test_input($_POST['menu_name']);
    $menu_f_options = $_POST['menu_f_options'];
    $menu_f_description = test_input($_POST['menu_f_description']);
    $menu_f_price = test_input($_POST['menu_f_price']);
    $menu_s_options = $_POST['menu_s_options'];
    $menu_s_description = test_input($_POST['menu_s_description']);
    $menu_s_price = test_input($_POST['menu_s_price']);
    if (empty($menu_s_price)) {
      $menu_s_price = null;
    }

    try {
      $statementadddone = $pdo->prepare("INSERT INTO menu(menu_name,menu_f_options,menu_f_description,menu_f_price,menu_s_options,menu_s_description,menu_s_price) VALUES (?,?,?,?,?,?,?) ");
      $statementadddone->execute(array($menu_name, $menu_f_options, $menu_f_description, $menu_f_price, $menu_s_options, $menu_s_description, $menu_s_price));
  ?>

      <!-- Ajout du menu validé -->

      <script type="text/javascript">
        swal("Validé", "Le nouveau menu a bien été ajouté !", "success").then((value) => {
          window.location.replace("Menu.php");
        });
      </script>

    <?php
    } catch (Exception $e) {
      file_put_contents('dblogs.log', $e->getMessage() . "\n", FILE_APPEND);
      echo 'Une erreur est survenue';
    }
  }
}

/*** Modify a menu ***/

elseif ($task == 'Modify') {
  $menu_id = (isset($_GET['menu_id']) && is_numeric($_GET['menu_id'])) ? intval($_GET['menu_id']) : 0;
  if ($menu_id) {
    try {
      $statementmodify = $pdo->prepare('SELECT * FROM menu WHERE menu_id = ?');
      $statementmodify->execute(array($menu_id));
      $menu = $statementmodify->fetch();
      $count = $statementmodify->rowCount();
    } catch (Exception $e) {
      file_put_contents('dblogs.log', $e->getMessage() . "\n", FILE_APPEND);
      echo 'Une erreur est survenue';
    }
    if ($count > 0) {
    ?>

      <div style="padding:20px">
        <h1 style="text-transform: uppercase;
  font-family: Montserrat, sans-serif;
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
  font-weight: bold;">
          Menus du restaurant
        </h1>

        <div class="card">
          <div class="card-header" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
            Modifier un menu
          </div>
          <div class="card-body">
            <form method="POST" action="Menu.php?do=Modify&menu_id=<?php echo $menu['menu_id'] ?>" enctype="multipart/form-data">
              <div class="form-add-product">
                <div class="form-add-product-header">
                  <div class="main-title">
                    <?php echo $menu['menu_name']; ?>
                  </div>
                </div>
                <div class="form-add-product-body">

                  <!-- Id product -->

                  <input type="hidden" name="menu_id" value="<?php echo $menu['menu_id']; ?>">


                  <!-- Menu name Modify -->

                  <div style="margin-bottom: 1rem;">
                    <label for="menu_name">Nom du menu</label>
                    <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9éèê^]/g,'');" value="<?php echo $menu['menu_name'] ?>" placeholder="Sushi au thon" name="menu_name">
                    <?php
                    $check_modify_menu_form = 0;
                    if (isset($_POST['modify_menu_sbmt'])) {
                      if (empty(test_input($_POST['menu_name']))) {
                    ?>
                        <div class="invalid-feedback" style="display: block;">
                          Vous devez ajouter un nom au menu !
                        </div>
                    <?php
                        $check_modify_menu_form = 1;
                      }
                    }
                    ?>
                  </div>

                  <!-- Menu formule 1 Modify -->

                  <div style="margin-bottom: 1rem;">
                    <label for="menu_f_options">Nom de la formule 1</label>
                    <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9éèê^]/g,'');" value="<?php echo $menu['menu_f_options'] ?>" placeholder="Formule du midi" name="menu_f_options">
                    <?php
                    $check_modify_menu_form = 0;
                    if (isset($_POST['modify_menu_sbmt'])) {
                      if (empty(test_input($_POST['menu_f_options']))) {
                    ?>
                        <div class="invalid-feedback" style="display: block;">
                          Vous devez ajouter un nom a la formule 1 !
                        </div>
                    <?php
                        $check_modify_menu_form = 1;
                      }
                    }
                    ?>
                  </div>

                  <!-- Menu description 1 Modify -->

                  <div style="margin-bottom: 1rem;">
                    <label for="menu_f_description">Description du produit</label>
                    <textarea class="form-control" name="menu_f_description" style="resize: none;" placeholder="Du lundi au vendredi, entrée + plat + dessert"><?php echo $menu['menu_f_description']; ?></textarea>
                    <?php
                    if (isset($_POST['modify_menu_sbmt'])) {
                      if (empty(test_input($_POST['menu_f_description']))) {
                    ?>
                        <div class="invalid-feedback" style="display: block;">
                          Vous devez ajouter une description a la formule 1 !
                        </div>
                      <?php
                        $check_modify_menu_form = 1;
                      } elseif (strlen(test_input($_POST['menu_f_description'])) > 255) {
                      ?>
                        <div class="invalid-feedback" style="display: block;">
                          La longueur de la description ne doit pas dépasser 255 caractères !
                        </div>
                    <?php
                        $check_modify_menu_form = 1;
                      }
                    }
                    ?>
                  </div>

                  <!-- Menu price 1 Modify -->

                  <div style="margin-bottom: 1rem;">
                    <label for="menu_f_price">Prix de la formule 1 (€)</label>
                    <input type="text" class="form-control" value="<?php echo $menu['menu_f_price'] ?>" placeholder="30.00" name="menu_f_price">
                    <?php
                    if (isset($_POST['modify_menu_sbmt'])) {
                      if (empty(test_input($_POST['menu_f_price']))) {
                    ?>
                        <div class="invalid-feedback" style="display: block;">
                          Vous devez ajouter un prix a la formule 1 !
                        </div>
                      <?php
                        $check_modify_menu_form = 1;
                      } elseif (!is_numeric(test_input($_POST['menu_f_price']))) {
                      ?>
                        <div class="invalid-feedback" style="display: block;">
                          Format invalide ! (Valide: XX.XX)
                        </div>
                    <?php

                        $check_modify_menu_form = 1;
                      }
                    }
                    ?>
                  </div>

                  <!-- Menu formule 2 Modify -->

                  <div style="margin-bottom: 1rem;">
                    <label for="menu_s_options">Nom de la formule 2</label>
                    <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z0-9éèê^]/g,'');" value="<?php echo $menu['menu_s_options'] ?>" placeholder="Formule du soir" name="menu_s_options">
                    <?php
                    $check_modify_menu_form = 0;
                    ?>
                  </div>

                  <!-- Menu description 2 Modify -->

                  <div style="margin-bottom: 1rem;">
                    <label for="menu_s_description">Description de la formule 2</label>
                    <textarea class="form-control" name="menu_s_description" style="resize: none;" placeholder="Du lundi au vendredi, entrée + plat + dessert"><?php echo $menu['menu_s_description']; ?></textarea>
                    <?php
                    if (isset($_POST['modify_menu_sbmt'])) {
                      if (strlen(test_input($_POST['menu_s_description'])) > 255) {
                    ?>
                        <div class="invalid-feedback" style="display: block;">
                          La longueur de la description ne doit pas dépasser 255 caractères !
                        </div>
                    <?php
                        $check_modify_menu_form = 1;
                      }
                    }
                    ?>
                  </div>

                  <!-- Menu price 2 Modify -->

                  <div style="margin-bottom: 1rem;">
                    <label for="menu_s_price">Prix de la formule 2 (€)</label>
                    <input type="text" class="form-control" value="<?php echo $menu['menu_s_price'] ?>" placeholder="40.00" name="menu_s_price">
                  </div>

                  <button type="submit" name="modify_menu_sbmt" class="btn btn-info float-end" style="border-radius: 30px; color: white;">
                    Modifier le menu
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <?php
      /*** Modify menu ***/

      if (isset($_POST['modify_menu_sbmt']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $check_modify_menu_form == 0) {
        $menu_id_m = test_input($_POST['menu_id']);
        $menu_name_m = test_input($_POST['menu_name']);
        $menu_f_options_m = test_input($_POST['menu_f_options']);
        $menu_f_description_m = test_input($_POST['menu_f_description']);
        $menu_f_price_m = test_input($_POST['menu_f_price']);
        $menu_s_options_m = test_input($_POST['menu_s_options']);
        $menu_s_description_m = test_input($_POST['menu_s_description']);
        $menu_s_price_m = test_input($_POST['menu_s_price']);
        if (empty($menu_s_price_m)) {
          $menu_s_price_m = null;
        }

        try {
          $statementmodifyone = $pdo->prepare("UPDATE menu SET menu_name = ?, menu_f_options = ?, menu_f_description = ?, menu_f_price = ?, menu_s_options = ?, menu_s_description = ?, menu_s_price = ? where menu_id = ? ");
          $statementmodifyone->execute(array($menu_name_m, $menu_f_options_m, $menu_f_description_m, $menu_f_price_m, $menu_s_options_m, $menu_s_description_m, $menu_s_price_m, $menu_id_m));
      ?>

          <!-- Modification du menu validé-->

          <script type="text/javascript">
            swal("Validé", "Le menu a bien été modifié", "success").then((value) => {
              window.location.replace("Menu.php");
            });
          </script>

<?php

        } catch (Exception $e) {
          file_put_contents('dblogs.log', $e->getMessage() . "\n", FILE_APPEND);
          echo 'Une erreur est survenue';
        }
      }
    }
  }
}
?>