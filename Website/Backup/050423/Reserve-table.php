<?php

session_start();
include('./Conf/Template/Session-starter.php');
//Variables
$description = "N'hésitez pas à réserver une table dans norte restaurant afin d'être le mieux accueilli possible";
$keywords = "restaurant, gastronomique, plats, menus, reservation, manger, diner, dejeuner, produits, biologique, écologique";
$title = "Page de réservation du restaurant Quai Antiqu";

//Files
include('./Database/connexion.php');
include('./Conf/Function/Function.php');
include('./Conf/Template/Website-head-html.php');
include('./Conf/Template/Website-navbar.php');
include('./Page/Reserve-table-content.php');
include('./Conf/Template/Website-footer-html.php');
include('./Conf/Template/Website-end-html.php');
