<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LOGIN</title>
        <link rel="shortcut icon" href="<?= base_url() ?>/favicon.ico">
        <!-- Bootstrap core CSS -->
        <link href="<?= base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?= base_url(); ?>css/mainGIR.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?= base_url(); ?>css/acceso.css" rel="stylesheet">

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
                        <img src="<?= base_url(); ?>images/logo_HIRCASA.png" style="width: 300px;"/>
                    </div>
                </h2>
                <?php if (@$error_login) { ?>
                    <div class="alert alert-danger">Usuario inválido</div>
                    <input type="email" class="form-control" value="<?= $_POST['usr']; ?>" name="usr" placeholder="email" required autofocus>
                <?php } else { ?>
                    <input type="email" class="form-control" name="usr" placeholder="email" required autofocus> 
                <?php } ?>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
                <a href="Usuario/Registrate" class="btn btn-lg btn-blueHir btn-block">Registrate</a>
            </form>

        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    </body>
</html>