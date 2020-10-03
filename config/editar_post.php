<?php
    session_start();
    require_once 'functions.php';

    if(!tengo_acceso($_POST['id'])) {
        header('Location: ../index.php');
        exit;
    }

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: ../index.php');
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $check = !empty($_FILES) ? @getimagesize($_FILES['imagen']['tmp_name']) : false;
        
        if($check !== false) {
            $folder = '../img/';
            $archivo = $folder.$_FILES['imagen']['name'];
            move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo);

            $state = $conexion->prepare("UPDATE posts 
                                         SET titulo=:titulo, texto=:texto, imagen=:imagen
                                         WHERE id=:id");
            $state->execute(array(
                ':titulo'   => $_POST['titulo'],
                ':texto'    => $_POST['texto'],
                ':imagen'   => $_FILES['imagen']['name'],
                ':id'       => $_POST['id']
            ));
        } else {
            $state = $conexion->prepare("UPDATE posts 
                                         SET titulo=:titulo, texto=:texto
                                         WHERE id=:id");
            $state->execute(array(
                ':titulo'   => $_POST['titulo'],
                ':texto'    => $_POST['texto'],
                ':id'       => $_POST['id']
            ));
        }

        header("Location: ../Post.php?id=".$_POST['id']);
        exit;
    }
    
    header("Location: ../index.php");
?>