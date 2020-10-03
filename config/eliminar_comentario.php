<?php 
    session_start();
    require_once 'functions.php';

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: ../index.php');
        exit;
    }

    if(!tengo_acceso_comentario($_GET['id'])) {
        header('Location: ../index.php');
        exit;
    }
    
    $state = $conexion->prepare("DELETE FROM comentarios 
                                 WHERE id=:id");
    $state->execute(array(
        ':id' => $_GET['id']
    ));

    header("Location: ../Post.php?id=".$_GET['post']);
?>