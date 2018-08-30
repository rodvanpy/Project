<?php 
include_once('conexion.php');
$cn = mysql_connect($host, $user, $pwd) or die("Error de conexion!");
mysql_select_db($sys_dbname, $cn);

$documento = trim($_POST['documento']);
$pais = trim($_POST['pais']);	
$nombre = trim($_POST['nombre']);
$fecha_nac = trim($_POST['fecha_nac']);
$sexo = trim($_POST['sexo']);
$telefono = trim($_POST['telefono']);
$email = trim($_POST['email']);


mysql_query('BEGIN');  

$sql1 = "insert into personas (documento,pais,nombre,fecha_nac,sexo,telefono,email) values 
        ('".$documento."','".$pais."','".$nombre."','".$fecha_nac."', '".$sexo."', '".$telefono."', '".$email."')";
$resultado1 = mysql_query($sql1, $cn);



$datos = array();

if ($resultado1){
	mysql_query('COMMIT'); 
	$datos[] = array('respuesta' => '1');       
}else{
	mysql_query('rollback');
	$datos[] = array('respuesta' => '0');
}			


echo json_encode($datos);
mysql_close();
	
?>