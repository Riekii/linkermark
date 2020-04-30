<?php
$mysqli = new mysqli($ip,$user,$password,$db);

$consid = '
SELECT * 
FROM usuarios
WHERE nick = "'.$nick.'"';
$consid2 = $mysqli -> query($consid);

while($roww = $consid2->fetch_assoc()){
    $pfoto = $roww["foto"];
}

?>