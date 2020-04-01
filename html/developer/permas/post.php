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
 
        <title>Linkermark</title>
        <link href="css.css" type="text/css" rel="stylesheet"/>
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <title>Post</title>
        <style>
            div.post{
                padding-bottom: 400px;
            }
        </style>
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