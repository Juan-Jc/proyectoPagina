<?php 
 $sqle = 'SELECT * FROM productos p LEFT JOIN fotosproductos f ON p.idProducto = f.idProducto WHERE NOT p.idCat = :categoria AND p.oferta=0 ORDER BY RAND()
 LIMIT 5';
 $stm = $pdo->prepare($sqle);
 $stm->bindParam(':categoria', $categoria, PDO::PARAM_STR);
 $stm->execute();
 $response = $stm->fetchAll(PDO::FETCH_ASSOC);

?>  

<section class="container-fluid mt-5">
<h2 class="text-light text-center fondoOpaco rounded-4">Productos Que Podrian Interesarte</h2>
<div class="d-flex justify-content-around">
<?php foreach ($response as $producto) { ?>
            <div class="card p-3 mt-5" style="width: 10rem;">
                <img src="../assets/imgProd/<?= $producto['url'] ?>" class="card-img-top" alt=<?= $producto['descripcion'] ?>>
                <div class="card-body">
                    <h5 class="card-title"><?= $producto['nombre'] ?></h5>
                    <p class="card-text"><?= $producto['descripcion'] ?></p>
                    <div class="d-flex flex-wrap justify-content-between align-center">
                        <a href="#" class="btn btn-danger">Comprar</a>
                        <span><?= $producto['precio'] ?>€</span>
                    </div>
                    <a class="btn btn-primary" data-bs-toggle="modal"
                        href="#productoModal<?= $producto['idProducto'] ?>">
                        Mas...
                    </a>
                </div>
            </div>
            <?php require "modal.php"; ?>
            <?php }?>
</div>
</section>