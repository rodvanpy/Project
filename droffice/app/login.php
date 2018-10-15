<?php
// Start the session
include("sesion.php");
require('conexion_1.php');
sleep(2);
$usu=$_POST['usuariolg'];
$pass=$_POST['passlg'];
$usuarios=$mysqli->query("Select s.id_rol,s.id_persona, r.nombre nombre_rol, p.nombre
                        From usuarios s, rol r, personas p Where S.usuario='".$usu."'
                      AND s.clave='".$pass."'
                      AND s.id_rol = r.id_rol
                      AND s.id_persona = p.id_persona");
if ($usuarios->num_rows==1):
  $datos= $usuarios->fetch_assoc();
    $_SESSION["id_persona"] = $datos['id_persona'];
    $_SESSION["id_rol"] = $datos['id_rol'];
    $_SESSION["rol"] = $datos['nombre_rol'];
    $_SESSION["usuario"] = $datos['nombre'];

    echo json_encode(array('error'=>false,'id_persona'=>$datos['id_persona'],'id_rol'=>$datos['id_rol'], 'nombreRol'=>$datos['nombre_rol'],'usuario'=>$datos['nombre'] ));
else:
    echo json_encode(array('error'=>true));
endif;
$mysqli->close();
 ?>
