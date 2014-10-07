<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <?php include "menu_reporte.php"; ?>
    </div>
</div>
<?php
  $page = isset($CONTEXT["page"]) ? Sanitizacion($CONTEXT["page"]) : "1";
  $tampag = isset($CONTEXT["tampag"]) ? Sanitizacion($CONTEXT["tampag"]) : "10";
  $orden = isset($CONTEXT["order"]) ? Sanitizacion($CONTEXT["order"]) : "ASC";
  $by = isset($CONTEXT["por"]) ? Sanitizacion($CONTEXT["por"]) : "dh.register_date";

  $year = isset($CONTEXT["year"]) ? Sanitizacion($CONTEXT["year"]) : date("Y");
  $month = isset($CONTEXT["month"]) ? Sanitizacion($CONTEXT["month"]) : date('n');

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

  $fecha_mes = $current_month;

  if ($current_month < 10)
  {
      $fecha_mes = "0" . $current_month;
  }


  $b_fecha = $current_year . "-" . $current_month;
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
                        </a>                    
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <form id='paginar' name='paginar' method="GET" action="" onsubmit="this.page.value = '1';" >
                <input type="hidden" name="controller" id="controller" value="<?php print $MyIndex->Command(); ?>" />
                <input type="hidden" name="page" id="page" value="<?php print $page; ?>" />
                <input type="hidden" name="por" id="por" value="<?php print $by; ?>" />
                <input type="hidden" name="order" id="order" value="<?php print $orden; ?>" />
                <input type="hidden" name="tampag" id="tampag" value="<?php print $tampag; ?>" />
            </form>
            <?php
              $datos = $MyReportes->get_Inicio($page = 1, $tampag, $grupo = '', $by . " " . $orden, $b_fecha);
              $total = $MyReportes->getTotal();

              $terminamosconel = $page * $tampag;
              $maxPage = ceil($total / $tampag);
            ?>
            <div class="col-sm-12 col-md-12">
                <table class="table table-striped">
                    <thead>
                        <?php echo makeHTMLOrder($orden, $by, 'Fecha', 'Fecha', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'Forecast50', 'Forecast 50%', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'Forecast80', 'Forecast 80%', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'Forecast100', 'Forecast 100%', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'ds.name', '%', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'BackOrder', 'BackOrder', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'ds.name', 'Stock', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'StockProyectos', 'Stock/Proyectos', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'Remision', 'Remisiones', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'RemisionSemanal', 'Remisiones Semanal', $page); ?>
                    </thead>
                    <tbody>
                        <?php
                          if ($total > 0):

                              foreach ($datos as $k => $val):
                                  ?>
                                  <tr>
                                      <td><?php echo $val['Fecha']; ?></td>
                                      <td><?php echo $val['Forecast50']; ?></td>
                                      <td><?php echo $val['Forecast80']; ?></td>
                                      <td><?php echo $val['Forecast100']; ?></td>
                                      <td>1,000 Pendiente %</td>
                                      <td><?php echo $val['Backorder']; ?></td>
                                      <td>Pendiente Stock</td>
                                      <td><?php echo $val['Stock']; ?></td>
                                      <td><?php echo $val['Remision']; ?></td>
                                      <td><?php echo $val['RemisionSemanal']; ?></td>
                                  </tr>
                                  <?php
                              endforeach;
                          else:
                              ?>
                              <tr><td colspan="10" class="text-danger">No hay registros</td></tr>     
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="row margen_top_20"></div>
        <div class="row">
            <div class="col-sm-12 col-md-12" style="border-bottom: solid 2px #d5d5d5; "></div>
        </div>
        <?php
          $MyReportes->Free();

          $result = $MyReportes->get_Inicio2($page, $tampag, $grupo = '', $by = 'dh.register_date' . " " . $orden = 'ASC', $b_fecha);
          $total2 = $MyReportes->getTotal();
        ?>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <table class="table table-striped">
                    <thead>
                        <?php echo makeHTMLOrder($orden, $by, 'fecha', 'Fecha', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'PendienteFacturar', 'Total Pendiente de Facturar', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'PendienteFacturar2', 'Total Pendiente de Facturar 2', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'CuentaCobrar', 'Cuentas por Cobrar', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'ds.name', '%', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'ds.name', 'Facturacion YTD', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'ds.name', 'Facturacion Mes', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'ds.name', 'Cobranza Semanal', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'ds.name', 'Previsión Anual Minima', $page); ?>
                        <?php echo makeHTMLOrder($orden, $by, 'ds.name', 'Prevision Anual Máxima', $page); ?>
                    </thead>
                    <tbody>
                        <?php
                          if ($total2 > 0):
                              foreach ($result as $k => $val):
                                  ?>
                                  <tr>
                                      <td><?php echo $val['fecha']; ?></td>
                                      <td><?php echo $val['PendienteFacturar']; ?></td>
                                      <td><?php echo $val['PendienteFacturar2']; ?></td>
                                      <td><?php echo $val['CuentaCobrar']; ?></td>
                                      <td>1,000.00</td>
                                      <td>1,000.00</td>
                                      <td>1,000.00</td>
                                      <td>1,000.00</td>
                                      <td>1,000.00</td>
                                      <td>1,000.00</td>
                                  </tr>
                                  <?php
                              endforeach;
                          else:
                              ?>
                              <tr><td colspan="10" class="text-danger">No hay registros</td></tr>     

                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
          $celda1 = 5;
          $celda2 = 2;
          $celda3 = 5;

          include "widget.paginar.php";
        ?>
    </div>
</div>