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
<!--        <link href="<?= base_url(); ?>css/usuario.css" rel="stylesheet">-->

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

                <div class="form-group">
                    <label for="iPuntaje">¿Cómo te atendimos?</label><br>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th class="text-center">Pésimo Servicio</th>
                                <th class="text-center">Mal Servicio</th>
                                <th class="text-center">Cumplió con la solución</th>
                                <th class="text-center">Buen Servicio</th>
                                <th class="text-center">Excelente Servicio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1"></td>
                                <td><input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="2"></td>
                                <td><input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="3"></td>
                                <td><input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="4"></td>
                                <td><input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="5"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <label for="sNombreCompleto">Comentario:</label>
                    <textarea name="txaComentarioEncuesta" id="txaComentarioEncuesta" class="form-control" rows="5"></textarea>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Calificar</button>
            </form>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    </body>
</html>