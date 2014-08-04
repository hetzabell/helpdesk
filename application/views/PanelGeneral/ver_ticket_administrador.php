<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="sub-header">Ticket # <?= $IdTicket ?> <i><?= $asunto ?></i></h3>
            <?= $historial ?>
            <?php if ($status == 1) { ?>
                <button type="button" class="btn btn-default" title="Tomar Ticket" onclick="TomarTicket(<?= $IdTicket ?>, 1);"><span class="glyphicon glyphicon-wrench"></span> Atender Ticket</button>
                <a href="#" class="btn btn-primary" title="Asignar Ticket" data-toggle="modal" data-target="#asignar_ticket" data-backdrop="static"><span class="glyphicon glyphicon-hand-right"></span> Asignar Ticket</a>
            <?php } elseif ($status > 1 && $status < 4) { ?>
                <a href="#" class="btn btn-info" title="Asignar Ticket" data-toggle="modal" data-target="#asignar_ticket" data-backdrop="static"><span class="glyphicon glyphicon-transfer"></span> Re-Asignar Ticket</a>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Modal Asigna Ticket-->
<div class="modal fade" id="asignar_ticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btn_closeRP">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Asignar ticket</h4>
            </div>
            <form class="form-horizontal" method="post" action="" id="frmAsignaTicket" role="form">
                <input id="idIncidencia" type="hidden" value="<?= $IdTicket ?>">
                <input id="iStatus" type="hidden" value="<?= $status ?>">
                <div class="modal-body">    
                    <div class="form-group">
                        <label class="control-label">¿Quién atenderá el ticket?</label>
                        <select name="cbxIngenieros" id="cbxIngenieros" class="form-control" required <?php if (!$ingenieros) echo 'disabled';?>>
                            <option value=""><?php if (!$ingenieros) echo 'No hay ingenieros disponibles'; else echo 'Elije un ingeniero';?></option>
                            <?php foreach ($ingenieros as $inge) { ?>
                                <option value="<?= $inge->idUsuario ?>"><?= $inge->sNombreCompleto ?></option>
                            <?php } ?>
                        </select>
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_cancelRP">Cancelar</button>
                    <input type="submit" class="btn btn-primary" data-loading-text="Cargando..." value="Asignar" id="submitRegistra" <?php if (!$ingenieros) echo 'disabled';?>>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Gracias Asignacion-->
<div class="modal fade" id="msgboxGracias" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="mySmallModalLabel">HIR Casa IT</h4>
            </div>
            <div class="modal-body text-center">
                <p>¡Ticket asignado! <span class="glyphicon glyphicon-ok-circle text-success"></span> </p>                
                <button type="button" class="btn btn-default btn-blueHir" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Error Asignacion-->
<div class="modal fade" id="msgboxError" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="mySmallModalLabel">HIR Casa IT</h4>
            </div>
            <div class="modal-body text-center">
                <p>¡Error! Intentalo de nuevo. <span class="glyphicon glyphicon-remove-circle text-danger"></span> </p>                
                <button type="button" class="btn btn-default btn-blueHir" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>