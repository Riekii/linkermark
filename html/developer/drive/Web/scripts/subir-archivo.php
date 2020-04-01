<!doctype html>

<html lang="es">

    <head>
    
        <title>DRIVE - Iván Fernández Lara</title>
        

    </head>
    
    <body>

        <main>
        
            <article id="temas">
                
                <div class="contenido">

<?php


$carpetadestino = $_POST['carpetasubida'];

$carpetaanterior = $_POST['carpetaanterior'];

    if (move_uploaded_file($_FILES['archivo']['tmp_name'],$carpetadestino.$_FILES['archivo']['name'])) {
        
        header("Location: /es/galeria/index.php?pagina=$carpetadestino&directorio=$carpetaanterior");
        
    }

    else {
        
        
        echo "<h1>ERROR NO SE QUE COÑO PASA, PODRÍAN SER PERMISOS, SEGURAMENTE SI</h1>";
        
        echo "<a href="."/es/galeria/index.php?pagina=".$carpetadestino."&directorio=".$carpetaanterior.">VOLVER ATRAS</a>";
        
    }



?>
                    
                    
                    </div>
                
            </article>
                    
            

        </main>
        

         
        
    </body>
    
</html>