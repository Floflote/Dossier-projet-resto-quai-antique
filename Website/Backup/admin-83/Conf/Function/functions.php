<?php

/* Compte nb elements dans une table */

function countItems($item, $table)
{
  global $pdo;
  $statementCount = $pdo->prepare("SELECT COUNT($item) FROM $table");
  $statementCount->execute();

  return $statementCount->fetchColumn();
}

/* Vérifie si ça existe deja */
function checkItem($select, $from, $value)
{
  global $pdo;
  $statementCheck = $pdo->prepare("SELECT $select FROM $from WHERE $select = ? ");
  $statementCheck->execute(array($value));

  return $statementCheck->rowCount();
}

/* Mise en conformité entrée input */
function test_input($inputform)
{
  $inputform = trim($inputform);
  $inputform = stripslashes($inputform);
  $inputform = htmlspecialchars($inputform);
  return $inputform;
}