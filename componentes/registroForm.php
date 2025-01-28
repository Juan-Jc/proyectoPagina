<main>
<h2 class="text-center text-light">Registrarse</h2>
<div class="container w-50 bg-dark text-light rounded-4 p-4">
    <form class="text-center" method="post" action="registroPDO.php">
        <label for="nombre">Nombre</label>
        <input class="form-control mt-2" id="nombre" type="text" name="nombre" required>
        <label for="pass">Password</label>
        <input class="form-control mt-2" id="pass" type="text" name="pass" required>
        <label for="email">Email</label>
        <input class="form-control mt-2" id="email" type="email" name="email" required>
        <label for="telef">Telefono</label>
        <input class="form-control mt-2" id="telef" type="text" name="telef" required>
        <label for="dir">Dirección</label>
        <input class="form-control mt-2" id="dir" type="text" name="dir" required>
        <label for="cp">Codigo Postal</label>
        <input class="form-control mt-2" id="cp" type="text" name="cp" required>
        <label for="provincia">Provincia</label>
        <input class="form-control mt-2" id="provincia" type="text" name="provincia" required>

        <input class="btn btn-primary mt-3 " type="submit">
    </form>
</div>
</main>