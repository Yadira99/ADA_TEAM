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
    <link rel="shortcut icon" type="image/x-icon" href="img/ada team.png" />
    <link rel="stylesheet" href="styles/estilos.css">
    <link rel="stylesheet" href="styles/style_todos.css">
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
                <li><a class="actual" href="index.php">PEUALISTLI</a></li>
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

    <main>
        <div id="portada">
            <h1>TLAMACHTILISTLI MOCHINTIN</h1>
            <h2>APRENDIZAJE  PARA TODOS</h2>

                <?php if(!isset($_SESSION["username"])):?>
                    <a href="pizarra.php"> 
                    <button estilo="rojo"> Patoloapali ~~ Pizarra  </button>

                    </a> 
                <?php else:?>
                    <a href="pizarra.php"> 
                        <button estilo="azul"> Publicaciones</button> 
                    </a> 
                <?php endif?>
            </h2>

        </div>
        <br><br>
        <i id="btn-subirAlCielo" class="fas fa-arrow-up sombra-resaltable"></i>


        <section class="team contenedor" id="equipo">
            <h3>El futuro STEAM es intercultural</h3>
             <p class="after">Inin poyektli an “okachiuali STEAM an chiualtlakayotl". An iuki Kipia lamachtilistli  iuik  amantekayotl, toltekayotl An tlapoualmatilistli,  an nepentlatkikayotl tlakatl tlajtoa ueltlajtoli náhuatl.</p>
<!--             
             <video src="img/chido.mp4" width=620  height=440 controls poster="vistaprevia.jpg">
Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.<br>
La versión descargable está disponible en <a href="URL">youtube/adateam</a>. 
</video> -->
            <br>
            <a href="pizarra.php" >
            <button estilo="amarillo"> KALAKI ~ ENTRAR</button> 
        </a> 
        <br>         
        <br>
            <p class="after" >Este proyecto de “El futuro STEAM es intercultural”, tiene como objetivo promover el aprendizaje de ciencia tecnológica, arte y matemáticas, orientado a las comunidades indígenas que hablan la lengua Náhuatl. </p>
            <br>
            <br>
           
            <!-- <div class="card">
                <div class="content-card resaltable">
                    <div class="people">
                        <img src="img/Asset 6.png" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>ARTE</h4>
                        <br>
                                <a href="#equipo"> 
                                    <button estilo="amarillo"> KALAKI ~ KALAKIR</button> 
                                </a> 
                        <p>El objetivo de Socially es ofrecer una buena comunicación con el cliente a través de nuestros
                            perfiles brindándoles más información para que un mayor número de personas tenga
                            conocimiento de lo que haces y de que puedes servir.</p>
                    </div>
                </div>
                <div class="content-card resaltable">
                    <div class="people">
                        <img src="img/Asset 7.png" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>TECNOLOGÍA</h4>
                        <br>
                        <a href="#equipo"> 
                                    <button estilo="amarillo"> KALAKI ~ KALAKIR</button> 
                                </a> 
                        <p>En un mundo estrechamente interrelacionado por las tecnologías de información, ser líder
                            global en la provisión de soluciones innovadoras de software.</p>
                    </div>
                </div>
                <div class="content-card resaltable">
                    <div class="people">
                        <img src="img/Asset 8.png" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>MATEMATICÁS</h4>
                        <br>

                        <a href="#equipo"> 
                                    <button estilo="amarillo"> KALAKI ~ KALAKIR</button> 
                                </a> 
                        <p>crear y gestionar tu propia página web estilo red social, donde los usuarios elegirán
                            temáticas y crearán “tarjetas”, que serán las publicaciones de los usuarios dentro de la red
                            social</p>
                    </div>
                </div>
            </div> -->
        </section>
        <section class="about" id="servicio">
            <div class="contenedor">
                <h3>ACHI KUALI SEKKAN</h3>
                <p class="after"> INICIATIVA BETTER TOGETHER</p>
                <div class="servicios">
                    <div class="caja-servicios">
                        <img src="img/heart.png" alt="">
                        <h4>NEXTILISTLI</h4> <br>

                        <h4>CREATIVIDAD</h4>

                    </div>
                    <div class="caja-servicios">
                        <img src="img/responsive.png" alt="">
                        <h4>MACHIYOPANOLISTLI</h4> <br>

                        <h4>COMUNICACIÓN</h4>

                    </div>
                    <div class="caja-servicios">
                        <img src="img/efectos.png" alt="">

                        <h4>AMOTLAPALTIK</h4> <br>

                        <h4>INCLUSION</h4>

                    </div>
                </div>
            </div>
        </section>
        <section class="work contenedor" id="trabajo">
            <h2>Impulsado por Ada Team en colaboración con la NASA</h2>
            <br>
            <h2>Si quieres hacer una donacion para que mas niños se beneficien con nuestra idea haz click aqui </h2>
            <a>
            <button estilo="azul">TEMAKTIA ~~ AYUDA</button>
        </a>
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