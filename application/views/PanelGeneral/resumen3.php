<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#tab_MisServicios" role="tab" data-toggle="tab">Mis Servicios</a></li>
                <li><a href="#tab_MisTickets" role="tab" data-toggle="tab">Mis Tickets</a></li>
                <li><a href="#tbl_bandeja" role="tab" data-toggle="tab" onclick="LlenaTbl_bandeja();">Sin Atender</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="tab_MisServicios">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tbl_abiertos" role="tab" data-toggle="tab" onclick="LlenaTbl_abiertos();">Abiertos</a></li>
                        <li><a href="#tbl_cerrados" role="tab" data-toggle="tab" onclick="LlenaTbl_cerrados();">Cerrados</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tbl_abiertos" style="height: 100%;">
                        </div>
                        <div class="tab-pane" id="tbl_cerrados">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_MisTickets">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tbl_abiertos_usr" role="tab" data-toggle="tab" onclick="LlenaTbl_abiertos_usr();">Abiertos</a></li>
                        <li><a href="#tbl_cerrados_usr" role="tab" data-toggle="tab" onclick="LlenaTbl_cerrados_usr();">Cerrados</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tbl_abiertos_usr">
                        </div>
                        <div class="tab-pane fade" id="tbl_cerrados_usr">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tbl_bandeja">

                </div>
            </div>
        </div>
    </div>
</div>