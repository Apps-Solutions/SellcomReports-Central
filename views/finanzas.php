<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="row" style="margin-left: 1px; margin-right: 1px;">

            <div class="col-xs-5 col-sm-4 col-md-2 bg_color_menu texto_21 padding_titulo_principal text-center">
                <div class="row">
                    <div class="col-md-12">FINANZAS</div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-2 bg_color_menu" style="margin-left: 10px; font-size: 14px; padding: 12px;">
                <div class="row">
                    <div class="col-md-12"> 
                        Agregar Otros Datos &nbsp;
                        <a href="#" data-toggle='modal' data-target='.bs-otros-datos-modal-lg'><img src="gfx/img/icono_mas.png"/></a>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-3 col-md-2 bg_color_menu" style="margin-left: 10px; font-size: 14px; padding: 12px;">
                <div class="row">
                    <div class="col-md-12"> 
                        Capturar KIPI'S &nbsp;
                        <a href="#" data-toggle='modal' data-target='.bs-otros-datos-modal-lg'><img src="gfx/img/icono_mas.png"/></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-1 col-sm-5 col-md-6">
                <div class="row">
                    <div class="col-md-12"></div>
                </div>
            </div>
        </div>

        <div class="row">


            <div class="col-xs-12 col-sm-12 col-md-12 bgk_blanco_general" style="padding: 20px;">

                <div class="row  padding_menu_10">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="row"><div class="col-md-12" style="font-size: 26px;">Empleado</div></div>
                    </div>
                    <div class="col-xs-3 col-sm-2 col-md-2">
                        <div class="row"><div class="col-md-12" style="font-size: 18px;">Cuentas por cobrar</div></div>
                    </div>
                    <div class="col-xs-3 col-sm-4 col-md-4">
                        <div class="row"><div class="col-md-12" style="font-size: 18px;">Remisiones pendientes de facturar</div></div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="row"><div class="col-md-12" style="font-size: 18px;">Ventas</div></div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1">
                        <div class="row"><div class="col-md-12"></div></div>
                    </div>
                </div>

                <form name="frmFinanzas" action="submit.finanzas.php" method="POST">
                    
                    <div class="row  padding_menu_10">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                   <!-- <select name="empleado" class="select_filtro_finanzas">
                                        <option value=""></option>
                                        <option value='empleado'>Empleado 1</option>
                                    </select>-->
                                    <?php
                                    echo selectEmpleado("empleado", $value='', $title='Empleado', $extra="class='select_filtro_finanzas'");
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-2 col-md-2">
                            <div class="row">
                                <div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma actual" /></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-4 col-md-4">
                            <div class="row">
                                <div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de 0 a 30" /></div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="row">
                                <div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="" /></div>
                            </div>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1"><div class="row"><div class="col-md-12"></div></div></div>
                    </div>


                    <div class="row  padding_menu_10">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    Tipo de Moneda:
                                </div>
                                <div class="col-md-6">
                                    <?php echo selectTipoMoneda("tipo_moneda", $value = '', $title = '', $extra = "class='select_filtro_finanzas'"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-3 col-sm-2 col-md-2">
                            <div class="row">
                                <div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de 1 a 30" /></div>
                            </div>
                        </div>

                        <div class="col-xs-3 col-sm-4 col-md-4">
                            <div class="row">
                                <div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de 31 a 60"/></div>
                            </div>
                        </div>

                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="row">
                                <div class="col-md-12" style="font-size: 18px;">Almacen de proyectos</div>
                            </div>
                        </div>

                        <div class="col-xs-1 col-sm-1 col-md-1"><div class="row"><div class="col-md-12"></div></div></div>
                    </div>


                    <div class="row  padding_menu_10">
                        <div class="col-xs-3 col-sm-3 col-md-3">FECHA</div>
                        <div class="col-xs-3 col-sm-2 col-md-2">
                            <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" id="suma" name="suma" value="" placeholder="Suma de 31 a 60" /></div></div>
                        </div>
                        <div class="col-xs-3 col-sm-4 col-md-4">
                            <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de 61 a 90" /></div></div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" /></div></div>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1">
                            <div class="row"><div class="col-md-12"></div></div>
                        </div>
                    </div>



                    <div class="row  padding_menu_10">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" id="fecha" name="fecha" value="" placeholder=""  style="width: 50%;"/></div></div>
                        </div>
                        <div class="col-xs-3 col-sm-2 col-md-2">
                            <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de 61 a 90" /></div></div>
                        </div>
                        <div class="col-xs-3 col-sm-4 col-md-4">
                            <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="Suma de Más de 90" /></div></div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="row"><div class="col-md-12" style="font-size: 18px;">Back Order</div></div>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1">
                            <div class="row"><div class="col-md-12"></div></div>
                        </div>
                    </div>


                    <div class="row  padding_menu_10">
                        <div class="col-xs-3 col-sm-3 col-md-3"><div class="row"><div class="col-md-12"></div></div></div>
                        <div class="col-xs-3 col-sm-2 col-md-2">
                            <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de Más de 90" /></div></div>
                        </div>
                        <div class="col-xs-3 col-sm-4 col-md-4">
                            <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de Total General" disabled="true"/></div></div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" /></div></div>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1"><div class="row"><div class="col-md-12"></div></div></div>
                    </div>


                    <div class="row  padding_menu_10">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="row">
                                <div class="col-md-12"></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-4 col-md-2">
                            <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de Total" disabled="true"/></div></div>
                        </div>
                        <div class="col-xs-3 col-sm-2 col-md-4"><div class="row"><div class="col-md-12"></div></div></div>
                        <div class="col-xs-2 col-sm-2 col-md-2"><div class="row"><div class="col-md-12"></div></div></div>
                        <div class="col-xs-1 col-sm-1 col-md-1"><div class="row"><div class="col-md-12"></div></div></div>
                    </div>

                    <div class="row ">
                        <div class="col-xs-12 col-sm-12 col-md-12"></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12"></div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3"></div>
                        <div class="col-xs-3 col-sm-3 col-md-3"></div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="row">
                                <div class="col-md-12"><button type="reset" name="cancelar">Cancelar</button></div>
                            </div>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="row">
                                <div class="col-md-12"><button type="submit" name="guardar">Guardar</button></div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>



        <div class="modal fade bs-otros-datos-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true">
                            <img src="gfx/img/cerrar.png" width="20" height="20" alt="Cerrar" title="Cerrar" />
                        </a>
                        <h4 class="modal-title" id="myModalLabel">Agregar</h4>
                    </div>
                    <form name="frmOtros" id="frmOtros">
                        <div class="modal-body">
                            <div class="row ">
                                <div class="col-md-12"></div>
                            </div>
                            <div class="row margen_bottom_10">
                                <div class="col-md-2"></div>
                                <div class="col-md-8"><div class="row"><div class="col-md-12">Otros Datos</div></div></div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row margen_bottom_10">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">                                    
                                            <?php echo selectTipoMoneda("tipo_moneda", $value = '', $title = '', $extra = "class='select_filtro_negocio'"); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                            <div class="row margen_bottom_10">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="row"><div class="col-md-12"><input type="text" name="txt_cobranza" class="textbox-finanzas" value="" placeholder="Cobranza Semanal"/></div></div>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                            <div class="row margen_bottom_10">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input type="text" name="txt_almacen" class="textbox-finanzas" value="" placeholder="Almacen Stock"/>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                            <div class="row margen_bottom_10">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input type="text" name="txt_embarcadero" class="textbox-finanzas" value="" placeholder="Embarcadero Semanal"/>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-2"></div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row"><div class="col-md-12"><button type="reset" name="cancel" onclick="" id="cancela_otros">Cancelar</button></div></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row"><div class="col-md-12"><button type="button" name="guardar" onclick="" id="guarda_otros">Guardar</button></div></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2"></div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function() {
        new JsDatePick({
            useMode: 2,
            isStripped: false,
            target: "fecha"
        });
    };
</script>