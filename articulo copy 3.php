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
            <h1>  Ellen Ochoa Tetlapaloa Achto Teposkuayolotl Pixautoktonakayotl Auikyaui in Iluikalikoyan</h1>
            <h2>Ellen Ochoa Estrecha la Mano con el Primer Robot Humanoide Dirigido a la Estación</h2>
                <p>                       La entonces subdirectora del Centro Espacial Johnson de la NASA, Ellen Ochoa, posa para una foto con
                    Robonaut 2 (R2) durante el día de prensa en la Instalación de Maquetas de Vehículos Espaciales el 4
                    de agosto de 2010. R2 recibió un aventón del STS -133 hacia la Estación Espacial Internacional. Fue
                    el primer robot humanoide en viajar al espacio y el primer robot construido en Estados Unidos en
                    visitar la estación. R2 permanecerá en la estación espacial indefinidamente para permitir que los
                    ingenieros en tierra aprendan más sobre cómo les va a los robots humanoides en microgravedad.

                    Ochoa se convirtió en directora del Centro Johnson en 2012 y se retiró de ese puesto en 2018. Es una
                    veterana de cuatro vuelos de transbordadores espaciales y tiene un doctorado en ingeniería eléctrica
                    de Stanford.

                    #Mes_de_la_Herencia_Hispana

                    Crédito de la imagen: NASA
                    Editora: Yvette Smith

 
                 

                    In amokinkantin askitlakatlajtoani amatlakuilokan iluikali Johnson itech pohui in NASA, Ellen Ochoa,
                    motlauiaya ixpanui ce tlatolkuepaloni ika Robonaut 2 (R2) itech tlamalistliluitl in ipan naui tonali
                    chikuepan metztli xihuitl 2010. R2 niauikya iluikalikoyan mochintintlalpan itech STS -133. Yejua
                    achto teposkuayolotl pixautoktonakayotl niauikya iluikali iuan yejua achto teposkuayolotl nikaltia
                    itech Tlajtokayotl In Sepanka iuikpa Amerika tetlapaloa iluikalikoyan. R2 katiz ipan in
                    akuayololistlinixtla nik kuayolomachtiani tlamachtia tlakuepalistliua ipan teposkuayolotl
                    pixautoktonakayotl ipan in etiktistlitontli.

                    Ochoa -o mokuep tlakatlajtoani amatlakuilokan iluikali Johnson in ipan 2012 iuan nitsinkixtli in
                    ipan 2018. Yejua temachtekatl ika in naui iluikatepostotl iuan ueytemachtiani ipan ikpitikayotl
                    kuayolomachtilistli Stanfordua.

                    #Tetlakauililiua_Hispantlacatlua_Metztli

                    Ixiptliua: NASA
                    Amamachioni: Yvette Smith</p>
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