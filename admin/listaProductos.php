<?php
// un if con la sesion de administrador activa
try {
    require_once 'conexionDB.php';
    $sql = 'SELECT p.*, f.`url`, c.nombreCat  FROM productos p INNER JOIN fotosproductos f ON p.idProducto=f.idProducto INNER JOIN categorias c ON p.idCat=c.idCat ORDER BY p.idproducto';
    $stm = $pdo->query($sql);
    if ($stm->execute()) {
        $response = $stm->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'No se pudieron recuperar los productos.';
        die;
    }

    $filaProducto = '';
    $productoAnterior = '';
    foreach ($response as $producto) {
        if ($producto['idProducto'] != $productoAnterior) {
            if ($producto['oferta']) {
                $oferta = 'si';
            } else {
                $oferta = 'no';
            }
            $filaProducto .= "<tr id=$producto[idProducto]>
        <td class='id'>$producto[idProducto]</td>
            <td class='nombre'>$producto[nombre]</td>
            <td class='detalle'>$producto[descripcion]</td>
            <td class='descripcion'><p style='height:20px;overflow:hidden;'>$producto[descLarga]</p></td>
            <td class='precio'>$producto[precio] <span>€</span></td>
            <td class='categoria' data_idVal=$producto[idCat]>$producto[nombreCat]</td>
            <td class='oferta' data_val = $producto[oferta]>$oferta</td>
            <td class='image'><div style='width:50px; height:50px;'><img style='width:100%' src='../assets/$producto[url]' alt= $producto[nombre]></div></td>
            <td><a href='#modalDel' data-bs-toggle='modal' data-bs-idDel=$producto[idProducto]><i class='bi bi-trash-fill'></i></a> | 
            <a href='#modalUpdateProd' data-bs-toggle='modal' data-bs-allUpdate=$producto[idProducto]><i class='bi bi-pencil-square'></i></a></td>
        </tr>";
        }
        $productoAnterior = $producto['idProducto'];
    }
} catch (\Throwable $th) {
    die($th);
}
?>
<?php require "modalDel.php"?>
<?php require "modalUpdate.php"?>
<!-- tabla para mostrar productos -->
<section id="listaProductos" class="comun text-light mx-auto">
    <h2 class="text-center">Lista de Productos</h2>
    <table class="table table-hover table-sm ">
        <tr class="table-dark">
            <th>Id</th>
            <th>Nombre</th>
            <th>Detalle</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>En Oferta</th>
            <th>Foto</th>
            <th>Control</th>
        </tr>
        <?= $filaProducto ?>
    </table>
</section>