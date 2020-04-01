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
    <link rel="stylesheet" type="text/css" href="scss/estilos.css">
    <link rel="stylesheet" type="text/css" href="scss/font.css">
    <!-- Título -->
    <title>Linkermark</title>
    <?php
    include "permas/sql.php";
    ob_start();
    ?>
  </head>
  <body id="body">
    <!-- Aquí se empieza a escribir -->

    <nav style="background-color:white" class="navbar navbar-light navbar-expand-md fixed-top pl-0 pr-1 pl-sm-1 pr-sm-1">
          <div class="container">
              <a href="index.html">
            <div class="navbar-brand">
                    <img src="img/logor.png" class="ml-1" height="45px;">
                <p id="inkermark" class="d-inline ml-0 ml-sm-1" style="font-family:rift-medium">Linkermark</p></div>
                    </a>
                <ul id="ltop" class="nav justify-content-end">
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary mr-sm-0 mr-md-1" data-toggle="modal" data-target="#login" >
                            Login
                          </button>    
                    </li>
                     <li class="nav-item">
                        <button type="button" class="btn btn-success mr-0 mr-sm-2k " data-toggle="modal" data-target="#registro">
                            Registro
                          </button>   
                    </li>
                </ul>
        </div>
      </nav>
      
        <div id = "back" style="padding-bottom:550px;background-image: url('img/gentecontenta.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;" style="margin: 0 auto">
            <!-- Mask & flexbox options-->
            <div style="margin-top: -100px;" class="mask rgba-gradient align-items-center">
              <!-- Content -->
              <div class="container">
                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div id="backtext" class="col-md-6 white-text text-center text-md-left mt-xl-5 mb-4 wow fadeInLeft" data-wow-delay="0.3s">
                      <div id="text">
                          
                    <h1 class="h1-responsive font-weight-bold mt-sm-5 text-white " style="font-family:rift-medium">Linkermark</h1><br/>
                    <hr class="hr-light">
                    <h6 class="mb-4 text-white">No sabíamos que poner aqui, asi que pusimos gente sonriendo, que siempre queda bien</h6>
                    <h6 class="mb-4 text-white">Si te fijas, parecen que estan sufriendo, como si alguien les apuntara para que sonrieran</h6>
                      <h6 class="mb-4 text-white">La de la derecha parece que se ha drogado antes de hacer la foto. </h6>
                          
                    </div>
                  
                    </div>
                    <div class="col-md-6 col-xl-5 mt-xl-5 wow fadeInRight"  data-wow-delay="0.3s">
                    <img src="img/logor.png" alt=""   class="logo bg-white m-0 p-0 mt-md-3 img-fluid mb-5 mt-md-4">
                  </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- Fin página -->

        <!-- Modal Login -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title " id="mtitle">Login</h5>
                      </div>
                      <div class="modal-body">
                      <?php
                            if(isset($_POST["login"])&&isset($_POST["pass"])){
                                
                                //$login = preg_replace("/'/", "", $login);
                                
                                $mysqli = new mysqli($ip, $user, $password);
                                $login = mysqli_real_escape_string($mysqli, strtolower($_POST["login"]));
                                $pass=md5(strtolower($_POST["pass"]));
                                
                                if($mysqli->connect_error){
                                    $errori = "Error en la conexión con la base de datos";
                                }
                                else{
                                    $mysqli -> select_db("linkermark");
                                    $comp = "SELECT * FROM usuarios WHERE nick like '".$login."' and pass like '".$pass."'";
                                    
                                    $consulta = $mysqli -> query($comp,MYSQLI_USE_RESULT);
                                    $fila = $consulta->fetch_assoc();
                                        while ($fila) {
                                                    $nickb=$fila["nick"];
                                                    $fila=$consulta->fetch_assoc();
                                            }
                                        $consulta->close();

                                    if(!empty($nickb)){
                                            setcookie("clogin",strtolower($_POST["login"]),time()+3600,'/');
                                            setcookie("cpass",strtolower($_POST["pass"]),time()+3600,'/');

                                            header("Location: ./permas/linkermark.php");
                                        mysqli_close($mysqli);
                                    }
                                    else{
                                        $errori = "Contraseña o usuario no válido";
                                        $success = 4;
                                    }
                                }
                            }
                                
                            //echo '<a href="forget.php" class="enlace">¿Has olvidado tu contraseña?</a>';
                             ?>
                            <form action="index.php" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" name="login" id="login" aria-describedby="emailHelp" placeholder="Nick"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pass" id="pass" aria-describedby="emailHelp" placeholder="Contraseña"/>
                                    </div>
                                    <b><input class="btn btn-primary" type="submit" name="submit" value="Hecho"></b>
                                </fieldset>
                            </form>
                        </div>
                        <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              </div>
                    </div>
                </div>
        </div>

        <!-- Modal Registro-->
        <div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
      
                          <h5 class="modal-title " id="mtitle">Registro</h5>
      
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span> </button>
      
                      </div>
      
                      <div class="modal-body">
                          <!-- Registro -->
                          <?php
                          /*Vamos a comprobar si las variables están declaradas. Si esta rellenado pero las contraseñas no coinciden, aparecerá un mensaje, y si alguno de ellos están en blanco volverá a la pantalla de registro*/
                          if (isset($_POST["login"])&&
                              isset($_POST["nombre"])&&
                              isset($_POST["mail"])&&
                              isset($_POST["pass"])&&
                              isset($_POST["pass2"])&&
                              $_POST["pass"] != $_POST["pass2"]){
                              $errorc = '<div class="incorrecto">Las contraseñas no concuerdan</div>';
                              $success = 2;
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
                                $errorc =  'El login no es válido</div>';
                                $success = 2;
                              }
                              if(strlen($nombre)<3){
                                $errorc =  '<div class="incorrecto">Nombre es demasiado corto</div>';
                                $success = 2;
                              }
                              if(strlen($mail)<3 && strpos($mail,'@') < 0){
                                $errorc =  'Correo no es válido</div>';
                                $success = 2;
                              }
                              if(strlen($pass)<3){
                                $errorc =  'La contraseña es demasiado corta</div>';
                                $success = 2;
                              }
                              
                              else{
                                  $mysqli = new mysqli($ip,$user,$password,$db);

                                      if($mysqli->connect_error){
                                        $errorc =  "Fallo al intentar conectarse con la base de datos";
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
                                                    $errorc = '<div class="incorrecto"><b>El correo '.$mail.' ya está en uso</b></div>';
                                                    $success = 2;
                                              }
                                              elseif($resn > 0){
                                                    $errorc =  '<div class="incorrecto"><b>El nick '.$login.' ya está en uso</b></div>';
                                                    $success = 2;
                                              }
                                              else{
                                                  // Creamos la carpeta del usuario
                                                  mkdir('./permas/profiles/'.$login,0777);
                                                  mkdir('./permas/profiles/'.$login.'/photos',0777);
                                                  copy ("./permas/profiles/default/photo.png", "./permas/profiles/".$login."/photos/photo.png");

                                                  /*Una vez conectados, vamos a introducir los datos recibidos*/
                                                  /*Primero introducimos la consulta en una variable llamada $ins*/
                                                  $mysqli -> select_db("linkermark");
                                                  $nick = $login;
                                                  if (isset ($pfoto)){}
                                                  else{
                                                      $pfoto = "photo.png";
                                                  }
                                                  include "permas/photor.php";
                                                  $ins=
                                                  '
                                                  INSERT INTO usuarios(nick, nombre, correo, pass, mensajes, foto) VALUES 
                                                  ("'.strtolower($login).'","'.$nombre.'","'.$mail.'","'.MD5($pass).'",0, "'.$pfoto.'")
                                                  ';

                                                  /*Ahora vamos a ejecutarla dentro del servidor*/
                                                  $insertar = $mysqli -> query($ins);
                                                  if ($insertar === TRUE){
                                                    $errorc = '
                                                      <div class="correcto">
                                                          <p>Cuenta creada correctamente, pulsa aquí para ir a la página de login</p>
                                                          </div>
                                                      ';
                                                      $success = 3;
                                                      }

                                                  else{
                                                    $errorc =  "Inserción fallida";
                                                    $success = 2;
                                                  }
                                              }
                                          }
                                      }
                                  }
                              // Si aluno de los campos están vacios te devolverá a la página.
                                  // Aquí va el formulario
                                  echo'
                               <form action="index.php" method="post">
                                  <div class="create form-group">
                                        <input class="cnick" maxlength="20" type="text" name="login" id="login" aria-describedby="emailHelp" placeholder="Nick" style="margin-bottom:0;"/>
                                        <small id="login" style="margin-top:0px;" class="form-text text-muted">El Nick es pemanente</small>
                                  </div>
                                  <div class="create form-group">
                                        <input class="cnick" maxlength="20" type="text"  name="nombre" id="nombre" aria-describedby="emailHelp" placeholder="Nombre"/>
                                  </div>
                                  <div class="create form-group">
                                        <input class="cnick" maxlength="20" type="text" name="mail" id="mail" aria-describedby="emailHelp" placeholder="Email"/>
                                  </div>
                                  <div class="create form-group">
                                        <input class="cnick" maxlength="20" type="password" name="pass" id="pass" aria-describedby="emailHelp" placeholder="Contraseña"/>
                                  </div>
                                  <div class="create form-group">
                                        <input class="cnick" maxlength="20" type="password" name="pass2" id="pass2" aria-describedby="emailHelp" placeholder="Repetir contraseña"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="submit" class="btn btn-success"/>
                                  </div>
                              </form>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>';
                ?>
            </div>
        </div>
    </div>
    <!-- Fin Registro -->

    <script type="text/javascript">
    $(document).ready(function(){
        $("#success").modal('show');
    });
    </script>

        <!-- Modal Error/Success -->
            <?php   if (isset($success)){
                        if ($success == 2){
                        echo '
                        <div id="success" class="modal fade"style="color:white";>
                        <div class="modal-dialog" style="border-bottom-width:0px";>
                            <div class="modal-content bg-danger" style="border-bottom-width:0px";>
                                <div class="modal-header p-3 mb-2 bg-danger text-white text-center mb-0" style="border-bottom-width:0px";>
                                        <p style="color:white";>
                                            <h4 style="color:white";>
                                                Error en el registro
                                            </h4>
                                        </p>
                                        
                                        </div>
                                        <div class="modal-body bg-danger p-0 m-0" >
                                         '.$errorc.'
                                        </div>
                                        <div class="p-1 mt-0 modal-footer mt-0 bg-danger text-white" style="border-top-width:0px;">
                                        <button type="button" class="btn btn-secondary" style="margin 0 auto;" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                        }
                        else{

                        }
                        if ($success == 3){
                            echo '
                            <div id="success" class="modal fade"style="color:white";>
                            <div class="modal-dialog" style="border-bottom-width:0px">
                            <div class="modal-content bg-success" style="border-bottom-width:0px">
                                <div class="modal-header p-3 mb-2 bg-success text-white text-center mb-0" style="border-bottom-width:0px">
                                        <p style="color:white";>
                                            <h4 style="color:white";>
                                                Cuenta registrada correctamente
                                            </h4>
                                        </p>
                                        
                                        </div>
                                        <div class="modal-body bg-success p-0 m-0">
                                         Bienvenido a Linkermark
                                        </div>
                                        <div class="p-1 mt-0 modal-footer mt-0 bg-success text-white" style="border-top-width:0px;">
                                        <button type="button" class="btn btn-secondary" style="margin 0 auto;" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                        }
                        else{
                        }
                        if ($success == 4){
                            echo '
                            <div id="success" class="modal fade"style="color:white";>
                            <div class="modal-dialog" style="border-bottom-width:0px";>
                                <div class="modal-content bg-danger" style="border-bottom-width:0px";>
                                    <div class="modal-header p-3 mb-2 bg-danger text-white text-center mb-0" style="border-bottom-width:0px";>
                                            <p style="color:white";>
                                                <h4 style="color:white";>
                                                    Error en el login
                                                </h4>
                                            </p>
                                            
                                            </div>
                                            <div class="modal-body bg-danger p-0 m-0" >
                                             '.$errori.'
                                            </div>
                                            <div class="p-1 mt-0 modal-footer mt-0 bg-danger text-white" style="border-top-width:0px;">
                                            <button type="button" class="btn btn-secondary" style="margin 0 auto;" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                            }
                        }
                    
                        ?>
        
          <!-- Fin del body-->
        </div>
        </body>
        <footer class="text-white bg-secondary align-text-bottom page-footer">
          <p id="foot" class="small">La página linkermark y asociados no se responsabiliza del uso fraudulento de la página</p>
          <p id="foot" class="small">Al registrarse en esta página acepta nuestros términos y condiciones legales, los cuales no mostramos por ser extremadamente ilegales</p>
      </footer>
      
      <?php
        ob_end_flush();
        ?>
</html>