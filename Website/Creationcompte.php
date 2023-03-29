<?php

session_start();
include('./Conf/Template/Session-starter.php');
//Variables
$description = "Créer votre compte client afin de gagner du temps lors d'une réservation";
$keywords = "restaurant, gastronomique, plats, menus, reservation, manger, diner, dejeuner, produits, biologique, écologique, compte, creation";
$title = "Page de création de compte du restaurant Quai Antique";

//Files
include('./Database/connexion.php');
include('./Conf/Function/Function.php');
include('./Conf/Template/Website-head-html.php');
include('./Conf/Template/Website-navbar.php');
include('./Page/Creationcompte-content.php');
include('./Conf/Template/Website-footer-html.php');
include('./Conf/Template/Website-end-html.php');
