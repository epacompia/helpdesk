<header class="site-header">
    <div class="container-fluid">

        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="img/logo-2.png" alt="">
            <img class="hidden-lg-up" src="img/logo-2-mob.png" alt="">
        </a>

        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    
                    
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../public/img/<?php  echo $_SESSION["rol_id"]?>.jpg" alt="">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="../MntPerfil/"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Configuración</a>
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Ayuda</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../Logout/logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesión</a>
                        </div>
                    </div>

                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                </div><!--.site-header-shown-->

                <div class="mobile-menu-right-overlay"></div>
                <input type="hidden" id="user_idx" value="<?php echo $_SESSION["usu_id"] ?>">  <!--aqui va el id del usuario logueado que usare para todo mi vista-->
                <input type="hidden" id="rol_idx" value="<?php echo $_SESSION["rol_id"] ?>">  <!--aqui va el rol_id del usuario logueado que usare para todo mi vista, este rol en esta ubicaicon me permitira acceder segun el rol que tenga en este momento y me dejara ver vistas segun mi rol-->
                <div class="dropdown dropdown-typical">
                    <a href="#" class="dropdown-toogle no-arr">
                        <span class="font-icon font-icon-user"></span>
                        <span class="lblcontactonomx"><?php echo $_SESSION["usu_nom"] ?> <?php echo $_SESSION["usu_ape"] ?></span>
                    </a>                          
                </div>                        
                   
            </div><!--site-header-content-in-->
        </div><!--.site-header-content-->
    </div><!--.container-fluid-->
</header><!--.site-header-->