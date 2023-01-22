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
	<title>HELPDESK - Nuevo Ticket</title>

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
								<h3>Nuevo Ticket</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Inicio</a></li>
									<li class="active">Nuevo ticket</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="box-typical box-typical-padding">
					<p>
						Desde esta ventana podra generar nuevos tickets de helpdesk.
					</p>
					<h5 class="m-t-lg with-border">Ingresar información</h5>
					<form action="" method="POST" id="ticket_form">
						
						<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">
						<div class="row">
							<div class="col-lg-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="exampleInput">Categoria</label>
									<select  id="cat_id" name="cat_id" class="form-control"> <!--AQUI LE DOY UN NOMBRE AL ID para realcionar con el archivo nuevoTicket.js desde este lo controlaremos-->
										
									</select>
								</fieldset>
							</div>
							<div class="col-lg-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="tick_titulo">Título</label>
									<input type="text" class="form-control" id="tick_titulo" name="tick_titulo" placeholder="Ingrese el título">
								</fieldset>
							</div>
							<div class="col-lg-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="tick_descrip">Descripción</label>
									<div class="summernote-theme-1">
										<textarea class="summernote" id="tick_descrip" name="tick_descrip"></textarea>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<button type="submit" name="action"  value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button> <!--Le coloco un name y un value-->
							</div>
						</div><!--.row-->
					</form>
				</div>
			</div><!--.container-fluid-->
		</div><!--.page-content-->
		<!-- FIN DEL CONTENIDO -->


		<?php
		require_once("../mainJs/js.php");
		?>
		<script type="text/javascript" src="nuevoTicket.js"></script> <!--LLAMO AL home.js de mi carpeta -->

	</body>

	</html>

<?php
} else {
	header("Location:" . "http://localhost:80/helpdesk/" . "index.php");  //CODIGO EN CASO SE CIERRE SESION PARA QUE NO ME DEJE ENTRAR
}
?>