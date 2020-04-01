<html>
    <head>
        <title>Linkermark</title>
        <link href="css.css" type="text/css" rel="stylesheet"/>
        <link href="favicon.ico" type="image/x-icon"/>
        <?php
        include "sql.php";
        include "cook.php";
        ?>
    </head>
    <body>
        <?php
        // Vamos a poner la barra de arriba y nos conectamos con sql.
        // Si se han enviado datos a través del formulario se envian y se redirige al header. Si no se recarga la página.
            include "top.php";


            if (isset ($_POST["post"]) && !empty ($_POST["post"])){
                
                if($_FILES["foto"] && $_FILES["foto"]["size"] > 0){
                    
                $ext = substr($_FILES['foto']['name'], strpos($_FILES['foto']['name'],".")+1);
            switch($ext){
                case "gif":
                    $formatof = "1";
                    break;
                case "png":
                    $formatof = "1";
                    break;
                case "jpeg":
                    $formatof = "1";
                    break;
                case "jpg":
                    $formatof = "1";
                    break;
                case "ico":
                    $formatof = "1";
                    break;
                case "icon":
                    $formatof = "1";
                    break;
                case "GIF":
                    $formatof = "1";
                    break;
                case "PNG":
                    $formatof = "1";
                    break;
                case "JPEG":
                    $formatof = "1";
                    break;
                case "JPG":
                    $formatof = "1";
                    break;
                case "ICO":
                    $formatof = "1";
                    break;
                case "ICON":
                    $formatof = "1";
                    break;
            }
                    if (isset($formatof)){
                        if ($formatof = "2" && isset($_FILES['foto'])){
                            header ("Location: post.php");
                    }
                    elseif (isset($_FILES['foto'])){
                        echo '<p class="pequer">';
                        echo "Error. El archivo no es una imagen compatible";
                        echo '</p>';
                        header ("Location: post.php");
                    }
                    else{
                        header("Location: post.php");
                    }
                    
                    $mysqli = new mysqli($ip,$user,$password,$db);

                    $consid = "
                    SELECT * 
                    FROM mensajes 
                    WHERE id_m =(SELECT max(id_m)
                                FROM mensajes)
                            ";
                    $consid2 = $mysqli -> query($consid);

                    while($row = $consid2->fetch_assoc()){
                        $id_m=$row["id_m"];
                    }
                    
                    
                    $id_m=$id_m+1;
                    echo $id_m;
                    
                    mkdir('./mensajes/'.$id_m,0777);
                    $dirsub = './mensajes/'.$id_m.'/';
                    $foto = $dirsub . basename($_FILES['foto']['name']);
                    move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
                
                    // Ahora vamos a insertar el nombre de la foto en el mensaje para asi poder recogerlo.
                    
                    $mysqli = new mysqli($ip,$user,$password,$db);
                    if($mysqli -> connect_error){
                        echo "<br/>Error en la conexión con la base de datos";
                    }
                    else{
                        $mensaje = htmlspecialchars($_POST["post"]);
                    }
                    $consid2 -> close();
                
                    $mensaje = $_POST["post"];
                    $foto = $_FILES['foto']['name'];
                
                    $mysqli -> select_db("linkermark");
                    $datetime = $datetime = date_create()->format('Y-m-d H:i:s');
                        
                    $ins = 'INSERT INTO `mensajes`(`nick`, `id_m`, `mensajes`, `datetime`, `foto`) VALUES ("'.$login.'",'.$id_m.',"'.$mensaje.'","'.$datetime.'","'.$foto.'")
                    ';
                        
                    include "photorf.php";

                    $insertar = $mysqli->query($ins);
                        // Si el mensaje se inserta, se añade 1 al número de mensajes
                        if ($insertar === TRUE){
                            $insu=$insu="UPDATE usuarios SET mensajes = mensajes+1 WHERE nick = '".$login."'";
                            $insertaruser = $mysqli->query($insu);
                            if($insertaruser === TRUE)
                            {
                                header("Location: linkermark.php");
                            }
                            else{
                                echo "Error en la tabla usuarios";
                            };
                            $insertaruser = $mysqli->query($insu);
                            if($insertaruser === TRUE)
                            {
                                header("Location: linkermark.php");
                            }
                            else{
                                echo "Error en la tabla usuarios";
                            }
                        }
                        else{
                            // Si no se insertan los datos soltará un error en la conexión y borrará las cookies.
                            echo '<br/><br/><a href="post.php">Error en la inserción</a>';
                            echo $pfoto;
                            echo $foto;
                        }
                    }
                    else {
                  header("Location: post.php");
                }
            }
                
            
                
                else{
                    // Si no hay foto para introducir, introducirá solo el mensaje
                    /*___________________________________________________________*/
                    $mysqli = new mysqli($ip,$user,$password,$db);
                    
                    if($mysqli -> connect_error){
                        echo "<br/>Error en la conexión con la base de datos";
                    }
                    else{
                        $mensaje = htmlspecialchars($_POST["post"]);

                        $consid = "SELECT * FROM mensajes WHERE id_m = (SELECT max(id_m) FROM mensajes)";
                        $consid2 = $mysqli -> query($consid);
                        while ($row = $consid2->fetch_assoc()){
                            $id_m = $row["id_m"];
                        }
                        $consid2 -> close();

                        $mensaje = $_POST["post"];
                        $id_m = $id_m+1;

                        $mysqli -> select_db("linkermark");
                        $datetime = $datetime = date_create()->format('Y-m-d H:i:s');
                        
                        $nick = $login;
                        
                        include "photor.php";
                        
                        $ins = 'INSERT INTO `mensajes`(`nick`, `id_m`, `mensajes`, `datetime`, `foto`) VALUES ("'.$login.'",'.$id_m.',"'.$mensaje.'","'.$datetime.'",NULL)
                        ';

                        $insertar = $mysqli->query($ins);

                        if ($insertar === TRUE){
                            $insu="UPDATE usuarios SET mensajes = mensajes+1 WHERE nick = '".$login."'";
                            $insertaruser = $mysqli->query($insu);
                            if($insertaruser === TRUE)
                            {
                                header("Location: linkermark.php");
                            }
                            else{
                                echo "Error en la tabla usuarios";
                            }
                        }
                        else{
                            // Si no se insertan los datos soltará un error en la conexión y borrará las cookies.
                            header ("Location: post.php");
                            //echo '<br/>'.$login.'<br/>';
                            //echo $id_m.'<br/>';
                            //echo $mensaje.'<br/>';
                        }
                    }
                }
            }
        elseif($_FILES["foto"] && $_FILES["foto"]["size"] > 0){
                    
                $ext = substr($_FILES['foto']['name'], strpos($_FILES['foto']['name'],".")+1);
            switch($ext){
                case "gif":
                    $formatof = "1";
                    break;
                case "png":
                    $formatof = "1";
                    break;
                case "jpeg":
                    $formatof = "1";
                    break;
                case "jpg":
                    $formatof = "1";
                    break;
                case "ico":
                    $formatof = "1";
                    break;
                case "icon":
                    $formatof = "1";
                    break;
                case "GIF":
                    $formatof = "1";
                    break;
                case "PNG":
                    $formatof = "1";
                    break;
                case "JPEG":
                    $formatof = "1";
                    break;
                case "JPG":
                    $formatof = "1";
                    break;
                case "ICO":
                    $formatof = "1";
                    break;
                case "ICON":
                    $formatof = "1";
                    break;
            }
                    if (isset($formatof)){
                        if ($formatof = "2" && isset($_FILES['foto'])){
                            header ("Location: post.php");
                    }
                    elseif (isset($_FILES['foto'])){
                        echo '<p class="pequer">';
                        echo "Error. El archivo no es una imagen compatible";
                        echo '</p>';
                        header ("Location: post.php");
                    }
                    else{
                        header("Location: post.php");
                    }
                    
                    $mysqli = new mysqli($ip,$user,$password,$db);

                    $consid = "
                    SELECT * 
                    FROM mensajes 
                    WHERE id_m =(SELECT max(id_m)
                                FROM mensajes)
                            ";
                    $consid2 = $mysqli -> query($consid);

                    while($row = $consid2->fetch_assoc()){
                        $id_m=$row["id_m"];
                    }
                    
                    
                    $id_m=$id_m+1;
                    echo $id_m;
                    
                    mkdir('./mensajes/'.$id_m,0777);
                    $dirsub = './mensajes/'.$id_m.'/';
                    $foto = $dirsub . basename($_FILES['foto']['name']);
                    move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
                
                    // Ahora vamos a insertar el nombre de la foto en el mensaje para asi poder recogerlo.
                    
                    $mysqli = new mysqli($ip,$user,$password,$db);
                    if($mysqli -> connect_error){
                        echo "<br/>Error en la conexión con la base de datos";
                    }
                    else{
                        $mensaje = htmlspecialchars($_POST["post"]);
                    }
                    $consid2 -> close();
                
                    $mensaje = $_POST["post"];
                    $foto = $_FILES['foto']['name'];
                
                    $mysqli -> select_db("linkermark");
                    $datetime = $datetime = date_create()->format('Y-m-d H:i:s');
                        
                    $ins = 'INSERT INTO `mensajes`(`nick`, `id_m`, `mensajes`, `datetime`, `foto`) VALUES ("'.$login.'",'.$id_m.',"'.$mensaje.'","'.$datetime.'","'.$foto.'")
                    ';
                        
                    include "photorf.php";

                    $insertar = $mysqli->query($ins);

                        if ($insertar === TRUE){
                            $insu="UPDATE usuarios SET mensajes = mensajes+1 WHERE nick = '".$login."'";
                            $insertaruser = $mysqli->query($insu);
                            if($insertaruser === TRUE)
                            {
                                header("Location: linkermark.php");
                            }
                            else{
                                echo "Error en la tabla usuarios";
                            }
                        }
                        else{
                            // Si no se insertan los datos soltará un error en la conexión y borrará las cookies.
                            echo '<br/><br/><a href="post.php">Error en la inserción</a>';
                            echo $pfoto;
                            echo $foto;
                        }
                    }
                    else {
                  header("Location: post.php");
                }
            }
               
        else{
            header ("Location: post.php");
        }
            
        ?>
    </body>
</html>