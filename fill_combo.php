<?php

if(isset($_GET['funcion']) && !empty($_GET['funcion'])) {

    $funcion = $_GET['funcion'];

    switch($funcion) {
        case 'carpetas':
        $directorio = "/home/ucama962/public_html/doc";
        $ficheros = scandir($directorio);
 
        foreach ($ficheros as $key => $fichero) {
            if ($fichero != "." && $fichero != "..") {
 
                $rutaCompleta = $directorio . '/' . $fichero;
 
                if (!is_file($rutaCompleta)) {
                    echo "<option value='$fichero'>$fichero</option>";
                }
            }
        }
        break;
        case 'archivos':
        $id = $_GET['id'];

        $directorio = "/home/ucama962/public_html/doc/" . $id;
        $ficheros = scandir($directorio);

        foreach ($ficheros as $key => $fichero) {
            if ($fichero != "." && $fichero != "..") {
 
                $rutaCompleta = $directorio . '/' . $fichero;
 
                if (is_file($rutaCompleta)) {
                    echo "<option value='$fichero'>$fichero</option>";
                }
            }
        }

    }
}












?>