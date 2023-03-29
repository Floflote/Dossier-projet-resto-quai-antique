<?php
include('../../../Database/connexion.php');
include('./functions.php');

if (isset($_POST['do']) && $_POST['do'] == "Delete") {
  $customer_id = $_POST['customer_id'];

  $statementdelete = $pdo->prepare("DELETE FROM customer WHERE customer_id = ?");
  $statementdelete->execute(array($customer_id));
}