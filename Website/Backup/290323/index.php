<?php

session_start();

include('./Conf/Template/Session-starter.php');
//Variables
$description = "Au restaurant Quai Antique, vous pourrez venir vous régaler avec nos produits bio et bons cuisinés avec amours par nos chefs";
$keywords = "restaurant, gastronomique, plats, menus, reservation, manger, diner, dejeuner, produits, biologique, écologique";
$title = "Page d'accueil du restaurant Quai Antique";

//Files
include('./Database/connexion.php');
include('./Conf/Function/Function.php');
include('./Conf/Template/Website-head-html.php');
include('./Conf/Template/Website-navbar.php');
include('./Page/index-content.php');
include('./Conf/Template/Website-footer-html.php');
include('./Conf/Template/Website-end-html.php');
