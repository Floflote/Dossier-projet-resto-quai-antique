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

/* Afficher les horaires */
function displaySchedule($a, $b, $c, $d)
{
  global $dayschedule;
  if (($dayschedule[$a] == $dayschedule[$b]) && ($dayschedule[$a] == $dayschedule[$c])  && ($dayschedule[$a] == $dayschedule[$d])) {
    return "Fermé";
  } elseif ($dayschedule[$a] == $dayschedule[$b]) {
    return $dayschedule[$c] . ' - ' . $dayschedule[$d];
  } elseif ($dayschedule[$c] == $dayschedule[$d]) {
    return $dayschedule[$a] . ' - ' . $dayschedule[$b];
  } else {
    return $dayschedule[$a] . ' - ' . $dayschedule[$b] . ' et ' . $dayschedule[$c] . ' - ' . $dayschedule[$d];
  }
}

/* Verifier horaires resa */
function checkSchedu($selectDay, $selectTime)
{
  global $checkschedule;
  switch ($selectDay) {
    case 'monday':
      if (strtotime($selectTime) >= strtotime($checkschedule[0]) && strtotime($selectTime) <= strtotime($checkschedule[1])) {
        $out['b'] = $checkschedule[0];
        $out['e'] = $checkschedule[1];
        return $out;
      } else {
        $out['b'] = $checkschedule[2];
        $out['e'] = $checkschedule[3];
        return $out;
      }
      break;
    case 'tuesday':
      if (strtotime($selectTime) >= strtotime($checkschedule[4]) && strtotime($selectTime) <= strtotime($checkschedule[5])) {
        $out['b'] = $checkschedule[4];
        $out['e'] = $checkschedule[5];
        return $out;
      } else {
        $out['b'] = $checkschedule[6];
        $out['e'] = $checkschedule[7];
        return $out;
      }
      break;
    case 'wednesday':
      if (strtotime($selectTime) >= strtotime($checkschedule[8]) && strtotime($selectTime) <= strtotime($checkschedule[9])) {
        $out['b'] = $checkschedule[8];
        $out['e'] = $checkschedule[9];
        return $out;
      } else {
        $out['b'] = $checkschedule[10];
        $out['e'] = $checkschedule[11];
        return $out;
      }
      break;
    case 'thursday':
      if (strtotime($selectTime) >= strtotime($checkschedule[12]) && strtotime($selectTime) <= strtotime($checkschedule[13])) {
        $out['b'] = $checkschedule[12];
        $out['e'] = $checkschedule[13];
        return $out;
      } else {
        $out['b'] = $checkschedule[14];
        $out['e'] = $checkschedule[15];
        return $out;
      }
      break;
    case 'friday':
      if (strtotime($selectTime) >= strtotime($checkschedule[16]) && strtotime($selectTime) <= strtotime($checkschedule[17])) {
        $out['b'] = $checkschedule[16];
        $out['e'] = $checkschedule[17];
        return $out;
      } else {
        $out['b'] = $checkschedule[18];
        $out['e'] = $checkschedule[19];
        return $out;
      }
      break;
    case 'saturday':
      if (strtotime($selectTime) >= strtotime($checkschedule[20]) && strtotime($selectTime) <= strtotime($checkschedule[21])) {
        $out['b'] = $checkschedule[20];
        $out['e'] = $checkschedule[21];
        return $out;
      } else {
        $out['b'] = $checkschedule[22];
        $out['e'] = $checkschedule[23];
        return $out;
      }
      break;
    case 'sunday':
      if (strtotime($selectTime) >= strtotime($checkschedule[24]) && strtotime($selectTime) <= strtotime($checkschedule[25])) {
        $out['b'] = $checkschedule[24];
        $out['e'] = $checkschedule[25];
        return $out;
      } else {
        $out['b'] = $checkschedule[26];
        $out['e'] = $checkschedule[27];
        return $out;
      }
      break;
  }
}

/* Afficher horaires selon dates */
function inputTime($bg, $ed, $day)
{
  global $cmp;
  for ($inti = $bg; $inti <= ($ed - 60 * 60); $inti = $inti + 60 * 15) {
?>
    <input type="radio" class="btn-check form-check-input" name="timeradio" id="<?php echo $day . $cmp; ?>" autocomplete="off" value="<?php echo date('H:i', $inti); ?>" required>
    <label class="btn reserve-btn m-2" for="<?php echo $day . $cmp; ?>"><?php echo str_replace(':', 'h', date('H:i', $inti)); ?></label>

<?php
    $cmp++;
  }
}
