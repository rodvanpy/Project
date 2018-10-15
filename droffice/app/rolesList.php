<?php
$conn = mysqli_connect("localhost", "root", "", "hospitaldb") or die("Connection Error: " . mysqli_error($conn));

$SQL = "SELECT * FROM rol";
$result = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn));

$i=0;
while($row = mysqli_fetch_array($result)) {
	$responce->rows[$i]=array('id_rol'=>$row['id_rol'],'nombre'=>$row['nombre']);
	$i++;
}
echo json_encode($responce);
?>
