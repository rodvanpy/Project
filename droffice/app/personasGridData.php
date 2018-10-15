<?php
$conn = mysqli_connect("localhost", "root", "", "hospitaldb") or die("Connection Error: " . mysqli_error($conn));

$page = $_GET['page'];
$limit = $_GET['rows'];
$sidx = $_GET['sidx'];
$sord = $_GET['sord'];

if(!$sidx) $sidx =1;

$result = mysqli_query($conn, "SELECT COUNT(*) AS count FROM personas");
$row = mysqli_fetch_array($result);

$count = $row['count'];
if( $count > 0 && $limit > 0) {
    $total_pages = ceil($count/$limit);
} else {
    $total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit;
if($start <0) $start = 0;

$SQL = "SELECT p.*, s.*, r.nombre as rol FROM personas p, usuarios s, rol r where s.id_persona = p.id_persona and r.id_rol = s.id_rol  LIMIT $start , $limit";
$result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

$i=0;
while($row = mysqli_fetch_array($result)) {
	$responce->rows[$i]['id']=$row['id_persona'];
	$responce->rows[$i]['cell']=array($row['id_persona'],$row['nombre'],$row['documento'],$row['usuario'],$row['clave'],$row['rol'],$row['telefono'],$row['sexo'],$row['fecha_nac'],$row['email'],$row['pais']);
	$i++;
}
echo json_encode($responce);
?>
