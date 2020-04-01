<?php
// Este archivo sirve para borrar todas las cookies que tenemos en el navegador con clogin y cpass y nos redirige a la página de login.
    setcookie("clogin",$_COOKIE["clogin"],time()-1,'/');
    setcookie("cpass",$_COOKIE["cpass"],time()-1,'/');
    header ("Location: ../index.php");
?>