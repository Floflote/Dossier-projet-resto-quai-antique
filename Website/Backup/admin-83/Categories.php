<?php

session_start();

//Variables
$description = "None";
$keywords = "None";
$title = "Tableau de bord du panneau administrateur";

//Files
include('../Database/connexion.php');
include('./Conf/Function/functions.php');
include('./Conf/Template/head-html.php');
include('./Conf/Template/navbar.php');
include('./Page/Categories-content.php');
include('./Conf/Template/end-html.php');
