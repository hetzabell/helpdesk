<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="sub-header">Ticket # <?= $IdTicket ?> <i><?= $asunto ?></i></h3>
            <?= $historial ?>
            <a href="#" data-toggle="modal" data-target="#mdlRespondeComentario" data-backdrop="static" class="btn btn-info">Responder</a>
        </div>
    </div>
</div>
<!-- Modal para agregar comentario -->
<div class="modal fade" id="mdlRespondeComentario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btn_closeRP">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Responder</h4>
            </div>
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php if ($status == 2) {?>
                    <div class="form-group">
                        <label class="control-label">Espero:</label>
                        <select name="cbxMotivoPausa" id="cbxMotivoPausa" class="form-control" required <?php if(!$motivos) echo 'disabled'; ?>>
                            <option value="">Elije una opción</option>
                            <?php 
                            foreach ($motivos as $motivo) {?>
                            <option value="<?= $motivo->idMotivoPausa?>"><?= $motivo->sDescripcion?></option>
                            <?php } ?>
                        </select>
                    </div>               
                    <?php } ?>
                    <div class="form-group">
                        <label for="txaDescripcionComentario" class="control-label">Descripción del problema</label>
                        <textarea name="txaDescripcionComentario" id="txaDescripcionComentario" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="numficheros" value="1"/>
                        <label class="control-label">
                            Adjuntos
                            <a class="btn btn-default" id="btnAgregarOtroAdjunto" title="Agrega un archivo más." onclick="addFileBox();"><span class="glyphicon glyphicon-plus"></span></a>
                        </label>
                        <div id="ficheros">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_cancelRP">Cancelar</button>
                    <input type="submit" class="btn btn-primary" data-loading-text="Cargando..." value="Registrar" id="submitRespondeComentario">
                </div>
            </form>
        </div>
    </div>
</div>