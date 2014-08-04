<option value="">Elija un area</option>
<?php 
foreach ($areas as $area) {?>
<option value="<?=$area->idArea?>"><?=$area->sNombreArea?></option>
<?php
}
?>