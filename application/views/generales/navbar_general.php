<!--Barra de navegación-->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img style="height: 50px;" src="<?= base_url(); ?>images/logo_HIRCASA_white.png"/>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown visible-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-stats"></span> Menú General<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url(); ?>Panel-General">Resumen</a></li>
                        <li><a href="<?= base_url(); ?>Panel-General/Levantar-Ticket">Levantar Ticket</a></li>
                        <li class="divider"></li>
                        <li></li>
                    </ul>
                </li>

                <li id ="CerrarTicket" class="dropdown">
                </li>
                <li id ="AsignacionTicket" class="dropdown">
                </li>
                <li id ="NuevosComentarios" class="dropdown">
                </li>                
                <li id ="NuevoTicket" class="dropdown">
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?= $usuario ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url(); ?>Usuario/Mi-Perfil"><span class="glyphicon glyphicon-edit"></span> Mi Perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= base_url(); ?>acceso/logout"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
                    </ul>
                </li><!--
                <li><a href="Documentacion" class="disabled"><span class="glyphicon glyphicon-question-sign"></span> Ayuda</a></li>-->
            </ul>
        </div>
    </div>
</div>