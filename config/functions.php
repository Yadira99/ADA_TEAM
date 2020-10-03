<?php
    require 'config.php';


    function connect($srv, $db, $u, $p) {
        try {
            $con = new PDO("mysql:host=$srv;dbname=$db", $u, $p);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Verifica si el usuario actual es autor de este post
    function soy_autor($postid) {
        $server = "localhost";
        $db = "socially";
        $user = "root";
        $pass = "P@t1t0mysql";

        if(!isset($_SESSION['id'])) {
            return false;
        }

        $conexion = connect($server, $db, $user, $pass);

        if(!$conexion) {
            return false;
        }
        
        $state = $conexion->prepare('SELECT usuarios_id as userid FROM posts WHERE id=:postid');
        $state->execute(array(
            ':postid' => $postid
        ));
        $result = $state->fetch();
        
        return $_SESSION['id'] == $result['userid'];
    }


    // Verifica si el usuario actual es Admin, o autor de un post
    function tengo_acceso($postid) {
        if(!isset($_SESSION['rol'])) {
            return false;
        }

        if($_SESSION['rol'] == "Edit") {
            return soy_autor($postid);
        }

        if($_SESSION['rol'] == "Admin") {
            return true;
        }

        return false;
    }

    // Verifica si el usuario actual puede eliminar este comentario 
    function tengo_acceso_comentario($id) {
        if(!isset($_SESSION['id'])) {
            return false;
        }

        if($_SESSION['rol'] == 'Admin') {
            return true;
        }

        $server = "localhost";
        $db = "socially";
        $user = "root";
        $pass = "P@t1t0mysql";
        $conexion = connect($server, $db, $user, $pass);

        if(!$conexion) {
            return false;
        }

        $state = $conexion->prepare('SELECT usuarios_id as userid 
                                     FROM comentarios WHERE id=:id');
        $state->execute(array(
            ':id' => $id
        ));
        $result = $state->fetch();
                
        return $_SESSION['id'] == $result['userid'];
    }
?>