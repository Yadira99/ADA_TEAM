<?php 
    session_start();
    require_once 'config/functions.php';

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: index.php');
        exit;
    }

    
    $state = $conexion->prepare('SELECT posts.id, username as autor, imagen, titulo, fecha, texto 
                                 FROM posts, usuarios 
                                 WHERE posts.usuarios_id = usuarios.id');

    $state->execute();
    $result = $state->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STEAM Intercultural</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/dos.png" />

    <link rel="stylesheet" href="styles/style_todos.css">
    <link rel="stylesheet" href="styles/style_compo.css">
    <link rel="stylesheet" href="styles/pixelweave_login.css">
    <link rel="stylesheet" href="styles/buttons++.css">
    <link rel="stylesheet" href="styles/style_herra.css">
    <link rel="stylesheet" href="styles/estilos.css">

    <!-- <link rel="stylesheet" href="styles/pixelweave.css"> -->


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
                <li><a class="actual" href="pizarra.php">UAPALITL</a></li>
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

        <br>
        <br>


        <section class="seccion">
            <div class="introduccion">
                <h1 id="introduccion">UAPALITL</h1> <br>
                <p>Aqui encontraras alguna informacion importante en el desarrollo del STEAM en conjunto con la NASA</p>
                <br>

            </div>




            <div class="diseño">

                <h3 id="contenedores">PUBLICACIONES</h3>

                <div class="contenedor-3">


                    <?php foreach($result as $tarjeta):?>
                    <a href="Post.php?id=<?php echo $tarjeta['id']?>">
                        <div class="tarjeta1">
                            <div class="arriba">
                                <h3><?php echo $tarjeta['autor']?></h3>
                                <?php if($tarjeta['imagen'] != ""):?>
                                <img src="img/<?php echo $tarjeta['imagen']?>" alt="imagen">
                                <?php endif?>
                            </div>
                            <div class="abajo">
                                <h4><?php echo $tarjeta['titulo']?></h4>
                                <h5><?php echo $tarjeta['fecha']?></h5>

                                <br>
                                <p><?php echo $tarjeta['texto']?></p>
                            </div>
                        </div>
                    </a>
                    <?php endforeach?>

                </div> <br> <br>
                <br>
                <div class="galeria">
                    <!-- <h1>Galeria Efecto Overlay</h1> -->
                    <!-- <div class="linea"></div> -->
                    <div class="contenedor-imagenes">
                        <!-- <h2></h2> -->
                        <div class="imagen">
                            <a href="articulo copy 2.php">
                                <img src="img/galeria1.jpg" alt="">
                                <div class="overlay">
                                    <h2>Espacio</h2>
                                    <p>Amaj iuan nochipa tonalli nelia xiyolpakto.</p>
                                </div>
                            </a>
                        </div>
                        <div class="imagen">
                            <a href="articulo.php">
                                <img src="img/galeria2.jpg" alt="">
                                <div class="overlay">
                                    <h2>Luna</h2>
                                    <p>Amaj iuan nochipa ma mitsuanti tlauilpakilistli.</p>
                                </div>
                            </a>


                        </div>
                        <div class="imagen">
                            <a href="articulo copy 3.php">
                                <img src="img/galeria3.jpg" alt="">
                                <div class="overlay">
                                    <h2>Robótica</h2>
                                    <p>Ika miak tlasotlalistli xikonselli ni pilmentsin nemaktli.</p>
                                </div>
                            </a>


                        </div>
                        <div class="imagen">
                            <a href="articulo copy.php">
                                <img src="img/galeria4.png" alt="">
                                <div class="overlay">
                                    <h2>Jupiter</h2>
                                    <p>Kani tiwalaj, ma titlajtokan totlajtol nochipa.</p>
                                </div>
                            </a>


                        </div>

                    </div>

                </div>
        </section>
        </div>

        </div>
        </section>
    </main>

    <footer id="contacto">
        <div class="footer contenedor">
            <div class="iconos">
                <img style="width;200px; height:200px;" src="img/Untitled Diagram.png" alt=""><img
                    style="width;200px; height:200px;" src="img/steamlogo.png" alt=""><img
                    style="width;200px; height:200px;" src="img/NASA.png" alt="">
            </div>
            <div class="iconos">
                <i href="https://www.youtube.com/" class="fab fa-youtube"></i>
                <i href="https://www.facebook.com/" class="fab fa-facebook-square"></i>
                <i href="https://github.com/" class="fab fa-github"></i>
                <i href="https://twitter.com/explore" class="fab fa-twitter-square"></i>

            </div>
            <p>La creatividad es la inteligencia divirtiéndose. ~~~~~~ Nextilistli yolokayotl mauisolistli. Albert
                Einstein </p>
        </div>

    </footer>


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/filtro.js"></script>
    <script src="js/aside.js"></script>
    <script src="js/pixelweave.js"></script>

</body>

</html>