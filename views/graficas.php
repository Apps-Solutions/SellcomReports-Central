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
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <table class="table tabla_grafica">
                                    <thead>
                                    <th>Mes / Año</th>
                                    <th>2012</th>
                                    <th>2013</th>
                                    <th>2012</th>
                                    <th>2013</th>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 1; $i < 13; $i++):
                                              ?>
                                              <tr>
                                                  <td><?php echo $_MonthsE[$i]; ?></td>
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

                    <div class="row" style="border: solid 3px #34b05f; padding: 10px;">

                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">$490,159,297.87</div>
                            </div>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">$490,159,297.87</div>
                            </div>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">$490,159,297.87</div>
                            </div>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">$490,159,297.87</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-6" style="padding: 20px;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div id="chart_div" style="width: 100%; height: 500px;"></div>
                        </div>
                    </div>

                    <table class="table tabla_grafica">
                        <thead>
                        <th>Facturacion</th>
                        <th>MXP</th>
                        <th>MXP</th>
                        <th>MXP</th>
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
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Year', 'Sales', 'Expenses'],
            ['2004', 1000, 400],
            ['2005', 1170, 460],
            ['2006', 660, 1120],
            ['2007', 1030, 540]
        ]);

        var options = {
            title: 'Company Performance',
            hAxis: {title: 'Year', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

        chart.draw(data, options);

    }
</script>