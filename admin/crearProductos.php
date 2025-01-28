<?php
// veificar si la session es de administrador
try {
    require_once 'conexionDB.php';
    $sql = 'SELECT idCat,nombreCat FROM categorias;';
    $stm = $pdo->query($sql); 
    if($stm->execute()){
        $response = $stm->fetchAll(PDO::FETCH_ASSOC);
        $options = ""; 
        foreach ($response as $opt) {
            $options .= "
            <option value=$opt[idCat]>$opt[nombreCat]</option>"; 
        }
    }
} catch (\Throwable $th) {
    die($th);
}

?>

<section id="crearProductos" style='display: none;' class="comun bg-dark p-2 rounded-4 mt-2 mx-auto">
        <h2 class="text-center text-light">Crear Productos</h2> 
        <!-- formulario para crear productos -->
        <form class="text-center text-light" action="../admin/logica.php" method="POST" enctype="multipart/form-data">
            <label for="prodName">Nombre de Producto</label>
            <input class="form-control mt-2" type="text" name="prodName" id="prodName">
            <label for="imgsProd">Fotos del Producto</label>
            <input class="form-control mt-2" type="file" name="imgsProd[]" id="imgsProd" accept="images/*" multiple>
            <label for="prodDesc">Detalle del Producto</label>
            <input class="form-control mt-2" type="text" name="prodDesc" id="prodDesc">
            <label for="prodLongDesc">Descripción del Producto</label>
            <input class="form-control mt-2" type="text" name="prodLongDesc" id="prodLongDesc">
            <label for="prodPrice">Precio</label>
            <i>€</i>
            <input class="form-control mt-2" type="number" name="prodPrice" id="prodPrice">
            <label for="prodCat">Categoria</label>
            <select name="nombreCat" id="prodCat" class="form-control mt-2">
                <option disabled selected></option>
                <?=$options?>
            </select>
            <label for="prodOferta">Tiene Oferta</label>
            <select class="form-control mt-2" name="prodOferta" id="prodOferta">
                <option value="1">Si</option>
                <option value="0" selected>No</option>
            </select>
                <input class="btn btn-primary mt-2" type="submit" value="Crear Producto">
        </form>
       
    </section>