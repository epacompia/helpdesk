<?php
//CODIGO PARA VERIFICAR QUE EL USUARIO ESTE LOGUEADO SI NO QUE NO ACCEDA A ESTA PAGINA
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {

?>

	<!DOCTYPE html>
	<html>

	<?php
	require_once("../mainHead/head.php");
	?>
	<title>HELPDESK - Mantenimiento Usuario</title>

	<body class="with-side-menu">

		<?php
		require_once("../mainHeader/header.php");
		?>

		<div class="mobile-menu-left-overlay"></div>
		<?php
		require_once("../mainNav/nav.php");
		?>


		<!-- INICIO DEL CONTENIDO -->
		<div class="page-content">
			<div class="container-fluid">
				<header class="section-header">
					<div class="tbl">
						<div class="tbl-row">
							<div class="tbl-cell">
								<h3>Mantenimiento Usuario</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Inicio</a></li>
									<li class="active">Mantenimiento Usuario</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="box-typical box-typical-padding">
				
				<button class="btn btn-inline btn-primary" data-toggle="modal" id="btnnuevo" data-target=".bd-example-modal-lg">Nuevo usuario</button>
					<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
						<thead>
							<tr>
								<th style="width: 10%;">Nombre(s)</th>
								<th class="d-none d-sm-table-cell" style="width: 10%;">Apellido(s)</th>
								<th class="d-none d-sm-table-cell" style="width: 30%;">Correo</th>
								<th class="d-none d-sm-table-cell" style="width: 5%;">Contraseña</th>  <!--AQUI AGREGO ESTE CAMPO PARA QUE SE MUESTRE EN MI LISTA DE TICEKTS-->
								<th class="d-none d-sm-table-cell" style="width: 5%;">Rol</th>
								<th class="text-center" style="width: 5%;"></th>
								<th class="text-center" style="width: 5%;"></th>
								
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>

			</div><!--.container-fluid-->
		</div><!--.page-content-->
		<!-- FIN DEL CONTENIDO -->



		<!--Requiriendo el modal para crear usuario-->
		<?php
		require_once("modalmantenimiento.php");
		?>


		<?php
		require_once("../mainJs/js.php");
		?>
		<script type="text/javascript" src="mntusuario.js"></script> <!--LLAMO AL home.js de mi carpeta -->

	</body>

	</html>

<?php
} else {
	header("Location:" . "http://localhost:80/helpdesk/" . "index.php");  //CODIGO EN CASO SE CIERRE SESION PARA QUE NO ME DEJE ENTRAR
}
?>