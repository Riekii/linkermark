<html>
    <head>
        <link href="css.css" type="text/css" rel="stylesheet"/>
        <link href="favicon.ico" type="image/x-icon"/>
        <title>Mi perfil</title>
        <?php 
        include"sql.php";
        include "cook.php";
        ?>
    </head>
    <body class="user">
        <?php
        include "top.php";
        
        $mysqli = new mysqli($ip,$user,$password,$db);
                    
        if($mysqli -> connect_error){
            echo "<br/>Error en la conexión con la base de datos";
        }
        else{
            // Aqui va la comprobación con el servidor de que el usuario concuerda con la contraseña y las consultas
            $pass = MD5($pass);
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
        ?>
        <div class="backgroundu" style="background-color:<?php echo $color; ?>">
            <div class="subtitulo">
                <b>
                <?php echo $nombre.'&nbsp;('.$nickb.')' ?>
                </b>
            </div>
            <div class="photog">
                <?php echo '
                <img class="fotop" alt="Foto"
                src="profiles/'.$login.'/photos/'.$pfoto.'">'
                ?>
            </div>
            <div style="
                        <?php 
                        if($mensajes >= 10){
                            echo "color: blue";
                        }
                        elseif($mensajes >= 20){
                            echo "color: red";
                        }
                        elseif($mensajes >= 50){
                            echo "color: yellow; background-color:black";
                        }
                        elseif($mensajes >= 80){
                            echo "color: white; background-color:black;";
                        } 
                        elseif($mensajes >= 100){
                            echo "color: white";
                        } 
                        elseif($mensajes >= 200){
                            echo "color: black; background-color:yellow";
                        }
                        ?>
                        " class="mensajes">Nº de Post: <b><?php echo $mensajes; ?></b></div>
        </div>
        <div class="foot">
            <a class="editar" href="edit.php">
                <?php
                echo'
                <div class="footd">
                    <b>Editar</b>
                </div>
                ';
                ?>
            </a>
        </div>
            <div class="body">
                <br/>
                <div class="descripcion">
                    <div class="subtitulod">
                        <b>
                        Descripción
                        </b>
                    </div>
                    <br/>
            <?php
                echo $descripcion;
            ?>
                </div>
                <div style="background-color:black" class="ultimoscon">
                    <div class="ultimospost">
                        <b>Últimos Post</b>
                    </div>
                </div>
                <div class="ultimos">
                    <?php
                    $mysqli = new mysqli($ip,$user,$password,$db);
                    
                    $consid = "
                    SELECT *
                    FROM mensajes 
                    WHERE nick like '".$login."'
                    order by datetime DESC
                    LIMIT 5";
                    $consid2 = $mysqli -> query($consid);

                    while($row = $consid2->fetch_assoc()){
                        $id_m=$row["id_m"];
                        $nick=$row["nick"];
                        $mensaje=$row["mensajes"];
                        $date=$row["datetime"];
                        $foto=$row["foto"];
                        
                        include "conus.php";
                        include "timelineu.php";
                        
                        echo '</tbody></table>';
                    }
                    ?>

                </div>
                
        </div>
    </body>
</html>