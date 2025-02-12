<?php
session_start();
include 'conexionDb.php';

// Verificamos si el usuario está logueado
if (!isset($_SESSION['email'])) {
    echo "Debes estar logueado para realizar una compra.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el email del usuario desde la sesión
    $email_cliente = $_SESSION['email'];
    $carrito_data = json_decode($_POST['carrito_data'], true);

    try {
        // Procesar cada producto en el carrito y guardar el pedido en la base de datos
        foreach ($carrito_data as $producto) {
            $sql = "INSERT INTO pedidos (email, idProducto, nombreProducto, precio, cantidad) 
                    VALUES (:email, :idProducto, :nombreProducto, :precio, :cantidad)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email_cliente);
            $stmt->bindParam(':idProducto', $producto['id']);
            $stmt->bindParam(':nombreProducto', $producto['nombre']);
            $stmt->bindParam(':precio', $producto['precio']);
            $stmt->bindParam(':cantidad', $producto['cantidad']);
            $stmt->execute();
        }

        // Vaciar el carrito de la sesión
        $_SESSION['carrito'] = [];

        // Redirigir a una página de confirmación
        header("Location: confirmacion.php");
        exit;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
