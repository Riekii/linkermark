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
        <link rel="stylesheet" type="text/css" href="../scss/data.css">
        <link rel="stylesheet" type="text/css" href="css.css">
        <?php
            include "sql.php";
            include "cook.php";
            ob_start();
        ?>
        <!-- Título -->
        <title>Linkermark</title>

    </head>
    <!-- Logo -->
    <body id="body" style="background-image:none;" class="bg-white">
        <?php include "../permas/top.php"?>
            <br><br><br>
            <div class="cabecera" style="background-color:aliceblue">
                <?php
                if ($color == "black") {
                    echo '<img src="../img/logoo.png" height="130px" style="background-color:white;">';
                }
                else{
                echo '<img src="../img/logoo.png" height="130px" style="background-color:'.$color.'">';
                }
                ?>
            </div>
    <!-- Fin logo -->

    <!-- Barra de progresos -->

            <div class=" container-fluid cprogreso rounded mt-2 mt-sm-0 mt-md-0" style="border: solid 10px aliceblue;">
                <div class="row">
                    <div class="col col-12 col-md-6 ml-0 mr-0 mt-0 rounded pb-0 mb-0 pb-0" style="border: solid 10px aliceblue;">
                    <?php
                    // Barra de progreso USUARIOS
                            $mysqli = new mysqli($ip,$user,$password,$db);
                            
                            if($mysqli -> connect_error){
                                echo "<br/>Error en la conexión con la base de datos";
                            }
                            else{
                                // Aqui vamos a hacer la consulta para saber cuantos usuarios y mensajes hay
                                $comp = "SELECT COUNT(*) FROM usuarios";
                                $consulta = $mysqli -> query($comp,MYSQLI_USE_RESULT);
                                $fila = $consulta->fetch_assoc();
                               while ($fila) {
                                  $numero=$fila["COUNT(*)"];
                                   $fila=$consulta->fetch_assoc();
                                   }
                                   $consulta->close();
                   
                               if($numero < 100){
                                       $porcentaje = $numero;
                                       $reto = 100;
                                   }
                               elseif($numero < 1000){
                                   $porcentaje = $numero * 100 / 1000;
                                   $reto = 1000;
                               }
                               elseif($numero < 10000){
                                   $porcentaje = $numero * 100 / 10000;
                                   $reto = 10000;
                               }
                               elseif($numero < 100000){
                                   $porcentaje = $numero * 100 / 100000;
                                   $reto = 100000;
                               }
                              else{
                                $porcentaje = 100;
                                $reto = 100000;
                            }
                            mysqli_close($mysqli);
                            }
                            echo '
                            <h4 class="rounded">Usuarios registrados</h4>
                            <h5>'.$porcentaje.'/'.$reto.' ('.$porcentaje.'%)</h5>
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="'.$porcentaje.'" aria-valuemin="0" aria-valuemax="100" role="progressbar" style="width: '.$porcentaje.'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>';
                                include "search/sactivos.php";
                               echo '
                            </div>
                            ';
                            ?>
                            <!-- <div class="col" style="background-color:aliceblue;position:static;"></div> -->
                            <?php
                            // Barra de progreso MENSAJES
                            $mysqli = new mysqli($ip,$user,$password,$db);
                            
                            if($mysqli -> connect_error){
                                echo "<br/>Error en la conexión con la base de datos";
                            }
                            else{
                                // Aqui vamos a hacer la consulta para saber cuantos usuarios y mensajes hay
                                $comp = "SELECT COUNT(*) FROM mensajes";
                                $consulta = $mysqli -> query($comp,MYSQLI_USE_RESULT);
                                $fila = $consulta->fetch_assoc();
                               while ($fila) {
                                  $numero=$fila["COUNT(*)"];
                                   $fila=$consulta->fetch_assoc();
                                   }
                                   $consulta->close();
                   
                               if($numero < 100){
                                       $porcentaje = $numero;
                                       $reto = 100;
                                   }
                               elseif($numero < 1000){
                                   $porcentaje = $numero * 100 / 1000;
                                   $reto = 1000;
                               }
                               elseif($numero < 10000){
                                   $porcentaje = $numero * 100 / 10000;
                                   $reto = 10000;
                               }
                               elseif($numero < 100000){
                                   $porcentaje = $numero * 100 / 100000;
                                   $reto = 100000;
                               }
                              else{
                                $porcentaje = 100;
                                $reto = 100000;
                            }
                            mysqli_close($mysqli);
                            }
                            echo '
                            <div class="col col-12 col-md-6 rounded pt-4 pt-sm-3 mt-md-0 mb-0 pb-4" style="border: solid 10px aliceblue;">
                                <h4 class="rounded">Mensajes enviados</h4>
                                <h5>'.$numero.'/'.$reto.' ('.$porcentaje.'%)</h5>
                                <div class="progress">
                                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" aria-valuenow="'.$porcentaje.'" aria-valuemin="0" aria-valuemax="100" role="progressbar" style="width: '.$porcentaje.'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div><br/>';
                               include "search/smensajes.php";
                               echo '
                            </div>
                            ';
                    ?>
                </p>
                </div>
            </div>
    <!-- Fin barra de progreso -->

    </body>
</html>
