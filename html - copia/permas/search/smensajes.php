<?php
echo '
    <table class="smensajes">
        <tr>
            <th class="stimeline">Pos</th>
            <th class="stimeline">Foto</th>
            <th class="stimeline">Nombre de usuario</th>
            <th class="stimeline">Nº de mensajes</th>
        </tr>
    ';

// Realizamos la conexión con la base de datos
$mysqli = new mysqli($ip,$user,$password,$db);
// Preparamos la consulta que queremos incluir
$conmen = "SELECT * FROM usuarios ORDER BY cast(usuarios.mensajes as SIGNED) DESC LIMIT 15";
$conmen2 = $mysqli -> query($conmen);
$i = 0;
while($rowm = $conmen2->fetch_assoc()){
    $nickb=$rowm["nick"];
    $nombreu=$rowm["nombre"];
    $correo=$rowm["correo"];
    $mensajes=$rowm["mensajes"];
    $color=$rowm["color"];
    $descripcion=$rowm["descripcion"];
    $pfoto = $rowm["foto"];
    
    $i++;
    
    if ($color == "black"){
        $letra = ' color: white';
    }
    else{
        $letra = ' ';
    }
    
    if ($i == 1){
        $border = "border-top-style: solid;";
    }
    else{
        $border = ' ';
    }
    
    echo '
        <tr class="stimeline">
        <td style="background-color:'.$color.'; '.$letra.'; '.$border.'" class="stimelinep"><b>'.$i.'</b></td>
            <td style="'.$border.'" class="stimelinef">
                <a href="profile.php?user='.$nickb.'">
                    <img width="40px" height="40px" class="fotot" alt="Foto"
                    src="profiles/'.strtolower($nickb).'/photos/'.$pfoto.'">
                </a>
            </td>
            <td class="stimelinen" style="background-color:'.$color.'; '.$letra.'; '.$border.'">
                <a style="'.$letra.'" href="profile.php?user='.$nickb.'">
                    <b>'.$nombreu.'</b>
                </a>
            </td>
            <td style="background-color:'.$color.'; '.$letra.'; '.$border.'" class="stimelinem">
                '.$mensajes.'
            </td>
        </tr>';
}
echo     
    '</table>
    ';
?>