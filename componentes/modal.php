<?php
    if(isset($producto['idProducto'])){
    try {
      $sql3 = "SELECT * FROM fotosProductos WHERE idProducto = :id";
      $stmodal = $pdo->prepare($sql3);
      $stmodal->bindParam(':id', $producto['idProducto']);
      $stmodal->execute();
      $responseModal = $stmodal->fetchAll(PDO::FETCH_ASSOC);
      $responseModalUno = $stmodal->fetch(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
            die($th);
    }

}
$carrousel ='';

foreach ($responseModal as $fotos) {
  $active = ($responseModal[0])?'active':'';
  $carrousel.="
  <div class='carousel-item $active'>
  <img src='../assets/imgProd/$fotos[url]' class='d-block w-100' alt='$producto[descripcion]'>
  </div>
  
  ";
}

?>
<div class="modal fade" id="productoModal<?= $producto['idProducto'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= $producto['nombre'] ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- imagenes -->
        <div id="carouselExample<?= $producto['idProducto'] ?>" class="carousel slide">
  <div class="carousel-inner">
    <?=$carrousel;?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample<?= $producto['idProducto'] ?>" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample<?= $producto['idProducto'] ?>" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>






        <p><?= $producto['descLarga'] ?></p>
      </div>
      <div class="modal-footer">
        <span><?= $producto['precio'] ?>€</span>
        <a href="#" class="btn btn-danger" data-bs-dismiss="modal">Comprar</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>