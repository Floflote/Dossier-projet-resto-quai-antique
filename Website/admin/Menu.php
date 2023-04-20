<?php
session_start();
if (isset($_SESSION['identifiant_co_session_admin']) && isset($_SESSION['password_co_session_admin'])) {

  //Variables
  $description = "None";
  $keywords = "None";
  $title = "Menu du restaurant du panneau admin";

  //Files
  include('../Database/connexion.php');
  include('./Conf/Function/functions.php');
  include('./Conf/Template/head-html.php');
  include('./Conf/Template/navbar.php');
  include('./Page/Menu-content.php');
  include('./Conf/Template/end-html.php');

  /* Session out */
} else {
  header("Location: ../index.php");
  exit();
}
