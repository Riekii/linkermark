<html>
    <head>
        <title>Linkermark</title>
        <link href="css.css" type="text/css" rel="stylesheet"/>
        <link href="favicon.png" type="image/png"/>
        <?php
        // Estos archivos hacen dos cosas muy importantes. El primero hace que si no tienes las cookies necesarias te eche a la página de login. El segundo realiza la conexión con la base de datos (Solo declara las variables necesarias)
        // De esta manera, si pasa algo y hay que cambiar la ip o hay que quitar las cookies de un sitio específico, es mucho mas facil.
        include "cook.php";
        include "sql.php";
        // Ahora vamos a insertar el mensaje (Si viene de la página anterior)
        ?>
    </head>
    <body style="background-color:black;">
        <div class="top"></div>
        
        <?php
        include "top.php";
        if(isset($_GET["p"]) && $_GET["p"]>1){
            
        }
        else{
        echo '
            <div class="titulo">
                <img class="principal" src="logo.png" alt="linkermark"/>
                <br/><br/><br/>
            </div>
            ';
        }
        ?>
                <?php
                //Primero comprobamos si las cookies son correctas (Por segunda vez)
                if( !empty($_COOKIE["clogin"]) &&
                    !empty($_COOKIE["cpass"]) ){
                    
                    $login = $_COOKIE["clogin"];
                    $pass = $_COOKIE["cpass"];
            
                    $mysqli = new mysqli($ip,$user,$password,$db);
                    
                    if($mysqli -> connect_error){
                        echo "<br/>Error en la conexión con la base de datos";
                    }
                    else{
                        // Aqui va la comprobación con el servidor de que el usuario concuerda con la contraseña y las consultas
                        $comp = "SELECT * FROM usuarios WHERE nick like '".$login."' and pass like '".$pass."'";
                        $consulta = $mysqli -> query($comp,MYSQLI_USE_RESULT);
                        $fila = $consulta->fetch_assoc();
                        while ($fila) {
                            $nickb=$fila["nick"];
                            $nombre=$fila["nombre"];
                            $correo=$fila["correo"];
                            $mensajes=$fila["mensajes"];
                            
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
                echo $login;
                //header("Location: index.php");
            }
        /*--------------------------------------------------------------------------*/
                ?>
        <!--Ahora vamos a incluir el archivo de timeline-->
        <div class="timeline">
            <br/>
            <?php
            if (isset($_GET["p"])){
                $p=$_GET["p"];
                switch ($p) {
                    case 1:
                        $min="+1"; $max="-30";
                        break;
                    case 2:
                        $min="-30"; $max="-60";
                        break;
                    case 3:
                        $min="-60"; $max="-80";
                        break;
                    case 4:
                        $min="-80"; $max="-120";
                        break;
                    case 5:
                        $min="-120"; $max="-150";
                        break;
                    case 6:
                        $min="-150"; $max="-180";
                        break;
                    case 7:
                        $min="-180"; $max="-270";
                        break;
                }
            }
            else{
                $min="+1"; $max="-30";
            }
            ?>
            <?php include"timeline.php"; ?>
            <div class="hojas">
                <a class="hoja" href="linkermark.php?p=<?php echo '1' ;?>"><div class="h">1</div></a>
                <a class="hoja" href="linkermark.php?p=<?php echo '2' ;?>"><div class="h">2</div></a>
                <a class="hoja" href="linkermark.php?p=<?php echo '3' ;?>"><div class="h">3</div></a>
                <a class="hoja" href="linkermark.php?p=<?php echo '4' ;?>"><div class="h">4</div></a>
                <a class="hoja" href="linkermark.php?p=<?php echo '5' ;?>"><div class="h">5</div></a>
                <a class="hoja" href="linkermark.php?p=<?php echo '6' ;?>"><div class="h">6</div></a>
                <a class="hoja" href="linkermark.php?p=<?php echo '7' ;?>"><div class="h">7</div></a>
            </div>
            <br/>
        </div>
    </body>
</html>