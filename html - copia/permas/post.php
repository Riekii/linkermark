<html>
    <head> 
        <title>Linkermark</title>
        <link href="css.css" type="text/css" rel="stylesheet"/>
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <title>Post</title>
        <?php
        // Aquí esta el formulario para que los usuarios posteen. Esto se envia a pre.php, donde se comprueba y se introduce todo.
        include "sql.php";
        include "cook.php";
        ?>
    </head>
    <body>
        <br/><br/>
        <?php include "top.php";?>
        <div class="post">
            <div class="subtitulo"><b>Escribe aqui tu post</b></div>
            <br/>
            <form id="post" method="POST" action="pre.php" enctype="multipart/form-data">
                <textarea id="usermsg" class="post" form="post" name="post" maxlength="1000" cols="100" rows="10"></textarea>
                <br/><br/>
                    <input class="boton" name="foto" type="file"/>
                <p class="pequer">Máximo tamaño de archivo: 20mb</p>
                <br>
                <input class="boton" type="submit" name="enviar"/>
            </form>
        </div>
    </body>
</html>