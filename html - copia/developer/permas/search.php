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
        <br/><br/><br/><br/>
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
        <div class="dcontainer">
            <div class="ds1">
                <div class="subtitulodd"><b>Top mensajes</b></div>
                <br/>
                <?php include"./search/smensajes.php"; ?>
            </div>
            <div class="ds2">
                <div class="subtitulodd"><b>Top activos</b></div>
                <?php include"./search/sactivos.php"; ?>
            </div>
        </div>
    </body>
</html>