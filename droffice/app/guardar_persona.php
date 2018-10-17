<?php
$conn = mysqli_connect("localhost", "root", "", "hospitaldb") or die("Connection Error: " . mysqli_error($conn));

$documento = trim($_POST['documento']);
$pais = trim($_POST['pais']);
$usuario = trim($_POST['usuario']);
$clave = trim($_POST['clave']);
$nombre = trim($_POST['nombre']);
$fecha_nac = trim($_POST['fecha_nac']);
$sexo = trim($_POST['sexo']);
$telefono = trim($_POST['telefono']);
$email = trim($_POST['email']);
$rol = trim($_POST['rol']);
$oper = trim($_POST['oper']);
$id = trim($_POST['id']);

$SQL = "";
$datos = array();
if($oper == "edit"){
  $SQL = "UPDATE PERSONAS SET documento ='".$documento."', pais ='".$pais."',nombre ='".$nombre."',fecha_nac ='".$fecha_nac."', sexo ='".$sexo."', telefono ='".$telefono."', email ='".$email."' where id_persona ='".$id."'";

  $result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

  if ($result){
    $datos = json_encode(array('error'=>false,'mensaje'=>'El Usuario '.$usuario.' se modifico correctamente.'));
  }else{
  	mysqli_query($conn,'rollback');
    $datos = json_encode(array('error'=>true,'mensaje'=>'Error al tratar de modificar el usuario '.$usuario.'.'));
  }

}else{
  $SQL = "insert into personas (documento,pais,nombre,fecha_nac,sexo,telefono,email) values
          ('".$documento."','".$pais."','".$nombre."','".$fecha_nac."', '".$sexo."', '".$telefono."', '".$email."')";
  $result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));



  if ($result){
  	//mysqli_query($conn,'COMMIT');
    $last_id = mysqli_insert_id($conn);

    $SQL = "insert into usuarios (usuario,clave,id_rol,id_persona) values
            ('".$usuario."','".$clave."','".$rol."','".$last_id."')";

    $result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

  	$datos = json_encode(array('error'=>false,'mensaje'=>'El Usuario '.$usuario.' se inserto correctamente.'));
  }else{
  	mysqli_query($conn,'rollback');
  	$datos = json_encode(array('error'=>true,'mensaje'=>'Error al tratar de insertar el usuario '.$usuario.'.'));
  }
}




echo json_encode($datos);

mysqli_close($conn);
?>
