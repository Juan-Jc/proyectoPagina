<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Carrito</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                    <?php foreach ($_SESSION['carrito'] as $i => $produc) { ?>
                        <tr>
                            <td><?= $produc['nombre'] ?></td>
                            <td><?= $produc['precio'] ?>€</td>
                            <td><a href="carrito.php?eliminar=<?= $i ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                </table>
                <p>Total: <?= $total ?>€</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-primary" href="productos.php?categoria=1&fnc=1" type="submit">Finalizar Compra</a>
            </div>
        </div>
    </div>
</div>