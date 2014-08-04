<div class="panel-body">
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
                    switch ($idUsuario) {
                        case 2:
                            $enlace = 'Panel-General/Ver-Ticket-Administrador/';
                            break;
                        case 3:
                            $enlace = 'Panel-General/Ver-Ticket/';
                            break;
                        default:
                            break;
                    }
                    foreach ($tickets as $ticket) {
                        ?>
                        <tr>
                            <td><?= $ticket->idIncidencia ?></td>
                            <td><?= $ticket->sAsunto ?></td>
                            <td><?= $ticket->sSolicitante ?></td>
                            <td><?= $ticket->tFechaCreacion ?></td>
                            <td>
                                <a type="button" class="btn btn-default popMsj" data-toggle="popover" data-html="true" data-original-title="Descripción" data-content='<?= $ticket->sDescripcion ?>' data-trigger="hover" style="border: none;">
                                    <span class="glyphicon glyphicon-list"></span>
                                </a>
                                <a href="<?= base_url() . $enlace . $ticket->idIncidencia ?>" type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
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