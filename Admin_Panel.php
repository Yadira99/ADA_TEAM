<?php 
    session_start();
    
    if(!isset($_SESSION["rol"])) {
        header("Location: index.php");
        exit;
    } else if($_SESSION["rol"] != "Admin") {
        header("Location: index.php");
        exit;
    }

    require_once 'config/functions.php';

    $conexion = connect($server, $db, $user, $pass);

    if(!$conexion) {
        header('Location: index.php');
    }

    
    $state = $conexion->prepare("SELECT * FROM usuarios");
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
                        echo '<li><a class="actual" href="Admin_Panel.php">ADMINISTRAR</a></li>';
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

        <br>
        <br>


        <section class="seccion">
            <div class="introduccion">
                <h1 id="introduccion">Administracion de Usuarios</h1> <br>
                <p>en este apartado podras crear , eliminar , asignar o revocar permisos a los usuarios que esten
                    utilizando </p> <br>

            </div>

            <div class="table-title">
                <?php if(isset($_COOKIE["msgedit"])):?>
                    <span><?php echo $_COOKIE["msgedit"]?></span>
                <?php endif?>
                <h3>Usuarios Registrados</h3>
            </div>
            <table class="table-fill">
                <thead>
                    <tr>
                        <th class="text-left">Usuario</th>
                        <th class="text-left">Nombre</th>
                        <th class="text-left">Apellidos</th>
                        <th class="text-left">Rol</th>
                        <th class="text-left">Imagen</th>
                        <th class="text-left">Editar</th>
                        <th class="text-left">Eliminar</th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                    <?php foreach($result as $user):?>
                        <tr>
                            <td class="text-left"><?php echo $user['username']?></td>
                            <td class="text-left"><?php echo $user['nombre']?></td>
                            <td class="text-left"><?php echo $user['apellidos']?></td>
                            <td class="text-left"><?php echo $user['rol'] == "Edit" ? "Editor" : "Admin"?></td>
                            <td class="text-center"><img class="userimage" src="img/profImg/<?php echo $user['profImg']?>"></td>
                            <td class="text-center">
                                <i style="align-items:center; color:rgb(182, 221, 39)" class="fas fa-user-edit btn-modal" for="modal-editar-<?php echo $user["username"]?>"></i>

                                <div id="modal-editar-<?php echo $user["username"]?>" class="modal-fuera oculto">
                                    <div class="bloque" color="verde">
                                        <span class="exit">X</span>
                                        <h1>Editando al usuario "<?php echo $user['username']?>"</h1>


                                        <form id="edicion-<?php echo $user['username']?>" action="config/editar_usuario.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="userkey" value="<?php echo $user['username']?>">
                                            <div class="left-right">
                                                <div>
                                                    <label for="edit-<?php echo $user['username']?>-nombre">Nombre:</label> <br>
                                                    <input name="nombre" type="text" id="edit-<?php echo $user['username']?>-nombre" value="<?php echo $user["nombre"]?>"> <br>
                                                    <label for="edit-<?php echo $user['username']?>-apellidos">Apellidos:</label> <br>
                                                    <input name="apellidos" type="text" id="edit-<?php echo $user['username']?>-apellidos" value="<?php echo $user["apellidos"]?>"> <br>

                                                    <label for="edit-<?php echo $user['username']?>-profImg">Imagen de perfil</label> <br>
                                                    <input type="file" name="profImg" id="edit-<?php echo $user['username']?>-profImg"> <br>
        
                                                    <label for="edit-<?php echo $user['username']?>-rol">Elija el rol del usuario</label> <br>
                                                    <input style="position: absolute;" type="radio" id="edit-<?php echo $user['username']?>-rol-admin" name="rol" value="Admin" <?php if($user["rol"] == "Admin") echo "checked"?>>
                                                    <label style="position: absolute;" for="edit-<?php echo $user['username']?>-rol-admin">Admin</label>
                                                    <input style="position: absolute;" type="radio" id="edit-<?php echo $user['username']?>-rol-edit" name="rol" value="Edit" <?php if($user["rol"] == "Edit") echo "checked"?>>
                                                    <label style="position: absolute;" for="edit-<?php echo $user['username']?>-rol-edit">Editor</label> 
                                                </div>


                                                <div>
                                                    <label for="edit-<?php echo $user['username']?>-usuario">Usuario:</label> <br>
                                                    <input name="username" type="text" id="edit-<?php echo $user['username']?>-usuario" value="<?php echo $user["username"]?>"> <br>
        
                                                    <label for="edit-<?php echo $user['username']?>-password">Contraseña:</label> <br>
                                                    <input name="password" type="password" id="edit-<?php echo $user['username']?>-password" placeholder="Cambiar contraseña"> <br>
        
                                                    <label for="edit-<?php echo $user['username']?>-password2">Confirmar contraseña:</label> <br>
                                                    <input name="password2" type="password" id="edit-<?php echo $user['username']?>-password2" placeholder="Confirmar contraseña"> <br>
                                                </div>
                                            </div>

                                            <input type="submit" value="Actualizar usuario">
                                        </form> 

                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <i style="align-items:center; color:rgba(242, 41, 115, 1);" class="fas fa-trash-alt btn-modal" for="modal-eliminar-<?php echo $user["username"]?>"></i>

                                <div id="modal-eliminar-<?php echo $user["username"]?>" class="modal-fuera oculto">
                                    <?php if($_SESSION["username"] != $user["username"]):?>
                                        <div class="bloque" color="verde">
                                            <span class="exit">X</span>
                                            <h1>¿Seguro que deseas eliminar a "<?php echo $user['username']?>"?</h1>
                                            <a class="enlace" href="config/delete.php?user=<?php echo $user['username']?>">Eliminar</a>
                                        </div>
                                    <?php else:?>
                                        <div class="bloque" color="azul">
                                            <span class="exit">X</span>
                                            <h1>¡No te puedes eliminar a ti mismo!</h1>
                                        </div>
                                    <?php endif?>
                                </div>
                                
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>

            <div >

                <div class="formularios">
                    <h1 id="formularios">Añadir usuarios con privilegios</h1><br>
                    <img class="text-imagen" src="img/undraw_authentication_fsn5.png" alt="Imagen ">

                    <form id="formulario" action="config/register.php" method="post" enctype="multipart/form-data">

                        <?php if(isset($_COOKIE["msg"])):?>
                            <span><?php echo $_COOKIE["msg"]?></span><br>
                        <?php endif?>

                        <label for="input-nombre">Nombre:<span>*</span></label> <br>
                        <input name="nombre" type="text" id="input-nombre" placeholder="NOMBRE" required> <br>
                        
                        <label for="input-apellidos">Apellidos:<span>*</span></label> <br>
                        <input name="apellidos" type="text" id="input-apellidos" placeholder="APELLIDOS" required> <br>
                        <br>
                        
                        <label for="input-usuario">Usuario:<span>*</span></label> <br>
                        <input name="username" type="text" id="input-usuario" placeholder="USUARIO" required> <br>
    
                        <label for="input-password">Contraseña:<span>*</span></label> <br>
                        <input name="password" type="password" id="input-password" placeholder="CONTRASEÑA" required> <br>
    
                        <label for="input-password2">Confirmar contraseña:<span>*</span></label> <br>
                        <input name="password2" type="password" id="input-password2" placeholder="CONTRASEÑA" required> <br>
                        <br>

                        <label for="input-profImg">Imagen de perfil</label> <br>
                        <input type="file" name="profImg" id="input-profImg"> <br>

                        
                        <label for="input-rol">Elija el rol del usuario<span>*</span></label> <br>
                        <input style="position: absolute;" type="radio" id="input-rol-admin" name="rol" value="Admin" required>
                        <label style="position: absolute;" for="input-rol-admin">Admin</label>
                        <br>
                        
                        <input style="position: absolute;" type="radio" id="input-rol-edit" name="rol" value="Edit">
                        <label style="position: absolute;" for="input-rol-edit">Editor</label> 
                        <br>

                        <br>
                        <input type="submit" id="btnEnviar" value="Crear usuario"><br><br>
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