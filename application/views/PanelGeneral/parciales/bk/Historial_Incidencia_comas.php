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
            $comas = count($archivos);
            if ($pintarfooterAdjuntos) {
                ?>
                <div class="panel-footer"><strong>Archivos adjuntos:</strong></div>
                <?php $pintarfooterAdjuntos = FALSE;
            }
            ?>        
            <ul class="list-group">
                <li class="list-group-item">
                    <?php
                    foreach ($archivos as $archivo) {
                        if ($archivo->idComentario == $comentario->idComentario) {
                            ?>
                    <a href="<?= base_url() . $archivo->RutaCompleta ?>" target="_blank"><?= $archivo->sNombreArchivo ?></a>
                            <?php
                            if($comas > 1){
                                echo '<b> ,  </b>';
                                $comas--;
                            }
                        }
                    }
                    ?>
                </li>
            </ul>
            <?php
        }
        ?>
    </div>
    <?php
}
?>