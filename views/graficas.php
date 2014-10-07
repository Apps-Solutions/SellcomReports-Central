<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <?php include "menu_reporte.php"; ?>
            </div>
        </div>
        <?php
          $page = isset($CONTEXT["page"]) ? Sanitizacion($CONTEXT["page"]) : "1";
          $tampag = isset($CONTEXT["tampag"]) ? Sanitizacion($CONTEXT["tampag"]) : "4";
          $orden = isset($CONTEXT["order"]) ? Sanitizacion($CONTEXT["order"]) : "ASC";
          $by = isset($CONTEXT["por"]) ? Sanitizacion($CONTEXT["por"]) : "grafica.Ano";

          $anio = isset($CONTEXT['year']) ? $CONTEXT['year'] : date('Y');

          $result = $MyReportes->reporte_AnioMes($page, $tampag, 'grafica.Ano', $by . " " . $orden, $anio);

          $total = $MyReportes->getTotal();
        ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 bgk_blanco_general">
                <div class="col-xs-12 col-sm-12 col-md-6 " style="padding: 20px;">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <table class="table tabla_grafica">
                                    <thead>
                                    <th>Mes / Año</th>
                                    <?php
                                      foreach ($result['Anios'] as $y):
                                          ?>
                                          <th><?php print ($y); ?></th>
                                          <?php
                                      endforeach;
                                    ?>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $anios = array();

                                          foreach ($result as $key => $val):

                                              if ($key != 'Anios'):
                                                  ?>
                                                  <tr><td><?php echo $key; ?></td>
                                                      <?php
                                                      foreach ($val as $k):
                                                          ?>
                                                          <td><?php echo moneda_formato($k); ?></td>
                                                      <?php endforeach; ?>
                                                  </tr>
                                                  <?php
                                              endif;
                                          endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="border: solid 3px #34b05f; padding: 10px;">
                        <?php
                          $fila = count($MyReportes->totales);
                          $fila = (12 / $fila);

                          foreach ($MyReportes->totales as $k => $val):
                              ?>
                              <div class="col-xs-<?php echo $fila; ?> col-sm-<?php echo $fila; ?> col-md-<?php echo $fila; ?>">
                                  <div class="row">
                                      <div class="col-xs-12 col-sm-12 col-md-12">$ <?php echo moneda_formato($val); ?></div>
                                  </div>
                              </div>
                          <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6" style="padding: 20px;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div id="chart_div" style="width: 100%; height: 500px; overflow: scroll; overflow-y: hidden;"></div>
                        </div>
                    </div>
                    <table class="table tabla_grafica">
                        <thead>
                        <th>Facturación</th>
                        <?php
                          foreach ($result['Anios'] as $y):
                              ?>
                              <th>
                                  MX 
                                  <?php
                                  print ($y);
                                  ?></th>
                              <?php
                          endforeach;
                        ?>
                        </thead>
                        <tbody>
                            <?php
                              foreach ($MyReportes->cuartos as $key => $row):
                                  ?>
                                  <tr>
                                      <td><?php echo $key; ?></td>
                                      <?php
                                      foreach ($result['Anios'] as $y):
                                          print "<td>" . moneda_formato($row[$y]) . "</td>";
                                      endforeach;
                                      ?>
                                      <?php ?>
                                  </tr>
                                  <?php
                              endforeach;
                            ?>
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
</div>  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Mes', <?php foreach ($result['Anios'] as $y): ?>'<?php echo $y; ?>',<?php endforeach; ?>],
<?php
  foreach ($result as $k => $val):
      if ($k != 'Anios'):
          ?>
                      ['<?php echo $k; ?>', <?php foreach ($val as $k): ?><?php echo $k; ?>,<?php endforeach; ?>],
          <?php
      endif;
  endforeach;
?>]);

        var options = {
            title: 'Resultados de Facturación',
            hAxis: {title: 'Mes', titleTextStyle: {color: 'green'}}
        };


        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

        chart.draw(data, options);

    }
</script>
