<?php
	require_once('../mysqli_db.php');
	session_start();
	$id = $_POST['id'];
	$titulo = $_POST['titulo'];
	$tipo = $_POST['tipo'];
	$imagen = $_FILES['archivo'];
	switch($tipo){
		case 'articulo':
			$url =  '../../articulos/img/'.$_SESSION['o_usuario'];
			$nombre_imagen = $id."_".$imagen['name'];
			$nombre_completo = $url.'/'.$nombre_imagen;
			if(!is_dir($url))
				mkdir($url);
			//if(copy($imagen['tmp_name'], $url.'/'.$nombre_imagen)){
			if(copy($imagen['tmp_name'], $imagen['name'])){
				$con = $mysqli->query("UPDATE articulos SET a_imagen = '".$nombre_completo."' WHERE a_id='".$id."' ");
			}
		break;
	}
?>