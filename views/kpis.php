<div class="row" style="margin-left: 1px; margin-right: 1px;">
    <div class="col-md-2">
        <div class="row">
            <div class="col-sm-12 col-md-12 bg_color_menu">
                KPI'S
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12"></div>
        </div>
    </div>
</div>
<?php
  $empleado_id = isset($CONTEXT["employee_id"]) ? Sanitizacion($CONTEXT["employee_id"]) : 0;
  $cliente_id = isset($CONTEXT["customer_id"]) ? Sanitizacion($CONTEXT["customer_id"]) : 0;



  $result_objetivo = $MyFinanzas->get_KPIObjetivo($page = '1', $tampag = '1', $grupo = '', $orden = 'e.id', $empleado_id, $cliente_id);

  if ($result_objetivo == REGISTRO_SUCCESS)
  {
      $registro = $MyFinanzas->getRows();

      $kpi_objetivo = $registro["kpi_objetivo"];
  }

  $MyFinanzas->Free();

  $result_alcanzado = $MyFinanzas->get_KPIAlcanzado($page = '1', $tampag = '1', $grupo = '', $orden = 's.id', $empleado_id);

  if ($result_alcanzado == REGISTRO_SUCCESS)
  {
      $registro = $MyFinanzas->getRows();

      $kpi_alcanzado = $registro["kpi_alcanzado"];
  }
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 bgk_blanco_general">

        <div class="row margen_top_20">
            <div class="col-md-1"></div>
            <div class="col-md-11" style="font-size: 1.5em;">
                Datos del An&aacute;lisis
            </div>
        </div>

        <div class="row margen_top_20 margen_bottom_20">
            <form name="frmKpis" id="frmKpis" action="" method="GET">
                <input type="hidden" name="controller" value="<?php echo $MyIndex->Command(); ?>"/>

                <div class="col-md-1" style="font-size: 1.2em;">Empleado:</div>
                <div class="col-md-2"><?php echo selectEmpleado("employee_id", $empleado_id, $title = ' Empleado ', $extra = "class='select_general'"); ?></div>
                <div class="col-md-1" style="font-size: 1.2em;">Cliente:</div>
                <div class="col-md-2"><?php echo selectCliente("customer_id", $cliente_id, $title = ' Cliente ', $extra = "class='select_general'"); ?></div>
                <div class="col-md-2"><button type="submit" name="btn_filtro">Filtrar</button></div>
                <div class="col-md-4"></div>
            </form>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-6">

            <div class="row margen_bottom_20">
                <div class="col-md-4"></div>
                <div class="col-md-6 text-right" style="font-size: 1.5em;">KPI Objetivo &nbsp;<img src="gfx/img/linea_en_kpi.png" /></div>
                <div class="col-md-2"></div>
            </div>
            <div class="row margen_bottom_20">
                <div class="col-md-4"></div>
                <div class="col-md-6 text-center" style="padding: 20px; border-radius: 10px; background-color: #34b05f; font-size: 1.5em; color: #fff; font-weight: bold;"><?php print $kpi_objetivo > 0 ? $kpi_objetivo : "0,000,000.00"; ?></div>
                <div class="col-md-2"></div>
            </div>
            <div class="row margen_bottom_20">
                <div class="col-md-4"></div>
                <div class="col-md-6 text-right" style="font-size: 1.5em;">KPI Alcanzado &nbsp;<img src="gfx/img/linea_en_kpi.png" /></div>
                <div class="col-md-2"></div>
            </div>
            <div class="row margen_bottom_20">
                <div class="col-md-4"></div>
                <div class="col-md-6 text-center" style="padding: 20px; border-radius: 10px; background-color: #34b05f; font-size: 1.5em; color: #fff; font-weight: bold;"><?php print $kpi_alcanzado > 0 ? $kpi_alcanzado : "0,000,000.00"; ?></div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-12"></div>
            </div>
            <div class="row">
                <div class="col-md-12"></div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
  $objetivo_default = 50;
  $alcanzado_default = 50;


  if (isset($kpi_objetivo) && $kpi_objetivo > 0)
      $value_objetivo = $kpi_objetivo;
  else
      $value_objetivo = 0;


  if (isset($kpi_alcanzado) && $kpi_alcanzado > 0)
      $value_alcanzado = $kpi_alcanzado;
  else
      $value_alcanzado = 0;
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['KPI', 'VALOR'],
            ['KPI Objetivo', <?php echo $value_objetivo > 0 ? $value_objetivo : $alcanzado_default ?>],
            ['KPI Alcanzado', <?php echo $value_alcanzado > 0 ? $value_alcanzado : $objetivo_default; ?>]
        ]);

        var options = {
            title: 'KPIS',
            is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
