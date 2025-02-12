<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['up'])) {
        $update = $_GET['up'];
        if ($update) {
            echo '<div class="alert alert-success w-25 position-absolute text-center bottom-0 end-0" role="alert">
                             El Producto Se Ha Actualizado!
                        </div>';
        } else {
            echo '<div class="alert alert-danger w-25 position-absolute text-center bottom-0 end-0" role="alert">
                        Ocurrio un problema para Actualizar el producto, Intente Nuevamente!
                        </div>';
        }
    }
    if (isset($_GET['del'])) {
        $deleted = $_GET['del'];
        if ($deleted) {
            echo '<div class="alert alert-success w-25 position-absolute text-center bottom-0 end-0" role="alert">
            El Producto Se Ha Borrado Con Exito!
       </div>';
        } else {
            echo '<div class="alert alert-danger w-25 position-absolute text-center bottom-0 end-0" role="alert">
       Ocurrio un problema para Borrar el producto, Intente Nuevamente!
       </div>';
        }
    }
    if (isset($_GET['delU'])) {
        $deleted = $_GET['delU'];
        if ($deleted) {
            echo '<div class="alert alert-success w-25 position-absolute text-center bottom-0 end-0" role="alert">
            El Usuario Se Ha Borrado Con Exito!
       </div>';
        } else {
            echo '<div class="alert alert-danger w-25 position-absolute text-center bottom-0 end-0" role="alert">
       Ocurrio un problema para Borrar el Usuario, Intente Nuevamente!
       </div>';
        }
    }
    if(isset($_GET['c'])){
        $categoria = $_GET['c'];
        if($categoria){
            echo '<div class="alert alert-success w-25 position-absolute text-center bottom-0 end-0" role="alert">
            La Categoria Se Ha Creado Con Exito!
       </div>';
        }else {
            echo '<div class="alert alert-danger w-25 position-absolute text-center bottom-0 end-0" role="alert">
       Ocurrio un problema para Crear la Categoria, Intente Nuevamente!
       </div>';
        }
    }
    if(isset($_GET['cp'])){
        $producto = $_GET['cp'];
        if($producto){
            echo '<div class="alert alert-success w-25 position-absolute text-center bottom-0 end-0" role="alert">
            El Producto Se Ha Creado Con Exito!
       </div>';
        }else {
            echo '<div class="alert alert-danger w-25 position-absolute text-center bottom-0 end-0" role="alert">
       Ocurrio un problema para Crear El Producto, Intente Nuevamente!
       </div>';
        }
    }
    if(isset($_GET['uUp'])){
        $producto = $_GET['uUp'];
        if($producto){
            echo '<div class = "alert alert-success alert-dismissible fade show w-25 text-center position-absolute bottom-0 end-0" role="alert"> Usuario Creado
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>';
        }else {
            echo '<div class="alert alert-danger w-25 text-center position-absolute bottom-0 end-0" role="alert">Error en registro
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button></div>';
        }
    }
    if(isset($_GET['fnc'])){
        $producto = $_GET['fnc'];
        if($producto){
            echo '<div class = "alert alert-success alert-dismissible fade show w-25 text-center position-absolute bottom-0 end-0" role="alert"> Compra Finalizada      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>';
        }
    } 
    if (isset($_SESSION['email'])) {
        $email_cliente = $_SESSION['email'];
    
        echo "<h1>¡Gracias por tu compra, $email_cliente!</h1>";
        echo "<p>Tu pedido ha sido procesado exitosamente.</p>";
    } else {
        echo "<p>El usuario no está logueado. No se pudo procesar el pedido.</p>";
    }
}
