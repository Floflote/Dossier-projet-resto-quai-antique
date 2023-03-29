<?php
$type = 'mysql:host=localhost;dbname=restaurant_qa';
$user = 'root';
$password = 'root';

try {
  $pdo = new PDO($type, $user, $password);
} catch (PDOException $e) {
  file_put_contents('error.log', $e->getMessage() . "\n", FILE_APPEND);
  echo 'Une erreur est survenue';
}
