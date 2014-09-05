
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <?php include "menu_reporte.php"; ?>
    </div>
</div>
<?php
  $year = isset($CONTEXT["year"]) ? Sanitizacion($CONTEXT["year"]) : date("Y");
  $month = isset($CONTEXT["month"]) ? Sanitizacion($CONTEXT["month"]) : substr(date("m"), -1);


  $current_year = $year;
  $current_month = $month;

  $prev_year = $current_year - 1;
  $next_year = $current_year + 1;

  $prev_month = $current_month - 1;
  $next_month = $current_month + 1;

  if ($prev_month == 0)
  {
      $prev_month = 12;
  }

  if ($next_month == 13)
  {
      $next_month = 1;
  }
?>
<div class="row">

    <div class="col-sm-12 col-md-12 bgk_blanco_general" style="padding: 20px;">

        <div class="row margen_bottom_20">
            <div class="col-sm-12 col-md-12"></div>
        </div>

        <div class="row margen_bottom_20">
            <div class="col-sm-5 col-md-5"></div>
            <div class="col-sm-4 col-md-4">
                <div class="row">
                    <div class="col-md-12" style="font-size: 1.5em;">
                        <a href="index.php?controller=<?php echo $MyIndex->Command(); ?>&year=<?php echo $current_year; ?>&month=<?php echo $prev_month; ?>">
                            <img src="gfx/img/icono_izquierda.png" width="20" height="20" class="" alt="Anterior">
                        </a>
                        &nbsp;<?php echo $months[$current_month]; ?>&nbsp;
                        <a href="index.php?controller=<?php echo $MyIndex->Command(); ?>&year=<?php echo $current_year; ?>&month=<?php echo $next_month; ?>">
                            <img src="gfx/img/icono_derecha.png" width="20" height="20" class="" alt="Siguiente" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="row">
                    <div class="col-md-12" style="font-size: 1.5em;">
                        <a href="index.php?controller=<?php echo $MyIndex->Command(); ?>&year=<?php echo $prev_year; ?>&month=<?php echo $current_month; ?>">
                            <img src="gfx/img/icono_menos.png" width="20" height="20" class="" alt="Quitar">
                        </a>
                        &nbsp;<?php echo $current_year; ?>&nbsp;
                        <a href="index.php?controller=<?php echo $MyIndex->Command(); ?>&year=<?php echo $next_year; ?>&month=<?php echo $current_month; ?>">
                            <img src="gfx/img/icono_mas.png" width="20" height="20" class="" alt="Agregar"/>
                        </a>                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <table class="table table-striped">
                    <thead>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Fecha</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Forecast 50%</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Forecast 80%</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Forecast 100%</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;%</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;BackOrder</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Stock</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Stock/Proyectos</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Remisiones</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Remisiones Semanal</th>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i < 10; $i++): ?>
                              <tr>
                                  <td>04/07/14</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                              </tr>
                          <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12" style="border-bottom: solid 2px #d5d5d5; "></div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <table class="table table-striped">
                    <thead>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Fecha</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Total Pendiente de Facturar</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Total Pendiente de Facturar 2</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Cuentas por Cobrar</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;%</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Facturacion YTD</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Facturacion Mes</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Cobranza Semanal</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Previsión Anual Minima</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Prevision Anual Máxima</th>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i < 10; $i++): ?>
                              <tr>
                                  <td>04/07/14</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
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

