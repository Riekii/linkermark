<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <?php
        $ip = '127.0.0.1';
        $user = 'root';
        $password = '';
        $db = 'linkermark';

        $mysqli = new mysqli($ip, $user, $password);
        
        if($mysqli->connect_error){
            echo "Error en la conexión con la base de datos";
        }
        else {
            $mysqli -> select_db("empleados");
            $db = "empleados";
        }
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css" typ>
</head>
    <body>
    <div class="search">
        <div class="topsearch">
        </div>
        <br/>
        <form method="post" action="index.php">
            <div class="container-fluid corto">
                <div class="row">
                    <div class="col-10">
                        <input name="searchu" id="searchu"  class="form-control form-control-lg" type="text" placeholder="Buscar empleado">
                    </div>
                    <div class="col-2">
                        <input id="buscar" style=" 
                        margin: 0 auto;
                        display: block;
                        padding: 10px;
                        padding-left: 30px;
                        padding-right: 30px;" 
                        class="btn btn-dark btn-enviar" type="submit" value="Buscar">
                        <svg class="bi bi-search lupa" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>
        </form>

        <form id="formregistro" method="post" action="index.php">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-lg-2">
                <input id="form-nombre" name="nombre" class="form-control form-control-sn nombre" type="text" placeholder="*Nombre">
                </div>
                <div class="col-md-3 col-lg-2">
                <input id="form-apellidos" name="apellidos" class="form-control form-control-sn apellidos" type="text" placeholder="*Apellidos">
                </div>
                <div class="col-md-3 col-lg-2">
                <input id="form-ctrabajo" name="ctrabajo" class="form-control form-control-sn" type="text" placeholder="*Centro de trabajo">
                </div>
                <div class="col-md-3 col-lg-2">
                <input id="form-ltrabajo" name="ltrabajo" class="form-control form-control-sn" type="text" placeholder="*Lugar de trabajo">
                </div>
                <div class="col-md-3 col-lg-2">
                <!-- <input id="form-ealta" name="ealta" class="form-control form-control-sn" type="text" placeholder="*Empresa de alta"> -->
                <select id="form-ealta" placeholder="empresa">
                    <optgroup label="Empresas de alta">
                        <option value="INTERMARK IT">Intermark IT</option>
                    </optgroup>
                </select>
                </div>
                <div class="col-md-3 col-lg-2">
                <!-- <input id="form-empresa" name="empresa" class="form-control form-control-sn" type="text" placeholder="*Empresa"> -->
                <select id="form-empresa" placeholder="empresa">
                    <optgroup label="Empresas">
                        <option value="INTERMARK IT">Intermark IT</option>
                    </optgroup>
                </select>
                </div>
                <div class="col-md-3 col-lg-2">
                <input id="form-perfil1" name="perfil1" class="form-control form-control-sn" type="text" placeholder="Perfil">
                </div>
                <div class="col-md-3 col-lg-2">
                <input id="form-perfil2" name="perfil2" class="form-control form-control-sn" type="text" placeholder="Perfil 2">
                </div>
                <div class="col-md-3 col-lg-2">
                <input id="form-area" name="area" class="form-control form-control-sn" type="text" placeholder="*Area">
                </div>
                <div class="col-md-3 col-lg-2">
                <input id="form-departamento" name="departamento" class="form-control form-control-sn" type="text" placeholder="*Departamento">
                </div>
                <div class="col-md-3 col-lg-2">
                <input id="form-responsable" name="responsable" class="form-control form-control-sn" type="text" placeholder="Responsable">
                </div>
                <div class="col-md-3 col-lg-2">
                <input id="form-telefono" name="telefono" class="form-control form-control-sn" type="text" placeholder="*Telefono">
                </div>
                <div class="col-md-3 col-lg-2 form-radio">
                    <p class="p-comunicacion">Comunicación</p>
                    <input type="radio" id="form-comunicacion-s" name="comunicacion" value="SI">
                    <label for="comunicacion">Si</label>
                    <input type="radio" id="form-comunicacion-n" name="comunicacion" value="NO">
                    <label for="comunicacion">No</label>
                </div>
                <div class="col-12">
                <input id="registrarse" class="btn btn-success" type="submit" value="Registrarse">
                </div>
            </div>
        </div>
        </form>
    </div>
    <?php
            if (
                isset($_POST["nombre"])&&
                isset($_POST["apellidos"])&&
                isset($_POST["ctrabajo"])&&
                isset($_POST["ltrabajo"])&&
                isset($_POST["ealta"])&&
                isset($_POST["empresa"])&&
                isset($_POST["perfil1"])&&
                // isset($_POST["perfil2"])&&
                isset($_POST["area"])&&
                isset($_POST["departamento"])&&
                isset($_POST["responsable"])&&
                // isset($_POST["telefono"])&&
                isset($_POST["comunicacion"])
            ){
                $mysqli = new mysqli($ip,$user,$password,$db);
                $mysqli -> select_db("empleados");

                $conmaxem = "select * from empleados order by id_empleado desc limit 1;";
                $conmaxemq = $mysqli->query($conmaxem);
                $rowm = $conmaxemq->fetch_assoc();
                $maxemp = $rowm["id_empleado"] + 1;

                $nombre = $_POST["nombre"];
                $apellidos = $_POST["apellidos"];
                $ctrabajo = $_POST["ctrabajo"];
                $ltrabajo = $_POST["ltrabajo"];
                $ealta = $_POST["ealta"];
                $empresa = $_POST["empresa"];
                $perfil1 = $_POST["perfil1"];
                //
                $area = $_POST["area"];
                $departamento = $_POST["departamento"];
                $responsable = $_POST["responsable"];
                //
                $comunicacion = $_POST["comunicacion"];

                if( isset($_POST["perfil2"]) ){
                    $perfil2 = isset($_POST["perfil2"]);
                }
                 else 
                 {$perfil2 = ' ';}

                if(isset($_POST["telefono"])){
                    $telefono = isset($_POST["telefono"]);
                } 
                else 
                {$telefono = ' ';}



                $ins='
                INSERT INTO `empleados`(`id_empleado`, `centro_trabajo`, `lugar_trabajo`, `empresa_alta`, `empresa`, `trabajador`, `perfil1`, `perfil2`, `area`, `departamento`, `responsable`, `telefono`, `comunicacion`) VALUES
                ("'.$maxemp.'","'.$ctrabajo.'","'.$ltrabajo.'","'.$ealta.'","'.$empresa.'","'.$apellidos.', '.$nombre.'","'.$perfil1.'","'.$perfil2.'","'.$area.'","'.$departamento.'","'.$responsable.'","'.$telefono.'","'.$comunicacion.'")';
                
                echo $ins;
                $insertar = $mysqli -> query($ins);
                if ($insertar === TRUE){
                    echo '
                     <a href="index.php">
                        <div class="correcto">
                            <p>Cuenta creada correctamente, pulsa aquí para ir a la página de login</p>
                        </div>
                    </a>';
                }
                else{
                    echo "Inserción fallida";
                    }
            }



            if (isset($_POST["searchu"])){
                $i = 0;
                $e = 0;
                
                // Realizamos la conexión con la base de datos
                $mysqli = new mysqli($ip,$user,$password,$db);

                
                
                $searchu = $_POST["searchu"];
                $consunombre = "SELECT * FROM empleados WHERE trabajador like '%".$searchu."%' ";
                echo '
                        <table class="snicktimeline">
                            <tr class="snicktimeline">
                                <th id="sntfoto" class="snicktimeline">Nombre</th>
                                <th id="sntfoto" class="snicktimeline">Centro</th>
                                <th id="sntfoto" class="snicktimeline">Lugar</th>
                                <th id="sntfoto" class="snicktimeline">Empresa de alta</th>
                                <th id="sntfoto" class="snicktimeline">Empresa</th>
                                <th id="sntfoto" class="snicktimeline">Perfil</th>
                                <th id="sntfoto" class="snicktimeline">Area</th>
                                <th id="sntfoto" class="snicktimeline">Departamento</th>
                                <th id="sntfoto" class="snicktimeline">Responsable</th>
                                <th id="sntfoto" class="snicktimeline">Telefono</th>
                                <th id="sntfoto" class="snicktimeline">Comunicacion</th>
                            </tr>';
                // Aqui estará el bucle que busque el nick
                $consultanombre = $mysqli -> query($consunombre);
                while($rowm = $consultanombre->fetch_assoc()){

                    $trabajador=$rowm["trabajador"];
                    $ctrabajo = $rowm["centro_trabajo"];
                    $ltrabajo = $rowm["lugar_trabajo"];
                    $ealta = $rowm["empresa_alta"];
                    $empresa = $rowm["empresa"];
                    $perfil1 = $rowm["perfil1"];
                    $perfil2 = $rowm["perfil2"];
                    $area = $rowm["area"];
                    $departamento = $rowm["departamento"];
                    $responsable = $rowm["responsable"];
                    $telefono = $rowm["telefono"];
                    $comunicacion = $rowm["comunicacion"];
                    
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
                                <td class="stimelinem">
                                    '.$trabajador.'
                                </td>
                                <td class="stimelinem">
                                    '.$ctrabajo.'
                                </td>
                                <td class="stimelinem">
                                    '.$ltrabajo.'
                                </td>
                                <td class="stimelinem">
                                    '.$ealta.'
                                </td>
                                <td class="stimelinem">
                                    '.$empresa.'
                                </td>
                                <td class="stimelinem">
                                    '.$perfil1.' '.$perfil2.'
                                </td>
                                <td class="stimelinem">
                                    '.$area.'
                                </td>
                                <td class="stimelinem">
                                    '.$departamento.'
                                </td>
                                <td class="stimelinem">
                                    '.$responsable.'
                                </td>
                                <td class="stimelinem">
                                    '.$telefono.'
                                </td>
                                <td class="stimelinem">
                                    '.$comunicacion.'
                                </td>
                        </tr>';
                    }
                    else{
                        echo '<h1>Sin resultados</h1>';

                    }
                    
                }
                echo '</table>';
            }
            else{
                echo '<h1>Busca un empleado</h1>';
            }
            ?>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>