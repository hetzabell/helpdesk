
            <?php if ($data) { ?>
                <?php
                    $Resultados = $data->result();
                    $i = 0;
                    foreach ($Resultados as $Resultado) {
                        $i++;
                        ?>
                            <?php  if (($Resultado->Color) == 1) { ?>
                            <tr >
                            <?php } elseif (($Resultado->Color) == 2) { ?>
                             <tr class="warning1">   
                            <?php } else { ?>
                             <tr class="danger1">   
                            <?php } ?>  

                                <td align="left">
                                    <b style="font-size:1.2em"><?= $Resultado->idIncidencia ?></b>
                                </td>
                                <td align="left">
                                    <b style="font-size:1.2em"><?= $Resultado->sDescripcion ?></b>
                                    <br /><?= $Resultado->sSolicitante ?>
                                </td>
                                <td align="left"><?= $Resultado->sAtiende ?></td>
                                <td align="left"><?= $Resultado->Estado ?> </td>
                                <td align="left"><?= $Resultado->tFechaCreacion ?></td>                                          
                            </tr>     

                        <?php
                        }
                     ?>
                <?php } ?>

