<?php
$conn = mysqli_connect("localhost", "root", "", "hospitaldb") or die("Connection Error: " . mysqli_error($conn));

$SQL = "";
$cita = "";
$oper = "";
$page = "";
$limit = "";
$sidx = "";
$sord = "";
$datos = array();
if(isset($_POST['oper'])){
	$cita = trim($_POST['descripcion']);
	$oper = trim($_POST['oper']);
	$id = trim($_POST['id']);
	if($oper == "edit"){
	  $SQL = "UPDATE ESPECIALIDADES SET descripcion ='".$cita."' where id_especialidad ='".$id."'";

	  $result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

	  if ($result){
	    $datos = json_encode(array('error'=>false,'mensaje'=>'La Especialidad '.$cita.' se modifico correctamente.'));
	  }else{
	  	mysqli_query($conn,'rollback');
	    $datos = json_encode(array('error'=>true,'mensaje'=>'Error al tratar de modificar la especialidad '.$cita.'.'));
	  }

		echo json_encode($datos);

	}else{
	  $SQL = "insert into ESPECIALIDADES (descripcion) values
	          ('".$cita."')";
	  $result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

	  if ($result){
	  	$datos = json_encode(array('error'=>false,'mensaje'=>'La Especialidad '.$cita.' se inserto correctamente.'));
	  }else{
	  	mysqli_query($conn,'rollback');
	  	$datos = json_encode(array('error'=>true,'mensaje'=>'Error al tratar de insertar la especialidad '.$cita.'.'));
	  }
	}
}else{
	$page = $_GET['page'];
	$limit = $_GET['rows'];
	$sidx = $_GET['sidx'];
	$sord = $_GET['sord'];

	$SQL = "SELECT * FROM ESPECIALIDADES";
	$result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

	$i=0;
	while($row = mysqli_fetch_array($result)) {
		$responce->rows[$i]=array('id_especialidad'=>$row['id_especialidad'],'descripcion'=>$row['descripcion']);
		$i++;
	}
	echo json_encode($responce);
}
mysqli_close($conn);
?>
