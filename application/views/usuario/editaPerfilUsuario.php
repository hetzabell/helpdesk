<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">Editar <small>Perfil</small></h2>
            <?=$mensaje?>
            <form method="post" role="form">
                <div class="form-group">
                    <label for="sNombreCompleto">Nombre</label>
                    <input type="text" class="form-control" id="sNombreCompleto" name="sNombreCompleto" placeholder="Nombre Usuario" value="<?= $usuario->sNombreCompleto ?>" required>
                </div>
                <div class="form-group">
                    <label for="sEmail">Email</label>
                    <input type="email" class="form-control" id="sEmail" name="sEmail" placeholder="Email" required value="<?= $usuario->sEmail ?>">
                </div>
                <div class="form-group">
                    <label for="sExtension">Extensión</label>
                    <input type="number" class="form-control" id="sExtension" name="sExtension" placeholder="Extensión oficina" value="<?= $usuario->sExtension ?>">
                </div>
                <div class="form-group">
                    <label for="sPuesto">Puesto</label>
                    <input type="text" class="form-control" id="sPuesto" name="sPuesto" placeholder="Puesto" value="<?= $usuario->sPuesto ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Sucursal:</label>
                    <select name="iSucursal" id="iSucursal" class="form-control" onchange="LlenaCbxAreasEditar(<?= $usuario->iArea ?>);" required <?php if (!$sucursales) echo 'disabled'; ?>>
                        <option value="">Elije una opción</option>
                        <?php foreach ($sucursales as $sucursal) { ?>
                            <option value="<?= $sucursal->idSucursal ?>|<?= $sucursal->sDescripcion ?>" <?php if ($sucursal->idSucursal == $usuario->iSucursal) echo 'selected'; ?>><?= $sucursal->sDescripcion ?></option>
                        <?php } ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label class="control-label">Área:</label>
                    <select name="iArea" id="iArea" class="form-control" required <?php if (!$sucursales) echo 'disabled'; ?>>
                        <option value="">Elije una sucursal</option>
                    </select>
                </div> 
                <button class="btn btn-primary" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>