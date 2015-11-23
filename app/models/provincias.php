<?php

/**
 * Devuelve un array con los datos de las provincias
 */
function GetProvincias()
{
	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();
	
	$sql = 'SELECT cod as cod, nombre as nom
					FROM `tbl_provincias`';
	
	/*Ejecutamos la query*/
	$bd->Consulta($sql);
	
	// Creamos el array donde se guardarán las provincias
	$Provincias = Array();
	
	/*Realizamos un bucle para ir obteniendo los resultados*/
	while ($reg = $bd->LeeRegistro())
	{
		$Provincias[$reg['cod']] = $reg['nom'];	 
	}
	return $Provincias;
}

function GetNombreProvincias($cod){


	/*Creamos la instancia del objeto. Ya estamos conectados*/
	$bd = Db::getInstance();
	
	/*Creamos una query sencilla*/
	$sql = 'SELECT nombre
                    FROM `tbl_provincias`
                            where cod='.$cod;
	
	/*Ejecutamos la query*/
	$bd->Consulta($sql);
	
	/*Obtenemos los resultados*/
	$line = $bd->LeeRegistro();
	
	return $line['nombre'];
}


/*
// OTRA FORMA que nos permitirá tener más de una consulta abierta

/*Ejecutamos la query*/
//$rs=$bd->Consulta($sql);

/*Realizamos un bucle para ir obteniendo los resultados*/
/*
while ($reg=$bd->LeeRegistro($rs))
{
	echo $reg['NOMBRE'].'<br />';
}
*/