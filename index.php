<?php
    //Variables para llenado automatico en caso de almacenamiento de preferencias
    $preferencias = false;
    $nombre="";
    $clave="";
    $idioma="es";

    if(isset($_COOKIE["c_preferencias"]) && $_COOKIE["c_preferencias"]!=""){
        $preferencias = true;
        $nombre = (isset($_COOKIE["c_nombre"])?$_COOKIE["c_nombre"]:"");
        $clave = (isset($_COOKIE["c_clave"])?$_COOKIE["c_clave"]:"");
        if(isset($_COOKIE["c_idioma"])){
            if(($_COOKIE["c_idioma"] == "en")){
                $idioma = "en";
            }
        }
    }

    //Si luego de guardar sus datos, se desactiva la opcion Recordarme
    setcookie("c_preferencias","");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
    </head>
    <body>
        <!-- Formulario de ingreso de datos -->
        <form method="POST" action="panelPrincipal.php?idioma=<?php echo $idioma?>">  <!-- idioma por defecto Español -->
            <fieldset>
                <h1>LOGIN</h1><br>
                <label>Usuario: </label><br>
                <input type="text" name="usuario" value="<?php echo $nombre; ?>" ><br>
                <label>Clave:</label><br>
                <input type="password" name="clave" value="<?php echo $clave; ?>"><br>
                <input type="checkbox" name="chkrecordarme" <?php echo ($preferencias)?"checked":"";?>>Recordarme <br>
                <input type="submit" value="Enviar">
            </fieldset>
        </form>
    </body>
</html>