
<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idProducto'])) {

    include 'conexionDb.php';
    try {
        $sql= 'SELECT * FROM productos WHERE idProducto = :id';
        $stm= $pdo->prepare($sql);
        $stm->bindParam(':id', $_GET['idProducto']);

        $stm->execute();
        $response= $stm->fetch(PDO::FETCH_ASSOC);
        if(empty($response)){
            header('location: productos.php?car=0');
        }else{

            $producto = [
                'id' => $_GET['idProducto'],
                'nombre' => $response['nombre'],
                'precio' => $response['precio'],
                'cantidad' => 1
            ];
            array_push($_SESSION['carrito'], $producto);
            header("location: productos.php?categoria=$response[idCat]&car=1");
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
    
    
 
}

if (isset($_GET['eliminar'])) {
    array_splice($_SESSION['carrito'],
                 $_GET['eliminar'], 
                 1);
}

$total = array_sum(array_column($_SESSION['carrito'], 'precio'));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Carrito de Compras</h1>
    <a href="productos.php">Seguir comprando</a>
    <table border="1">
        <tr><th>Producto</th><th>Precio</th><th>Acción</th></tr>
        <?php foreach ($_SESSION['carrito'] as $i => $produc) { ?>
            <tr>
                <td><?= $produc['nombre'] ?></td>
                <td><?= $produc['precio'] ?>€</td>
                <td><a href="carrito.php?eliminar=<?= $i ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>
    <p>Total: <?= $total ?>€</p>
    <form method="post" action="finalizar.php">
        <button type="submit">Finalizar Compra</button>
    </form>
</body>
</html>