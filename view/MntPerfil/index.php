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
	<title>HELPDESK - Perfil</title>

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
								<h3>Perfil</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Inicio</a></li>
									<li class="active">Cambiar Contraseña</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="box-typical box-typical-padding">
					



					<div class="row">
													
							<div class="col-lg-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="exampleInput">Nueva Contraseña</label>
									<input type="password" class="form-control" id="txtpass" name="txtpass">
								</fieldset>
							</div>
							<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Confirmar Contraseña</label>
								<input type="password" class="form-control" id="txtpassnew" name="txtpassnew" >
							</fieldset>
							</div>
							
							

							<div class="col-lg-12">
								<button type="button" name="action"  id="btnactualizar" class="btn btn-rounded btn-inline btn-primary">Actualizar contraseña</button> <!--Le coloco un name y un value-->
							</div>
			
					</div><!--.row-->


				</div>
			</div><!--.container-fluid-->
		</div><!--.page-content-->
		<!-- FIN DEL CONTENIDO -->


		<?php
		require_once("../mainJs/js.php");
		?>
		<script type="text/javascript" src="mntperfil.js"></script> <!--LLAMO AL home.js de mi carpeta -->

	</body>

	</html>

<?php
} else {
	header("Location:" . "http://localhost:80/helpdesk/" . "index.php");  //CODIGO EN CASO SE CIERRE SESION PARA QUE NO ME DEJE ENTRAR
}
?>