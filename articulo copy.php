<?php 
    session_start();

    if(isset($_SESSION["rol"])) {
        header("Location: index.php");
        exit;
    }
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
                    <li><a class="actual" href="login.php"><span>KALAKIR</span></a></li>
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
        <!-- <div id="portada">
            <h1>COMPONENTES</h1>
            <h2>UNICOS DE PIXELWEAVE</h2>
        </div> -->

        <i id="btn-subirAlCielo" class="fas fa-arrow-up sombra-resaltable"></i>

        <!-- <div class="toggleButton">
            <div class="button icon-sun"> <span> <br>modo nocturno</span> </div>
        </div> -->


        <section class="seccion">

            <div>
            <br>
            <h1>Ayejyekatl ik kuikuiltik an mauitstik ayamiktlan ik Júpiter.</h1>
            <h2>Ciclones de color en el polo norte de Júpiter</h2>
                    <p>
                    Los ciclones en el polo norte de Júpiter aparecen como remolinos de colores llamativos en esta reproducción de color falso extremo de una imagen de la misión Juno de la NASA. El ciclón enorme y persistente que se encuentra en el polo norte de Júpiter es visible en el centro de la imagen, rodeado por ciclones más pequeños que varían en tamaño de 2.500 a 2.900 millas (4.000 a 4.600 kilómetros). Juntos, este patrón de tormentas cubre un área que empequeñecería a la Tierra.


                    Ayejyekatl an mauitstik ayamiktlan ik Júpiter mo nextia kemej ejekamalakatl kuikuiltik ik tlakopinalistli tlapali an semiluitekitl Juno ik NASA. Ayejyekatl hueyi an mochipakak ma namiki Ilakatsiuki an mauitstik ayamiktlan ik Júpiter, nestok nepantla an ixiptli, yaualoa ik  ilakatsiukimej achi tepitsin man tlakuepa pan ixkichi 4.000 a 4.600 kilómetros. Sekan, inin nextiyotl te ejekakuilme malkochoa se tlakautli pisiloa to in semtlaltipak.</p>
            </div>



            <!-- <button estilo="amarillo">Amarillo</button> -->

            <br><br>
            <!-- 
            <button id="btn-modal1" estilo="verde">¡Alert!</button>

            <button id="btn-modal3" estilo="rosa">¡Alert!</button> -->

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