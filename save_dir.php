<?php


 if(isset($_POST["btnCrear"])){

 	$carpeta = $_POST['nCarpeta'];

 	if(!empty($carpeta)) {

 		if(file_exists("/home/ucama962/public_html/doc/" . $carpeta)) {
 			echo "<script language='javascript'>
   			alert('La carpeta ya existe');
   			window.location.href = 'upload_info.html';
   			</script>";
 		}
 		else {
 			mkdir("/home/ucama962/public_html/doc/" . $carpeta, 0777);

 			echo "<script language='javascript'>
   			alert('La carpeta fue creada con exito');
   			window.location.href = 'upload_info.html';
   			</script>";
 			
 		}

 	}
 	else {
 		echo "<script language='javascript'>
   		alert('Debe ingresar un nombre');
   		window.location.href = 'upload_info.html';
   		</script>";
 	}
        
}
	
	