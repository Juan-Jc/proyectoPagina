<?php 

$dsn = 'mysql:host=localhost;dbname=tienda';
$username= 'root';
$passDb = '';

try {
    $pdo = new PDO($dsn,$username,$passDb);
} catch (PDOException $e) {
    die('Ha ocurrido un error, intenta mas tarde.');
}
?>