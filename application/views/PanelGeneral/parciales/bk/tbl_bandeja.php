<div style="height: 100%; overflow-y: auto;">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Folio</th>
                    <th>Asunto</th>
                    <th>Solicitante</th>
                    <th>Fecha Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($tickets) {
                    foreach ($tickets as $ticket) {
                        ?>
                        <tr>
                            <td><?= $ticket->idIncidencia ?></td>
                            <td><?= $ticket->sAsunto ?></td>
                            <td><?= $ticket->sSolicitante ?></td>
                            <td><?= $ticket->tFechaCreacion ?></td>
                            <td>
                                <a type="button" class="btn btn-default popMsj" data-toggle="popover" data-html="true" data-original-title="Descripción" data-content='<?= $ticket->sDescripcion ?>' data-trigger="hover">
                                    <span class="glyphicon glyphicon-list"></span>
                                </a>
                                <button type="button" class="btn btn-default" title="Tomar Ticket" onclick="TomarTicket(<?= $ticket->idIncidencia ?>)"><span class="glyphicon glyphicon-download"></span></button>
                            </td>                
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5" class="text-center">No hay tickets sin atender</td>
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
</div>