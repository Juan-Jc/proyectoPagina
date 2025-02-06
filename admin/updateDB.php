<?php
if(isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD'] == 'POST'){
try{
    require 'conexionDB.php';
 
    if(isset($_FILES['imgsProd'])){
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
     if ($stmUpdate->execute()) {
        foreach($_FILES ['imgsProd']['tmp_name'] as $key => $tmp_name) {
            echo $key;
            if ($_FILES['imgsProd']['name'][$key]) {
                $foto = $_FILES['imgsProd']['name'][$key];
                $fiche = pathinfo($foto, PATHINFO_ALL);
                $nombreFiche = uniqid() . '_' . basename($fiche['basename']);
            }
            if (move_uploaded_file($tmp_name,  $dirSubidaProd . $nombreFiche)) {
                echo 'movidos';
                // insertar en base de datos
                try {
                    $sqlQ = 'SELECT MAX(idProducto) FROM productos;';
                    $stmQ = $pdo->query($sqlQ);
                    $stmQ->execute();
                    $resQ = $stmQ->fetch(PDO::FETCH_ASSOC);
                    print_r($resQ);
                    // insertar foto en producto;
                    $sqlIn2 = 'INSERT INTO fotosproductos (idProducto, url) VALUES (:idProducto, :prodUrl);';
                    $stmIn2 = $pdo->prepare($sqlIn2);
                    $stmIn2->bindParam(':idProducto', $resQ['MAX(idProducto)']);
                    $stmIn2->bindParam(':prodUrl', $nombreFiche);
                    $stmIn2->execute();
                    ;
                } catch (\Throwable $th) {
                    die($th);
                }
            } 
        }
        header('location: ../componentes/administrador.php?up=1');
        }
    }else {

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
    }else{
        header('location: ../componentes/administrador.php?up=0');
        die;
    }
}
}catch(\Throwable $th){
    header('location: ../componentes/administrador.php?up=0');
    die;
}
}
?>