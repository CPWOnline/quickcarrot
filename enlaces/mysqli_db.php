<?php
	$dat = 0;
	if($dat){
		/*Conexión a la base de datos de de la página*/
			$mysqli = new mysqli('142.44.139.35', 'cpwonlin_general', 'Juniorydamaglys2', 'cpwonlin_general');
			if($mysqli->connect_errno){
				echo "\n Fallo al conectar a la base de datos.\n";
				echo "\n".$mysqli->connect_errno."\n";
				exit; 
			}
	}else{
		/*Conexión a la base de datos local*/
			$mysqli = new mysqli('localhost', 'root', '26552160', 'cpwonline_qc_db');
			if($mysqli->connect_errno){
				echo "\n Fallo al conectar a la base de datos.\n";
				echo "\n".$mysqli->connect_errno."\n";
				exit;
			}
	}
	function palabraSegura($v) {
		$v = addslashes(trim($v));
		return $v;
	}
	function calcDimension($lug, $di){
		for($a = 0; $a < $di; $a++){
			$lug= "../".$lug;
		}
		return $lug;
	}
?>