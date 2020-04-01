<?php
// Este archivo divide cada palabra de los mensajes para analizarla. Si contiene un link lo marca como link.
if ( (strpos($emensaje[$i], 'http')) === 0 || (strpos($emensaje[$i], 'https')) === 0) {
    // Si hay un link de youtube
    if (strpos($emensaje[$i],'youtu.be/') > 0) {
        $link = substr($emensaje[$i], strpos($emensaje[$i],"https://youtu.be/")+17);
        $emensaje[$i] = '<br/><iframe style="background-color:black" width="100%" height="315" src="https://www.youtube.com/embed/'.$link.'"frameborder="0" autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br/>';
        echo $emensaje[$i];
    }
    elseif (strpos($emensaje[$i],'youtube.com/watch?v=') > 0) {
        $link = substr($emensaje[$i], strpos($emensaje[$i],"https://youtube.watch?v=")+32);
        // CAMBIAR
        $emensaje[$i] = '<br/><iframe style="background-color:black" width="100%" height="315" src="https://www.youtube.com/embed/'.$link.'"frameborder="0" autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br/>';
        echo $emensaje[$i];
    }
    else{
        $emensaje[$i] = '<a class="enlace" target="_blank" href="'.$emensaje[$i].'"><b>'.$emensaje[$i].'</b></a>';
        echo $emensaje[$i];
    }
}
else{
    echo $emensaje[$i].'&nbsp;';
}
?>