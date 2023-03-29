<?php

/* Compte nb elements dans une table */

function countItems($item, $table)
{
  global $pdo;
  try {
    $statementCount = $pdo->prepare("SELECT COUNT($item) FROM $table");
    $statementCount->execute();
  } catch (Exception $e) {
    file_put_contents('dblogs.log', $e->getMessage() . "\n", FILE_APPEND);
    echo 'Une erreur est survenue';
  }

  return $statementCount->fetchColumn();
}

/* Vérifie si ça existe deja */
function checkItem($select, $from, $value)
{
  global $pdo;
  try {
    $statementCheck = $pdo->prepare("SELECT $select FROM $from WHERE $select = ? ");
    $statementCheck->execute(array($value));
  } catch (Exception $e) {
    file_put_contents('dblogs.log', $e->getMessage() . "\n", FILE_APPEND);
    echo 'Une erreur est survenue';
  }

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

/* Mise en conformité format date */
function date_format_dd_mmmm_yyyy($date) // convertie la date au format "dd mois aaaa"
{
  $annee = substr($date, 0, 4); // on récupère les 4 chiffres de l'année
  $mois = substr($date, 5, 2); // on récupère les 2 chiffres du mois
  $jour = substr($date, 8, 2); // on récupère les 2 chiffres du jour

  switch ($mois) // transforme le mois de chiffres vers lettres et enregistre dans $mois_long
  {
    case "01":
      $mois_long = "janvier";
      break;
    case "02":
      $mois_long = "février";
      break;
    case "03":
      $mois_long = "mars";
      break;
    case "04":
      $mois_long = "avril";
      break;
    case "05":
      $mois_long = "mai";
      break;
    case "06":
      $mois_long = "juin";
      break;
    case "07":
      $mois_long = "juillet";
      break;
    case "08":
      $mois_long = "août";
      break;
    case "09":
      $mois_long = "septembre";
      break;
    case "10":
      $mois_long = "octobre";
      break;
    case "11":
      $mois_long = "novembre";
      break;
    case "12":
      $mois_long = "décembre";
      break;
    default:
      $mois_long = "??";
  }
  switch ($jour) // transforme 01 et 1er, et supprime le 0 devant pour 2 à 9. enregistre dans $jour_long
  {
    case "01":
      $jour_long = "1er";
      break;
    case "02":
      $jour_long = "2";
      break;
    case "03":
      $jour_long = "3";
      break;
    case "04":
      $jour_long = "4";
      break;
    case "05":
      $jour_long = "5";
      break;
    case "06":
      $jour_long = "6";
      break;
    case "07":
      $jour_long = "7";
      break;
    case "08":
      $jour_long = "8";
      break;
    case "09":
      $jour_long = "9";
      break;
    default:
      $jour_long = $jour;
  }
  $date = $jour_long . ' ' . $mois_long . ' ' . $annee;
  return $date; // renvoie la nouvelle date
}
