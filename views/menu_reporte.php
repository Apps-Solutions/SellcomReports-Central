<div class="row texto_21" style="margin-left: 1px; margin-right: 1px;">

    <div class="col-md-2 <?php echo ($MyIndex->MyCommand() == REPORTES ? "bg_color_menu_active" : "bg_color_menu_inactive"); ?> text-center menu_reporte" style="margin-right: 10px;">
        <div class="row">
            <div class="col-md-12"><a href="index.php?command=<?php echo REPORTES; ?>">REPORTES</a></div>
        </div>
    </div>

    <div class="col-md-2 <?php echo ($MyIndex->MyCommand() == REPORTES_GRAFICAS ? "bg_color_menu_active" : "bg_color_menu_inactive"); ?> text-center menu_reporte" style="margin-right: 10px;">
        <div class="row">
            <div class="col-md-12"><a href="index.php?command=<?php echo REPORTES_GRAFICAS; ?>">GRAFICAS</a></div>
        </div>
    </div>

    <div class="col-md-2 <?php echo ($MyIndex->MyCommand() == REPORTES_KPIS ? "bg_color_menu_active" : "bg_color_menu_inactive"); ?> text-center menu_reporte" style="margin-right: 10px;">
        <div class="row">
            <div class="col-md-12"><a href="index.php?command=<?php echo REPORTES_KPIS; ?>">KPI'S</a></div>
        </div>
    </div>
    <div class="col-md-4">&nbsp;</div>
</div>