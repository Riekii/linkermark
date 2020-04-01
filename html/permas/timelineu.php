<?php
    echo '<table class="timeline"><tbody class="timeline">';
                            echo '<tr class="timeline">';
                                echo '<td class="timelinef">
                                        <img width="40px" height="40px" class="fotot" alt="Foto"
                                        src="profiles/'.$nick.'/photos/'.$pfoto.'">
                                    </td>';
                                echo '<td class="timelinen"><b>'.$nombre.'</b></td>';
                                echo '<td class="timelined">'.$date.'</td>';
                            if (isset($foto)){
                                echo '</tr><tr class="timelinem"><td colspan="3" class="timelinemi"><p>'.$mensaje.'</p></td></tr>';
                                echo '</tr><tr class="timelinei"><td colspan="3" class="timelinei">
                                <a target="_blank" href="./mensajes/'.$id_m.'/'.$foto.'">
                                <img class="timelinei" height="200px" src="./mensajes/'.$id_m.'/'.$foto.'"/>
                                </a>';
                                
                                '</td></tr>';
                            }
                            else{
                            // Esto hará que todos los mensajes se dividan en pequeñas palabras
                            $mensaje = preg_replace("/[\r\n|\n|\r]+/", " ", $mensaje);
                            $emensaje = explode  (' ',$mensaje,10);
                            $cmensaje = count ($emensaje);

                            echo '</tr><tr class="timelinem"><td colspan="3" class="timelinem"><p>';
                            for ($i=0;$i<$cmensaje;$i++){
                                   include "link.php";
                            } 
                            echo'</p></td></tr>';
                        }
                        
?>