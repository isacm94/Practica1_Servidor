<?php
/**
 * CONTROLADOR del instalador
 */
if(! $_POST)
    include_once VIEW_PATH."setup.php";
else{
    //Creamos fichero de configuración
    $fichero = fopen('config.php', 'w');

    if(! $fichero)
    {
       echo '<h1>No se puede abrir el fichero.</h1>';
    }

    $cadena ="<?php \n";
    $cadena.= '$db_conf'."= array(
            'servidor'=>'".$_POST['servidor']."',
            'usuario'=>'".$_POST['usuario']."',
            'password'=>'".$_POST['password']."',
            'base_datos'=>'".$_POST['base_datos']."');";


    fwrite($fichero, $cadena, strlen($cadena));

    fclose($fichero);    
    
    //Ejecutamos fichero de la base datos
    include_once 'config.php';
    
    $mysqli = new mysqli($db_conf['servidor'], $db_conf['usuario'], $db_conf['password'], $db_conf['base_datos']);
    
    $mysqli->set_charset("utf8");
    
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL" ;//. $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    else{    
        $sql = file_get_contents('../install/bd.sql');        
          
        if ($mysqli->multi_query($sql)) {
            
            do {
                
                if ($resultado = $mysqli->store_result()) {
                    var_dump($resultado->fetch_all(MYSQLI_ASSOC));
                    $resultado->free();
                }
            } while ($mysqli->more_results() && $mysqli->next_result());        
        } else {
            echo "Falló la multiconsulta: (" . $mysqli->errno . ") " . $mysqli->error;
        
        }
        $mysqli->close();
    }
    
    header("Location: index.php?ctrl=principal");
}