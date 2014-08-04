<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3>Mis Tickets</h3>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#tbl_abiertos_usr" role="tab" data-toggle="tab" onclick="LlenaTbl_abiertos_usr();">Abiertos</a></li>
                <li><a href="#tbl_cerrados_usr" role="tab" data-toggle="tab" onclick="LlenaTbl_cerrados_usr();">Cerrados</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="tbl_abiertos_usr">
                </div>
                <div class="tab-pane " id="tbl_cerrados_usr">
                </div>
            </div>
        </div>
    </div>
</div>