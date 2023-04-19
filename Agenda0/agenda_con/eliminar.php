<?php 
    if(!isset($_GET['codigo'])){
        header('Location: agenda.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("DELETE FROM persona where codigo = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: agenda.php?mensaje=eliminado');
    } else {
        header('Location: agenda.php?mensaje=error');
    }
    
?>