<main class="container w-100 form-signin mt-2 pt-2 d-flex justify-content-around h-100">

<article class="text-light align-content-center w-50 fondoOpaco rounded-circle text-center col-6">
  <h2 class="h1 ">Tu Marca de Confianza</h2>
  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis, et? Voluptatum cum neque facere tempore ea repudiandae possimus tempora excepturi?</p>
</article>
<?php if(!$hayLogin):?>
  <form class="bg-dark rounded-4 col-6 p-3 text-center mx-5" action="loginSession.php" method="post">
  <a class="navbar-brand " href="#"><i class="bi bi-valentine2 h1 align-middle text-danger"></i><span class="align-middle text-light brand">Valentine</span></a>
    <h1 class="h3 fw-normal text-light mb-4 mt-4">Inicia Sesión</h1>

    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-check text-start my-2">
    </div>
    <button class="btn btn-danger w-100 py-2" type="submit">Iniciar Sesión</button>
    <p class="mt-3 mb-2 text-light text-center">&copy; 2017–2024</p>
  </form>
  <?php else:?>
    <article class="bg-dark rounded-4 col-6 p-3 text-center mx-5 d-flex flex-column justify-content-center">
      <h2 class="text-light">Ya Iniciaste Sesión en :</h2>
      <a class="navbar-brand" href="#"><i class="bi bi-valentine2 h1 align-middle text-danger"></i><span class="align-middle text-light brand">Valentine</span></a>
    </article>
    <?php endif;?>
</main>