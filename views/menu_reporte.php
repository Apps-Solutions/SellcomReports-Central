<div class="row" style="margin-left: 1px; margin-right: 1px;">

    <div class="col-xs-12 col-sm-3 col-md-2"  style="margin-right: 10px;">
        <div class="row">
            <div class="col-sm-12 col-md-12 <?php echo ($MyIndex->Command() == REPORTES ? "menu_active" : "menu_inactive"); ?> text-center menu_reporte">
                <a href="index.php?controller=<?php echo REPORTES; ?>">
                    REPORTES
                </a>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-3 col-md-2 " style="margin-right: 10px;">
        <div class="row">
            <div class="col-sm-12 col-md-12 <?php echo ($MyIndex->Command() == REPORTES_GRAFICAS ? "menu_active" : "menu_inactive"); ?> text-center menu_reporte">
                <a href="index.php?controller=<?php echo REPORTES_GRAFICAS; ?>">
                    GRAFICAS
                </a>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-3 col-md-2 " style="margin-right: 10px;">
        <div class="row">
            <div class="col-sm-12 col-md-12 <?php echo ($MyIndex->Command() == REPORTES_KPIS ? "menu_active" : "menu_inactive"); ?> text-center menu_reporte">
                <a href="index.php?controller=<?php echo REPORTES_KPIS; ?>">
                    KPI'S
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-4"></div>
</div>