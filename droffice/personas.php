<?php
$date_sum = date("Y-m-d\TH:i:s",time());
$treinta_dias = strtotime($date_sum."+ 30 days");
$treinta_dias = date("Y-m-d\TH:i:s",$treinta_dias);

include("../js/detectar_movil.php");
$ismobile = check_user_agent('mobile');
if($ismobile) {
	$ajustar = 'style="width:100%;"';
} else {
	$ajustar = 'style="width:40%;"';
}


?>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jqueryautocompletarui.js"></script>

<link rel="stylesheet" href="../css/jquery-ui-1.10.3.custom.min.css" />
<link rel="stylesheet" href="../css/bootstrapN.css"/>
<link rel="stylesheet" href="../css/formulario.css">




<!--------------------------------->
<!--FORMULARIO -------------------->
<!--------------------------------->


<table id="form_cobrarnza" align="center" <?php echo $ajustar;?>>
<tr>
<td>




<div id="form_compras" align="center" style="width:100%; text-align:left; ">


	<div class="contenedor_datos">

  <div style="float:left; width:40%; padding:1%; ">
   <em>CEDULA</em>
     <input class="caja_datos"  style="width:100%;" min="0" step="1"  autofocus oninput="validity.valid||(value='');" type="number" id="documento" placeholder="CEDULA"/>
  </div>


  <div style="float:left; width:60%; padding:1%">
   <em>PAIS</em>
    <select id="pais" required class="caja_datos" type="text" style="width:100%">
	        <option value="PARAGUAY">PARAGUAY</option>
            <option value="ARGENTINA">ARGENTINA</option>
            <option value="BRASIL">BRASIL</option>
            <option value="URUGUAY">URUGUAY</option>
    </select>
  </div>



  <div style="float:left; width:100%; padding:1%">
   <em>NOMBRE Y APELLIDO</em>
     <input class="caja_datos"  style="width:100%;text-transform:uppercase;" type="text" id="nombre" name="name" placeholder="NOMBRE Y APELLIDO" />
  </div>

	<div class="contenedor_datos">

  <div style="float:left; width:40%; padding:1%; ">
   <em>USUARIO</em>
     <input class="caja_datos"  style="width:100%;" min="0" step="1"  autofocus oninput="validity.valid||(value='');" type="number" id="usuario" placeholder="USUARIO"/>
  </div>


  <div style="float:left; width:60%; padding:1%">
   <em>ROL</em>
    <select id="pais" required class="caja_datos" type="text" style="width:100%">
	        <option value="PARAGUAY">PARAGUAY</option>
            <option value="ARGENTINA">ARGENTINA</option>
            <option value="BRASIL">BRASIL</option>
            <option value="URUGUAY">URUGUAY</option>
    </select>
  </div>


	<div style="float:left; width:50%; padding:1%;" >
	<em >FECHA DE NACIMIENTO</em>
	 <input class="caja_datos"  style="width:100%; text-transform:uppercase;" type="date"  id="fecha_nac"  name='bday' value="<?php echo date("Y-m-d",time()); ?>"  placeholder="FECHA DE NACIMIENTO"/>
	</div>


  <div style="float:left; width:50%; padding:1%">
   <em>SEXO</em>
    <select id="sexo" required class="caja_datos" type="text" style="width:100%">
	        <option value="MASCULINO">MASCULINO</option>
            <option value="FEMENINO">FEMENINO</option>
    </select>
  </div>




  <div style="float:left; width:100%; padding:1%">
   <em>TELEFONO WHATSAPP</em>
     <input class="caja_datos"  style="width:100%;" type="number"  id="telefono"  name='phone' placeholder="TELEFONO WHATSAPP"/>
  </div>


  <div style="float:left; width:100%; padding:1%">
   <em>EMAIL</em>
     <input class="caja_datos"  style="width:100%;" type="text"  id="email" name='email' placeholder="EMAIL"/>
  </div>



  <div id="pie" style="float:left; width:100%; padding:10px; text-align:center"><button id="guardar_persona" class="btn btn-large btn-primary" onClick="guardar_persona();" >GUARDAR</button>
	</div>


</div>




</td>
</tr>
</table>


<!--------------------------------->
<!--FORMULARIO -------------------->
<!--------------------------------->









<script>

//guardar----------------------------------------------------
function guardar_persona(){




		if($('#documento').val() == '' && $('#nombre').val() == ''){
			alert('DEBE INGRESAR DOCUMENTO Y NOMBRE');
			return false;
		}



			    $('#guardar_persona').hide();
				var respuesta = '';

				$.ajax({
					data:{
					    documento: $('#documento').val(),
						pais: $('#pais').val(),
						nombre: $('#nombre').val(),
						fecha_nac: $('#fecha_nac').val(),
						sexo: $('#sexo').val(),
						telefono: $('#telefono').val(),
						email: $('#email').val()

					},

					type: "POST",
					dataType: "json",
					url: "guardar_persona.php",

					success: function(data){

								if(data.length > 0){
										$.each(data, function(i,item){
										respuesta = item.respuesta;
								})


							   if(respuesta=='1'){


									   $("#documento").val('');
									   $("#pais").val('PARAGUAY');
								       $("#nombre").val('');
								       //$("#fecha_nac").val('');
									   $("#sexo").val('');
									   $("#telefono").val('');
									   $("#email").val('');

								       $('#guardar_persona').show();
								       $("#documento").focus();

								   	   alert('SE HA GUARDARDO');


								}else{

									   alert('ERROR AL GUARDAR. INTENTE DE NUEVO');
									   $('#guardar_persona').show();

								}

							}
					}
				})


};

//guardar----------------------------------------------------


</script>
