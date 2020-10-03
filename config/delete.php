<?php
    session_start();
    
    if(!isset($_SESSION["rol"])) {
        header("Location: ../index.php");
        exit;
    } else if($_SESSION["rol"] != "Admin") {
        header("Location: ../index.php");
        exit;
    }
    
    require_once 'functions.php';

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: ../index.php');
    }

    if(isset($_SESSION["rol"])) {
        if($_SESSION["rol"] == "Admin") {

            if(isset($_GET["user"])) {
                $state = $conexion->prepare("DELETE FROM usuarios WHERE username=:username");
                $state->execute(array(
                    ':username' => $_GET['user']
                ));
            }

            header("Location: ../Admin_Panel.php");
            exit;
        }
    }

    header("Location: ../index.php");
?>