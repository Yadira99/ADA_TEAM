<?php
    session_start();
    require_once 'functions.php';

    if(!tengo_acceso($_GET['id'])) {
        header("Location: ../index.php");
        exit;
    }

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: ../index.php');
        exit;
    }

    $state = $conexion->prepare('DELETE FROM posts WHERE id=:id');
    $state->execute(array(
        ':id' => $_GET['id']
    ));
  
    header("Location: ../pizarra.php");
?>