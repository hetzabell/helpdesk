<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Registrate</title>
        <link rel="shortcut icon" href="<?= base_url() ?>/favicon.ico">
        <!-- Bootstrap core CSS -->
        <link href="<?= base_url(); ?>css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?= base_url(); ?>css/usuario.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">
            <form method="post" class="form-signin" role="form">
                <h2 class="form-signin-heading text-center">
                    <div>
                        <img src="<?= base_url(); ?>images/logo_HIRCASA.png" style="width: 150px;"/>
                    </div>
                </h2>
                <?php if ($errores) { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Upss, Hay algunos errores!</strong>
                        <?php foreach ($errores as $error) { ?>
                            <p><?= $error ?></p>
                        <?php } ?>                    
                    </div>
                <?php } ?>                
                <div class="form-group">
                    <label for="sNombreCompleto">Nombre</label>
                    <input type="text" class="form-control" id="sNombreCompleto" name="sNombreCompleto" placeholder="Nombre Usuario" value="<?= $usuario['sNombreCompleto'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="sEmail">Email</label>
                    <input type="email" class="form-control" id="sEmail" name="sEmail" placeholder="Email" required value="<?= $usuario['sEmail'] ?>">
                </div>
                <div class="form-group">
                    <label for="sExtension">Extensión</label>
                    <input type="number" class="form-control" id="sExtension" name="sExtension" placeholder="Extensión oficina" value="<?= $usuario['sExtension'] ?>">
                </div>
                <div class="form-group">
                    <label for="sPuesto">Puesto</label>
                    <input type="text" class="form-control" id="sPuesto" name="sPuesto" placeholder="Puesto" value="<?= $usuario['sPuesto'] ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Sucursal:</label>
                    <select name="iSucursal" id="iSucursal" class="form-control" onchange="LlenaCbxAreas();" required <?php if (!$sucursales) echo 'disabled'; ?>>
                        <option value="">Elije una opción</option>
                        <?php foreach ($sucursales as $sucursal) { ?>
                            <option value="<?= $sucursal->idSucursal ?>|<?= $sucursal->sDescripcion ?>"><?= $sucursal->sDescripcion ?></option>
                        <?php } ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label class="control-label">Área:</label>
                    <select name="iArea" id="iArea" class="form-control" required <?php if (!$sucursales) echo 'disabled'; ?>>
                        <option value="">Elije una sucursal</option>
                    </select>
                </div> 
                <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
            </form>

        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="<?= base_url(); ?>js/registrate.js"></script>
    </body>
</html>