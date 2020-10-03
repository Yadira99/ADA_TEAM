<?php 
    session_start();
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
    <link rel="stylesheet" href="styles/style-contac.css">
    <link rel="stylesheet" href="styles/pixelweave.css">

    <!-- Esta linea es necesaria para los iconos de donde bajamos los iconos de redes sociales  -->
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
                <li><a class="actual" href="contacto.php">AUILTIA</a></li>
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

    <main>
        <div id="portada">
            <h1>STEAM </h1>
            <h2>BY ADA TEAM</h2>
        </div>
    
        <i id="btn-subirAlCielo" class="fas fa-arrow-up sombra-resaltable"></i>

        
        <section class="team">
            <h1>DIVIERTETE CON STEAM INTERCULTURAL</h1>
            
            <div class="container">
                <div class="tarjeta2">
                    <div class="arriba">
                        <img src="img/game1.jpg" alt="team img" />
                    </div>
                    <div class="abajo">
                        <h4>Nimitztlazohtla nochi  <br> noyollo</h4>
                        <h5>SISTEMA SOLAR</h5>
                        <br>
                        <a href="sistema.php">
                            
                            <button estilo="amarillo">TLACHCO</button>
                        </a>
                    </div>
                </div>

                <div class="tarjeta2">
                    <div class="arriba">
                        <img src="img/game2.jpg" alt="team img" />
                    </div>
                    <div class="abajo">
                        <h4>Kemej nochi masewalmej <br> yayoksa </h4>
                        <h5>Juega tangram</h5>
                        <br>
                        <a href="src/index.php">
                            
                            <button estilo="amarillo">TLACHCO</button>
                        </a>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p> -->
                    </div>
                </div>
                <div class="tarjeta2">
                    <div class="arriba">
                        <img src="img/game3.png" alt="team img" />
                    </div>
                    <div class="abajo">
                        <h4>Ximosewikan kwali nochi<br> timoitase</h4>
                        <h5> Matematicás</h5>
                        <br>
                        <a href="mates.php">
                            
                            <button estilo="amarillo">TLACHCO</button>
                        </a>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p> -->
                    </div>
                </div>
                
                <!-- <div class="tarjeta2">
                    <div class="arriba">
                        <img src="img/mike.JPG" alt="team img" />
                    </div>
                    <div class="abajo">
                        <h4>Miguel Ángel Rodríguez</h4>
                        <h5>Control de calidad</h5>
                        <br>
                        <br>

                        <button estilo="amarillo">Contacto</button>
                    </div>
                </div> -->
            </div>
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
    <script src="js/pixelweave.js"></script>
</body>

</html>