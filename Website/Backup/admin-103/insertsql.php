<?php
include('../Database/connexion.php');
$menu_date = "2023-04-25";
$menu_hour = "12:00";
$menu_f_nb = 4;
$menu_mail = "tatayoyo@mail.com";
$menu_f_description = "Rien";
$menu_f_id = null;
try {
  $statementadddone = $pdo->prepare("INSERT INTO reservation (reservation_date, reservation_hour, reservation_nbcustomer, reservation_mail, reservation_allergen, customer_id) VALUES (?,?,?,?,?,?) ");
  $statementadddone->execute(array($menu_date, $menu_hour, $menu_f_nb, $menu_mail, $menu_f_description, $menu_f_id));
} catch (Exception $e) {
  echo 'Une erreur s\'est produite, veuillez réessayer: ' . $e->getMessage();
}

$menu_date = "2023-12-25";
$menu_hour = "12:15";
$menu_f_nb = 2;
$menu_mail = "tata@mail.com";
$menu_f_description = "Rien";
$menu_f_id = "xab";
try {
  $statementadddone = $pdo->prepare("INSERT INTO reservation (reservation_date, reservation_hour, reservation_nbcustomer, reservation_mail, reservation_allergen, customer_id) VALUES (?,?,?,?,?,?) ");
  $statementadddone->execute(array($menu_date, $menu_hour, $menu_f_nb, $menu_mail, $menu_f_description, $menu_f_id));
} catch (Exception $e) {
  echo 'Une erreur s\'est produite, veuillez réessayer: ' . $e->getMessage();
}

$menu_date = "2023-08-12";
$menu_hour = "13:30";
$menu_f_nb = 8;
$menu_mail = "tatoyo@mail.com";
$menu_f_description = "Oeufs, cacahuète, gluten";
$menu_f_id = null;
try {
  $statementadddone = $pdo->prepare("INSERT INTO reservation (reservation_date, reservation_hour, reservation_nbcustomer, reservation_mail, reservation_allergen, customer_id) VALUES (?,?,?,?,?,?) ");
  $statementadddone->execute(array($menu_date, $menu_hour, $menu_f_nb, $menu_mail, $menu_f_description, $menu_f_id));
} catch (Exception $e) {
  echo 'Une erreur s\'est produite, veuillez réessayer: ' . $e->getMessage();
}