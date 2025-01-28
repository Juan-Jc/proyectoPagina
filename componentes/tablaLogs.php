<?php
$fila = '';
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    require_once "conexionDb.php";
    $sql = "SELECT * FROM accesos ORDER BY id DESC limit 5";
    $stm = $pdo->query($sql);
    if (!$stm->execute()) {
        die('error al consultar');
    }
    $response = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($response as $log) {
        if($log['correcto']){
            $class = 'table-success';
        }else{
            $class = 'table-danger';
        }
        $fila.= "<tr>
        <td>$log[id]</td>
        <td>$log[email]</td>
        <td>$log[pass]</td>
        <td>$log[fecha]</td>
        <td class = $class >$log[correcto]</td>
        <td>$log[ip]</td>
        </tr>";
    }
    
}
?>
<section id="tablaLogs" style="display:none;" class="comun mx-auto">
<h2 class="text-light text-center">Intentos de Inicio de Session</h2>
<table class="table container-fluid w-50 table-hover">
    <tr class="table-dark">
        <th>Id</th>
        <th>Email</th>
        <th>Password</th>
        <th>Fecha</th>
        <th>Correcto</th>
        <th>Ip</th>
    </tr>
    <?=$fila ;?>
</table>
</section>