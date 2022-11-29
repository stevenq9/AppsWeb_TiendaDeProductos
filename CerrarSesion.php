<?php
    session_start(); //Levanta el motor de sesiones y cookies
    //Destrucción de la sesión y redireccionamiento 
    session_destroy();
    header("Location: index.php");

    //Borrar cookies de idioma si no se activa la opcion recordarme
    if(!isset($_COOKIE["c_preferencias"])){
        setcookie("c_nombre", "");
        setcookie("c_clave", "");
        setcookie("c_preferencias", "");
        setcookie("c_idioma","");
    }

?>