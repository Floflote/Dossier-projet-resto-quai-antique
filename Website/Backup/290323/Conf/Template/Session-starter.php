<?php
$identifiant_co_session = "";
$nbcustomers_co_session = "";
$allergen_co_session = "";
$user_connected = 0;

if (isset($_SESSION['identifiant_co_session']) && isset($_SESSION['password_co_session'])) {
  $identifiant_co_session = $_SESSION['identifiant_co_session'];
  $nbcustomers_co_session = $_SESSION['nbcustomers_co_session'];
  $allergen_co_session = $_SESSION['allergen_co_session'];
  $user_connected = $_SESSION['user_connected'];
}
