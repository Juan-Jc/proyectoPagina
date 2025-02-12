<?php $carrito_count = isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0 ?>
<header>
  <nav class="navbar navbar-expand sticky-top bg-dark">
    <div class="container-fluid d-flex justify-content-around">
      <a class="navbar-brand " href="inicio.php"><i class="bi bi-valentine2 h1 align-middle text-danger"></i><span class="align-middle text-light brand">Valentine</span></a>
      <ul class="navbar-nav">
        <?php if (!$hayLogin) : ?>
          <li class="nav-item">
            <a class="nav-link text-light active" aria-current="page" href="inicio.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="contacto.php">Contacto</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link text-light active" aria-current="page" href="inicio.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light active" href="productos.php?categoria=1">Hombre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="productos.php?categoria=2">Mujer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="productos.php?categoria=oferta">Ofertas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="contacto.php">Contacto</a>
          </li>
        <?php endif; ?>
      </ul>
      <div>
        <?php if (!$hayLogin): ?>
          <a href="inicio.php" class="btn btn-light mx-2">Login</a>
          <a href="registro.php" class="btn btn-secondary">Registro</a>
        <?php else: ?>
          <a href="logOut.php" class="btn btn-danger mx-2">LogOut</a>
        <?php endif; ?>
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1):?>
          <a href="administrador.php" class="btn btn-primary mx-2">Panel de Control</a>
          <?php endif;?>
          <!-- Button trigger modal carrito-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="bi bi-cart-fill"></i>(<span id="carrito-count"><?= $carrito_count ?></span>)
        </button>
      </div>
    </div>
  </nav>
  <?php require_once 'modalCarrito.php'?>
</header>