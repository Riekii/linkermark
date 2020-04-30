<html>
    <head>
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