<?php
    session_start();
    require_once 'functions.php';

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: ../index.php');
        exit;
    }

    
    $state = $conexion->prepare("SELECT id, username, password, rol, profImg FROM usuarios WHERE username=:username AND password=SHA2(:password, 256)");
    $state->execute(array(
        ':username' => $_POST['username'],
        ':password' => $_POST['password']
    ));
    
    $result = $state->fetch();
    
    if($result == false) {
        setcookie("msg", "Usuario o contraseña incorrectos", time()+2, "/");
        header("Location: ../login.php");
    } else {
        $_SESSION["username"] = $result["username"];
        $_SESSION["rol"] = $result["rol"];
        $_SESSION["profImg"] = $result["profImg"];
        $_SESSION["id"] = $result["id"];

        header("Location: ../index.php");
    }
?>