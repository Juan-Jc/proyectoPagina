<?php
if(isset($_POST['idProd'])){
    require_once 'conexionDB.php';
    $sqlDel = 'DELETE FROM productos WHERE idProducto = :idProd';
    $stmDel = $pdo->query($sqlDel);
    $stmDel->bindParam(':idProd', $_POST['idProd']);
    $stmDel->execute();
    header('location:../componentes/administrador.php?del=1');
}else{
    header('location:../componentes/administrador.php?del=0');   
}
?>