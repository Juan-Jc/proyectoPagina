<?php
// veificar si la session es de administrador
try {
  require_once 'conexionDB.php';
  $sql = 'SELECT idCat,nombreCat FROM categorias;';
  $stm = $pdo->query($sql);
  if ($stm->execute()) {
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

<div class="modal fade" id="modalUpdateProd" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalUpdateLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../admin/updateDB.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="idProdUpdate" id="idProdUpdate" value="">
          <label for="prodNameUpdate">Nombre de Producto</label>
          <input class="form-control mt-2" type="text" name="prodNameUpdate" id="prodNameUpdate">
          <label for="imgsProdUpdate">Fotos del Producto</label>
          <input class="form-control mt-2" type="file" name="imgsProd[]" id="imgsProdUpdate" accept="images/*" multiple>
          <label for="prodDescUpdate">Detalle del Producto</label>
          <input class="form-control mt-2" type="text" name="prodDescUpdate" id="prodDescUpdate">
          <label for="prodLongDescUpdate">Descripción del Producto</label>
          <input class="form-control mt-2" type="text" name="prodLongDescUpdate" id="prodLongDescUpdate">
          <label for="prodPriceUpdate">Precio</label>
          <i>€</i>
          <input class="form-control mt-2" type="text" name="prodPriceUpdate" id="prodPriceUpdate">
          <label for="prodCatUpdate">Categoria</label>
          <select name="prodCatUpdate" id="prodCatUpdate" class="form-control mt-2">
            <option disabled selected></option>
            <?= $options ?>
          </select>
          <label for="prodOfertaUpdate">Tiene Oferta</label>
          <select class="form-control mt-2" name="prodOfertaUpdate" id="prodOfertaUpdate">
            <option value="1">Si</option>
            <option value="0" selected>No</option>
          </select>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>