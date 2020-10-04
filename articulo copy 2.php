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
                <h1>Nochitlakaj ankipiaj ixtelotin</h1>
                <h2>La humanidad tiene "ojos" </h2>
                <p>La humanidad tiene "ojos" que pueden detectar diferentes tipos de luz a través de telescopios
                    alrededor del mundo y una flota de observatorios en el espacio. Desde ondas de radio hasta rayos
                    gamma , este enfoque de la astronomía de "múltiples longitudes de onda" es crucial para obtener una
                    comprensión completa de los objetos en el espacio.

                    Esta imagen es del cúmulo de galaxias Abell 2744. Los cúmulos de galaxias son los objetos más
                    grandes del universo que se mantienen unidos por la gravedad. Contienen enormes cantidades de gas
                    sobrecalentado, con temperaturas de decenas de millones de grados, que brilla intensamente en rayos
                    X, y se puede observar a millones de años luz entre las galaxias. Esta imagen combina rayos X del
                    Observatorio de Rayos X Chandra (emisión azul difusa) con datos de luz óptica del Telescopio
                    Espacial Hubble (rojo, verde y azul).


                    Nochitlakaj ankipiaj ixtelotin ma ueliti tlapantlasa amoneuki machtiyotl meyotl -tika iluikamachioli
                    nauak semanauatl au mieke tsakualiluikali.
                    Iuikpa inin tlachkottalistli i- iluikatlamatilistli den mieke yukayotl -il ueyak -il ondas es iuani
                    nik tlanokpiliua se iknomatilistli nochi ik tlakautli.
                    Inin ixiptli ka ik potsali i- mieke sitlalpopokak Abell 2744. In potsali -il sitlalpopokak an- in
                    tlamantli achi uey i- semanauak ma in tekipanoa sepanka ik in etiktistli.Aneuan- ikpia axkauak
                    ekauastilistli in auiyapopotl senka ka totonia ika tlayamanilistli in miek tonali ma ko tlauilmiyotl
                    auh ka ueliti tlachia in ueyak ueyak kalkayotlak sitlalpopokak. Inin ixiptli tlanelolistli tlatomitl
                    x au tsakualiluikali in tlatomitl x Chandra ( miyotl texotik ueyak) ika tlanonotsalistli in tlauili
                    in iluikamachioli in iluikali Hubble( chichiltik, xoxoktli au texotik).</p>
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