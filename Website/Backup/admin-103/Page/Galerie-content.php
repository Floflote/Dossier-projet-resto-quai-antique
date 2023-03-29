<?php
$statementpicture = $pdo->prepare("SELECT * FROM picture");
$statementpicture->execute();
$pictures = $statementpicture->fetchAll();
?>

<div style="padding:20px">
  <h1 style="text-transform: uppercase;
  font-family: Montserrat, sans-serif;
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
  font-weight: bold;">
    Galerie
  </h1>

  <div class="card">
    <div class="card-header" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
      Galerie
    </div>
    <div class="card-body">

      <!-- Button add new picture -->

      <button class="btn btn-success btn-sm" style="margin-bottom: 10px; border-radius: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#add_new_picture_modal">
        <i class="fa fa-plus"></i>
        Ajouter une image
      </button>

      <!-- Modal add new picture -->

      <div class="modal fade" id="add_new_picture_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title" style="text-transform: uppercase;
              font-family: Montserrat, sans-serif;
              font-weight: bold;
              font-size: 1rem;">
                  Ajouter une image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <!-- Picture name -->

                <div style="margin-bottom: 1rem;">
                  <label for="picture_name">Titre de l'image</label>
                  <input type="text" id="picture_name_input" class="form-control" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z]/g,'');" placeholder="Sushi au saumon" name="picture_name">
                  <?php
                  $check_add_picture_form = 0;
                  if (isset($_POST['add_new_picture'])) {
                    if (empty(test_input($_POST['picture_name']))) {
                  ?>
                      <div class="invalid-feedback" style="display: block;">
                        Vous devez ajouter un titre à l'image !
                      </div>
                  <?php
                      $check_add_picture_form = 1;
                    }
                  }
                  ?>
                </div>

                <!-- Picture image -->

                <div style="margin-bottom: 1rem;">
                  <label for="picture_image">Image</label>
                  <div class="picture-upload">
                    <div class="picture-edit">
                      <input type='file' name="picture_image" id="add_gallery_pictureUpload" accept=".png, .jpg, .jpeg" />
                      <label for="add_gallery_pictureUpload"></label>
                    </div>
                    <div class="picture-preview">
                      <div id="add_gallery_picturePreview">
                      </div>
                    </div>
                  </div>
                  <?php
                  if (isset($_POST['add_new_picture']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                    $picture_Name = $_FILES['picture_image']['name'];
                    $picture_allowed_extension = array("jpeg", "jpg", "png");
                    $picture_split = explode('.', $picture_Name);
                    $extensionfile = end($picture_split);
                    $picture_extension = strtolower($extensionfile);

                    if (empty($_FILES['picture_image']['name'])) {
                  ?> <div class="invalid-feedback" style="display: block;">
                        Vous devez ajouter une image !
                      </div>
                    <?php
                      $check_add_picture_form = 1;
                    }
                    if (!empty($_FILES['picture_image']['name']) && !in_array($picture_extension, $picture_allowed_extension)) {
                    ?>
                      <div class="invalid-feedback" style="display: block;">
                        Format d'image invalide. Les formats acceptés sont JPEG, JPG and PNG !
                      </div>
                  <?php
                      $check_add_picture_form = 1;
                    }
                  }
                  ?>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" style="border-radius: 30px;" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" name="add_new_picture" class="btn btn-info" style="border-radius: 30px; color: white;">Ajouter
                  l'image</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Picture tab -->
      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="text-center">
            <tr>
              <th scope="col">Titre image</th>
              <th scope="col">Image</th>
              <th scope="col">Supprimer image</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($pictures as $picture) {
              echo "<tr>";
              echo '<td class="text-center">';
              echo $picture['picture_name'];
              echo "</td>";
              $src = "./Picture/" . $picture['picture_image'];
              echo '<td class="text-center">';
              echo "<img src='" . $src . "' class='rounded'  style='max-width:110px; max-height:100px;' alt='" . $picture['picture_name'] . "'>";
              echo "</td>";
              echo '<td class="text-center">';
              $delete_data = "delete_" . $picture["picture_id"];
            ?>
              <ul class="list-inline m-0">

                <!-- Button delete -->

                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-title="Supprimer" data-bs-placement="top">
                  <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#<?php echo $delete_data; ?>">
                    <i class="fa fa-trash"></i>
                  </button>

                  <!-- Delete Modal -->

                  <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1" aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" style="text-transform: uppercase;
                        font-family: Montserrat, sans-serif;
                        font-weight: bold;
                        font-size: 1rem;">
                            Supprimer l'image</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Êtes-vous sur de vouloir supprimer cette image
                          "<?php echo ($picture['picture_name']); ?>"
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" style="border-radius: 30px;" data-bs-dismiss="modal">Annuler</button>
                          <button type="button" data-id="<?php echo $picture['picture_id']; ?>" class="btn btn-warning delete_picture_bttn" id="delete_picture_bttn" style="border-radius: 30px; color: white;">Supprimer</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

              </ul>

            <?php
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
/*** Add new picture ***/

if (isset($_POST['add_new_picture']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $check_add_picture_form == 0) {
  $picture_name = test_input($_POST['picture_name']);
  $picturefile = rand(0, 100000) . '_' . $_FILES['picture_image']['name'];
  move_uploaded_file($_FILES['picture_image']['tmp_name'], "./Picture/" . $picturefile);

  try {
    $statementadddone = $pdo->prepare("INSERT INTO picture(picture_name,picture_image) VALUES(?,?) ");
    $statementadddone->execute(array($picture_name, $picturefile));
?>

    <!-- Ajout du produit validé -->

    <script type="text/javascript">
      swal("Validé", "La nouvelle image a bien été ajoutée !", "success").then((value) => {
        window.location.replace("Galerie.php");
      });
    </script>

<?php
  } catch (Exception $e) {
    echo 'Une erreur s\'est produite, veuillez réessayer: ' . $e->getMessage();
  }
}
