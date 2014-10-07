<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <?php include "menu_reporte.php"; ?>
    </div>
</div>
<?php
  $page = isset($CONTEXT["page"]) ? Sanitizacion($CONTEXT["page"]) : "1";
  $tampag = isset($CONTEXT["tampag"]) ? Sanitizacion($CONTEXT["tampag"]) : "10";
  $orden = isset($CONTEXT["order"]) ? Sanitizacion($CONTEXT["order"]) : "ASC";
  $by = isset($CONTEXT["por"]) ? Sanitizacion($CONTEXT["por"]) : "e.id";


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

  $kpis = $MyReportes->get_Kpis($page, $tampag, 'e.id, ke.customer_id', $by . " " . $orden, $current_year, $fecha_mes);

  $total = $MyReportes->getTotal();

  $terminamosconel = $page * $tampag;
  $maxPage = ceil($total / $tampag);
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 bgk_blanco_general">

        <div class="col-xs-12 col-sm-12 col-md-6 " style="padding: 20px;">
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-xs-12 col-sm-12 col-md-12"></div>
            </div>
            <div class="row margen_bottom_20">
                <div class="col-xs-12 col-sm-12 col-md-12"  style="font-size: 1.5em;">Objetivos de Facturación</div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-2 col-md-2"></div>
                <div class="col-xs-5 col-sm-4 col-md-4" style="font-size: 1.5em;">
                    <a href="index.php?controller=<?php echo $MyIndex->Command(); ?>&year=<?php echo $current_year; ?>&month=<?php echo $prev_month; ?>">
                        <img src="gfx/img/icono_izquierda.png" width="20" height="20" class="" alt="Anterior">
                    </a>
                    &nbsp;<?php echo $months[$current_month]; ?>&nbsp;
                    <a href="index.php?controller=<?php echo $MyIndex->Command(); ?>&year=<?php echo $current_year; ?>&month=<?php echo $next_month; ?>">
                        <img src="gfx/img/icono_derecha.png" width="20" height="20" class="" alt="Siguiente" />
                    </a>
                </div>
                <div class="col-xs-5 col-sm-4 col-md-4" style="font-size: 1.5em;">
                    <a href="index.php?controller=<?php echo $MyIndex->Command(); ?>&year=<?php echo $prev_year; ?>&month=<?php echo $current_month; ?>">
                        <img src="gfx/img/icono_menos.png" width="20" height="20" class="" alt="Quitar">
                    </a>
                    &nbsp;<?php echo $current_year; ?>&nbsp;
                    <a href="index.php?controller=<?php echo $MyIndex->Command(); ?>&year=<?php echo $next_year; ?>&month=<?php echo $current_month; ?>">
                        <img src="gfx/img/icono_mas.png" width="20" height="20" class="" alt="Agregar"/>
                    </a>
                </div>
                <div class="col-xs-1 col-sm-2 col-md-2"></div>
            </div>
        </div>

        <form id='paginar' name='paginar' method="GET" action="" onsubmit="this.page.value = '1';" >
            <input type="hidden" name="controller" id="controller" value="<?php print $MyIndex->Command(); ?>" />
            <input type="hidden" name="page" id="page" value="<?php print $page; ?>" />
            <input type="hidden" name="por" id="por" value="<?php print $by; ?>" />
            <input type="hidden" name="order" id="order" value="<?php print $orden; ?>" />
            <input type="hidden" name="tampag" id="tampag" value="<?php print $tampag; ?>" />
            <input type="hidden" name="year" id="year" value="<?php print $current_year; ?>"/>
            <input type="hidden" name="month" id="month" value="<?php print $current_month; ?>"/>
        </form>

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
                            <?php
                              if ($total > 0):
                                  foreach ($kpis as $k => $fila):
                                      ?>
                                      <tr>
                                          <td><?php print utf8_encode($fila["empleado"]); ?></td>
                                          <td><?php print $fila["cuenta"]; ?></td>
                                          <td>N/A</td>
                                          <td><?php print $fila["monto"]; ?></td>
                                      </tr>
                                      <?php
                                  endforeach;
                              else:
                                  ?>
                                  <tr><td colspan="4" class="text-danger text-center">No hay registros</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
              $celda1 = 4;
              $celda2 = 4;
              $celda3 = 4;
              include 'widget.paginar.php';
            ?>
        </div>
    </div>
</div>