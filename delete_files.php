<?php

	if(isset($_GET['funcion']) && !empty($_GET['funcion'])) {

		$funcion = $_GET['funcion'];
		$carpeta = $_GET['carpeta'];
		$archivo = $_GET['archivo'];
		$Cdirectorio = "/home/ucama962/public_html/doc/" . $carpeta;
		$Adirectorio = $Cdirectorio . "/" . $archivo;

		switch($funcion) {
			case 'carpetas':


			if(is_dir($Cdirectorio)) {
				
				$ficheros = scandir($Cdirectorio);

				if(count($ficheros) == 2)
				{
					rmdir($Cdirectorio);
					echo "La carpeta se ha eliminado con éxito.";
					
				}
				else {
					echo "La carpeta contiene archivos. Deben eliminarse primero.";
				}

				
			}
			break;
			case 'archivos':

				if(unlink($Adirectorio))
				{
					echo "Se ha eliminado el archivo con éxito";
				}
				else
				{
					echo "Ha ocurrido un error";
				}
			break;
			
			


		}
	}

?>