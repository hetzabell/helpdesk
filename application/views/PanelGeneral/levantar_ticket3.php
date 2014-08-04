<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?php if ($error) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><strong>ERROR!</strong></p>
                    <p>Su ticket no pudo ser registrado. Intentelo de nuevo.</p>
                </div>
            <?php } ?>
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label">¿Quién solicita?</label>
                    <select name="cbxSolicitante" id="cbxSolicitante" class="form-control" style="width: 60%;" required>
                        <option value="<?= $miId ?>">Yo</option>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <option value="<?= $usuario->idUsuario ?>"><?= $usuario->sNombreCompleto ?></option>
                        <?php } ?>
                    </select>
                </div>                    
                <div class="form-group">
                    <label class="control-label">Tipo de Servicio</label>
                    <blockquote>
                        <div class="radio">
                            <label>
                                <input type="radio" name="rbtTipoServicio" value="3" onchange="LlenaCbxAsuntos();">
                                Soporte Técnico
                            </label>
                        </div>
                        <footer><em>Problemas con hardware, internet, telefonía</em></footer>
                    </blockquote>
                    <blockquote>
                        <div class="radio">
                            <label>
                                <input type="radio" name="rbtTipoServicio" value="2" onchange="LlenaCbxAsuntos();">
                                Desarrollo y Base de Datos
                            </label>
                        </div>
                        <footer><em>Incidencias en registros, bloqueo de base de datos, forzar cierre de sesiones</em></footer>
                    </blockquote>
                </div>
                <div class="form-group">
                    <label for="cbxAsuntos" class="control-label">Asunto</label>
                    <select name="cbxAsuntos" id="cbxAsuntos" class="form-control" style="width: 60%;" onchange="MuestraTxbOtro();" required>
                        <option value="">Elije un tipo de servicio</option>
                    </select>
                </div>
                <div class="form-group" id="OtroServicio" style="display: none;">
                    <input type="text" class="form-control" id="txbOtroServicio" name="txbOtroServicio" placeholder="Otro servicio" style="width: 60%;">
                </div>    
                <div class="form-group">
                    <label for="txaDescripcionProblema" class="control-label">Descripción del problema</label>
                    <textarea name="txaDescripcionProblema" id="txaDescripcionProblema" class="form-control" rows="5" style="width: 60%;" required></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" id="numficheros" value="1"/>
                    <label class="control-label">
                        Adjuntar archivos
                        <a class="btn btn-default btn-xs" id="btnAgregarOtroAdjunto" title="Agrega un archivo más." onclick="addFileBox();"><span class="glyphicon glyphicon-plus"></span></a>
                    </label>
                    <div id="ficheros" style="max-height: 110px; width: 70%; overflow-y: auto">

                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="enviaTicket" data-loading-text="Enviando...">Enviar</button>
            </form>
        </div>
    </div>
</div>