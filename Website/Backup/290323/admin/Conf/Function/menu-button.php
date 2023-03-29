<?php
include('../../../Database/connexion.php');
include('./functions.php');

if (isset($_POST['do']) && $_POST['do'] == "Delete") {
  $menu_id = $_POST['menu_id'];

  $statementdelete = $pdo->prepare("DELETE FROM menu WHERE menu_id = ?");
  $statementdelete->execute(array($menu_id));
}
