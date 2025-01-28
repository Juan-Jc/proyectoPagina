<?php require_once "sessionStart.php";?>
<!DOCTYPE html>
<html lang="es" class="h-100">
<?php require_once "head.php"; ?>

<body class="fondoImg d-flex flex-column h-100">
  <?php require_once "header.php"; ?>
  <main class="content-wrap">
    <div class="text-center text-light fondoOpaco p-2 mb-5    ">
      <h1>Formulario de Contacto</h1>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt deleniti debitis aspernatur culpa, doloremque sint porro nam facere vel ipsum?</p>
    </div>
    <section class="container-fluid w-50 rounded-4 p-5 text-light" style="background-color: rgba(82, 82, 82, 0.57);">
      <form class="row g-3">
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="validationDefault01" name="nombre" required>
        </div>
        <div class="col-md-4">
          <label for="validationDefault02" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="validationDefault02" name="apellido" required>
        </div>
        <div class="col-md-4">
          <label for="email" class="form-label">Correo electronico</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-4">
          <label for="validationDefaultUsername" class="form-label">Usuario</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
            <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name="usuario" required>
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationDefault03" class="form-label">Ciudad</label>
          <input type="text" class="form-control" id="validationDefault03" name="ciudad" required>
        </div>
        <div class="col-md-4">
          <label for="validationDefault05" class="form-label">Codigo Postal</label>
          <input type="text" class="form-control" id="validationDefault05" name="cp" required>
        </div>
        <div class="col-12">
          <label for="mensaje">Comentario</label>
          <input type="text-area" class="form-control" name="mensaje" id="mensaje">
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="terminos" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
              Acepto los <a href="#">Terminos y condiciones</a>.
            </label>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Suscribete</button>
        </div>
      </form>
    </section>
    <section class="d-flex justify-content-center ">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d781.9001773734446!2d-0.506006645867517!3d38.38135749228277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6236bf61667edf%3A0xeca65f4d2929247f!2sThe%20Outlet%20Stores%20Alicante!5e0!3m2!1ses!2ses!4v1732043467026!5m2!1ses!2ses" class="w-50 mt-5 rounded-4" height="200px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
  </main>
  <?php require_once "footer.php" ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>