<option value="">Elije un asunto</option>
<?php 
foreach ($asuntos as $asunto) {?>
<option value="<?=$asunto->idServicio?>"><?=$asunto->sDescripcion?></option>
<?php
}
?>