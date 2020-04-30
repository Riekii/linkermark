<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Javascript -->
    <script type="text/javascript" src="js/script2.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
        <link href="css.css" type="text/css" rel="stylesheet"/>
        <link href="favicon.ico" type="image/x-icon"/>
        <title>Descubrir</title>
        <?php 
        include"sql.php";
        include "cook.php";
        ?>
    </head>
    <body class="user">
        <?php include "top.php";?>
        <br/><br/><br/>
        
        <div class="search">
            <div class="subtitulo"><b>Buscar usuarios</b></div>
            <br/>
            <p class="searchu">Escribe aquí el nombre o el nick correspondiente:</p>
            <form method="post" action="searchu.php">
            <input type="text" name="searchu" id="searchu" class="searchu">
                <br/><br/>
            <input type="submit">
            </form>
        </div>
        
        <div class="searchu">
            
            <?php
            if (isset($_POST["searchu"])){
                $i = 0;
                $e = 0;
                
                // Realizamos la conexión con la base de datos
                $mysqli = new mysqli($ip,$user,$password,$db);
                
                $searchu = $_POST["searchu"];
                $consunick = "SELECT * FROM usuarios WHERE nick like '%".$searchu."%' ";
                $consunombre = "SELECT * FROM usuarios WHERE nombre like '%".$searchu."%' ";
                echo '
                    <div class="stitulo1"><b>Coincidencias por nick:</b></div>
                        <table class="snicktimeline">
                            <tr class="snicktimeline">
                                <th id="sntfoto" class="snicktimeline">Foto</th>
                                <th id="sntnick" class="snicktimeline">Nombre</th>
                                <th id="sntnick" class="snicktimeline">Nick</th>
                                <th id="sntnombre" class="snicktimeline">Mensajes</th>
                            </tr>';
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
                                        <img width="40px" height="40px" class="fotot" alt="Foto"
                                        src="profiles/'.strtolower($nickb).'/photos/'.$pfoto.'">
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
                        </tr>';
                    }
                    
                }
                echo '</table>';
            
                    echo '
                    <div style="margin-top:5px" class="stitulo1"><b>Coincidencias por nombre:</b></div>
                        <table class="snicktimeline">
                            <tr class="snicktimeline">
                                <th id="sntfoto" class="snicktimeline">Foto</th>
                                <th id="sntnombre" class="snicktimeline">Nombre</th>
                                <th id="sntnick" class="snicktimeline">Nick</th>
                                <th id="sntmsg" class="snicktimeline">Mensajes</th>
                            </tr>';
            }
                
                // Aqui estará el bucle que busque el nombre
                $consunombre2 = $mysqli -> query($consunombre);
                while($rowm = $consunombre2->fetch_assoc()){
                    $nickb=$rowm["nick"];
                    $nombreu=$rowm["nombre"];
                    $correo=$rowm["correo"];
                    $mensajes=$rowm["mensajes"];
                    $color=$rowm["color"];
                    $descripcion=$rowm["descripcion"];
                    $pfoto = $rowm["foto"];
                    
                    $e++;
                    
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
                      if ($e = 0){
                          echo "No hay coincidencias";
                      }

                    
                      echo '
                        <tr class="stimeline">
                                <td style="background-color:'.$color.'; '.$letra.$border.'" class="stimelinef">
                                    <a href="profile.php?user='.$nickb.'">
                                        <img width="40px" height="40px" class="fotot" alt="Foto"
                                        src="profiles/'.strtolower($nickb).'/photos/'.$pfoto.'">
                                    </a>
                                </td>
                                
                                <td class="stimelinen" style="background-color:'.$color.'; '.$letra.$border.'">
                                    <a style="'.$letra.'" href="profile.php?user='.$nickb.'">
                                        '.$nombreu.'
                                    </a>
                                </td>
                                
                                <td class="stimelinen" style="background-color:'.$color.'; '.$letra.$border.'">
                                    <a style="'.$letra.'" href="profile.php?user='.$nickb.'">
                                        '.$nickb.'
                                    </a>
                                </td>
                                
                                <td style="background-color:'.$color.'; '.$letra.'; '.$border.'" class="stimelinem">
                                    '.$mensajes.'
                                </td>
                        </tr>';
                    
                
                
            }
            echo '</table>';
            ?>
        </div>
    </body>
</html>