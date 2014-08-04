<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tablero de tickets</title>

        <link rel="shortcut icon" href="<?= base_url() ?>/favicon.ico">

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <!-- CSS Personalizado para esta vista -->
        <link href="<?= base_url(); ?>css/tableroTickets.css" rel="stylesheet">
        <!-- Load JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <table class="table table-striped1 table-condensed ">
            <thead>
                <tr class="encabezado">
                    <th>FOLIO</th>
                    <th>ASUNTO</th>
                    <th>ATIENDE</th>
                    <th>ESTADO</th>
                    <th>FECHA DE CREACI&Oacute;N</th>
                </tr>
            </thead>
            <tbody id="dashboard" >  
            </tbody>
        </table>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>js/dashboard.js"></script>
    </body>
</html>









