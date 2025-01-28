<?php
// require_once "comprobarLogin.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['telef']) && isset($_POST['dir']) && isset($_POST['cp']) && isset($_POST['provincia'])) {
        // $passHashed = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        require_once "conexionDb.php";
        // comprobar que el usuario no exista
        try{
            $sql='SELECT email FROM usuarios WHERE email=:email';
            $stmCheck = $pdo->prepare($sql);
            $stmCheck->bindParam(':email',$_POST['email']);
            $stmCheck->execute();
            $resp = $stmCheck->fetch(PDO::FETCH_ASSOC);
            if(isset($resp['email'])){
                echo'Este usuario ya esta registrado!!!';
            }else{
                // insertar usuario
                $insert = 'INSERT INTO usuarios (nombre, pass, email, telef, direccion, cp, provincia, rol) VALUES   (?,?,?,?,?,?,?,?)';
                $stm_insert = $pdo->prepare($insert);
                $stm_insert->bindValue(1, $_POST['nombre']);
                $stm_insert->bindValue(2, $_POST['pass']);
                $stm_insert->bindValue(3, $_POST['email']);
                $stm_insert->bindValue(4, $_POST['telef']);
                $stm_insert->bindValue(5, $_POST['dir']);
                $stm_insert->bindValue(6, $_POST['cp']);
                $stm_insert->bindValue(7, $_POST['provincia']);
                $stm_insert->bindValue(8, 2);
                try {
                    $ok = $stm_insert->execute();
                } catch (PDOException $e) {
                    $ok = false;
                }
                if ($ok) {
                    header('location:administrador.php?uUp=1');
                    
                } else {
                    header('location:administrador.php?uUp=0');
                    
                }
            }
        }catch(\Throwable $th){
            die($th);
        }

    }
}

