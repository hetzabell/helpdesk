<?php if ($Notificaciones) { ?>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="glyphicon <?=$Notificaciones->row()->sIconoNavBar;?>"></span>
        <span class="badge"> <?= $Notificaciones->num_rows(); ?> </span>
    </a>
    <ul class="dropdown-menu">
        <?php
        $Resultados = $Notificaciones->result();
        $i = 0;
        foreach ($Resultados as $Resultado) {
            $i++;
            ?>
            <li><a href="#"><span class="glyphicon <?=$Resultado->sIconoNavBarDetalle;?>"></span><i><?= $Resultado->sMensaje ?></i></a></li>
            <?php
            if ($i < $Notificaciones->num_rows()) {
                ?>
                <li class="divider"></li>
                <?php
            }
            ?>
            <?php
        }
        ?>
    </ul>
    <?php
} else {
    ?>
<!--    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="glyphicon glyphicon-envelope"></span>
        <span class="badge"> 0 </span>
    </a>-->
    <?php
}
?>



