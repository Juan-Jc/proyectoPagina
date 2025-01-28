<footer class="bg-dark text-light text-center py-2 mt-2">
  <div class="container-fluid mt-2 ">
    <ul class="navbar-nav flex-row justify-content-around ">
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
          <a class="nav-link text-light active" href="productos.php">Hombre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="productos.php">Mujer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="productos.php">Ofertas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="contacto.php">Contacto</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
  <div class="mt-4">
    <p>© 2024 Company, Inc</p>
  </div>
</footer>