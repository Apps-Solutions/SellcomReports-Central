<div class="row">
    <div class="col-sm-12 col-md-12">

        <div class="row" style="margin-left: 1px; margin-right: 1px;">

            <div class="col-sm-12 col-md-2 bg_color_menu texto_21 padding_titulo_principal text-center">
                <div class="row">
                    <div class="col-md-12">NEGOCIOS</div>
                </div>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-9 bg_color_menu padding_titulo_principal">

                <div class="row">

                    <div class="col-md-1">
                        <div class="row">
                            <div class="col-md-12" style="font-size: 16px;">Filtros</div>
                        </div>
                    </div>

                    <div class="col-sm-2 col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                <select name="cliente" class="select_filtro">
                                    <option value="">Cliente</option>
                                    <option value='Cliente1'>Cliente1</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2 col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                <select name="sector" class="select_filtro">
                                    <option value="">Sector</option>
                                    <option value='Sector1'>Sector 1</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2 col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                <select name="tipo" class="select_filtro">
                                    <option value="">Tipo</option>
                                    <option value='Tipo'>Tipo 1</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2 col-md-3">
                        <div class="row">
                            <div class="col-md-12">                        
                                <input type="search" class="textbox-finanzas" name="buscar" placeholder="Buscar Nombre" />
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-2 ">
                        <div class="row">
                            <div class="col-md-12">
                                <span>Agregar</span>
                                <a href="#" data-toggle='modal' data-target='.bs-otro-modal-lg'>
                                    <img src="gfx/img/icono_mas.png"/>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--END ROW-->

        <div class="row">
            <div class=" col-md-12 bgk_blanco_general" style="padding: 20px;">

                <table class="table table-striped">
                    <thead>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Estatus</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Cliente</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Sector</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Nombre</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Tipo</th>
                    <th><img src="gfx/img/linea_entre_secciones.png">&nbsp;Valor</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i < 10; $i++): ?>
                              <tr>
                                  <td>04/07/14</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td>1,000.00</td>
                                  <td><a href="#" data-toggle='modal' data-target='.bs-ver-modal-lg'><img src="gfx/img/ver.png" width="30" height="30"></a></td>
                              </tr>
                          <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>



        <!--MODAL AGREGAR-->
        <div class="modal fade bs-otro-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-md"> 
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <img src="gfx/img/cerrar.png">
                        </button> 
                        <h4 class="modal-title" id="myModalLabel">Agregar</h4>
                    </div>
                    <form name="frmOtros" id="frmOtros">
                        <div class="modal-body"> 

                            <div class="row margen_bottom_10">
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">                                    
                                            <img src="gfx/img/linea_en_agregar.png"> &nbsp;Estatus
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <select name="sector" class="select_filtro_negocio">
                                                <option value="">Selcciona un estatus</option>
                                                <option value='Sector1'>Sector 1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">                                    
                                            <img src="gfx/img/linea_en_agregar.png"> &nbsp;Nombre
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="text" name="nombre" id="nombre" value="" class="textbox-finanzas"  placeholder="Escribe el Nombre"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
                            </div>


                            <div class="row margen_bottom_10">
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>

                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">                                    
                                            <img src="gfx/img/linea_en_agregar.png"> &nbsp;Cliente
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="text" name="cliente" id="cliente" value="" class="textbox-finanzas" placeholder="Escribe el Cliente" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">                                    
                                            <img src="gfx/img/linea_en_agregar.png"> &nbsp;Tipo
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <select name="tipo" class="select_filtro_negocio">
                                                <option value="">Selcciona un tipo</option>
                                                <option value='Sector1'>Sector 1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>

                            </div>

                            <div class="row margen_bottom_10">
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>

                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">                                    
                                            <img src="gfx/img/linea_en_agregar.png"> &nbsp;Sector
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <select name="sector" class="select_filtro_negocio">
                                                <option value="">Selcciona un sector</option>
                                                <option value='Sector1'>Sector 1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">                                    
                                            <img src="gfx/img/linea_en_agregar.png"> &nbsp;Valor
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <select name="sector" class="select_filtro_negocio">
                                                <option value="">Selcciona un valor</option>
                                                <option value='MX'>$ MX</option>
                                                <option value='US'>$ US</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-sm-8 col-md-8 col-lg-8"></div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <button type="button" name="guardar" onclick="" id="">Guardar</button>                        
                                </div>
                            </div>  
                        </div> 
                    </form>
                </div> 
            </div> 
        </div>


        <!--MODAL EDITAR-->

        <div class="modal fade bs-ver-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-md"> 
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <img src="gfx/img/cerrar.png">
                        </button> 
                        <h4 class="modal-title" id="myModalLabel">Cliente | Sector</h4>
                    </div>
                    <form name="frmClienteSector" id="frmClienteSector">
                        <div class="modal-body"> 
                            <div class="row "> 
                                <div class="col-lg-12"></div>
                            </div> 
                            <div class="row"> 
                                <div class="col-lg-3">Nombre</div>
                                <div class="col-lg-3">Tipo</div>
                                <div class="col-lg-3">Valor $ MXN</div>
                                <div class="col-lg-3">
                                </div>
                            </div>
                            <div class="row "> 
                                <div class="col-lg-12"></div>
                            </div> 
                            <div class="row"> 
                                <div class="col-lg-4">Estatus</div>
                                <div class="col-lg-4">
                                    <input type="text" name="nombre" value="" placeholder="80%"/>
                                </div>
                                <div class="col-lg-4">
                                    <button type="button">Editar</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-lg-8"></div>
                                <div class="col-lg-4">
                                    <button type="button" name="guardar" onclick="" id="">Guardar</button>                        
                                </div>
                            </div>  
                        </div> 
                    </form>
                </div> 
            </div> 
        </div>
    </div> 
</div>















