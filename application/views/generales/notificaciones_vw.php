<?php if ($Notificaciones) { ?>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="glyphicon <?= $Notificaciones->row()->sIconoNavBar; ?>"></span>
        <span class="badge"><?= $Notificaciones->num_rows(); ?></span>&nbsp;<b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
        <?php
        $Resultados = $Notificaciones->result();
        $i = 0;
        foreach ($Resultados as $Resultado) {
            $i++;
            ?>
            <li><a href="<?= base_url() ?>Panel-General/<?=$modo?>/<?= $Resultado->idIncidencia; ?>"><span class="glyphicon <?= $Resultado->sIconoNavBarDetalle; ?>"></span><i class="<?= $color ?>"> <?= $Resultado->sMensaje ?></i></a></li>
            <?php if ($i < $Notificaciones->num_rows()) { ?>
                <li class="divider"></li>
            <?php
            }
        }
        ?>
    </ul>
<?php } else { ?>
    <a href="#" class="dropdown-toggle disabled" style="pointer-events: none;cursor: default;" data-toggle="dropdown">
        <span class="glyphicon <?= $icon ?>" style="color:gray" ></span>
        <span class="badge"></span>
    </a>
<?php } ?>
