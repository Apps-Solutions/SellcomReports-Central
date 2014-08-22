<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="row " style="margin-left: 1px;">
                    <div class="col-xs-12 col-sm-12 col-md-2 bg_color_menu padding_menu_10 texto_21 text-center">
                        <div class="row"><div class="">KPI'S</div></div>    
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-10">&nbsp;</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 bgk_blanco_general">

                <div class="row margen_top_20">
                    <div class="col-md-1"></div>
                    <div class="col-md-11 texto_22">
                        Datos del An&aacute;lisis
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row margen_bottom_20">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-6 text-right" style="font-size: 19px;">KPI Objetivo &nbsp;<img src="gfx/img/linea_en_kpi.png" /></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row margen_bottom_20">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-6 text-center" style="padding: 20px; border-radius: 10px; background-color: #34b05f; font-size: 24px; color: #fff; font-weight: bold;">0,000,000.00</div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row margen_bottom_20">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-6 text-right" style="font-size: 19px;">KPI Alcanzado &nbsp;<img src="gfx/img/linea_en_kpi.png" /></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row margen_bottom_20">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-6 text-center" style="padding: 20px; border-radius: 10px; background-color: #34b05f; font-size: 24px; color: #fff; font-weight: bold;">0,000,000.00</div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="chart_div" style="width: 800px; height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages: ["gauge"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['KPI', 80]
        ]);

        var options = {
            width: 800, height: 400,
            redFrom: 90, redTo: 100,
            yellowFrom: 75, yellowTo: 90,
            minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        setInterval(function() {
            data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
            chart.draw(data, options);
        }, 13000);
    }
</script>