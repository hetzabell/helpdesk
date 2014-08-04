<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Asunto</th>
                <th>Fecha Atención</th>
                <th>Fecha Cierre</th>
                <th>Atendió</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($tickets) {
                foreach ($tickets as $ticket) {
                    ?>
                    <tr>
                        <td><?= $ticket->idIncidencia ?></td>
                        <td><?= $ticket->sAsunto ?></td>
                        <td><?= $ticket->tFechaAsignacion ?></td>
                        <td><?= $ticket->tFechaCierre ?></td>
                        <td><?= $ticket->sAtiende ?></td>
                        <td>
                            <a type="button" class="btn btn-default popMsj" data-toggle="popover" data-html="true" data-original-title="Descripción" data-content='<?= substr($ticket->sDescripcion, 0, 250) ?> ...' data-trigger="hover" style="border: none;">
                                <span class="glyphicon glyphicon-list"></span>
                            </a>
                            <a href="<?= base_url() . 'Panel-General/Ver-Ticket-Usuario/' . $ticket->idIncidencia ?>" type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>                
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6" class="text-center">No hay tickets</td>
                </tr>
<?php } ?>
        </tbody>
    </table>
</div>