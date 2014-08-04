<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="sub-header">Ticket # <?= $IdTicket ?> <i><?= $asunto ?></i></h3>
            <?= $historial ?>
            <?php if ($status < 4 && $status > 1) { ?>
                <div class="panel panel-graymHir">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" href="#frmResponder"><span class="glyphicon glyphicon-envelope"></span> Responder</a>
                        </h3>
                    </div>
                    <div id="frmResponder" class="panel-collapse collapse out">
                        <div class="panel-body">
                            <form method="post" role="form" enctype="multipart/form-data">
                                <?php if ($status == 2) { ?>
                                    <div class="form-group">
                                        <label class="control-label">Espero:</label>
                                        <select name="cbxMotivoPausa" id="cbxMotivoPausa" class="form-control" required <?php if (!$motivos) echo 'disabled'; ?>>
                                            <option value="">Elije una opción</option>
                                            <?php foreach ($motivos as $motivo) { ?>
                                                <option value="<?= $motivo->idMotivoPausa ?>"><?= $motivo->sDescripcion ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>               
                                <?php } ?>
                                <div class="form-group">
                                    <label for="txaDescripcionComentario" class="control-label">Comentario:</label>
                                    <textarea name="txaDescripcionComentario" id="txaDescripcionComentario" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="numficheros" value="1"/>
                                    <label class="control-label">
                                        Adjuntos
                                        <a class="btn btn-default" id="btnAgregarOtroAdjunto" title="Agrega un archivo más." onclick="addFileBox('60%');"><span class="glyphicon glyphicon-plus"></span></a>
                                    </label>
                                    <div id="ficheros">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-blueHir">Responder</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } elseif ($status == 1) {
                ?>
                <button type="button" class="btn btn-default" title="Tomar Ticket" onclick="TomarTicket(<?= $IdTicket ?>,1);"><span class="glyphicon glyphicon-wrench"></span> Atender Ticket</button>   
                    <?php
                }
                ?>
        </div>
    </div>
</div>