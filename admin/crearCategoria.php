<section id="crearCategoria" style="display:none;" class="comun text-light bg-dark p-2 mt-2 rounded-4  mx-auto">
        <h2 class="text-center ">Crear Categorias</h2>
        <!-- crear categorias -->
        <form  action="../admin/logica.php" method="post" enctype="multipart/form-data">
            <label for="nameCat">Nombre de Categoria</label>
            <input class="form-control mt-2" type="text" name="nameCat" id="nameCat" placeholder="Nueva Categoria">
            <label for="imgCat">Imagen de Categoria</label>
            <input class="form-control mt-2" type="file" name="imgCat" id="imgCat" accept="image/*">
            <input class="btn btn-primary mt-2" type="submit" value="Crear Categoria">
        </form>
       
</section>