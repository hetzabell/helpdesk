<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">Levantar Ticket</h2>
            <div class="alert alert-success">
                <p><strong>Recibido!</strong></p>
                <p>Su ticket a sido registrado con éxito.</p>
                <p>En breve recibirá un correo de confirmación con su numero de folio.</p>
            </div>
            <a href="<?= base_url(); ?>Panel-General/Ver-Ticket-Usuario/<?=$idTicket;?>" type="button" class="btn btn-default">Ver mi Ticket</a>
            <a href="<?= base_url(); ?>Panel-General/Levantar-Ticket" type="button" class="btn btn-default">Levantar otro Ticket</a>
            <a href="<?= base_url(); ?>Panel-General" type="button" class="btn btn-default">Ir al resumen</a>
        </div>
    </div>
</div>