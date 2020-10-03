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

    

    <main>
      
        <section class="seccion">

            <div>
            
                        <div class="formularios">
                        
                        <h1 id="formularios">Ika miak tlasotlalistli xikonselli ni pilmentsin nemaktl</h1><br>

                            <h1 id="formularios">Registrate y sé parte de Nuestra comunidad</h1><br>
                            <img class="text-imagen" src="img/undraw_authentication_fsn5.png" alt="Imagen ">

                            <form id="formulario" action="config/register.php" method="post" enctype="multipart/form-data">

                                <?php if(isset($_COOKIE["msg"])):?>
                                    <span><?php echo $_COOKIE["msg"]?></span><br>
                                <?php endif?>
                                
                                <label for="input-nombre">TOKAITL:<span>*</span></label> <br>
                                <input name="nombre" type="text" id="input-nombre" placeholder="NOMBRE" required> <br>
                                
                                <label for="input-apellidos">MEYOTL:<span>*</span></label> <br>
                                <input name="apellidos" type="text" id="input-apellidos" placeholder="APELLIDOS" required> <br>
                                <br>
                                
                                <label for="input-usuario">ONTETOKAITL:<span>*</span></label> <br>
                                <input name="username" type="text" id="input-usuario" placeholder="USUARIO" required> <br>
            
                                <label for="input-password">TLATLAPOLOLISTLI:<span>*</span></label> <br>
                                <input name="password" type="password" id="input-password" placeholder="CONTRASEÑA" required> <br>
            
                                <label for="input-password2">TLACHIKUA TLATLAPOLOLISTLI:<span>*</span></label> <br>
                                <input name="password2" type="password" id="input-password2" placeholder="CONTRASEÑA" required> <br>
                                <br>

                                <label for="input-profImg">IXIPTLA</label> <br>
                                <input type="file" name="profImg" id="input-profImg"> <br>
                                <br>
                                <br>


                                <input type="submit" value="Crear cuenta" id="btnEnviar"> 
                                <br><br>
                     
                                <a href="login.php">

                                    <h5 class="enlace">KALAKI<span>Entrar</span></h5>
                                </a>

                            </form> <br>
                            
            <!-- 
                                <button estilo="azul">Editar</button>
                                <button estilo="azul">Eliminar</button>
                                <button id="btn-modal2" estilo="azul">ILLIA</button> -->
            
            
                        </div> <br>
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