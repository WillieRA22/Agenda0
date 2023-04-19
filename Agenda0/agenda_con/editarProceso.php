<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: agenda.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $email = $_POST['txtCorreo'];
    $numero = $_POST["txtNumero"];

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, apellido = ?, email = ?, numero = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $apellido, $email, $numero, $codigo]);

    if ($resultado === TRUE) {
        header('Location: agenda.php?mensaje=editado');
    } else {
        header('Location: agenda.php?mensaje=error');
        exit();
    }
    
?>