<!-- mostrar los usuarios en una tabla y con botones para actualizar y eliminar usuarios -->
<?php 
require_once 'logica.php';
require_once 'modalDelUser.php';
?>
<section class=" comun mx-auto " id='tablaUsuarios' style="display: none !important;">
<div class="d-flex flex-column align-items-center">        
<h2 class="text-light text-center">Usuarios</h2> 
        <table class="table container-fluid w-50 table-hover table-sm">
            <tr class="table-dark">
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Dirección</th>
                <th>Codigo Postal</th>
                <th>Provincia</th>
                <th>Rol</th>
                <th>Control</th>
            </tr>
            <?=$userRow?>
        </table>
        <!-- un boton para agregar un nuevo usuario que abra un registro de usuario -->
          <button class="btn btn-primary" onclick="displayOn('#formRegistro','.comun')">Crear Nuevo Usuario</button>
          </div>
    </section>