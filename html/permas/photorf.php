<?php
$mysqli = new mysqli($ip,$user,$password,$db);

$consid = '
SELECT * 
FROM usuarios
WHERE nick = "'.$login.'"';
$consid2 = $mysqli -> query($consid);

while($row = $consid2->fetch_assoc()){
    $pfoto = $row["foto"];
}

?>