<?php
// Aqui declaramos la conexión con el usuario y la foto de este. Este archivo sirve para ver la foto del archivo user.php  y del archivo top.php
if (empty($nick)){
    $nick=$nickb;
}
else{
    
}
    $conus = 'SELECT * FROM usuarios WHERE nick like "'.$nick.'"';
    $conus2 = $mysqli -> query($conus);    

    while ($rowu = $conus2->fetch_assoc()){
        $nombre=$rowu["nombre"];
        $pfoto=$rowu["foto"];
    };
?>