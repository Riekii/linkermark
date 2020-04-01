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
                    
                    $diranterior = $_POST['diranterior'];

                    
                    
                    $archivo=$_POST['archivo'];
                    $carpeta=$_POST['carpeta'];

                        

                                if(!empty($carpeta))
                                    {
                                        $folder=$carpeta;
                        
                                        foreach($folder as $folder_valor){
                            
                                            if (unlink($folder_valor)) {
                                                
                                                echo "<p>Carpeta borrada:".$folder_valor."</p>";
                                                
                                            }
                                            
                                            else{
                                                
                                                echo "<p>Error al borrar carpeta. Podrian ser permisos o que igual la carpeta tiene algo dentro y esta dando por culo:".$folder_valor."</p>";
                                                
                                            }
                                        }
                                }
                            
                                elseif (!empty($archivo)) 
                                    {
                                        $file=$archivo;
                                    
                                        foreach($file as $file_valor){
                            
                                           if (unlink($file_valor)) {
                                                
                                                echo "<p>Archivo borrado:".$folder_valor."</p>";
                                                
                                            }
                                            
                                            else{
                                                
                                                echo "<p>Error al borrar archivo, podrían ser ... BUENO NO, SON LOS PERMISOS DE MIERDA JODER ... QUE ASCO NEN ... A LOGGEARSE EN EL SERVER DE MIERDA...:".$file_valor."</p>";
                                                
                                            }
                                        }
                                    
                                    
                                }
                            
                                else {
                                
                                    echo '<p>Ninguna carpeta ni archivo fueron seleccionados</p>';
                                    
                                
                                }
                                        
                                echo "<a href='javascript:history.go(-1)'><img src='../../imagenes/iconos/anterior.png' alt='anterior' height='20px' width='20px'>VOLVER ATRAS</a>" . "<br/>";
                                
     
?>
                    
                    
                    </div>
                
            </article>
                    
            

        </main>
        

         
        
    </body>
    
</html>