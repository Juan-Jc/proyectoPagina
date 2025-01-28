<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if(isset($email) && isset($password)){
        require_once "conexionDb.php";
        $sql = 'SELECT * FROM usuarios WHERE email = :email AND pass = :pass';
        $stm = $pdo->prepare($sql);
        $stm->bindParam(':email', $email,PDO::PARAM_STR);
        $stm->bindParam(':pass',$password,PDO::PARAM_STR);
        if(!$stm->execute()){
            die('Error al consultar');
        }
        $response = $stm->fetch(PDO::FETCH_ASSOC);
        if(isset($_SERVER['REMOTE_ADDR'])){
            $ip = $_SERVER['REMOTE_ADDR']?? '';
        }

        $sql = 'INSERT INTO accesos (email, pass, correcto, ip) VALUES (?,?,?,?)';
        $stm1 = $pdo->prepare($sql);
        $stm1->bindValue(1,$email,PDO::PARAM_STR);
        $stm1->bindValue(2,$password,PDO::PARAM_STR);
        $stm1->bindValue(3,$response,PDO::PARAM_BOOL);
        $stm1->bindValue(4,$ip,PDO::PARAM_STR);
        $stm1->execute();
        if($response){
            $_SESSION['nombre'] = $response['nombre'];
            $_SESSION['login'] = true;
            $_SESSION['admin'] = $response['rol'];
            header('location:inicio.php');
            exit;
        }else{
            $_SESSION['login'] = false;
            header('location: inicio.php');
        }
    }
}
?>