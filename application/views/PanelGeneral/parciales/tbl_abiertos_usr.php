<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Asunto</th>
                <th>Fecha Creación</th>
                <th>Atiende</th>
                <th>Estado</th>
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
                        <td><?= $ticket->tFechaCreacion ?></td>
                        <td><?= $ticket->sAtiende ?></td>
                        <td><?= $ticket->Estado ?></td>
                        <td>
                            <a type="button" class="btn btn-default popMsj" data-toggle="popover" data-html="true" data-original-title="Descripción" data-content='<?= substr($ticket->sDescripcion, 0, 250) ?> ...' data-trigger="hover" style="border: none;">
                                <span class="glyphicon glyphicon-list"></span>
                            </a>
                            <a href="<?= base_url() . 'Panel-General/Ver-Ticket-Usuario/' . $ticket->idIncidencia ?>" type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>                
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6" class="text-center">No hay tickets en atención</td>
                </tr>
<?php } ?>
        </tbody>
    </table>
</div>