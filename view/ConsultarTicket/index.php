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
	<title>HELPDESK - Consultar Ticket</title>

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
								<h3>Consultar ticket</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Inicio</a></li>
									<li class="active">Consultar ticket</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="box-typical box-typical-padding">
					<table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
						<thead>
							<tr>
								<th style="width: 5%;">Nro° Ticket</th>
								<th style="width: 15%;">Categoria</th>
								<th class="d-none d-sm-table-cell" style="width: 40%;">Titulo</th>
								<th class="d-none d-sm-table-cell" style="width: 5%;">Estado</th>
								<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha de Creación</th>  <!--AQUI AGREGO ESTE CAMPO PARA QUE SE MUESTRE EN MI LISTA DE TICEKTS-->
								<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha de Asignación</th> 
								<th class="d-none d-sm-table-cell" style="width: 10%;">Soporte asignado</th> 
								<th class="text-center" style="width: 15%;"></th>
								
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>

			</div><!--.container-fluid-->
		</div><!--.page-content-->
		<!-- FIN DEL CONTENIDO -->


		<?php


		//LLAMANDO A LA VENTANA MODAL PARA QUE SE PUEDA ASIGNAR UN USUARIO AL TICKET Y QUE LO ATIENDA
		require_once("modalasignar.php");
		require_once("../mainJs/js.php");
		?>
		<script type="text/javascript" src="consultarTicket.js"></script> <!--LLAMO AL home.js de mi carpeta -->

	</body>

	</html>

<?php
} else {
	header("Location:" . "http://localhost:80/helpdesk/" . "index.php");  //CODIGO EN CASO SE CIERRE SESION PARA QUE NO ME DEJE ENTRAR
}
?>