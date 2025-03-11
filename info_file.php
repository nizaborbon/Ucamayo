<?php

	$directorio = "/home/ucama962/public_html/doc";
	$ficheros = scandir($directorio);
 
        foreach ($ficheros as $key => $fichero) {
            if ($fichero != "." && $fichero != "..") {
 
                $rutaCompleta = $directorio . '/' . $fichero;
 
                if (!is_file($rutaCompleta)) {

                	if(isset($_GET['funcion']) && !empty($_GET['funcion'])) {

                		$funcion = $_GET['funcion'];

                		switch($funcion) {
                			case 'datafilters':
                			echo "<li data-filter='.filter-$fichero'>Estados financieros $fichero</li>";
                			break;
                			case 'datacontainer':
                			echo "<div class='col-lg-4 col-md-6 portfolio-item filter-$fichero'>
                					<div class='portfolio-wrap'>
                						<div class='portfolio-info'>
                							<h4>Estados financieros $fichero</h4>
                							<div class='portfolio-links'>"; 
                							 $archivos = scandir($rutaCompleta);

                							 	foreach ($archivos as $key => $archivo) {
                										if ($archivo != "." && $archivo != "..") {

                											$rutaArchivo = $rutaCompleta . "/" . $archivo;

                											if (is_file($rutaArchivo)) {
                												echo "<a href='doc/$fichero/$archivo' target='_blank'><i class='bx bx-link'></i> $archivo</a><br>";
                											}
                										}
                									}
                							echo "</div>
                						</div>
                					</div>
                				  </div>";
                			break;
                			/*case 'datafiles':

                			$archivos = scandir($rutaCompleta);

                			foreach ($archivos as $key => $archivo) {
                				if ($archivo != "." && $archivo != "..") {

                					$rutaArchivo = $rutaCompleta . "/" . $archivo;

                					if (is_file($rutaArchivo)) {
                						echo "<a href='$rutaArchivo' target='_blank'><i class='bx bx-link'></i> $archivo</a><br>";
                					}

                				}
                			}
                			break;*/
                					
                		}
                	}
                }
                	
            }
        }

?>
