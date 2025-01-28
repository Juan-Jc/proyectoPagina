<?php
if(isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD'] == 'POST'){
try{
    require 'conexionDB.php';

    $sqlUpdate = 'UPDATE productos SET
    nombre = :nombreUpdate,
    descripcion = :detalleUpdate,
    descLarga = :descripcionUpdate,
    precio= :precioUpdate,
    idCat = :categoriaUpdate,
    oferta = :ofertaUpdate WHERE idProducto = :idProdUpdate';

    $stmUpdate = $pdo->prepare($sqlUpdate);
    $stmUpdate->bindParam(':nombreUpdate', $_POST['prodNameUpdate']);
    $stmUpdate->bindParam(':detalleUpdate', $_POST['prodDescUpdate']);
    $stmUpdate->bindParam(':descripcionUpdate', $_POST['prodLongDescUpdate']);
    $stmUpdate->bindParam(':precioUpdate', $_POST['prodPriceUpdate']);
    $stmUpdate->bindParam(':categoriaUpdate', $_POST['prodCatUpdate']);
    $stmUpdate->bindParam(':ofertaUpdate', $_POST['prodOfertaUpdate']); 
    $stmUpdate->bindParam(':idProdUpdate', $_POST['idProdUpdate']);

    if($stmUpdate->execute()){
        header('location: ../componentes/administrador.php?up=1');
        die;
    }else{
        header('location: ../componentes/administrador.php?up=0');  
        die; 
    }
    
    
    
    
}catch(\Throwable $th){
    header('location: ../componentes/administrador.php?up=0');
    die;
}
}
?>