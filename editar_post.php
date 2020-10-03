<?php 
    session_start();
    require_once 'config/functions.php';
    
    if(!tengo_acceso($_GET['id'])) {
        header("Location: index.php");
        exit;
    }

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: index.php');
        exit;
    }

    
    $state = $conexion->prepare("SELECT titulo, texto FROM posts WHERE id=:id");
    $state->execute(array(
        ':id' => $_GET['id']
    ));
    
    $result = $state->fetch();

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
                <!-- <li><a href="pizarra.php">PUBLICACIONES</a></li> -->
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



            <h2>Editar Publicacion</h2>
            
            <!-- <img class="centro" src="img/marketing1.jpeg" alt="IMAGENs "><br> -->
            <div class="bloque">
                <form id="formulario" action="config/editar_post.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']?>">

                    <label for="input-titulo">Introduccion (menor de 20 caracteres):<span>*</span></label> <br>
                    <input name="titulo" type="textarea" id="input-titulo" value="<?php echo $result['titulo']?>" required> <br>

                    <label for="input-contenido">Contenido:<span>*</span></label> <br>
                    <textarea name="texto" rows="10" cols="50" id="input-contenido" required><?php echo $result['texto']?></textarea> 
                    <br><br>

                    <label for="input-imagen">Cambiar imagen (opcional)</label>
                    <input type="file" name="imagen" id="input-imagen">
                    <br><br>

                    <label for="btnEnviar">Actualizar Publicación</label><br>
                    <input type="submit" id="btnEnviar" value="Actualizar"><br><br>
                  
                </form> <br>
              
                    <br>

            </div> <br>
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