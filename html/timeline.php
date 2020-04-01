<?php
$mysqli = new mysqli($ip,$user,$password,$db);
// Esta es la linea temporal de los mensajes. Primero nos logearemos en el servidor mysql y luego buscaremos mensajes dependiendo de la página en la que nos encontremos.
$consid = "
SELECT * 
FROM mensajes 
WHERE id_m <(SELECT max(id_m)".$min."
            FROM mensajes)
        AND
      id_m >(SELECT max(id_m)".$max."
            FROM mensajes)
order by datetime DESC";
$consid2 = $mysqli -> query($consid);

while($rowm = $consid2->fetch_assoc()){
    $id_m=$rowm["id_m"];
    $nick=$rowm["nick"];
    $mensaje=$rowm["mensajes"];
    $date=$rowm["datetime"];
    $foto=$rowm["foto"];
    
    include "conus.php";
    
    echo '<table class="timeline"><tbody class="timeline">';
        echo '<tr class="timeline">';
            echo '
            <td class="timelinef">
                <a href="profile.php?user='.$nick.'">
                    <img width="40px" height="40px" class="fotot" alt="Foto"
                    src="profiles/'.strtolower($nick).'/photos/'.$pfoto.'">
                </a>
            </td>';
            echo '
                <td class="timelinen">
                    <b>
                        <a href="profile.php?user='.$nick.'">
                            '.$nombre.'
                        </a>
                    </b>
                </td>
            ';
            echo '<td class="timelined">'.$date.'</td>';
        
        if (isset($foto)){
            echo '</tr><tr class="timelinem"><td colspan="3" class="timelinemi"><p>'.$mensaje.'</p></td></tr>';
            echo '</tr><tr class="timelinei"><td colspan="3" class="timelinei">
            <a target="_blank" href="./mensajes/'.$id_m.'/'.$foto.'">
            <img class="timelinei" height="200px" src="./mensajes/'.$id_m.'/'.$foto.'"/>';
            echo '</a>';
            echo '</td></tr>';
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
}
    echo '</table></tbody></html>';

?>
