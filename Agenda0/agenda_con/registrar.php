<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtCorreo"])|| empty($_POST["txtNumero"])){
        header('Location: agenda.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $email = $_POST["txtCorreo"];
    $numero = $_POST["txtNumero"];
    
    $sentencia = $bd->prepare("INSERT INTO persona(nombre,apellido,email,numero) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$email,$numero]);

    if ($resultado === TRUE) {
        header('Location: agenda.php?mensaje=registrado');
    } else {
        header('Location: agenda.php?mensaje=error');
        exit();
    }
    
?>