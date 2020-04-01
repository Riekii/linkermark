<?php
// Este archivo crea unas cookies cuando se ejecutan. Si no hay cookies porque no ha pasado por el login o porque se ha pasado el timepo nos redigirá a la página de login.
if (isset($_COOKIE["clogin"]) && isset($_COOKIE["cpass"])){
    if (!empty($_COOKIE["clogin"]) && !empty($_COOKIE["cpass"])){
        $login = $_COOKIE["clogin"];
        $_COOKIE["cpass"] = MD5($_COOKIE["cpass"]);
        $pass = $_COOKIE["cpass"];
        setcookie("clogin",$_COOKIE["clogin"],time()+3600,'/');
        setcookie("cpass",$_COOKIE["cpass"],time()+3600,'/');
        }
    else{header("Location: index.php");}
    }
else{header("Location: index.php");}
?>