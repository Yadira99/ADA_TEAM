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
        exit;
    }

    if($_POST["nombre"] != "") {
        $state = $conexion->prepare('UPDATE usuarios SET nombre=:nombre WHERE username=:userkey');
        $state->execute(array(
            ':nombre' => $_POST['nombre'],
            ':userkey'  => $_POST['userkey']
        ));
    }

    if($_POST["apellidos"] != "") {
        $state = $conexion->prepare('UPDATE usuarios SET apellidos=:apellidos WHERE username=:userkey');
        $state->execute(array(
            ':apellidos' => $_POST['apellidos'],
            ':userkey'  => $_POST['userkey']
        ));
    }

    if($_POST["apellidos"] != "") {
        $state = $conexion->prepare('UPDATE usuarios SET apellidos=:apellidos WHERE username=:userkey');
        $state->execute(array(
            ':apellidos' => $_POST['apellidos'],
            ':userkey'  => $_POST['userkey']
        ));
    }

    if($_POST["username"] != "") {
        $state = $conexion->prepare('UPDATE usuarios SET username=:username WHERE username=:userkey');
        $state->execute(array(
            ':username' => $_POST['username'],
            ':userkey'  => $_POST['userkey'],
        ));
        if($_SESSION['username'] == $_POST['userkey']) {
            $_SESSION['username'] = $_POST['username'];
        }
    }

    if($_POST["password"] != "") {
        if($_POST["password"] == $_POST["password2"]) {
            $state = $conexion->prepare('UPDATE usuarios SET password=SHA2(:password, 256) WHERE username=:userkey');
            $state->execute(array(
                ':password' => $_POST['password'],
                ':userkey'  => $_POST['userkey'],
            ));
        } else {
            setcookie("msgedit", "Las contraseñas no coinciden", time()+2, "/");
        }
    }
    
    $check = !empty($_FILES) ? @getimagesize($_FILES['profImg']['tmp_name']) : false;

    if($check !== false) {
        $folder = '../img/profImg/';
        $archivo = $folder.$_FILES['profImg']['name'];
        move_uploaded_file($_FILES['profImg']['tmp_name'], $archivo);
        
        $state = $conexion->prepare('UPDATE usuarios SET profImg=:profImg WHERE username=:userkey');
        $state->execute(array(
            ':profImg' => $_FILES['profImg']['name'],
            ':userkey'  => $_POST['userkey'],
        ));
        if($_SESSION['username'] == $_POST['userkey']) {
            $_SESSION['profImg'] = $_FILES['profImg']['name'];
        }
    }

    if($_POST["rol"] != "") {
        $state = $conexion->prepare('UPDATE usuarios SET rol=:rol WHERE username=:userkey');
        $state->execute(array(
            ':rol' => $_POST['rol'],
            ':userkey'  => $_POST['userkey'],
        ));
        if($_SESSION['username'] == $_POST['userkey']) {
            $_SESSION['rol'] = $_POST['rol'];
        }
    }

    header("Location: ../Admin_Panel.php");
?>