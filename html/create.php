<html>
    <head>
        <title>Nueva cuenta</title>
        <link href="css.css" type="text/css" rel="stylesheet"/>
        <link href="favicon.ico" type="image/x-icon"/>
        <?php 
        include "sql.php";
        ?>
    </head>
    <body>
        <br/>
        <?php
        /*Vamos a comprobar si las variables están declaradas. Si esta rellenado pero las contraseñas no coinciden, aparecerá un mensaje, y si alguno de ellos están en blanco volverá a la pantalla de registro*/
        if (isset($_POST["login"])&&
            isset($_POST["nombre"])&&
            isset($_POST["mail"])&&
            isset($_POST["pass"])&&
            isset($_POST["pass2"])&&
            $_POST["pass"] != $_POST["pass2"]){
            echo '<div class="incorrecto">Las contraseñas no concuerdan</div>';
        }
        elseif 
            (isset($_POST["login"])&& !empty($_POST["login"])&&
             isset($_POST["nombre"])&& !empty($_POST["nombre"])&&
             isset($_POST["mail"])&& !empty($_POST["mail"])&&
             isset($_POST["pass"])&& !empty($_POST["pass"])&&
             isset($_POST["pass2"])&& !empty($_POST["pass2"])&&
             $_POST["pass"] == $_POST["pass2"])
            {
            /*En caso de que todo concuerde, empezaremos a declarar variables más cortas y a conectarnos con el servidor de base de datos.*/
            $login = $_POST["login"];
            $nombre = $_POST["nombre"];
            $mail = $_POST["mail"];
            $pass = $_POST["pass"];
            
            // Ahora vamos a definir las "directivas" de seguridad
            if(strlen($login)<3){
                echo '<a href="./create.php"><div class="incorrecto">El login no es válido</div></a>';
            }
            if(strlen($nombre)<3){
                echo '<a href="./create.php"><div class="incorrecto">Nombre es demasiado corto</div></a>';
            }
            if(strlen($mail)<3 && strpos($mail,'@') < 0){
                echo '<a href="./create.php"><div class="incorrecto">Correo no es válido</div></a>';
            }
            if(strlen($pass)<3){
                echo '<a href="./create.php"><div class="incorrecto">La contraseña es demasiado corta</div></a>';
            }
            
            else{
                $mysqli = new mysqli($ip,$user,$password,$db);

                    if($mysqli->connect_error){
                        echo "Fallo al intentar conectarse con la base de datos";
                    }
                    else{
                        /*Ahora vamos a comprobar que no existan nicks o correos iguales*/
                        $mysqli -> select_db("linkermark");

                        $login = strtolower ($login);

                        $comcorreo = "SELECT * FROM usuarios WHERE correo like '".$mail."'";
                        $comc = $mysqli->query($comcorreo);
                        $resc = $comc->num_rows;

                        $comnick = "SELECT * FROM usuarios WHERE nick like '".$login."'";
                        $comn = $mysqli->query($comnick);
                        $resn = $comn->num_rows;

                            if($resc > 0){
                                echo '<div class="incorrecto"><b>El correo '.$mail.' ya está en uso</b></div>';
                            }
                            elseif($resn > 0){
                                echo '<div class="incorrecto"><b>El nick '.$login.' ya está en uso</b></div>';
                            }
                            else{
                                // Creamos la carpeta del usuario
                                mkdir('./profiles/'.$login,0777);
                                mkdir('./profiles/'.$login.'/photos',0777);
                                copy ("./profiles/default/photo.png", "./profiles/".$login."/photos/photo.png");

                                /*Una vez conectados, vamos a introducir los datos recibidos*/
                                /*Primero introducimos la consulta en una variable llamada $ins*/
                                $mysqli -> select_db("linkermark");
                                $nick = $login;
                                if (isset ($pfoto)){}
                                else{
                                    $pfoto = "photo.png";
                                }
                                include "photor.php";
                                $ins=
                                '
                                INSERT INTO usuarios(nick, nombre, correo, pass, mensajes, foto) VALUES 
                                ("'.strtolower($login).'","'.$nombre.'","'.$mail.'","'.MD5($pass).'",0, "'.$pfoto.'")
                                ';

                                /*Ahora vamos a ejecutarla dentro del servidor*/
                                $insertar = $mysqli -> query($ins);
                                if ($insertar === TRUE){
                                    echo '
                                    <a href="index.php">
                                    <div class="correcto">
                                        <p>Cuenta creada correctamente, pulsa aquí para ir a la página de login</p>
                                        </div>
                                    </a>
                                    ';
                                    }

                                else{
                                    echo "Inserción fallida";

                                }
                            }
                        }
                    }
                }
            // Si aluno de los campos están vacios te devolverá a la página.
            elseif
                (empty($_POST["login"])||
                 empty($_POST["nombre"])||
                 empty($_POST["pass"])||
                 empty($_POST["mail"])||
                 empty($_POST["pass2"]))
            {
                echo'
        <div class="create">
            <p class="titulo">Registro</p>
            <br/>
            <form action="create.php" method="post">
            <table>
                <tr>
                    <td class="text">Nick</td>
                <td>
                    <input class="cnick" maxlength="20" type="text" name="login" id="login"/>
                </td>
            </tr>
            <tr>
                <td class="text">Nombre</td>
                <td>
                    <input class="cnombre" maxlength="40" type="text" name="nombre" id="nombre"/>
                </td>
            </tr>
            <tr>
                <td class="text">Correo Electrónico</td>
                <td>
                    <input class="ccorreo" maxlength="50" type="text" name="mail" id="mail"/>
                </td>
            </tr>
            <tr>
                <td class="text">Contraseña</td>
                <td>
                    <input class="cpass" maxlength="60" type="password" name="pass" id="pass"/>
               </td>
            </tr>
            <tr>
                <td class="text">Repetir contraseña</td>
                <td>
                    <input class="cpass" type="password" name="pass2" id="pass2"/>
               </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td colspan="2">
                    <input type="submit"/>
                </td>
            </tr>
        </table>
        </form>
        </div>
        ';
        }
        else{
            echo "Hola";
        }
            ?>
    </body>
</html>
