<?php /*coneccion a la base de datos */

$servidor="localhost";
$baseDeDatos="website";
$usuario="root";
$contraseña="";

try{/*cotejar la conección */  
                /*PDO Herramienta de conección a la bd */

    $conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contraseña);
    echo "Conexion realizada!!"; 

}catch(Exception $error){ /*Mostrar por si hubo algún error de conección */
    echo $error->getMessage();
}

?>