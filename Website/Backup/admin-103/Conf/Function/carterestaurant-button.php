<?php
include('../../../Database/connexion.php');
include('./functions.php');

if (isset($_POST['do']) && $_POST['do'] == "Delete") {
  $product_id = $_POST['product_id'];

  $statementdelete = $pdo->prepare("DELETE FROM product WHERE product_id = ?");
  $statementdelete->execute(array($product_id));
}
