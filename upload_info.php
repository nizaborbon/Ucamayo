<?php

$cid = ftp_connect("www.ucamayo.com.mx");

$resultado = ftp_login($cid, "ucama962","dxaos53714");

if ((!$cid) || (!$resultado)) {
		echo "Fallo en la conexión"; die;
	} 
/*else {
		echo "Conectado.";
	}*/

ftp_pasv ($cid, true) ;

//indico el directorio
//ftp_chdir($cid, "doc");

$local = $_FILES["archivo"]["name"];
$remoto = $_FILES["archivo"]["tmp_name"];
$tama = $_FILES["archivo"]["size"];

$carpeta = $_POST['carpetas'];

$ruta = "/home/ucama962/public_html/doc/" . $carpeta . "/"  . $local;

// Verifico si ya se subio el archivo temporal
if (is_uploaded_file($remoto)){
	// copio el archivo temporal, del directorio de temporales del servidor a la ruta 
		copy($remoto, $ruta);		
	}
// Sino se pudo subir el temporal
else {
		echo "<script language='javascript'>
   alert('Error al cargar el archivo, intente de nuevo.');
   window.location.href = 'index.html';
   </script>";
	}
	
echo "<script language='javascript'>
   alert('Archivo cargado con éxito.');
   window.location.href = 'upload_info.html';
   </script>";
//cerramos la conexión FTP
ftp_close($cid);

?>