<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'connect.php';
global $pdo;

try {
    $sql = "SELECT * FROM prices WHERE id = :id";
    $prc = $pdo->prepare($sql);
    $prc->execute([
       'id' => $_GET['id']
    ]);
    $price = $prc->fetch();

    echo $price['price'].'<b> $</b>';
}catch (PDOException $e){
    echo $e->getMessage();
}