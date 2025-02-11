<?php require_once "sessionStart.php"; ?>
<?php require_once "comprobarLogin.php"; ?>
<!DOCTYPE html>
<html lang="es">
<?php require_once "head.php"; ?>

<body class="fondoImg">
    <?php
    require_once "header.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['categoria'])) {
            $categoria = $_GET['categoria'];
            require_once "conexionDb.php";
            if($categoria !== 'oferta')
            {$sql = 'SELECT * FROM productos p LEFT JOIN fotosproductos f ON p.idProducto = f.idProducto WHERE p.idCat = :categoria GROUP BY p.idProducto';}
            else{
                $sql='SELECT * FROM productos p LEFT JOIN fotosproductos f ON p.idProducto = f.idProducto WHERE p.idCat = :categoria OR NOT p.oferta = 0 GROUP BY p.idProducto';;
            }
            $stm = $pdo->prepare($sql);
            $stm->bindParam(':categoria', $categoria, PDO::PARAM_STR);
            $stm->execute();
            $response = $stm->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    ?>
    <main class="container h-100 d-flex flex-wrap justify-content-around">
        <?php foreach ($response as $producto) { ?>

            <div class="card p-2 mt-5" style="width: 18rem;">
                <img src="../assets/imgProd/<?= $producto['url'] ?>" class="card-img-top" alt=<?= $producto['descripcion'] ?>>
                <div class="card-body">
                    <h5 class="card-title"><?= $producto['nombre'] ?></h5>
                    <p class="card-text"><?= $producto['descripcion'] ?></p>
                    <div class="d-flex justify-content-between align-center">
                        <button data-idProducto="<?=$producto['idProducto']?>" class="btn btn-danger aggCart">Comprar</button>
                        <span><?= $producto['precio'] ?>€</span>
                    </div>
                    <a class="btn btn-primary" data-bs-toggle="modal"


                        href="#productoModal<?= $producto['idProducto'] ?>">
                        Mas...
                    </a>
                </div>
            </div>
            <?php require "modal.php"; ?>
        <?php } ?>
        <?php require_once "prodExtra.php"; ?>
        <?php
        if(isset($_GET['car'])){
            $carritoStatus = $_GET['car'];
            if($carritoStatus){
                echo '<div class = "alert alert-success alert-dismissible fade show w-25 text-center position-absolute bottom-0 end-0" role="alert"> Se ha añadido al carrito!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>';
            }else {
                echo '<div class="alert alert-danger w-25 text-center position-absolute bottom-0 end-0" role="alert">Error No se pudo Añadir al carrito.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button></div>';
            }
        }
        ?>

    </main>
    <?php require_once 'alertas.php';?>

    <?php require_once "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="funciones.js"></script>
</body>

</html>