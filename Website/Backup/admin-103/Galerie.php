<?php

session_start();

//Variables
$description = "None";
$keywords = "None";
$title = "Galerie du panneau administrateur";

//Files
include('../Database/connexion.php');
include('./Conf/Function/functions.php');
include('./Conf/Template/head-html.php');
include('./Conf/Template/navbar.php');
include('./Page/Galerie-content.php');
include('./Conf/Template/end-html.php');
