<!-- Modal Login-->
          <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title text-center" id="mtitle">Login</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span> </button>
                      </div>
      
                      <div class="modal-body">
                      <?php
                            if(isset($_POST["login"])&&isset($_POST["pass"])){
                    ;
                                
                                //$login = preg_replace("/'/", "", $login);
                                
                                $mysqli = new mysqli($ip, $user, $password);
                                $login = mysqli_real_escape_string($mysqli, strtolower($_POST["login"]));
                                $pass=md5(strtolower($_POST["pass"]));
                                
                                if($mysqli->connect_error){
                                    echo "Error en la conexión con la base de datos";
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
                                    
                                        setcookie("clogin",strtolower($_POST["login"]),time()+3600,'/');
                                        setcookie("cpass",strtolower($_POST["pass"]),time()+3600,'/');
                                
                                    if(!empty($nickb)){

                                        
                                        header("Location:linkermark.php");
                                        echo "<br/>";
                                        mysqli_close($mysqli);
                                    }
                                    else{
                                        echo '
                                        <br/>
                                        <img class="logo" src="logo.png" alt="linktermark" height="90px" width="400px"/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <form action="index.php" method="post">
                                            <fieldset>
                                            <legend>Usuarios registrados</legend>
                                                <p>Nick:  <input type="text" name="login" id="login"/> </p>
                                                <p>Contraseña:  <input type="password" name="pass" id="pass"/> </p>
                                                
                                                <p class="pequer"> <b>Usuario o contraseña incorrectos </b></p>
                                                <br/>
                                                <b><input class="boton" type="submit" name="submit" value="Hecho"/></b>
                                            </fieldset>
                                        </form>
                                        <a class="registrate" href="create.php" class="enlace">¿No te has registrado aún?, haz click aqui para hacerlo.</a> 
                                        <br/>';
                                    }
                                }
                            }
                            else{
                            echo '
                            <br/>
                            <img class="logo" src="logo.png" alt="linktermark" height="100px" width="400px"/>
                            <br/>
                            <br/>
                            <br/>
                            <form action="index.php" method="post">
                                <fieldset>
                                <legend>Usuarios registrados</legend>
                                    <p>Nick:  <input type="text" name="login" id="login"/> </p>
                                    <p>Contraseña:  <input type="password" name="pass" id="pass"/> </p>
                                    <b><input class="boton" type="submit" name="submit" value="Hecho"/></b>
                                </fieldset>
                            </form>
                            <a class="registrate" href="create.php" class="enlace">¿No te has registrado aún?, haz click aqui para hacerlo.</a> 
                            <br/>';
                                
                            //echo '<a href="forget.php" class="enlace">¿Has olvidado tu contraseña?</a>';
                            }
                            ?>
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
                          $errorc == 1;
                          /*Vamos a comprobar si las variables están declaradas. Si esta rellenado pero las contraseñas no coinciden, aparecerá un mensaje, y si alguno de ellos están en blanco volverá a la pantalla de registro*/
                          if (isset($_POST["login"])&&
                              isset($_POST["nombre"])&&
                              isset($_POST["mail"])&&
                              isset($_POST["pass"])&&
                              isset($_POST["pass2"])&&
                              $_POST["pass"] != $_POST["pass2"]){
                              $errorc = '<div class="incorrecto">Las contraseñas no concuerdan</div>';
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
                                $errorc =  '<a href="./create.php"><div class="incorrecto">El login no es válido</div></a>';
                              }
                              if(strlen($nombre)<3){
                                $errorc =  '<a href="./create.php"><div class="incorrecto">Nombre es demasiado corto</div></a>';
                              }
                              if(strlen($mail)<3 && strpos($mail,'@') < 0){
                                $errorc =  '<a href="./create.php"><div class="incorrecto">Correo no es válido</div></a>';
                              }
                              if(strlen($pass)<3){
                                $errorc =  '<a href="./create.php"><div class="incorrecto">La contraseña es demasiado corta</div></a>';
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
                                              }
                                              elseif($resn > 0){
                                                    $errorc =  '<div class="incorrecto"><b>El nick '.$login.' ya está en uso</b></div>';
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
                                                      <a href="index.php">
                                                      <div class="correcto">
                                                          <p>Cuenta creada correctamente, pulsa aquí para ir a la página de login</p>
                                                          </div>
                                                      </a>
                                                      ';
                                                      }

                                                  else{
                                                    $errorc =  "Inserción fallida";

                                                  }
                                              }
                                          }
                                      }
                                  }
                              // Si aluno de los campos están vacios te devolverá a la página.
                              else
                              {
                                  // Aquí va el formulario
                                  echo'';
                          }
                          if (isset($errorc) ){
                          }
                              ?>
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
                                        <input class="cnick" maxlength="20" type="text"type="password" name="pass" id="pass" aria-describedby="emailHelp" placeholder="Contraseña"/>
                                  </div>
                                  <div class="create form-group">
                                        <input class="cnick" maxlength="20" type="text" type="password" name="pass2" id="pass2" aria-describedby="emailHelp" placeholder="Repetir contraseña"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="submit" class="btn btn-success"/>
                                  </div>
                              </form>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          <!-- Fin Registro -->
                          <!-- Modal Success -->
                        <script type="text/javascript">
                        $(document).ready(function(){
                            $("#success").modal('show');
                        });0
                        </script>

                        <?php
                        if ($success == 1){
                        echo '
                        <div id="success" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content bg-success">
                                <div class="modal-header bg-success text-center mb-0">
                                        <p class="">
                                            <h4>
                                                Te has registrado correctamente
                                            </h4>
                                        </p>
                                        <p>
                                            
                                        </p>
                                        </div>
                                        <div class="p-1 mt-0 modal-footer mt-0  bg-success text-center">
                                        <button type="button" class="btn btn-secondary" style="margin 0 auto;" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                        }
                        ?>

                <!-- Modal Error -->
                        <?php
                        if ($success == 2 && isset($errorc)){
                        echo '
                        <div id="success" class="modal fade"style="color:white";>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header p-3 mb-2 bg-danger text-white text-center mb-0">
                                        <p style="color:white";>
                                            <h4 style="color:white";>
                                                Error
                                            </h4>
                                        </p>
                                        <p>
                                        '.$errorc.'
                                        </p>
                                        </div>
                                        <div class="p-1 mt-0 modal-footer mt-0 bg-danger text-white text-center">
                                        <button type="button" class="btn btn-secondary" style="margin 0 auto;" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                        }
                        ?>
                            </div>
                  </div>
              </div>
          </div>