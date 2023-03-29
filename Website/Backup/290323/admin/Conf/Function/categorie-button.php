<?php
include('../../../Database/connexion.php');
include('./functions.php');

if (isset($_POST['do']) && $_POST['do'] == "Add") {
  $category_name = test_input($_POST['category_name']);

  $checkItem = checkItem("category_name", "category", $category_name);

  if ($checkItem != 0) {
    $message['alert'] = "Attention";
    $message['message'] = "Cette catégorie existe déjà !";
    echo json_encode($message);
    exit();
  } elseif ($checkItem == 0) {
    $statementadd = $pdo->prepare("INSERT INTO category(category_name) values(?) ");
    $statementadd->execute(array($category_name));

    $message['alert'] = "Valide";
    $message['message'] = "La nouvelle catégorie a bien été ajouté !";
    echo json_encode($message);
    exit();
  }
}

if (isset($_POST['do']) && $_POST['do'] == "Delete") {
  $category_id = $_POST['category_id'];

  $statementdelete = $pdo->prepare("DELETE FROM category WHERE category_id = ?");
  $statementdelete->execute(array($category_id));
}
