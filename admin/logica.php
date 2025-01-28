<!-- Crear Categorias -->
<?php
//  Insertar Nueva Categoria
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nameCat']) && isset($_FILES['imgCat'])) {

        // verificar si la categoria ya existe
        try {
            require_once 'conexionDB.php';
            $sql = 'SELECT * FROM categorias c WHERE c.nombreCat = :nameCat;';
            $stm = $pdo->prepare($sql);
            $stm->bindParam(':nameCat', $_POST['nameCat']);
            $stm->execute();
            $response = $stm->fetch();
            // si existe enviar un error y avisar de la existencia
            if (is_array($response)) {
                header('location: ../componentes/administrador.php?c=0');
            } else {
                // si no existe crearla.
                // buscar ruta de almacenamiento si no existe crearla
                $dirSubida  = '../assets/imgCat/';
                if (!file_exists($dirSubida)) {
                    mkdir($dirSubida, 0777);
                }
                $fichero = pathinfo($_FILES['imgCat']['name'], PATHINFO_ALL);
                $nombreFichero = uniqid() . '_' . basename($fichero['basename']);
                // mover el fichero 
                if (move_uploaded_file($_FILES['imgCat']['tmp_name'], $dirSubida . $nombreFichero)) {
                    // agregarla a la base de datos
                    $sqlIn = 'INSERT INTO categorias (nombreCat, url ) VALUE (?,?);';
                    $stmIn = $pdo->prepare($sqlIn);
                    $stmIn->bindValue(1, $_POST['nameCat']);
                    $stmIn->bindValue(2, $nombreFichero);
                    $stmIn->execute();
                    header('location: ../componentes/administrador.php?c=1');
                    die;
                }
            }
        } catch (\Throwable $th) {
            die($th);
        }
    }
}
?>
<!-- Crear Productos -->

<?php



//  recibir datos por post
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // verificar que vengan completos
    if (
        isset($_POST['prodName']) &&
        isset($_POST['prodDesc']) &&
        isset($_POST['prodLongDesc']) &&
        isset($_POST['prodPrice']) &&
        isset($_POST['nombreCat']) &&
        isset($_POST['prodOferta']) &&
        isset($_FILES['imgsProd'])
    ) {
        // validar directorio de almacenamiento
        $dirSubidaProd = '../assets/imgProd/';
        if (!file_exists($dirSubidaProd)) {
            mkdir($dirSubidaProd, 0777);
        }
        require_once 'conexionDB.php';
        $sqlIn = 'INSERT INTO productos  (nombre , descripcion, descLarga, precio, idCat, oferta)  VALUES (:prodName, :prodDesc, :prodLongDesc, :prodPrice, :nombreCat, :prodOferta);';

        $stmIn = $pdo->prepare($sqlIn);
        $stmIn->bindParam(':prodName', $_POST['prodName']);
        $stmIn->bindParam(':prodDesc', $_POST['prodDesc']);
        $stmIn->bindParam(':prodLongDesc', $_POST['prodLongDesc']);
        $stmIn->bindParam(':prodPrice', $_POST['prodPrice']);
        $stmIn->bindParam(':nombreCat', $_POST['nombreCat']);
        $stmIn->bindParam(':prodOferta', $_POST['prodOferta']);

        if ($stmIn->execute()) {
            foreach($_FILES['imgsProd']['tmp_name'] as $key => $tmp_name) {
                echo $key;
                if ($_FILES['imgsProd']['name'][$key]) {
                    $foto = $_FILES['imgsProd']['name'][$key];
                    $fiche = pathinfo($foto, PATHINFO_ALL);
                    $nombreFiche = uniqid() . '_' . basename($fiche['basename']);
                }
                if (move_uploaded_file($tmp_name,  $dirSubidaProd . $nombreFiche)) {
                    echo 'movidos';
                    // insertar en base de datos
                    try {
                        $sqlQ = 'SELECT MAX(idProducto) FROM productos;';
                        $stmQ = $pdo->query($sqlQ);
                        $stmQ->execute();
                        $resQ = $stmQ->fetch(PDO::FETCH_ASSOC);
                        print_r($resQ);
                        // insertar foto en producto;
                        $sqlIn2 = 'INSERT INTO fotosproductos (idProducto, url) VALUES (:idProducto, :prodUrl);';
                        $stmIn2 = $pdo->prepare($sqlIn2);
                        $stmIn2->bindParam(':idProducto', $resQ['MAX(idProducto)']);
                        $stmIn2->bindParam(':prodUrl', $nombreFiche);
                        $stmIn2->execute();
                        ;
                    } catch (\Throwable $th) {
                        die($th);
                    }
                } 
            }
            header('location: ../componentes/administrador.php?cp=1');
        }else {
            header('location: ../componentes/administrador.php?cp=0');
            die;
        }
    }
}
?>

<!-- Seccion Usuarios -->
<!-- consultar la base de datos de usuarios -->
<?php
//    un if con la sesion de administrador activa
try {
    require_once 'conexionDB.php';
    $sqlt = 'SELECT nombre, email, telef, direccion, cp, provincia, rol FROM usuarios;';
    $stm = $pdo->query($sqlt);
    if (!$stm->execute()) {
        die('Error en la consulta');
    }
    $response = $stm->fetchAll(PDO::FETCH_ASSOC);
    $userRow = '';
    foreach ($response as $user) {
        if ($user['rol'] == 1) {
            $rol = 'Administrador';
        } else {
            $rol = 'Usuario';
        }
        $userRow .= "<tr>
            <td>$user[nombre]</td>
            <td>$user[email]</td>
            <td>$user[telef]</td>
            <td>$user[direccion]</td>
            <td>$user[cp]</td>
            <td>$user[provincia]</td>
            <td>$rol</td>
            <td><a href='#modalDelUser' data-bs-toggle='modal' data-bs-idDelUser=$user[email]><i class='bi bi-trash-fill'></i></a> | 
            <a href=''><i class='bi bi-pencil-square'></i></a>
            </td>
            </tr>";
    }
} catch (\Throwable $th) {
    die($th);
}
?>