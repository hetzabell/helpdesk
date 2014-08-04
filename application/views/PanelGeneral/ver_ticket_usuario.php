<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="sub-header">Ticket # <?= $IdTicket ?> <i><?= $asunto ?></i></h3>
            <?= $historial ?>
            <?php if ($status < 4) { ?>
                <div class="panel panel-graymHir">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" href="#frmResponder"><span class="glyphicon glyphicon-envelope"></span> Responder</a>
                        </h3>
                    </div>
                    <div id="frmResponder" class="panel-collapse collapse out">
                        <div class="panel-body">
                            <form method="post" role="form" enctype="multipart/form-data" id="frmRespuestaUsuario">
                                <?php if ($tipoPausa == 3 && $status == 3) { ?>
                                    <div class="form-group">
                                        <label for="cbxRespuestaUsuario" class="control-label">¿Se soluciono la incidencia?</label>
                                        <select name="cbxRespuestaUsuario" id="cbxRespuestaUsuario" class="form-control" style="width: 60%;" required>
                                            <option value="">Elija una respuesta</option>
                                            <option value="1">Si, Cerrar ticket</option>
                                            <option value="0">La incidencia no ha sido solucionada</option>
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
                                <button type="submit" class="btn btn-blueHir" id="btnResponderUsuario">Responder</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="modal fade" id="usuarioCalifica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Encuesta</h4>
            </div>
            <form method="post" role="form" id="frmCalificaionUsuario">
                <div class="modal-body">    
                    <input type="hidden" value="<?= $IdTicket ?>" id="idIncidencia"/>
                    <div class="form-group">
                        <label for="iPuntaje">¿Cómo te atendimos?</label><br>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">Pésimo Servicio</th>
                                    <th class="text-center">Mal Servicio</th>
                                    <th class="text-center">Cumplió con la solución</th>
                                    <th class="text-center">Buen Servicio</th>
                                    <th class="text-center">Excelente Servicio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="iPuntaje" id="iPuntaje" value="1"></td>
                                    <td><input type="radio" name="iPuntaje" id="iPuntaje" value="2"></td>
                                    <td><input type="radio" name="iPuntaje" id="iPuntaje" value="3" checked></td>
                                    <td><input type="radio" name="iPuntaje" id="iPuntaje" value="4"></td>
                                    <td><input type="radio" name="iPuntaje" id="iPuntaje" value="5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <label for="sNombreCompleto">Comentario:</label>
                        <textarea name="txaComentarioEncuesta" id="txaComentarioEncuesta" class="form-control" rows="5"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="calificaServicio" class="btn btn-default" type="submit">Calificar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="msgboxGracias" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="mySmallModalLabel">HIR Casa IT</h4>
            </div>
            <div class="modal-body text-center">
                <p>¡Gracias por tu calificación! <span class="glyphicon glyphicon-ok-circle text-success"></span> </p>                
                <button type="button" class="btn btn-default btn-blueHir" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>