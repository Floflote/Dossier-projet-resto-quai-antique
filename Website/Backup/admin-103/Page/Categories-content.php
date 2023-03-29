<?php
$statementcat = $pdo->prepare("SELECT * FROM category");
$statementcat->execute();
$categories = $statementcat->fetchAll();
?>

<div style="padding:20px">
  <h1 style="text-transform: uppercase;
  font-family: Montserrat, sans-serif;
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
  font-weight: bold;">
    Catégories
  </h1>

  <div class="card">
    <div class="card-header" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
      Catégories de la carte
    </div>
    <div class="card-body">

      <!-- Button add new category -->

      <button class="btn btn-success btn-sm" style="margin-bottom: 10px; border-radius: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#add_new_category">
        <i class="fa fa-plus"></i>
        Ajouter une catégorie
      </button>

      <!-- Modal add new category -->

      <div class="modal fade" id="add_new_category" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="text-transform: uppercase;
              font-family: Montserrat, sans-serif;
              font-weight: bold;
              font-size: 1rem;">
                Ajouter une catégorie</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <label for="category_name" style="font-weight: bold;">Nom de la catégorie</label>
                <input type="text" id="category_name_input" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z]/g,'');" placeholder="Sushi" name="category_name">
                <div id='required_category_name' class="invalid-feedback">
                  Vous devez ajouter une catégorie !
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" style="border-radius: 30px;" data-bs-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-info" style="border-radius: 30px; color: white;" id="add_category_bttn">
                Ajouter la catégorie</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Categories tab -->
      <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
          <thead>
            <tr>
              <th scope="col">Nom de la catégorie</th>
              <th scope="col">Supprimer la catégorie</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($categories as $category) {
              echo "<tr>";
              echo "<td>";
              echo $category['category_name'];
              echo "</td>";
              echo "<td>";
              /* Delete button */
              $delete_data = "delete_" . $category["category_id"];
            ?>
              <ul class="list-inline m-0">

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
                            Supprimer une catégorie
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                          </button>
                        </div>
                        <div class="modal-body">
                          Êtes-vous sur de vouloir supprimer cette catégorie
                          "<?php echo ($category['category_name']); ?>"?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" style="border-radius: 30px;" data-bs-dismiss="modal">Annuler</button>
                          <button type="button" data-id="<?php echo $category['category_id']; ?>" class="btn btn-warning delete_category_btn" style="border-radius: 30px; color: white;">Supprimer</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            <?php
              /* Delete button */
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>