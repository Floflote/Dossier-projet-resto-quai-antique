<?php
include('../../../Database/connexion.php');
include('./functions.php');

if (isset($_POST['do']) && $_POST['do'] == "Delete") {
  $reservation_id = $_POST['reservation_id'];

  $statementdelete = $pdo->prepare("DELETE FROM reservation WHERE reservation_id = ?");
  $statementdelete->execute(array($reservation_id));
}