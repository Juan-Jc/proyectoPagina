<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Si se recibe un producto para agregar al carrito
if (isset($_GET['idProducto'])) {
    include 'conexionDb.php';
    
    $idProducto = $_GET['idProducto'];
    $respuesta = [
        'success' => false,
        'message' => 'Error al agregar al carrito',
        'carrito_count' => count($_SESSION['carrito']),
        'data' => null
    ];

    // Obtener el producto de la base de datos
    try {
        $sql = 'SELECT * FROM productos WHERE idProducto = :id';
        $stm = $pdo->prepare($sql);
        $stm->bindParam(':id', $idProducto);
        $stm->execute();
        $producto = $stm->fetch(PDO::FETCH_ASSOC);
        
        if ($producto) {
            $productoCarrito = [
                'id' => $producto['idProducto'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'cantidad' => 1
            ];
            
            // Agregar el producto al carrito
            array_push($_SESSION['carrito'], $productoCarrito);
            $respuesta['success'] = true;
            $respuesta['message'] = 'Producto agregado al carrito';
            $respuesta['carrito_count'] = count($_SESSION['carrito']);
            $respuesta['data'] = $productoCarrito;
        }
    } catch (Exception $e) {
        $respuesta['message'] = 'Error: ' . $e->getMessage();
    }

    echo json_encode($respuesta);
}

// Si se recibe la petición para eliminar un producto del carrito
if (isset($_GET['eliminar'])) {
    $index = $_GET['eliminar'];

    // Eliminar el producto del carrito
    array_splice($_SESSION['carrito'], $index, 1);

    // Devolver el carrito actualizado
    $respuesta = [
        'success' => true,
        'carrito_count' => count($_SESSION['carrito']),
        'data' => $_SESSION['carrito']
    ];

    echo json_encode($respuesta);
}
?>
