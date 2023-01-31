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

                <section class="activity-line">
                    <article class="activity-line-item box-typical">
                        <div class="activity-line-date">
                            Tuesday<br />
                            sep 9
                        </div>
                        <header class="activity-line-item-header">
                            <div class="activity-line-item-user">
                                <div class="activity-line-item-user-photo">
                                    <a href="#">
                                        <img src="img/photo-64-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="activity-line-item-user-name">Tim Colins</div>
                                <div class="activity-line-item-user-status">Developer, Palo Alto</div>
                            </div>
                        </header>
                        <div class="activity-line-action-list">
                            <section class="activity-line-action">
                                <div class="time">10:40 AM</div>
                                <div class="cont">
                                    <div class="cont-in">
                                        <p>Uploaded 3 Images to Daily UI Album</p>
                                        <ul class="previews">
                                            <li>
                                                <a class="fancybox" rel="gall-1" href="img/pic.jpg"> <img src="http://placehold.it/120x80" alt="" />
                                                </a>
                                            </li>
                                            <li>
                                                <a class="fancybox" rel="gall-1" href="img/pic.jpg"> <img src="http://placehold.it/120x80" alt="" />
                                                </a>
                                            </li>
                                            <li>
                                                <a class="fancybox" rel="gall-1" href="img/pic.jpg"> <img src="http://placehold.it/120x80" alt="" />
                                                </a>
                                            </li>
                                            <li>
                                                <a class="fancybox" rel="gall-1" href="img/pic.jpg"> <img src="http://placehold.it/120x80" alt="" />
                                                </a>
                                            </li>
                                            <li>
                                                <a class="fancybox" rel="gall-1" href="img/pic.jpg"> <img src="http://placehold.it/120x80" alt="" />
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="meta">
                                            <li><a href="#">5 Comments</a></li>
                                            <li><a href="#">5 Likes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </section><!--.activity-line-action-->
                            <section class="activity-line-action">
                                <div class="time">10:40 AM</div>
                                <div class="cont">
                                    <div class="cont-in">
                                        <p>Left a comment to <a href="#">Olga Gozha’s</a> Image</p>
                                        <div class="tbl img-comment">
                                            <div class="tbl-row">
                                                <div class="tbl-cell tbl-cell-img">
                                                    <img src="http://placehold.it/120x80" alt="" />
                                                </div>
                                                <div class="tbl-cell tbl-cell-txt">
                                                    «Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller»
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="meta">
                                            <li><a href="#">5 Comments</a></li>
                                            <li><a href="#">5 Likes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </section><!--.activity-line-action-->
                            <section class="activity-line-action">
                                <div class="time">10:40 AM</div>
                                <div class="cont">
                                    <div class="cont-in">
                                        <p>Uploaded 3 files</p>
                                        <ul class="attach-list">
                                            <li>
                                                <i class="font-icon font-icon-page"></i>
                                                <a href="#">example.avi</a>
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-page"></i>
                                                <a href="#">activity.psd</a>
                                            </li>
                                            <li>
                                                <i class="font-icon font-icon-page"></i>
                                                <a href="#">example.psd</a>
                                            </li>
                                        </ul>
                                        <ul class="meta">
                                            <li><a href="#">5 Comments</a></li>
                                            <li><a href="#">5 Likes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </section><!--.activity-line-action-->
                        </div><!--.activity-line-action-list-->
                    </article><!--.activity-line-item-->

                    <article class="activity-line-item box-typical">
                        <div class="activity-line-date">
                            Monday<br />
                            sep 8
                        </div>
                        <header class="activity-line-item-header">
                            <div class="activity-line-item-user">
                                <div class="activity-line-item-user-photo">
                                    <a href="#">
                                        <img src="img/photo-64-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="activity-line-item-user-name">Tim Colins</div>
                                <div class="activity-line-item-user-status">Developer, Palo Alto</div>
                            </div>
                        </header>
                        <div class="activity-line-action-list">
                            <section class="activity-line-action">
                                <div class="time">10:40 AM</div>
                                <div class="cont">
                                    <div class="cont-in">
                                        <p>Started nes UI migration</p>
                                        <ul class="meta">
                                            <li><a href="#">5 Comments</a></li>
                                            <li><a href="#">5 Likes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </section><!--.activity-line-action-->
                            <section class="activity-line-action">
                                <div class="dot"></div>
                                <div class="time">10:40 AM</div>
                                <div class="cont">
                                    <div class="cont-in">
                                        <p>Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller, Mark Taylor</p>
                                        <ul class="meta">
                                            <li><a href="#">5 Comments</a></li>
                                            <li><a href="#">5 Likes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </section><!--.activity-line-action-->
                            <section class="activity-line-action">
                                <div class="time">10:40 AM</div>
                                <div class="cont">
                                    <div class="cont-in">
                                        <p>Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller, Mark Taylor</p>
                                        <ul class="meta">
                                            <li><a href="#">5 Comments</a></li>
                                            <li><a href="#">1 Likes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </section><!--.activity-line-action-->
                        </div><!--.activity-line-action-list-->
                    </article><!--.activity-line-item-->

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