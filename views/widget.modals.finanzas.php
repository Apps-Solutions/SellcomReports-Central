
<div class="modal fade bs-otros-datos-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
                         <div class="row margen_bottom_5">
                              <div class="col-md-2"></div>
                              <div class="col-md-8"><div class="row"><div class="col-md-12" style="font-size: 1.2em;">Otros Datos</div></div></div>
                              <div class="col-md-2"></div>
                         </div>
                         <div class="row margen_bottom_5">
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                   <div class="row">
                                        <div class="col-md-12">                                    
                                             <?php echo selectTipoMoneda("tipo_moneda",$value = '',$title = '',$extra = "class='select_general'");?>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-2">
                              </div>
                         </div>
                         <div class="row margen_bottom_5">
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                   <div class="row"><div class="col-md-12"><input type="text" name="txt_cobranza" class="textbox-finanzas" value="" placeholder="Cobranza Semanal"/></div></div>
                              </div>
                              <div class="col-md-2">
                              </div>
                         </div>
                         <div class="row margen_bottom_5">
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                   <input type="text" name="txt_almacen" class="textbox-finanzas" value="" placeholder="Almacen Stock"/>
                              </div>
                              <div class="col-md-2">
                              </div>
                         </div>
                         <div class="row margen_bottom_5">
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                   <input type="text" name="txt_embarcadero" class="textbox-finanzas" value="" placeholder="Embarcadero Semanal"/>
                              </div>
                              <div class="col-md-2">
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-2"></div>
                              <div class="col-md-8"><small>*Selecciona una fecha en el calendario</small></div>
                              <div class="col-md-2"></div>
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


<div class="modal fade bs-captura-kpi-datos-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
     <div class="modal-dialog modal-md">
          <div class="modal-content">
               <div class="modal-header">
                    <a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true">
                         <img src="gfx/img/cerrar.png" width="20" height="20" alt="Cerrar" title="Cerrar" />
                    </a>
                    <h4 class="modal-title" id="myModalLabel">Captura KPI'S</h4>
               </div>
               <form name="frmKpis" id="frmKpis">
                    <div class="modal-body">
                         <div class="row ">
                              <div class="col-md-12"></div>
                         </div>
                         <div class="row margen_bottom_5">
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                   <div class="row">
                                        <div class="col-md-12">
                                             <?php echo selectTipoMoneda("tipo_moneda_k",$value = '',$title = '',$extra = "class='select_general'");?>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-2"></div>
                         </div>
                         <div class="row margen_bottom_5">
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                   <div class="row">
                                        <div class="col-md-12"> 
                                             <?php echo selectCliente("sel_cliente_k",$value = '',$title = 'Cliente',$extra = "class='select_general'");?>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-2">
                              </div>
                         </div>
                         <div class="row margen_bottom_5">
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                   <div class="row">
                                        <div class="col-md-12"> 
                                             <?php
                                             echo selectEmpleado("sel_empleado_k",$value = '',$title = 'Empleado',$extra = "class='select_general'");
                                             ?>                                
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-2">
                              </div>
                         </div>
                        <!-- <div class="row margen_bottom_5">
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                   <input type="text" name="txt_status" class="textbox-finanzas" value="" placeholder="Estatus"/>
                              </div>
                              <div class="col-md-2">
                              </div>
                         </div>-->
                         <div class="row margen_bottom_5">
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                   <input type="text" name="txt_valor" class="textbox-finanzas" value="" placeholder="Valor"/>
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
                                             <div class="row"><div class="col-md-12"><button type="reset" name="cancel" onclick="" id="cancela_kpi">Cancelar</button></div></div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="row"><div class="col-md-12"><button type="button" name="guardar" onclick="" id="guarda_kpi">Guardar</button></div></div>
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