<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title><?= $titulo_seccion; ?></title>

<link rel="shortcut icon" href="<?= base_url() ?>/favicon.ico">

<!-- Bootstrap core CSS -->
<link href="<?= base_url(); ?>css/bootstrap.css" rel="stylesheet">


<!-- CSS Personalizado para esta vista -->
<link href="<?= base_url(); ?>css/mainGIR.css" rel="stylesheet">
<?php
if ($cssExtra) {
    foreach ($cssExtra as $css) {
        ?>
        <link href="<?= base_url(); ?>css/<?= $css; ?>.css" rel="stylesheet">
        <?php
    }
}
?>

<!-- Load JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->