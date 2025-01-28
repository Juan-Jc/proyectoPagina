<?php
var_dump($_POST['idUser']);
if(isset($_POST['idUser'])){
    require_once 'conexionDB.php';
    $sqlDel = 'DELETE FROM usuarios WHERE email = :idUser';
    $stmDel = $pdo->prepare($sqlDel);
    $stmDel->bindParam(':idUser', $_POST['idUser']);
    $stmDel->execute();
    header('location:../componentes/administrador.php?delU=1');
}else{
    header('location:../componentes/administrador.php?delU=0');   
}
?>