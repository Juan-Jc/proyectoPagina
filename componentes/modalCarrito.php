<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Carrito</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id='carrito-contenido' class="modal-body">
                    <!-- Aquí se llenarán los productos del carrito dinámicamente -->
                    <form id="form-carrito" method="POST" action="finalizar_compra.php">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody id="carrito-lista">
                                <!-- Los productos se agregarán aquí -->
                            </tbody>
                        </table>
                        <p id="total-compra">Total: 0€</p>
                        <input type="hidden" name="carrito_data" id="carrito_data"> <!-- Datos del carrito en formato JSON -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Finalizar Compra</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>