<!DOCTYPE html>
<?php include("sesion.php");?>
<html ng-app="ionicApp" lang="en">
<head>

	<title>DR OFFICE</title>

	<meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
	<meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#387ef5">
        <meta name="MobileOptimized" content="width" />
	<meta name="HandheldFriendly" content="true" />
	<link rel="manifest" href="../manifest.json">
	<link rel="icon" type="../image/png" href="../images/logo_192x192.png" />
        <link rel="shortcut icon" sizes="192x192"  href="../images/logo_192x192.png">


	<script src="../js/fullscreen.js"></script>
	<script src="../js/ionic.bundle.js"></script>

	<link rel="stylesheet" href="../css/tabSlideBox.css">
	<link rel="stylesheet" href="../css/ionic.css">
	<link rel="stylesheet" href="../css/style.css">

  </head>


  <body style="background-color:#1795FF">

	  <!--<input type="button" onClick="document.documentElement.webkitRequestFullscreen();" value="FULLSCREEN">-->


    <ion-nav-view>DR OFFICE </ion-nav-view>


    <script id="templates/event-menu.html" type="text/ng-template">
      <ion-side-menus enable-menu-with-back-views="false">

        <ion-side-menu-content>
          <ion-nav-bar class="bar-positive">
            <ion-nav-back-button>
            </ion-nav-back-button>

            <ion-nav-buttons side="left">
              <button class="button button-icon button-clear ion-navicon" menu-toggle="left">
              </button>
            </ion-nav-buttons>
          </ion-nav-bar>

          <ion-nav-view name="menuContent"></ion-nav-view>
        </ion-side-menu-content>

        <ion-side-menu side="left">
          <ion-header-bar class="bar-assertive">
            <h1 class="title">DR OFFICE</h1>
          </ion-header-bar>
          <ion-content>
            <ul class="list">
              <!-- Note each link has the 'menu-close' attribute so the menu auto closes when clicking on one of these links -->

							<?php
                if($_SESSION["id_rol"]=='1') {
	            ?>
							<a href="#/event/roles" class="item" menu-close>ROLES</a>
						  <a href="#/event/usuarios" class="item" menu-close>Usuarios</a>
							<a href="#/event/paises" class="item" menu-close>Paises</a>
							<a href="#/event/tipos-citas" class="item" menu-close>Tipos Citas</a>
							<a href="#/event/estados-citas" class="item" menu-close>Estados Citas</a>
							<a href="#/event/especialidades" class="item" menu-close>Especialidades</a>
							<a href="#/event/metodos-pago" class="item" menu-close>Metodos Pago</a>
							<?php
	                }
	            ?>
							<?php
                if($_SESSION["id_rol"]=='3') {
	            ?>
								<a href="#/event/inicio" class="item" menu-close>INCIO</a>
								<a href="#/event/hospitales" class="item" menu-close>HOSPITALES</a>
								<a href="#/event/medicos" class="item" menu-close>MEDICOS</a>
		  					<a href="#/event/pacientes" class="item" menu-close>PACIENTES</a>
            		<a href="#/event/attendees" class="item" menu-close>CITAS</a>
		  					<a href="#/event/attendees" class="item" menu-close>PAGOS</a>
							<?php
	                }
	            ?>


            </ul>
          </ion-content>
        </ion-side-menu>

      </ion-side-menus>
    </script>

    <script id="templates/inicio.html" type="text/ng-template">
      <ion-view view-title="DR OFFICE">
        <ion-content class="padding">

			<iframe src="http://www.cloudsyspy.tk/ionic/tabbedSlideBox/slidingContent.html#/" style="width: 100%; height:90vh">


        </ion-content>
      </ion-view>
    </script>

    <script id="templates/personas.html" type="text/ng-template" >

      <ion-view view-title="NUEVA PERSONA">
        <ion-content class="padding">



			<iframe src="../app/personas.php" style="width: 100%; height:90vh">

        </ion-content>
      </ion-view>
    </script>

		<script id="templates/roles.html" type="text/ng-template" >

      <ion-view view-title="ROLES">
        <ion-content class="padding">



			<iframe src="../app/roles.php" class="content-wrapper" style="width: 100%; height:90vh">

        </ion-content>
      </ion-view>
    </script>

		<script id="templates/paises.html" type="text/ng-template" >

      <ion-view view-title="ROLES">
        <ion-content class="padding">



			<iframe src="../app/paises.php" class="content-wrapper" style="width: 100%; height:90vh">

        </ion-content>
      </ion-view>
    </script>

		<script id="templates/tiposCitas.html" type="text/ng-template" >

      <ion-view view-title="ROLES">
        <ion-content class="padding">



			<iframe src="../app/tiposCitas.php" class="content-wrapper" style="width: 100%; height:90vh">

        </ion-content>
      </ion-view>
    </script>

		<script id="templates/estadosCitas.html" type="text/ng-template" >

      <ion-view view-title="ROLES">
        <ion-content class="padding">



			<iframe src="../app/estadosCitas.php" class="content-wrapper" style="width: 100%; height:90vh">

        </ion-content>
      </ion-view>
    </script>

		<script id="templates/especialidades.html" type="text/ng-template" >

      <ion-view view-title="ROLES">
        <ion-content class="padding">



			<iframe src="../app/especialidades.php" class="content-wrapper" style="width: 100%; height:90vh">

        </ion-content>
      </ion-view>
    </script>



  </body>
</html>


<script  src="../js/index.js"></script>
