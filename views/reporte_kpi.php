<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <?php include "menu_reporte.php"; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 bgk_blanco_general">

                <div class="col-xs-12 col-sm-12 col-md-6 " style="padding: 20px;">
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-xs-12 col-sm-12 col-md-12">&nbsp;</div>
                    </div>
                    <div class="row margen_bottom_20">
                        <div class="col-xs-12 col-sm-12 col-md-12 texto_22">Objetivos de Facturación</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-1 col-sm-2 col-md-2">&nbsp;</div>
                        <div class="col-xs-5 col-sm-4 col-md-4 texto_24"><img src="gfx/img/icono_izquierda.png" width="20" height="20" class="" alt="Anterior">&nbsp;&nbsp;JULIO&nbsp;&nbsp;<img src="gfx/img/icono_derecha.png" width="20" height="20" class="" alt="Siguiente" /></div>
                        <div class="col-xs-5 col-sm-4 col-md-4 texto_24"><img src="gfx/img/icono_menos.png" width="20" height="20" class="" alt="Quitar">&nbsp;&nbsp;2014&nbsp;&nbsp;<img src="gfx/img/icono_mas.png" width="20" height="20" class="" alt="Agregar"/></div>
                        <div class="col-xs-1 col-sm-2 col-md-2">&nbsp;</div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6" style="padding: 20px;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
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
        </div>
    </div>
</div>

