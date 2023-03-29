<?php

session_start();

//Variables
$description = "None";
$keywords = "None";
$title = "None";

//Files
include('./Database/connexion.php');
include('./Conf/Function/Function.php');
include('./Conf/Template/Website-head-html.php');
include('./Conf/Template/Website-navbar.php');
include('./Page/index-content.php');
include('./Conf/Template/Website-footer-html.php');
include('./Conf/Template/Website-end-html.php');
