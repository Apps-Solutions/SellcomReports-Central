
<div class="row">
    <div class="col-md-12">

        <div class="row">

            <div class="col-md-3 bg_color_menu">
                <div class="row">
                    <div class="col-md-12 texto_21 text-center padding_titulo_principal">
                        FINANZAS
                    </div>
                </div>
            </div>
            
            <div class="col-md-1"></div>
            
            <div class="col-md-3 bg_color_menu">
                <div class="row">
                    <div class="col-md-12 padding_titulo_menu">
                        Agregar Otros Datos
                    </div>
                </div>
            </div>

            <div class="col-md-5">&nbsp;</div>
        </div>

        <div class="row">
            <div class="sol-xs-12 col-sm-12 col-md-12 bgk_blanco_general" style="padding: 20px;">

                <div class="row bgk_menu_lista text-center">
                    <div class="col-lg-2">Estatus</div>
                    <div class="col-lg-2"><img src="gfx/img/linea_entre_secciones.png">&nbsp;Cliente</div>
                    <div class="col-lg-1"><img src="gfx/img/linea_entre_secciones.png">&nbsp;Sector</div>
                    <div class="col-lg-2"><img src="gfx/img/linea_entre_secciones.png">&nbsp;Nombre</div>
                    <div class="col-lg-1"><img src="gfx/img/linea_entre_secciones.png">&nbsp;Tipo</div>
                    <div class="col-lg-2"><img src="gfx/img/linea_entre_secciones.png">&nbsp;Valor</div>
                    <div class="col-lg-2"></div>
                </div>

                <?php for ($i = 1; $i < 10; $i++): ?>
                      <div class="row bgk_color_blanco text-center">
                          <div class="col-lg-2">8<?php echo $i; ?>%</div>
                          <div class="col-lg-2">Empresa <?php echo $i; ?></div>
                          <div class="col-lg-1">Giro</div>
                          <div class="col-lg-2">Proyecto</div>
                          <div class="col-lg-1">Tipo</div>
                          <div class="col-lg-2">Cantidad $ MX</div>
                          <div class="col-lg-2"><a href="#" data-toggle='modal' data-target='.bs-ver-modal-lg'><img src="gfx/img/ver.png" width="30" height="30"></a></div>
                      </div>
                  <?php endfor; ?>
            </div>
        </div>

    </div>
</div>
