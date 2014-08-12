<div class="col-lg-12 margen_top_20">

    <div class="row" style="margin-left: 2px;">
        <div class="col-lg-2 bg_color_menu padding_menu_10 texto_titulo_seccion text-center" style="margin-right: 15px;">FINANZAS</div>
        <div class="col-lg-2 bg_color_menu padding_menu_10 texto_titulo_seccion_finanzas">Agregar Otros Datos 
            <a href="#" data-toggle='modal' data-target='.bs-domicilio-modal-lg'>
                <img src="gfx/img/icono_mas.png"/>
            </a>
        </div>
    </div>
    
</div>

<div class="col-lg-12 bgk_blanco_general" style="padding: 20px;">

    <div class="row  padding_menu_10" style="border-top-left-radius: 10px ;border-top-right-radius: 10px;">
        <div class="col-lg-3">EMPLEADO</div>
        <div class="col-lg-2">Cuentas por cobrar</div>
        <div class="col-lg-2">Remisiones pendientes de facturar</div>
        <div class="col-lg-2">Ventas</div>
        <div class="col-lg-3"></div>
    </div>

    <div class="row  padding_menu_10">
        <div class="col-lg-3">  
            <select name="empleado" class="select_filtro_finanzas">
                <option value=""></option>
                <option value='empleado'>Empleado 1</option>
            </select>
        </div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma actual" /></div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de 0 a 30" /></div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="" /></div>
        <div class="col-lg-3"></div>
    </div>


    <div class="row  padding_menu_10">
        <div class="col-lg-3">&nbsp;</div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de 1 a 30" /></div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de 31 a 60"/></div>
        <div class="col-lg-2">Almacen de proyectos</div>
        <div class="col-lg-3"></div>
    </div>


    <div class="row  padding_menu_10">
        <div class="col-lg-3">FECHA</div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de 31 a 60" /></div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de 61 a 90" /></div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" /></div>
        <div class="col-lg-3"></div>
    </div>

    <div class="row  padding_menu_10">
        <div class="col-lg-3"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="" /></div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de 61 a 90" /></div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="Suma de Más de 90" /></div>
        <div class="col-lg-2">Back Order</div>
        <div class="col-lg-3"></div>
    </div>


    <div class="row  padding_menu_10">
        <div class="col-lg-3"></div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de Más de 90" /></div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de Total General" /></div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" /></div>
        <div class="col-lg-3"></div>
    </div>

    <div class="row  padding_menu_10">
        <div class="col-lg-3"></div>
        <div class="col-lg-2"><input type="text" class="textbox-finanzas" name="suma" value="" placeholder="Suma de Total"/></div>
        <div class="col-lg-2"></div>
        <div class="col-lg-2"></div>
        <div class="col-lg-3"></div>
    </div>

    <div class="row ">
        <div class="col-lg-12"></div>
    </div>
    <div class="row">
        <div class="col-lg-12"></div>
    </div>
    <div class="row" style=" border-bottom-left-radius: 10px; ;border-bottom-right-radius: 10px;">
        <div class="col-lg-3"></div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3"><button type="submit" name="guardar">Guardar</button></div>
    </div>


</div>


<div class="modal fade bs-domicilio-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md"> 
        <div class="modal-content"> 
            <div class="modal-header text_blanco_2 fondoo_azul_total_poppus"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                <h4 class="modal-title color_azul" id="myModalLabel">Agregar</h4>
            </div>

            <form name="frmOtros" id="frmOtros">

                <div class="modal-body"> 
                    <div class="row "> 
                        <div class="col-lg-12"></div>
                    </div> 
                    <div class="row margen_bottom_10">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">Otros Datos</div>
                        <div class="col-lg-4"></div>
                    </div>

                    <div class="row margen_bottom_10"> 
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <input type="text" name="cobranza" class="textbox-finanzas" value="" placeholder="Cobranza Semanal"/>
                        </div>
                        <div class="col-lg-4">
                        </div>
                    </div>

                    <div class="row margen_bottom_10"> 
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <input type="text" name="almacen" class="textbox-finanzas" value="" placeholder="Almacen Stock"/>
                        </div>
                        <div class="col-lg-4">
                        </div>
                    </div>
                    <div class="row margen_bottom_10"> 
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <input type="text" name="embarcadero" class="textbox-finanzas" value="" placeholder="Embarcadero Semanal"/>
                        </div>
                        <div class="col-lg-4">
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
