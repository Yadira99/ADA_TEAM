<?php
    session_start();
    require_once 'functions.php';

    if(!isset($_SESSION['rol'])) {
        header("Location: ../index.php");
        exit;
    }

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: ../index.php');
        exit;
    }

    $state = $conexion->prepare("INSERT INTO comentarios (texto, usuarios_id, posts_id)
                                 VALUES (:texto, :userid, :postid)");
    $state->execute(array(
        ':texto'  => $_POST['texto'],
        ':userid' => $_SESSION['id'],
        ':postid' => $_POST['postid']
    ));
    
    header("Location: ../Post.php?id=".$_POST['postid']);
?>