<?php

session_start();
include('./Conf/Template/Session-starter.php');
//Variables
$description = "Changer le mot de passe";
$keywords = "restaurant, gastronomique, plats, menus, reservation, manger, diner, dejeuner, produits, biologique, écologique, compte, creation, connexion, mot de passe, oublié, password";
$title = "Page de changement du mot de passe du restaurant Quai Antique";

//Files
include('./Database/connexion.php');
include('./Conf/Function/Function.php');
include('./Conf/Template/Website-head-html.php');
include('./Conf/Template/Website-navbar.php');
include('./Page/Motdepasseoublie-content.php');
include('./Conf/Template/Website-footer-html.php');
include('./Conf/Template/Website-end-html.php');
