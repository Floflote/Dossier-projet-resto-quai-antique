<?php
include('../../../Database/connexion.php');
include('./functions.php');

if (isset($_POST['do']) && $_POST['do'] == "Delete") {
  $picture_id = $_POST['picture_id'];

  $statementdelete = $pdo->prepare("DELETE FROM picture WHERE picture_id = ?");
  $statementdelete->execute(array($picture_id));
}
