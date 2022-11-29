<?php
    //Creación de la sesión con los parámtros enviados por el usuario
    session_start(); 
    if(isset($_POST["usuario"]) && isset($_POST["clave"])){
        $_SESSION["s_usuario"] = $_POST["usuario"];
        $_SESSION["s_clave"] = $_POST["clave"];
    }

    //Comprobación de la existencia de la sesión
    if(!isset($_SESSION["s_usuario"]) && !isset($_SESSION["s_clave"])){
        header("Location: index.php");
    }

    //******* Creación de cookies ******** 
    //Guardar datos en la cookies
    $nombre = $_SESSION["s_usuario"];
    $clave = $_SESSION["s_clave"];
    // Si luego de guardar los datos, se desactiva la opcion "Recuerdame" 
    
    $guardarPreferencias = (isset($_POST["chkrecordarme"])?$_POST["chkrecordarme"]:"");
    if($guardarPreferencias != ""){  //En caso de que quiera guardar sus datos
        setcookie("c_nombre", $_POST["usuario"], 0);
        setcookie("c_clave", $_POST["clave"], 0);
        setcookie("c_preferencias", $_POST["chkrecordarme"], 0);
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Panel Principal</title>
    </head>
    <body>
        <h1>PANEL PRINCIPAL</h1>
        <h3>Bienvenido Usuario: <?php echo $_SESSION["s_usuario"]; ?> </h3>
        <!-- Enlaces para cambio de idioma -->
        <a href="panelPrincipal.php?idioma=es" 
        > ES (Español)</a>
        <a href="panelPrincipal.php?idioma=en">| EN (English)</a><br>
        <!-- Enlace para cerrar sesion -->
        <a href="CerrarSesion.php">Cerrar Sesion</a>

        <!-- Lista de Productos -->
        <h2>Product List</h2><br>
        <?php 
              $idioma="";
              //Cambio de idioma
              if(isset($_GET)){
                if($_GET["idioma"]=="en"){
                    setcookie("c_idioma","en" , time()+(60*60*24));
                    $idioma="en";
                }else{
                    setcookie("c_idioma","es" , time()+(60*60*24));
                    $idioma="es";
                }
              }
              $fp = fopen("categorias_".$idioma.".txt" , "r");
              while (!feof($fp)){
                   $cadena = fgets($fp);
                   echo $cadena . "<br>";
              }
              fclose($fp);  
        ?>



    </body>
</html>