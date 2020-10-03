<?php 
    session_start();
    require_once 'config/functions.php';

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: index.php');
        exit;
    }

    // Publicación
    $state = $conexion->prepare('SELECT username as autor, imagen, titulo, fecha, texto
                                 FROM posts, usuarios 
                                 WHERE posts.usuarios_id = usuarios.id
                                 AND posts.id = :id');
    $state->execute(array(
        ':id' => $_GET['id']
    ));
    $result = $state->fetch();


    // Comentarios
    $state = $conexion->prepare('SELECT comentarios.id, username AS autor, texto, fecha 
                                 FROM comentarios, usuarios 
                                 WHERE posts_id=:id 
                                 AND usuarios_id=usuarios.id');
    $state->execute(array(
        ':id' => $_GET['id']
    ));
    $comentarios = $state->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STEAM Intercultural</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/dos.png" />
    <link rel="stylesheet" href="styles/estilos.css">

    <link rel="stylesheet" href="styles/style_todos.css">
    <link rel="stylesheet" href="styles/style_compo.css">
    <link rel="stylesheet" href="styles/pixelweave_login.css">
    <link rel="stylesheet" href="styles/buttons++.css">


    <!-- <link rel="stylesheet" href="styles/buttons.css"> -->


    <!-- Esta linea es necesaria para los iconos de donde bajamos los iconos de redes sociales  -->
    <!-- <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> -->
    <!--load all styles -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>


<body class="hidden">
    <header>
    <img class="logo" src="img/steamlogo.png" alt="logo">

        <nav class="oculto">
            <ul>
                <li><a href="index.php">PEUALISTLI</a></li>
                <?php if(isset($_SESSION["rol"])) {
                    if($_SESSION["rol"] == "Admin") {
                        echo '<li><a href="Admin_Panel.php">ADMINISTRAR</a></li>';
                    }
                }?>
                <li><a href="pizarra.php">UAPALITL</a></li>
                <li><a href="contacto.php">AUILTIA</a></li>
                <?php if(!isset($_SESSION["username"])):?>
                    <li><a href="login.php"><span>KALAKIR</span></a></li>
                <?php else:?>
                    <li><a href="config/logout.php"><span>KISA</span></a></li>
                <?php endif?>
            </ul>
        </nav>

        <div>
            <?php if(isset($_SESSION["username"])):?>
                <img id="userimage" src="img/profImg/<?php echo $_SESSION["profImg"]?>">
                <span id="username"><?php echo $_SESSION['username']?></span>
            <?php endif?>
            <button class="switch" id="btn-darkmode">
                <span><i class="fas fa-sun"></i></span>
                <span><i class="fas fa-moon"></i></span>
            </button>
            <span id="btn-menu">☰</span>
        </div>
    </header>

    <aside id="sidebar">

        <!-- ESTO ES PARA EL SIDE BAR  -->
        <i class="fas fa-chevron-right" id="aside-open"></i>
        <i class="fas fa-chevron-left" id="aside-close"></i>

        <!-- <div id="toggle-btn">
            <span><img src="./img/PIX_TRANS.png" width="35" height="40" align="center"></span>
        </div> -->
        <img class="uno" src="./img/PIXEL_TRANS.png" alt="Logo Fazt" class="logo">
        <ul>
            <?php
                if(isset($_SESSION["rol"])) {
                    if($_SESSION["rol"] == "Admin") {
                        echo '<li id="lista"><a id="left" href="Admin_Panel.php"> Administrar cuentas</a></li>';
                    }
                }

                echo '<li id="lista"><a id="centrar" href="pizarra.php"> Publicaciones</a> </li>';

                if(isset($_SESSION["rol"])) {
                    if($_SESSION["rol"] == "Admin" || $_SESSION["rol"] == "Edit") {
                        echo '<li id="lista"><a id="centrar" href="agregar.php"> Nueva publicacion</a> </li>';
                    }
                }

                if(!isset($_SESSION["username"])) {
                    echo '<li id="lista"><a id="left" href="login.php"><span>Iniciar Sesion</span></a></li>';
                } else {
                    echo '<li id="lista"><a id="left" href="config/logout.php"><span>Cerrar Sesion</span></a></li>';
                }
            ?>
        </ul>
    </aside>

    <main>
        <!-- <div id="portada">
            <h1>COMPONENTES</h1>
            <h2>UNICOS DE PIXELWEAVE</h2>
        </div> -->

        <i id="btn-subirAlCielo" class="fas fa-arrow-up sombra-resaltable"></i>

        <!-- <div class="toggleButton">
            <div class="button icon-sun"> <span> <br>modo nocturno</span> </div>
        </div> -->


        <section class="seccion">



            <h2>Publicacion de: <span></span></h2>
            <h3><?php echo $result['autor']?></h3> <br>
            

            <?php if($result["imagen"] != ""):?>
                <img class="centro" src="img/<?php echo $result["imagen"]?>" alt="IMAGENs "><br>
            <?php endif?>

            <h1><?php echo $result['titulo']?></h1>
            
            <div class="bloque">

                <span><?php echo $result['fecha']?></span>
                <p><?php echo $result['texto']?></p>
                <br>


                <?php if(tengo_acceso($_GET['id'])):?>
                    <a href="editar_post.php?id=<?php echo $_GET['id']?>">
                        <button estilo="azul">Editar</button>
                    </a>
                    
                    
                    <button estilo="azul" class="btn-modal" for="modal-eliminar">Eliminar</button>
                    <div id="modal-eliminar" class="modal-fuera oculto">
                        <div class="bloque" color="azul">
                            <span class="exit">X</span>
                            <h1>¿Seguro que deseas eliminar la publicación?</h1>
                            <a class="enlace" href="config/delete_post.php?id=<?php echo $_GET['id']?>">Eliminar</a>
                        </div>
                    </div>

                <?php endif?>
                
                <br><br>
                <form action="config/agregar_comentario.php" method="post">
                    <input type="hidden" name="postid" value="<?php echo $_GET['id']?>">

                    <label for="input-comentario">AÑADE UN COMENTARIO:</label> <br>
                    <textarea required id="input-comentario" name="texto" rows="3" cols="50" placeholder="Escriba algo aqui" <?php if(!isset($_SESSION['rol'])) echo "disabled"?>></textarea> <br>
                    
                    <?php if(isset($_SESSION['rol'])):?>
                        <input type="submit" value="Comentar">
                    <?php endif?>
                </form>

            </div> <br>

            <div class="bloque comentarios">
                <p>BLOQUE DE COMENTARIOS</p>
                <?php foreach($comentarios as $coment):?>
                    <?php if(tengo_acceso_comentario($coment['id'])):?>
                        <a href="config/eliminar_comentario.php?<?php echo "id=".$coment['id']."&post=".$_GET['id']?>">
                            <span class="exit">X</span>
                        </a>
                    <?php endif?>

                    <span><?php echo $coment['autor']?></span>
                    <sup><?php echo $coment['fecha']?></sup>
                    <p><?php echo $coment['texto']?></p>
                <?php endforeach?>
            </div>


            <br><br>

        </section>


    </main>

    <footer id="contacto">
        <div class="footer contenedor">
            <div class="iconos">
                <img style="width;200px; height:200px;" src="img/Untitled Diagram.png" alt=""><img style="width;200px; height:200px;" src="img/steamlogo.png" alt=""><img style="width;200px; height:200px;" src="img/NASA.png" alt="">
            </div>
            <div class="iconos">
                <i href="https://www.youtube.com/" class="fab fa-youtube"></i>
                <i href="https://www.facebook.com/" class="fab fa-facebook-square"></i>
                <i href="https://github.com/" class="fab fa-github"></i>
                <i href="https://twitter.com/explore" class="fab fa-twitter-square"></i>

            </div>
            <p>La creatividad es la inteligencia divirtiéndose.  ~~~~~~   Nextilistli yolokayotl mauisolistli.  Albert Einstein   </p>
        </div>

    </footer>


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/filtro.js"></script>
    <script src="js/aside.js"></script>
    <script src="js/pixelweave.js"></script>
</body>

</html>