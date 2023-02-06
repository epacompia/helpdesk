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
    <title>HELPDESK - Detalle Ticket</title>

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
								<h3>Detalle ticket - 1</h3>
								<!-- AQUI LE DOY UN ID A TODO LOS SPAN PARA QUE PUEDAN SER MANIPULABLE LA INFORMACION QUE MUESTRAN -->
                                <div  id="lblestado">Cerrado</div>
                                <span class="label label-pill label-primary" id="lblnomusuario" ></span>
                                <span class="label label-pill label-default" id="lblfechcrea"></span>
								
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Inicio</a></li>
									<li class="active">Detalle ticket</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

                <!-- AGREGANDO DATOS DEL TICKET ACTUAL  -->
				<div class="box-typical box-typical-padding">
						<div class="row">						
									<div class="col-lg-6">
										<fieldset class="form-group">
											<label class="form-label semibold" for="cat_nom">Categoria</label>
											<input type="text" id="cat_id" name="cat_nom" class="form-control" readonly> <!--AQUI LE DOY UN NOMBRE AL ID para realcionar con el archivo nuevoTicket.js desde este lo controlaremos-->

											</select>
										</fieldset>
									</div>
									<div class="col-lg-6">
										<fieldset class="form-group">
											<label class="form-label semibold" for="tick_titulo">Título</label>
											<input type="text" class="form-control" id="tick_titulo" name="tick_titulo" readonly>
										</fieldset>
									</div>
									<div class="col-lg-12">
										<fieldset class="form-group">
											<label class="form-label semibold" for="tick_descrip">Descripción</label>
											<input type="text" class="form-control" id="tick_descrip" name="tick_descrip" >
										</fieldset>
									</div>
									
							</div><!--.row-->
					</div>
                    <!-- FIN DE AGREGANDO DATOS DEL TICKET ACTUAL  -->


                <section id="lbldetalle" class="activity-line">
                   <!--AQUI ESTABA EL ARTICLE que se muestra en mi vista detalle, lo borre porque lo estoy llamando en mi ticket.php-->
                </section><!--.activity-line-->


                <!-- AGREGO LA FUNCIONALIDAD DE NUEVO TICKET -->
                <div class="box-typical box-typical-padding">
                    <p>Ingrese su duda o consulta</p>

					<div class="row">
							<div class="col-lg-12"> <!--ESTE SUMMERNOTE FUNCIONA YA QUE EN EL detalleticket,js coloque en la linea 17 el codigo para que funcione -->
								<fieldset class="form-group">
									<label class="form-label semibold" for="tickd_descrip">Descripción</label>
									<div class="summernote-theme-1">
										<textarea class="summernote" id="tickd_descrip" name="tickd_descrip"></textarea>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Enviar</button> <!--Le coloco un name y un value-->
                                <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-danger">Cerrar Ticket</button> <!--Le coloco un name y un value-->
							</div>

					</div><!--.row-->
				</div>


            </div><!--.container-fluid-->
        </div><!--.page-content-->
        <!-- FIN DEL CONTENIDO -->


        <?php
        require_once("../mainJs/js.php");
        ?>
        <script type="text/javascript" src="detalleTicket.js"></script> <!--LLAMO AL home.js de mi carpeta -->

    </body>

    </html>

<?php
} else {
    header("Location:" . "http://localhost:80/helpdesk/" . "index.php");  //CODIGO EN CASO SE CIERRE SESION PARA QUE NO ME DEJE ENTRAR
}
?>