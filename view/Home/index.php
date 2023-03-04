<?php
//CODIGO PARA VERIFICAR QUE EL USUARIO ESTE LOGUEADO SI NO QUE NO ACCEDA A ESTA PAGINA
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {

?>

	<!DOCTYPE html>
	<html>

	<?php
	require_once("../mainHead/head.php"); ?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>Dircocor - Inicio</title>

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
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-sm-4">
								<article class="statistic-box green">
									<div>
										<div class="number" id="lbltotal"></div>
										<div class="caption">
											<div>Total de tickets</div>
										</div>
									</div>
								</article>
							</div>

							<div class="col-sm-4">
								<article class="statistic-box yellow">
									<div>
										<div class="number" id="lbltotalabiertos"></div>
										<div class="caption">
											<div>Total de tickets Abiertos</div>
										</div>
									</div>
								</article>
							</div>

							<div class="col-sm-4">
								<article class="statistic-box red">
									<div>
										<div class="number" id="lbltotalcerrados"></div>
										<div class="caption">
											<div>Total de tickets Cerrados</div>
										</div>
									</div>
								</article>
							</div>
						</div>
					</div>

					
				</div>
					<!-- AQUI VA EL GRAFICO DE MI DASHBOARD -->
					<section class="card">
						<header class="card-header">
							Grafico estadistico
						</header>
						<div class="card-block">
							<!-- AQUI VA EL ID DE MI CHART QUE MOSTRARA EN ESTE ARCIVO PHP -->
							<div id="divgrafico" style="height: 250px;"></div>
						</div>
					</section>
			</div><!--.container-fluid-->
		</div><!--.page-content-->
		<!-- FIN DEL CONTENIDO -->


		<?php
		require_once("../mainJs/js.php");
		?>


		<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>


		<script type="text/javascript" src="home.js"></script> <!--LLAMO AL home.js de mi carpeta -->

	</body>

	</html>

<?php
} else {
	header("Location:" . "http://localhost:80/helpdesk/" . "index.php");  //CODIGO EN CASO SE CIERRE SESION PARA QUE NO ME DEJE ENTRAR
}
?>