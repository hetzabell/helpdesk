        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>js/general.js"></script>
        <?php 
        if ($jsExtra) {
            foreach ($jsExtra as $js) {
                ?>
        <script src="<?= base_url(); ?>js/<?=$js;?>.js"></script>
        <?php
            }
        }
        if ($jsOtro) {
            foreach ($jsOtro as $otro) {?>
        <script><?=$otro;?></script>
        <?php
            }
        }
        ?>