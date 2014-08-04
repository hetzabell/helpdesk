<?php
$pintarfooterAdjuntos = TRUE;
foreach ($comentarios as $comentario) {
    ?>
    <div class="panel <?= $comentario->sTipoComentario ?>">
        <div class="panel-heading">
            Comentario de <strong><?= $comentario->sAutorComentario ?></strong> <i>el <?= $comentario->tFechaCaptura ?></i>
        </div>
        <div class="panel-body">
            <?= $comentario->sDescripcion ?>
        </div>
        <?php
        if ($archivos) {
            if ($pintarfooterAdjuntos) {
                ?>
        <div class="panel-footer"><strong>Archivos adjuntos:</strong></div>
                    <?php $pintarfooterAdjuntos = FALSE;
                } ?>        
            <ul class="list-group">
                <?php
                foreach ($archivos as $archivo) {
                    if ($archivo->idComentario == $comentario->idComentario) {
                        ?>
                        <li class="list-group-item"><a href="<?= base_url() . $archivo->RutaCompleta ?>" target="_blank"><?= $archivo->sNombreArchivo ?></a></li>
                            <?php
                        }
                    }
                    ?>
            </ul>
            <?php
        }
        ?>
    </div>
    <?php
}
?>