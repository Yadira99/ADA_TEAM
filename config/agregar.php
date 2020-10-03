<?php
    session_start();
    require_once 'functions.php';

    if(!isset($_SESSION['rol'])) {
        header('Location: ../index.php');
        exit;
    }

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: ../index.php');
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
        $check = @getimagesize($_FILES['imagen']['tmp_name']);

        if($check !== false) {
            $folder = '../img/';
            $archivo = $folder.$_FILES['imagen']['name'];
            move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo);
            
            $imagen = $_FILES['imagen']['name'];
        } else {
            $imagen = "";
        }

        $state = $conexion->prepare('INSERT INTO posts (titulo, texto, imagen, usuarios_id) 
                                        VALUES (:titulo, :texto, :imagen, :usuarios_id)');
        $state->execute(array(
            ':titulo'       => $_POST['titulo'],
            ':texto'        => $_POST['texto'],
            ':usuarios_id'  => $_SESSION['id'],
            ':imagen'        => $imagen
        ));
    }
    header("Location: ../pizarra.php");
?>