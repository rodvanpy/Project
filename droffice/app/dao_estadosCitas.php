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
	  $SQL = "UPDATE ESTADO_CITAS SET descripcion ='".$cita."' where id_estado_cita ='".$id."'";

	  $result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

	  if ($result){
	    $datos = json_encode(array('error'=>false,'mensaje'=>'El Estado de Cita '.$cita.' se modifico correctamente.'));
	  }else{
	  	mysqli_query($conn,'rollback');
	    $datos = json_encode(array('error'=>true,'mensaje'=>'Error al tratar de modificar el Estado de Cita '.$cita.'.'));
	  }

		echo json_encode($datos);

	}else{
	  $SQL = "insert into ESTADO_CITAS (descripcion) values
	          ('".$cita."')";
	  $result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

	  if ($result){
	  	$datos = json_encode(array('error'=>false,'mensaje'=>'El Estado de Cita '.$cita.' se inserto correctamente.'));
	  }else{
	  	mysqli_query($conn,'rollback');
	  	$datos = json_encode(array('error'=>true,'mensaje'=>'Error al tratar de insertar el Estado de Cita '.$cita.'.'));
	  }
	}
}else{
	$page = $_GET['page'];
	$limit = $_GET['rows'];
	$sidx = $_GET['sidx'];
	$sord = $_GET['sord'];

	$SQL = "SELECT * FROM ESTADO_CITAS";
	$result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

	$i=0;
	while($row = mysqli_fetch_array($result)) {
		$responce->rows[$i]=array('id_estado_cita'=>$row['id_estado_cita'],'descripcion'=>$row['descripcion']);
		$i++;
	}
	echo json_encode($responce);
}
mysqli_close($conn);
?>
