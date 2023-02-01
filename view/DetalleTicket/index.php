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

                <section id="lbldetalle" class="activity-line">
                   <!--AQUI ESTABA EL ARTICLE que se muestra en mi vista detalle, lo borre porque lo estoy llamando en mi ticket.php-->
                </section><!--.activity-line-->

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