<div class="col-lg-12">
    <?php include "menu_reporte.php"; ?>
</div>
<div class="col-lg-12 bgk_blanco_general">
    <div class="col-lg-6 " style="padding: 20px;">
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-lg-12">&nbsp;</div>
        </div>
        <div class="row margen_bottom_20">
            <div class="col-lg-12 texto_22">Objetivos de Facturación</div>
        </div>
        <div class="row">
            <div class="col-lg-2">&nbsp;</div>
            <div class="col-lg-4 texto_24"><img src="gfx/img/icono_izquierda.png">&nbsp;&nbsp;JULIO&nbsp;&nbsp;<img src="gfx/img/icono_derecha.png"></div>
            <div class="col-lg-4 texto_24"><img src="gfx/img/icono_menos.png">&nbsp;&nbsp;2014&nbsp;&nbsp;<img src="gfx/img/icono_mas.png"></div>
            <div class="col-lg-2">&nbsp;</div>
        </div>
    </div>
    <div class="col-lg-6" style="padding: 20px;">
        <div class="row">
            <div class="col-md-12">
                <table class="table tabla_grafica">
                    <thead>
                    <th>Director</th>
                    <th>Cliente</th>
                    <th>Estatus</th>
                    <th>MXP</th>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i < 5; $i++):
                              ?>
                              <tr>
                                  <td>Q<?php echo $i; ?></td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                              </tr>
                          <?php endfor; ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>