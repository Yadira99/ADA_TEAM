<?php
    session_start();
    require_once 'functions.php';

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: ../index.php');
        exit;
    }

    $anteriorURL = "register.php";
    if(isset($_SESSION["rol"])) {
        if($_SESSION["rol"] == "Admin") {
            $anteriorURL = "Admin_Panel.php";
        }
    }

    
    if($_POST["password"] != $_POST["password2"]) {
        setcookie("msg", "Las contraseñas no coinciden", time()+2, "/");
        header("Location: ../$anteriorURL");
        exit;
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $rol = isset($_POST["rol"]) ? $_POST["rol"] : "Edit";
        $check = !empty($_FILES) ? @getimagesize($_FILES['profImg']['tmp_name']) : false;

        if($check !== false) {
            $folder = '../img/profImg/';
            $archivo = $folder.$_FILES['profImg']['name'];
            move_uploaded_file($_FILES['profImg']['tmp_name'], $archivo);

            $state = $conexion->prepare("INSERT INTO usuarios (username, password, nombre, apellidos, rol, profImg) VALUES (:username, SHA2(:password, 256), :nombre, :apellidos, :rol, :profImg)");
            $state->execute(array(
                ':username'     => $_POST['username'],
                ':password'     => $_POST['password'],
                ':nombre'       => $_POST['nombre'],
                ':apellidos'    => $_POST['apellidos'],
                ':rol'          => $rol,
                ':profImg'      => $_FILES['profImg']['name']
            ));
        } else {
            $state = $conexion->prepare("INSERT INTO usuarios (username, password, nombre, apellidos, rol) VALUES (:username, SHA2(:password, 256), :nombre, :apellidos, :rol)");
            $state->execute(array(
                ':username'     => $_POST['username'],
                ':password'     => $_POST['password'],
                ':nombre'       => $_POST['nombre'],
                ':apellidos'    => $_POST['apellidos'],
                ':rol'          => $rol
            ));
        }
        
        setcookie("msg", "Usuario creado correctamente", time()+2, "/");
        if($anteriorURL == "Admin_Panel.php") {
            header("Location: ../$anteriorURL");
        } else {
            header("Location: ../login.php");
        }
        exit;
    }
    
    
    setcookie("msg", "Error al crear el usuario", time()+2, "/");
    header("Location: ../$anteriorURL");
?>