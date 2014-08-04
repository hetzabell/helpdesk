<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--<link rel="shortcut icon" href="../../assets/ico/favicon.ico">-->

        <title>Error activación</title>
        <link rel="icon" href="<?= base_url() ?>/favicon.ico">
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
            <h2 class="form-signin-heading text-center">
                <div>
                    <img src="<?= base_url(); ?>images/logo_HIRCASA.png" style="width: 200px;"/>
                </div>
            </h2>
            <div class="alert alert-danger form-signin text-center" role="alert">
                <h1>UPSS! <span class="glyphicon glyphicon-remove-circle"></h1>
                <p class="lead">Ocurrio un error al activar tu cuenta.</p>
                <p><?= $msj ?></p>
            </div>
        </div> <!-- /container -->
    </body>
</html>