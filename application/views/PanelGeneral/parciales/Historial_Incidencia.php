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
            foreach ($archivos as $archivo) {
                if ($archivo->idComentario == $comentario->idComentario) {
                    if ($pintarfooterAdjuntos) {
                        $pintarfooterAdjuntos = FALSE;
                        ?>
                        <div class="panel-footer"><strong>Archivos adjuntos:</strong></div><ul class="list-group"><li class="list-group-item">                        
                                <?php } ?>
                                <a class="text-info" href="<?= base_url() . $archivo->RutaCompleta ?>" target="_blank"><span class="glyphicon glyphicon-file"></span><?= $archivo->sNombreArchivo ?></a><br>
                                <?php
                            }
                        }
                        $pintarfooterAdjuntos = TRUE;
                    }
                    ?>
                    </div>
                    <?php
                }
                ?>