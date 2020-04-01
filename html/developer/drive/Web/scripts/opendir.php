<?php
                

/*

"/mnt/pruebas/".

*/


                    echo "<li><a href='/es/galeria/index.php?pagina=/mnt/pruebas/'><img src='../../imagenes/iconos/home.png' alt='home' height='20px' width='20px'></a></li>" . "<br/>";
                    


                    if (isset($_GET['pagina']) && $_GET['pagina'] != "/mnt/pruebas/") {
                        
                        $directory=$_GET['directorio'];
                        
                        echo "<li><a href='javascript:history.go(-1)'><img src='../../imagenes/iconos/anterior.png' alt='anterior' height='20px' width='20px'></a></li>" . "<br/>";
                        
                        
                        $subcarpeta = $_GET['pagina']."/";

                        $dir=$subcarpeta;                 
                        
                        
                    }

                    else {
                        
                        
                        $dir="/mnt/pruebas/";
                        
                        
                    }

?>




<?php


                            $contiene = scandir($dir); 
                            

                            foreach($contiene as $archivo)
                                {
                                    if(is_dir($dir.$archivo) && $archivo != ".." && $archivo != "."){
                                        
                                        echo "<li><input type='checkbox' name='carpeta[]' value='".$dir.$archivo."' /><a href='/es/galeria/index.php?pagina=".$dir.$archivo."&directorio=$dir'><img src='../../imagenes/iconos/carpeta.png' alt='carpeta' height='20px' width='20px'>$archivo</a></li>" . "<br/>";
                                        
                                        
                                    }
                                
                            }



                            foreach($contiene as $archivo)
                                {
                                    if(is_file($dir.$archivo)){
                                        
                                        echo "<li><input type='checkbox' name='carpeta[]' value='".$dir.$archivo."' /><a href='".$dir.$archivo."'><img src='../../imagenes/iconos/imagen.png' alt='imagen' height='20px' width='20px'>$archivo</a></li>" . "<br/>";
                                        
                                    }
                                
                            }

                            
                                        

                
?>
    
    

