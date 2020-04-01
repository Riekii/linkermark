<html>
    <head>
        <link href="css.css" type="text/css" rel="stylesheet"/>
        <link href="favicon.ico" type="image/x-icon"/>
        <title>Editar mi perfil</title>
        <?php 
        // Insertamos los ficheros para tener las credenciales del sql y la comprobación de las cookies
        include"sql.php";
        include "cook.php";
        ?>
    </head>
    <body class="user">
        
        <?php
        // Este archivo es la página para editar 
        
        // Nombre
        // Aqui vamos a comprobar si ha cambiado de nombre en la casilla correspondiente. Si no ha cambiado no pasará nada.
        if (isset($_POST["enombre"]) && !empty($_POST["enombre"])){
            $mysqli = new mysqli($ip,$user,$password,$db);
            if($mysqli -> connect_error){
                echo "<br/>Error en la conexión con la base de datos";
            }
            else{
                // Si ha cambiado de nombre y no hay ningún error hara un UPDATE en la tabla y columna correspondientes.
                $enombre = $_POST["enombre"];
                $enombrec = "UPDATE usuarios SET nombre = '".$enombre."' WHERE nick = '".$login."'";
                $enombresql = $mysqli -> query($enombrec);       
                if ($enombresql === TRUE){
                    //header ("Location: user.php");
                }
                else{
                    echo "Error en la inserción";
                }   
            }
        }
        
        // Si ha intentado cambiar la contraseña y esta no está vacía, se ejecutará la consulta para meterla.
        if (isset($_POST["epasswordold"]) && !empty($_POST["epasswordold"]) &&
            isset($_POST["epasswordnew1"]) && !empty($_POST["epasswordnew1"]) &&
            isset($_POST["epasswordnew2"]) && !empty($_POST["epasswordnew2"])){
            
            $passold = md5($_POST["epasswordold"]);
            $passnew = md5($_POST["epasswordnew1"]);
            $passnew2 = md5($_POST["epasswordnew2"]);
            
            if($passnew == $passnew2){
                $mysqli = new mysqli($ip,$user,$password,$db);
                if($mysqli -> connect_error){
                    echo '<p class="pequer"><b>Error en la conexión con la base de datos</b></p>';
                }
                else{
                    // Sino hay ningún error, el servidor ejecutará la siguiente consulta.
                    $comp = "SELECT * FROM usuarios WHERE nick like '".$login."' and pass = '".$passold."'";
                    $consulta = $mysqli -> query($comp,MYSQLI_USE_RESULT);
                    $fila = $consulta->fetch_assoc();
                    while ($fila) {
                        $passs = $fila["pass"];
                        $fila=$consulta->fetch_assoc();
                        }
                        $consulta->close();
                    
                        if (!empty($passs) == $passold){
                            // Si la contraseña antigua coincide con la que está en la base de datos, se cambiará.
                            $updatepass = "UPDATE usuarios SET pass = '".$passnew."' WHERE nick = '".$login."'";
                            $updatepasss = $mysqli -> query($updatepass);
                            
                            if ($updatepasss === TRUE){
                                setcookie("clogin",$login,time(),+3600,'/');
                                setcookie("cpass",$passnew,time()+3600,'/');
                                $login = $_COOKIE["clogin"];
                                
                                // Si todo esta correcto, las cookies se cambiarán y nos hara un header hacia la propia página. Esto es debido a que 
                                header ("Location: user.php");
                            }
                            else{
                            }
                        }
                        else{
                            // Si la antigua contraseña no coincide, saltará este error
                            $errorpass = '<p class="pequer"><b>La contraseña es incorrecta</b></p>';
                        }
                    }
                }
            else{
                // Si la nueva contraseña no
                $errorpass = '<p class="pequer"><b>Las contraseñas no coinciden</b></p>';
            }
        }
        else{}
        
            
        if (isset($_FILES["foto"]) && $_FILES["foto"]["size"] > 0){
            // Comprobar que el archivo subido es una foto, revisando que pertenezca a los formatos mas comunes. (Se podrían actualizar en cualquier momento)
            $ext = substr($_FILES['foto']['name'], strpos($_FILES['foto']['name'],".")+1);
            
            switch($ext){
                case "gif":
                    $formatof = "1";
                    break;
                case "png":
                    $formatof = "1";
                    break;
                case "jpeg":
                    $formatof = "1";
                    break;
                case "jpg":
                    $formatof = "1";
                    break;
                case "ico":
                    $formatof = "1";
                    break;
                case "icon":
                    $formatof = "1";
                    break;
            }
            
            if(isset($formatof)){
            // Aqui se borra la foto anterior que el usuario había subido al foro
                include "photorf.php";
                unlink('./profiles/'.$login.'/photos/'.$pfoto);

                // Copiamos la foto al directorio de fotos del usuario
                $dir = './profiles/'.$login.'/photos/';
                $foto = $dir . basename($_FILES['foto']['name']);
                move_uploaded_file($_FILES['foto']['tmp_name'],$foto);

                // Declaramos el nombre de la foto.
                $nfoto = $_FILES['foto']['name'];

                // Insertamos el nombre de la foto en la base de datos
                $mysqli = new mysqli($ip,$user,$password,$db);
                if($mysqli->connect_error){
                    echo "Fallo al intentar conectarse con la base de datos";
                }
                else{
                    $mysqli -> select_db("linkermark");
                    $ins='UPDATE usuarios SET foto = "'.$nfoto.'"  WHERE nick = "'.$login.'"';
                    $insertar = $mysqli -> query($ins);
                    if ($insertar === TRUE){
                        //echo "Inserción exitosa";
                    }
                    else{
                        //echo "Inserción no exitosa";
                  }
                }
              }
            else{
                // Si no es una imagen, saltará un error bajo la selección todo
            }
            }
        else{
            $formatof = "2";
        // Si no hay foto que subir no muestra nada en la foto y solo envia el mensaje.
        }
        /*---------------------------------------------------------------------------------------*/
        // Aqui se comprueba que el color o la descripción han cambiado. Si cualquiera de las dos ha cambiado se guardaría.
        if (isset($_POST["color"]) || isset($_POST['edit'])){
            
            // Declaramos la descripción
            $descripcion = htmlspecialchars($_POST['edit']);
            
            // Si el color está vacío, nos conectamos a la base de datos y declaramos $color como el color que el usuario ya tenía.
            if (empty($_POST["color"])){
                // Nos conectamos a la base de datos
                $mysqli = new mysqli($ip,$user,$password,$db);
                if($mysqli -> connect_error){
                    echo "<br/>Error en la conexión con la base de datos";
                }
                else{
                    // Si el usuario ha seleccionado un color se cambia, si no, se deja el que estaba
                    $comp = "SELECT * FROM usuarios WHERE nick like '".$login."'";
                    $consulta = $mysqli -> query($comp,MYSQLI_USE_RESULT);
                    $fila = $consulta->fetch_assoc();
                    while ($fila) {
                        $color = $fila["color"];
                        $fila=$consulta->fetch_assoc();
                        }
                        $consulta->close();
                        if(!empty($nickb)){
                            mysqli_close($mysqli);
                        }
                    else{
                    }
                }
            }
            else{
                $color = $_POST["color"];
            }
            
            // Nos conectamos a la base de datos para introducir los datos.
            $mysqli = new mysqli($ip,$user,$password,$db);
                    
            if($mysqli -> connect_error){
                echo "<br/>Error en la conexión con la base de datos";
            }
            else{
                $mysqli -> select_db("linkermark");
                $ins=
                '
                UPDATE usuarios SET color="'.$color.'", descripcion="'.$descripcion.'"
                WHERE nick = "'.$login.'"
                ';
                $insertar = $mysqli -> query($ins);
                if ($insertar === TRUE){
                    //header ("Location: user.php");
                    $mysqli->close();
                }    
                else{
                    echo "Inserción fallida";            
                }
            }
        }
        else{ 
        }
        ?>
        
        <?php
        include "top.php";
        
        $mysqli = new mysqli($ip,$user,$password,$db);
        
        if($mysqli -> connect_error){
            echo "<br/>Error en la conexión con la base de datos";
        }
        else{
            $comp = "SELECT * FROM usuarios WHERE nick like '".$login."'";
            $consulta = $mysqli -> query($comp,MYSQLI_USE_RESULT);
            $fila = $consulta->fetch_assoc();
            while ($fila) {
                $nickb=$fila["nick"];
                $nombre=$fila["nombre"];
                $correo=$fila["correo"];
                $mensajes=$fila["mensajes"];
                $color=$fila["color"];
                $descripcion=$fila["descripcion"];
                            
                $fila=$consulta->fetch_assoc();
                }
                $consulta->close();    
                if(!empty($nickb)){
                    mysqli_close($mysqli);
                }
                else{
                }
            }
            if(empty($color)){
                $color="white";
            }
        else{  
        }
        $nick = strtolower($nickb);
        ?>
        <form id="edit" enctype="multipart/form-data" method="post" action="edit.php">
            <div class="efoto" style="background-color:<?php echo $color; ?>">
                <div class="subtitulo"><b>Cambiar foto</b></div>
                
                <?php
                include "photor.php";
                echo '<img alt="perfil" class="p600" src="profiles/'.$login.'/photos/'.$pfoto.'"/>';
                echo '<img alt="perfil" class="p60" src="profiles/'.$login.'/photos/'.$pfoto.'"/>';
                echo '<img alt="perfil" class="p40" src="profiles/'.$login.'/photos/'.$pfoto.'"/>';
                ?>
                <br/><br/>
                    <input class="boton" name="foto" type="file"/>
                <br/>
                <b>
                    <?php
                    if (isset($formatof)){
                        if ($formatof = "2" && isset($_FILES['foto']) && empty($errorpass)){
                            echo '<p class="pequev">';
                            echo "Cambios guardados con éxito";
                            echo '</p>';
                        }
                        else {
                            if (isset ($errorpass)){
                           echo $errorpass; 
                            }
                            else{}
                        }
                    }
                    elseif (isset($_FILES['foto'])){
                        echo '<p class="pequer">';
                        echo "Error. El archivo no es una imagen compatible";
                        echo '</p>';
                    }
                    ?>
                </b>
                
            </div>  
            <div class="edescripcion">
                <div class="subtitulo"><b>Cambiar descripción</b></div>
                <textarea maxlength="1000" class="descripcion" form="edit" name="edit" cols="100" rows="10"><?php echo trim(htmlspecialchars($descripcion)); ?></textarea>
            </div>
            <div class="ecolores">
                <div class="subtitulo"><b>Cambiar de fondo</b></div>
                <?php include "div.php";?>
            </div>
            <div class="ecolores">
                <div class="subtitulo"><b>Cambiar nombre</b></div>
                <input maxlength="20" name="enombre" class="enombre" type="text"/>
            </div>
            <div class="ecolores">
                <div class="subtitulo"><b>Cambiar contraseña</b></div>
                <p class="p">Contraseña actual</p>
                <input maxlength="60" name="epasswordold" class="epass" type="password"/>
                <br/>
                <p class="p">Nueva contraseña</p>
                <p class="pequer">
                    <?php
                    if (isset ($errorpass) && !empty($errorpass))
                    {echo $errorpass; } 
                    ?></p>
                <input maxlength="60" name="epasswordnew1" id="p1" type="password"/>
                <br/>
                <input maxlength="60" name="epasswordnew2" id="p2" type="password"/>
            </div>
            <div class="ecolores">
                <input class="boton" type="submit" value="Guardar cambios"/>
            </div>
        </form>
    </body>
</html>