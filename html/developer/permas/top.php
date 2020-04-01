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

            // Algunos estilos irán aqui para saltar el resto de páginas boostraptianas jajajaja
            echo'<style>
            a:hover{text-decoration:none}
            td.snicktimeline{background-color:lightgrey}
            </style>';
        
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
            ';margin-top:20px;" class="fixed">
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
                            <a '.$letra.' href="data.php">
                                <img id="stadistics" class="stadistics" width="auto" height="30px" src="./img/estadisticsn.png"/>
                            </a>
                            &nbsp;
                            <button type="button" class="btn mr-sm-0 mr-md-1" data-toggle="modal" data-target="#login" >
                                <img id="look" class="crono" width="auto" height="35px" src="./img/look.png"/>
                            </button>
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
                        <a '.$letra.' href="data.php">
                            <img id="stadistics" class="stadistics" width="auto" height="30px" src="./img/estadistics.png" style="margin-bottom:5px" />
                        </a>
                        &nbsp;
                        <button type="button" class="btn" style="padding:0px; margin:0px;" data-toggle="modal" data-target="#search" >
                        <img id="look" class="crono" width="auto" height="35px" src="./img/look.png"/>
                    </button>
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
                <a '.$letra.' href="data.php">
                        <img id="stadistics" class="stadistics" width="auto" height="30px" src="./img/stadistics.png"/>
                    </a>
                    &nbsp;
                    <button type="button" class="btn btn-primary mr-sm-0 mr-md-1" data-toggle="modal" data-target="#login" >
                        <img id="look" class="crono" width="auto" height="35px" src="./img/look.png"/>
                    </button>
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
                    <!-- Modal de búsqueda -->
                    <div id="search" class="modal fade"style="";>
                        <div class="modal-dialog  modal-lg" style="border-bottom-width:0px";>
                            <div class="modal-content " style="border-bottom-width:0px";>
                                <div class="modal-header p-3 mb-2 text-center mb-0" style="border-bottom-width:0px";>
                                    <p style="";>
                                        <h4 style="";>
                                            Panel de búsqueda
                                        </h4>
                                     </p>
                                </div>
                                <div class="modal-body p-0 m-0" >
                                    <div class="form-group">
                                        <form method="post" action="#success">
                                            <input type="text" name="searchu" id="searchu" class="searchu"  placeholder="Nombre o Nick"><br/><br/>
                                            <input type="submit">
                                        </form>
                                    </div>
                                </div>
                                <div class="p-1 mt-0 modal-footer mt-0 text-white" style="border-top-width:0px;">
                                  <button type="button" class="btn btn-secondary" style="margin 0 auto;" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function(){
                        $("#success").modal('show');
                        });
                    </script>

                            <!-- Modal Searchu -->
                                <?php   if (isset($_POST["searchu"])){
                                            echo '
                                                <div id="success" class="modal fade"style="";>
                                                    <div class="modal-dialog modal-lg" style="border-bottom-width:0px";>
                                                        <div class="modal-content " style="border-bottom-width:0px";>

                                                            <div class="modal-header p-3 mb-2  text-center mb-0" style="border-bottom-width:0px";>
                                                                <p style="";>
                                                                    <h4 style="";>
                                                                        Resultado de la búsqueda
                                                                    </h4>
                                                                </p>
                                                            </div>

                                                            <div class="modal-body p-0 m-0" >
                                                                <table class="snicktimeline">
                                                                    <tr class="snicktimeline">
                                                                        <th id="sntfoto" class="snicktimeline">Foto</th>
                                                                        <th id="sntnick" class="snicktimeline">Nombre</th>
                                                                        <th id="sntnick" class="snicktimeline">Nick</th>
                                                                        <th id="sntnombre" class="snicktimeline">Mensajes</th>
                                                                    </tr>';


                                    // Aqui va a ir la búsqueda de usuarios según nombre o nick
                                    $i = 0;
                                    $e = 0;
                                    
                                    // Realizamos la conexión con la base de datos
                                    $mysqli = new mysqli($ip,$user,$password,$db);
                                    
                                    $searchu = $_POST["searchu"];
                                    $consunick = "SELECT * FROM usuarios WHERE nick like '%".$searchu."%' ";
                                    $consunombre = "SELECT * FROM usuarios WHERE nombre like '%".$searchu."%' ";

                                    // Aqui estará el bucle que busque el nick
                                    $consunick2 = $mysqli -> query($consunick);
                                    while($rowm = $consunick2->fetch_assoc()){
                                            $nickb=$rowm["nick"];
                                            $nombreu=$rowm["nombre"];
                                            $correo=$rowm["correo"];
                                            $mensajes=$rowm["mensajes"];
                                            $color=$rowm["color"];
                                            $descripcion=$rowm["descripcion"];
                                            $pfoto = $rowm["foto"];
                                            
                                            $i++;
                                            
                                            if(empty($color)){
                                                $color = "white";
                                            }
                                            
                                            if ($color == "black"){
                                                $letra = ' color: white';
                                            }
                                            else{
                                                $letra = ' ';
                                            }

                                            if ($i == 1){
                                                $border = "border-top-style: solid;";
                                            }
                                            else{
                                                $border = ' ';
                                            }



                                        if ($i > 0){

                                                echo '
                                                                    <tr class="stimeline">
                                                                        <td style="background-color:'.$color.'; '.$letra.$border.'" class="stimelinef">
                                                                            <a href="profile.php?user='.$nickb.'">
                                                                                <img width="40px" height="40px" class="fotot" alt="Foto" src="profiles/'.strtolower($nickb).'/photos/'.$pfoto.'">
                                                                            </a>
                                                                        </td>
                                                                        <td class="stimelinen" style="background-color:'.$color.'; '.$letra.$border.'">
                                                                            <a style="'.$letra.'" href="profile.php?user='.$nickb.'">
                                                                                '.$nombreu.'
                                                                            </a>
                                                                        </td>                        
                                                                        <td class="stimelinen" style="width:300px;background-color:'.$color.'; '.$letra.$border.'">
                                                                            <a style="'.$letra.'" href="profile.php?user='.$nickb.'">
                                                                                '.$nickb.'
                                                                            </a>
                                                                        </td>
                                                                        <td style="background-color:'.$color.'; '.$letra.'; '.$border.'" class="stimelinem">
                                                                            '.$mensajes.'
                                                                        </td>
                                                                    </tr>              
                                                                    ';
                                                }
                                    }

                                            echo '                          
                                            </table>                    
                                            </div>
                                                                <div class="p-1 mt-0 modal-footer mt-0  text-white" style="border-top-width:0px;">
                                                                    <button type="button" class="btn btn-secondary" style="margin 0 auto;" data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>                                                
                                </div>
                            </div>
                        </div>
                        ';
    }
?>