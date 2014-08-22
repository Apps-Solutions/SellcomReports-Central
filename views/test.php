<style>
    .titulo_menu {
        font-size: 24px;
        text-align: center;
        padding-top: 5px;
        padding-left: 5px;
        padding-right: 5px;
        padding-bottom: 5px;
    }
    
    .titulo_menu_chicos {
         font-size: 20px;
        text-align: center;
        padding-top: 5px;
        padding-left: 5px;
        padding-right: 5px;
        padding-bottom: 5px;
    }
</style>

<div class="col-md-12 col-lg-12">
    
    <div class="row" style="margin-left: 1px; margin-right: 1px;">

        <div class="col-sm-2 col-md-2 col-lg-2 bg_color_menu titulo_menu">
            <div class="row">
                <div class="col-md-12">NEGOCIOS</div>
            </div>
        </div>


        <div class="col-sm-8 col-md-8 col-lg-8 bg_color_menu titulo_menu_chicos">
            <div class="row">
                <div class="col-md-12">Agregar Otros Datos </div>
            </div>
        </div>
        
        <div class="col-sm-2 col-md-2 col-lg-2 bg_color_menu">
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-12 bgk_blanco_general" style="height: 800px;">
            TESTING
        </div>
    </div>

</div>


<?php
$filename = "css/estilos.css";
$gestor = fopen($filename, "rb");
$contenido = fread($gestor, filesize($filename));


echo $contenido;

fclose($gestor);
?>


