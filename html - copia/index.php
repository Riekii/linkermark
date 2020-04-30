<html>
    <head>
        <title>Linkermark</title>
        <link href="css.css" type="text/css" rel="stylesheet"/>
        <link href="favicon.ico" type="image/x-icon"/>
        <?php
        include "sql.php";
        ?>
    </head>
    <body>
        <?php
        if(isset($_POST["login"])&&isset($_POST["pass"])){
;
            
            //$login = preg_replace("/'/", "", $login);
            
            $mysqli = new mysqli($ip, $user, $password);
            $login = mysqli_real_escape_string($mysqli, strtolower($_POST["login"]));
            $pass=MD5(strtolower($_POST["pass"]));
            
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
        <a href="documentacion/Documentación (Manuel Junquera Martínez).pdf">
        <div class="doc">Documentación</div>
        </a>
	<a href="./riotapi/index.html">
        	<div style="text-align: right;position: absolute;right: 5px;bottom: 5px;color: grey;">App de Riot</div>
        </a>
    </body>
</html>