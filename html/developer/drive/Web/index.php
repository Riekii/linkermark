<!doctype html>

<html lang="es">

    <head>
    
        <title>DRIVE - Iván Fernández Lara</title>
        

    </head>
    
    <body>


        
        <main>
        
            <article id="temas">
                
                <div class="contenido">
                <h2>vanDrive</h2>
                    <hr/>
                    
                    
                        <form action="/scripts/subir-archivo.php" method="post" enctype="multipart/form-data">

	                           <input type="file" name="archivo" id="archivo" />
                            
                                <input type="text" name="carpetasubida" value="<?php echo $dir;?>" hidden/>
                                <input type="text" name="carpetaanterior" value="<?php echo $directory;?>" hidden/>

	                           <input type="submit" id="enviar" value="Subir archivo" />

	               </form>
                    
                    <br/>
                    <br/>
                    
                    
                        <!-- Acciones -->
                    
                    
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            
                            <input type="button" name="borrar" value="Borrar" />
                            
                            <input type="button" name="nombre" value="Cambio de Nombre"/>
                            
                            
                        </form>
       
                        <?php

                            if (isset($_POST['borrar'])){
                            
                                $accion="/scripts/borrar-archivo.php";
                            
                                $accionboton="borrado";
                                
                                echo "<br/>";
                                
                                echo "<p>Modo cambiado a borrado</p>";
                                
                                echo "<br/>";
                            }
                    
                            else {
                                
                                
                        
                            }
  
                        ?>
                    
                    
                  

<form action="<?php echo $accion;?>" method="post" enctype="multipart/form-data">

                                <input type="text" name="diranterior" value="<?php echo $dir;?>" hidden/>
                                <input type="text" name="carpetaanterior" value="<?php echo $directory;?>" hidden/>
   
                    
                        <?php
                    
                            include('../../scripts/opendir.php');
                            
                        ?>

    
    <input type="submit" name="confirmar" value="Confirmar <?php echo $accionboton;?>" />
    
</form>


    

                </div>
                
            </article>
                    
            

        </main>
        
        

        
    </body>
    
</html>