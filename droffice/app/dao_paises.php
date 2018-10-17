<?php
$conn = mysqli_connect("localhost", "root", "", "hospitaldb") or die("Connection Error: " . mysqli_error($conn));

$SQL = "";
$pais = "";
$oper = "";
$page = "";
$limit = "";
$sidx = "";
$sord = "";
$datos = array();
if(isset($_POST['oper'])){
	$pais = trim($_POST['descripcion']);
	$oper = trim($_POST['oper']);
	$id = trim($_POST['id']);
	if($oper == "edit"){
	  $SQL = "UPDATE PAISES SET descripcion ='".$pais."' where id_pais ='".$id."'";

	  $result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

	  if ($result){
	    $datos = json_encode(array('error'=>false,'mensaje'=>'El Pais '.$pais.' se modifico correctamente.'));
	  }else{
	  	mysqli_query($conn,'rollback');
	    $datos = json_encode(array('error'=>true,'mensaje'=>'Error al tratar de modificar el pais '.$pais.'.'));
	  }

		echo json_encode($datos);

	}else{
	  $SQL = "insert into PAISES (descripcion) values
	          ('".$pais."')";
	  $result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

	  if ($result){
	  	$datos = json_encode(array('error'=>false,'mensaje'=>'El Pais '.$pais.' se inserto correctamente.'));
	  }else{
	  	mysqli_query($conn,'rollback');
	  	$datos = json_encode(array('error'=>true,'mensaje'=>'Error al tratar de insertar el pais '.$pais.'.'));
	  }
	}
}else{
	$page = $_GET['page'];
	$limit = $_GET['rows'];
	$sidx = $_GET['sidx'];
	$sord = $_GET['sord'];

	$SQL = "SELECT * FROM paises";
	$result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

	$i=0;
	while($row = mysqli_fetch_array($result)) {
		$responce->rows[$i]=array('id_pais'=>$row['id_pais'],'descripcion'=>$row['descripcion']);
		$i++;
	}
	echo json_encode($responce);
}
mysqli_close($conn);
?>
