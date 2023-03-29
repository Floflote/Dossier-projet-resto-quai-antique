<?php

session_start();
include('./Conf/Template/Session-starter.php');
//Variables
$description = "Connectez-vous à votre compte client";
$keywords = "restaurant, gastronomique, plats, menus, reservation, manger, diner, dejeuner, produits, biologique, écologique, compte, creation, connexion";
$title = "Page de connexion à votre compte du restaurant Quai Antique";

//Files
include('./Database/connexion.php');
include('./Conf/Function/Function.php');
include('./Conf/Template/Website-head-html.php');
include('./Conf/Template/Website-navbar.php');
include('./Page/Espaceconnexion-content.php');
include('./Conf/Template/Website-footer-html.php');
include('./Conf/Template/Website-end-html.php');
