<!--MODAL AGREGAR-->
<div class="modal fade bs-otro-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <a href="javscript:void(0);" class="close" data-dismiss="modal" aria-hidden="true">
                    <img src="gfx/img/cerrar.png" width="20" height="20" alt="Cerrar" title="Cerrar" />
                </a> 
                <h4 class="modal-title" id="myModalLabel">Agregar Nuevos Datos</h4>
            </div>
            <form name="frmOtros" id="frmOtros">
                <div class="modal-body">
                    <div class="row margen_bottom_10">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <img src="gfx/img/linea_en_agregar.png"> &nbsp;Fecha
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                        <input type="text" class="textbox" name="fecha" value="" id="fecha" placeholder="Click Aqui"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5"></div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row margen_bottom_10">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <img src="gfx/img/linea_en_agregar.png"> &nbsp;Estatus
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo selectStatus("sel_deal_status", $value = '', $title = 'Selecciona un estatus', $extra = "class='select_general'"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <img src="gfx/img/linea_en_agregar.png" alt="Nombre" title="Nombre"> &nbsp;Nombre
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="txt_deal_nombre" id="nombre" value="" class="textbox"  placeholder="Escribe el Nombre" maxlength="255"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row margen_bottom_10">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <img src="gfx/img/linea_en_agregar.png" alt="Cliente" title="Cliente"> &nbsp;
                                    Cliente
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo selectCliente("sel_deal_cliente", $value = '', $title = '---- Cliente ----', $extra = "class='select_general'"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <img src="gfx/img/linea_en_agregar.png" alt="Tipo" title="Tipo"> &nbsp;Tipo
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo selectTipo("sel_deal_tipo", $tipo, $title = '----Tipo----', $extra = "class='select_general'"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row margen_bottom_10">
                        <div class="col-md-1"></div>

                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <img src="gfx/img/linea_en_agregar.png" alt="Sector" title="Sector"> &nbsp;Sector
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo selectSector("sel_deal_sector", $value = '', $title = '---- Sector ----', $extra = "class='select_general'"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <img src="gfx/img/linea_en_agregar.png" alt="Valor" title="Valor"> &nbsp;Valor
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="textbox" name="txt_deal_valor" id="valor_moneda" value="" placeholder="Valor" maxlength="10"/>
                                </div>
                                <div class="col-md-6">
                                    <?php echo selectTipoMoneda("sel_deal_moneda", $value = '', $title = '', $extra = "class='select_general'"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>                                    
                                        <button type="reset" name="cancelar" id="cancelar_cliente">Cancelar</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>  
                                        <button type="button" name="guardar" id="guarda_deal">Guardar</button> 
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>  
                </div> 
            </form>
        </div> 
    </div> 
</div>
<!--MODAL EDITAR-->
<div class="modal fade bs-ver-modal-lg" tabindex="-1" role="dialog"  aria-hidden="false" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <a href="javscript:void(0);" class="close" data-dismiss="modal" aria-hidden="true">
                    <img src="gfx/img/cerrar.png" width="20" height="20" alt="cerrar" title="Cerrar">
                </a> 
                <h4 class="modal-title" id="frmClienteSector-Modal">Cliente | Sector</h4>
            </div>
            <form name="frmClienteSector" id="frmClienteSector">
                <input type="hidden" name="id_deal" value="" />
                <div class="modal-body"> 
                    <div class="row "> 
                        <div class="col-md-12"></div>
                    </div> 
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12" style="font-size: 1.2em;">Fecha</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12 sec_cliente" style="font-size: 1.2em; display: none;">Estatus</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12" style="font-size: 1.2em">Valor $ MXN</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12 sec_cliente" style="font-size: 1.2em; display: none;">% Porcentaje</div>
                            </div>
                        </div>
                    </div>
                    <div class="row "> 
                        <div class="col-md-12"></div>
                    </div> 
                    <div class="row margen_bottom_5"> 
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                        <input type="text" class="textbox" name="fecha_s" value="" id="fecha_s" placeholder="Click Aqui"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12 sec_cliente" style="display: none;">
                                    <?php echo selectStatus("sel_deal_status_d", $value = '', $title = 'Selecciona un estatus', $extra = "class='select_general'"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12"><input type="text" class="textbox-finanzas" name="txt_estatus_edit_val" value="" placeholder="0" maxlength="15" required/></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12 sec_cliente" style="display: none;"><input type="text" class="textbox-finanzas" name="txt_estatus_edit" value="" placeholder="0%" maxlength="15" required/></div>
                            </div>
                        </div>
                    </div>

                    <div class="row "> 
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="edita_porcentaje">Editar</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="row">
                                <!--<div class="col-md-11"><button type="button" name="guardar" onclick="" id="">Guardar</button></div>
                                <div class="col-md-1"></div>-->
                            </div>
                        </div>
                    </div>  
                </div> 
            </form>
        </div> 
    </div> 
</div>
<!--MODAL CLIENTE-->
<div class="modal fade bs-nuevo-cliente-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <a href="javscript:void(0);" class="close" data-dismiss="modal" aria-hidden="true">
                    <img src="gfx/img/cerrar.png" width="20" height="20" alt="cerrar" title="Cerrar">
                </a> 
                <h4 class="modal-title" id="frmCliente-Modal">Agregar Nuevo Cliente</h4>
            </div>
            <form name="frmCliente" id="frmCliente">
                <div class="modal-body"> 
                    <div class="row "> 
                        <div class="col-md-12"></div>
                    </div> 
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4" style="font-size: 1.2em;">Empresa</div>
                                <div class="col-md-8">
                                    <input type="text" class="textbox" value="" name="txt_cliente" placeholder="Empresa" maxlength="255" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row "> 
                        <div class="col-md-12" style="margin-left: 50px;">
                            <h4>Datos de contacto</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4" style="font-size: 1.2em;">Nombre:</div>
                                <div class="col-md-8">
                                    <input type="text" class="textbox" value="" name="txt_nombre" placeholder="Nombre" maxlength="255" required/>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row "> 
                        <div class="col-md-12"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4" style="font-size: 1.2em;">Apellido(s):</div>
                                <div class="col-md-8">
                                    <input type="text" class="textbox" value="" name="txt_apellido" placeholder="Apellido(s)" maxlength="255" required/>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row "> 
                        <div class="col-md-12"></div>
                    </div> 
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4" style="font-size: 1.2em;">Email:</div>
                                <div class="col-md-8">
                                    <input type="email" class="textbox" value="" name="txt_email" placeholder="Email" maxlength="255" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row "> 
                        <div class="col-md-12"></div>
                    </div> 
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4" style="font-size: 1.2em;">Telefono:</div>
                                <div class="col-md-8">
                                    <input type="tel" class="textbox" value="" name="txt_telefono" placeholder="Teléfono" maxlength="12" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>                                    
                                        <button type="reset" name="cancelar" onclick="" id="cancelar_cliente">Cancelar</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>                                    
                                        <button type="button" name="guardar" onclick="" id="guarda_cliente">Guardar</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>  
                </div> 
            </form>
        </div> 
    </div> 
</div>