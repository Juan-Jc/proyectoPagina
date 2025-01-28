<?php require_once "sessionStart.php";
if (isset($_SESSION['admin']) && $_SESSION['admin'] == 2) {
    header('location:inicio.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<?php require_once "head.php"; ?>

<body class="fondoImg">
    <?php require_once "header.php"; ?>
    <!-- Botones -->
    <main class="container-fluid w-100 d-flex p-0">
        <aside class="text-light bg-dark p-2" style="height: 100vh; ">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><button class="nav-link" onclick="displayOn('#tablaLogs','.comun')"  data-bs-toggle="tooltip" data-bs-title="Logs"><i class="bi bi-book h1"></i></button></li>
                <li class="nav-item"><button class="nav-link" onclick="displayOn('#formRegistro','.comun')" data-bs-toggle="tooltip" data-bs-title="Registro Usuario"><i class="bi bi-r-square h1"></i></button></li>
                <li class="nav-item"><button class="nav-link" onclick="displayOn('#tablaUsuarios','.comun')"data-bs-toggle="tooltip" data-bs-title="Usuarios"><i class="bi bi-person-circle h1"></i></button></li>
                <li class="nav-item"><button class="nav-link" onclick="displayOn('#crearCategoria','.comun')" data-bs-toggle="tooltip" data-bs-title="Crear Categoria"><i class="bi bi-bookmark-plus h1"></i></button></li>
                <li class="nav-item"><button class="nav-link" onclick="displayOn('#crearProductos','.comun')"data-bs-toggle="tooltip" data-bs-title="Crear Producto"><i class="bi bi-archive h1"></i></button></li>
                <li class="nav-item"><button class="nav-link" onclick="displayOn('#listaProductos','.comun')"data-bs-toggle="tooltip" data-bs-title="Lista de Productos"><i class="bi bi-card-checklist h1"></i></button></li>
            </ul>
        </aside>

        <?php require_once "alertas.php"?>
        <section class="col-8 d-flex flex-wrap align-items-center mx-auto" style="height: 100vh; overflow:scroll; scrollbar-width: none;">
            <!-- Formularios de Control -->
            <?php require_once "tablaLogs.php"; ?>
            <?php require_once "formRegistro.php" ?>
            <?php require_once "../admin/crearCategoria.php" ?>
            <?php require_once "../admin/crearProductos.php"?>
            <?php require_once "../admin/tablaUsuarios.php" ?>
            <?php require_once "../admin/listaProductos.php"?>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="funciones.js"></script>
</body>

</html>