<?php
        //Este archivo sirve para la parte de arriba de las páginas que utilizaremos
        date_default_timezone_set ('Europe/Madrid');
        if( !empty($_COOKIE["clogin"]) &&
            !empty($_COOKIE["cpass"]) ){
                    
            $login = $_COOKIE["clogin"];
            $pass = md5($_COOKIE["cpass"]);
            
            $mysqli = new mysqli($ip,$user,$password,$db);
                    
            if($mysqli -> connect_error){
                echo "<br/>Error en la conexión con la base de datos";
            }
            else{
                // Aqui va la comprobación con el servidor de que el usuario concuerda con la contraseña y las consultas
                $comp = "SELECT * FROM usuarios WHERE nick like '".$login."'";
                $consulta = $mysqli -> query($comp,MYSQLI_USE_RESULT);
                $fila = $consulta->fetch_assoc();
                while ($fila) {
                    $nickb=$fila["nick"];
                    $nombre=$fila["nombre"];
                    $correo=$fila["correo"];
                    $mensajes=$fila["mensajes"];
                    $color=$fila["color"];
                        
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
        else{}
        
        if (isset($color) && !empty($color)){
            switch ($color){
                case "black":
                    $letra = "style=color:white;";
                    break;
            }
            if ($color != "black"){
                $letra = "black";
            }
        }
        else{
            $color = "skyblue";
            $letra = "black";
        }

        echo '
        <div class="reloj" >
                Madrid
                <a href="//24timezones.com/es_reloj/spain_gijon_hora.php" style="text-decoration: none" class="clock24" id="tz24-1554896590-c215370-eyJob3VydHlwZSI6IjI0Iiwic2hvd2RhdGUiOiIwIiwic2hvd3NlY29uZHMiOiIxIiwic2hvd3RpbWV6b25lIjoiMCIsInR5cGUiOiJkIiwibGFuZyI6ImVzIn0=" title="hora Gijón" target="_blank" rel="nofollow"></a>
                <script class="reloj" type="text/javascript" src="//w.24timezones.com/l.js" async></script>
            </div>';
        include "photorf.php";
        echo '<div style="background-color:'.$color.
            '" class="fixed">
            <div class="div1">
                <a href="user.php">
                <img width="50px" height="50px" class="foto" alt="Foto"
                src="profiles/'.$login.'/photos/'.$pfoto.'">
               </a>
            </div>
        
            <div style="background-color:'.$color.';" class="div2">
                <a '.$letra.' href="user.php" class="">
                    '.$nombre.'&nbsp;('.$login.')
                 </a>
            </div>
       
            <div style="background-color:'.$color.';" class="div3">';
            
            if (isset($color) && !empty($color)){
                if ($color=="black"){
                     echo '
                        <a '.$letra.' href="search.php">
                                <img id="look" class="crono" width="auto" height="35px" src="./img/lookn.png"/>
                            </a>
                            &nbsp;
                            <a '.$letra.' href="linkermark.php">
                                <img id="crono" class="crono" width="auto" height="35px" src="./img/cronon.png"/>
                            </a>
                            &nbsp;
                            <a '.$letra.' href="close.php">
                                <img id="logout" class="crono" width="auto" height="35px" src="./img/logoutn.png"/>
                            </a>
                            &nbsp;&nbsp;
                        </div>

                        <div class="div4p">
                        <a href="post.php" class="post">
                                +Post
                                </a>
                        </div>

                    </div>';
                }
                else{ 
                    echo '
                    <a '.$letra.' href="search.php">
                            <img id="look" class="crono" width="auto" height="35px" src="./img/look.png"/>
                        </a>
                        &nbsp;
                        <a '.$letra.' href="linkermark.php">
                            <img id="crono" class="crono" width="auto" height="35px" src="./img/crono.png"/>
                        </a>
                        &nbsp;
                        <a '.$letra.' href="close.php">
                            <img id="logout" class="crono" width="auto" height="35px" src="./img/logout.png"/>
                        </a>
                        &nbsp;&nbsp;
                    </div>

                    <div class="div4p">
                    <a href="post.php" class="post">
                            +Post
                            </a>
                    </div>

                </div>';
                    }
            }
else{
            
            echo '
            <a '.$letra.' href="search.php">
                    <img id="look" class="crono" width="auto" height="35px" src="./img/look.png"/>
                </a>
                &nbsp;
                <a '.$letra.' href="linkermark.php">
                    <img id="crono" class="crono" width="auto" height="35px" src="./img/crono.png"/>
                </a>
                &nbsp;
                <a '.$letra.' href="close.php">
                    <img id="logout" class="crono" width="auto" height="35px" src="./img/logout.png"/>
                </a>
                &nbsp;&nbsp;
            </div>
             
            <div class="div4p">
            <a href="post.php" class="post">
                    +Post
                    </a>
            </div>
            
        </div>';
}
?>