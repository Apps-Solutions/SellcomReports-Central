<div class="col-lg-12 margen_top_20">


    <div class="row" style="margin-left: 2px;">
        <div class="col-lg-2 bg_color_menu padding_menu_10 texto_titulo_seccion text-center">NEGOCIOS</div>
        <div class="col-lg-1"></div>

        <div class="col-lg-9 bg_color_menu padding_menu_10">

            <div class="col-lg-1">Filtros</div>
            <div class="col-lg-2 ">
                <select name="cliente" class="select_filtro">
                    <option value="">Cliente</option>
                    <option value='Cliente1'>Cliente1</option>
                </select>
            </div>
            <div class="col-lg-2 ">
                <select name="sector" class="select_filtro">
                    <option value="">Sector</option>
                    <option value='Sector1'>Sector 1</option>
                </select>
            </div>
            <div class="col-lg-2 ">
                <select name="tipo" class="select_filtro">
                    <option value="">Tipo</option>
                    <option value='Tipo'>Tipo 1</option>
                </select>
            </div>
            <div class="col-lg-3 ">
                <input type="search" name="buscar" placeholder="Buscar Nombre" />
            </div>
            <div class="col-lg-2">
                <span>Agregar</span>
                <a href="#" data-toggle='modal' data-target='.bs-otro-modal-lg'>
                    <img src="gfx/img/icono_mas.png"/>
                </a>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-12 bgk_blanco_general" style="padding: 20px;">


    <div class="row bgk_menu_lista">
        <div class="col-lg-2">Estatus</div>
        <div class="col-lg-2">Cliente</div>
        <div class="col-lg-1">Sector</div>
        <div class="col-lg-2">Nombre</div>
        <div class="col-lg-1">Tipo</div>
        <div class="col-lg-2">Valor</div>
        <div class="col-lg-2"></div>
    </div>

    <div class="row bgk_color_blanco">
        <div class="col-lg-2">80%</div>
        <div class="col-lg-2">Empresa</div>
        <div class="col-lg-1">Giro</div>
        <div class="col-lg-2">Proyecto</div>
        <div class="col-lg-1">Tipo</div>
        <div class="col-lg-2">Cantidad $ MX</div>
        <div class="col-lg-2"><a href="#" data-toggle='modal' data-target='.bs-ver-modal-lg'><img src="gfx/img/icono_arriba.png"></a></div>
    </div>
    <div class="row bgk_color_blanco">
        <div class="col-lg-2">80%</div>
        <div class="col-lg-2">Empresa</div>
        <div class="col-lg-1">Giro</div>
        <div class="col-lg-2">Proyecto</div>
        <div class="col-lg-1">Tipo</div>
        <div class="col-lg-2">Cantidad $ MX</div>
        <div class="col-lg-2"><a href="#" data-toggle='modal' data-target='.bs-ver-modal-lg'><img src="gfx/img/icono_arriba.png"></a></div>
    </div> <div class="row bgk_color_blanco">
        <div class="col-lg-2">80%</div>
        <div class="col-lg-2">Empresa</div>
        <div class="col-lg-1">Giro</div>
        <div class="col-lg-2">Proyecto</div>
        <div class="col-lg-1">Tipo</div>
        <div class="col-lg-2">Cantidad $ MX</div>
        <div class="col-lg-2"><a href="#" data-toggle='modal' data-target='.bs-ver-modal-lg'><img src="gfx/img/icono_arriba.png"></a></div>
    </div> <div class="row bgk_color_blanco">
        <div class="col-lg-2">80%</div>
        <div class="col-lg-2">Empresa</div>
        <div class="col-lg-1">Giro</div>
        <div class="col-lg-2">Proyecto</div>
        <div class="col-lg-1">Tipo</div>
        <div class="col-lg-2">Cantidad $ MX</div>
        <div class="col-lg-2"><a href="#" data-toggle='modal' data-target='.bs-ver-modal-lg'><img src="gfx/img/icono_arriba.png"></a></div>
    </div>
</div>


<!--MODAL AGREGAR-->
<div class="modal fade bs-otro-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md"> 
        <div class="modal-content"> 
            <div class="modal-header text_blanco_2 fondoo_azul_total_poppus"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                <h4 class="modal-title color_azul" id="myModalLabel">Agregar</h4>
            </div>

            <form name="frmDomicilio" id="frmDomicilio">


                <div class="modal-body"> 
                    <div class="row "> 
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">Estatus</div>
                        <div class="col-lg-4">Nombre</div>
                        <div class="col-lg-2"></div>
                    </div>  
                    <div class="row"> 
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <select name="sector" class="select_filtro">
                                <option value="">Sector</option>
                                <option value='Sector1'>Sector 1</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="nombre" value="" placeholder="Nombre"/>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>     



                    <div class="row "> 
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">Cliente</div>
                        <div class="col-lg-4">Tipo</div>
                        <div class="col-lg-2"></div>
                    </div>  
                    <div class="row"> 
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <input type="text" name="nombre" value="" placeholder="Nombre"/>

                        </div>
                        <div class="col-lg-4">
                            <select name="sector" class="select_filtro">
                                <option value="">Sector</option>
                                <option value='Sector1'>Sector 1</option>
                            </select>
                        </div>
                        <div class="col-lg-2"></div>
                    </div> 


                    <div class="row "> 
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">Sector</div>
                        <div class="col-lg-4">Valor</div>
                        <div class="col-lg-2"></div>
                    </div>

                    <div class="row"> 
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <select name="sector" class="select_filtro">
                                <option value="">Sector</option>
                                <option value='Sector1'>Sector 1</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="nombre" value="" placeholder="Nombre"/>
                        </div>
                        <div class="col-lg-2"></div>
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


<!--MODAL EDITAR-->

<div class="modal fade bs-ver-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md"> 
        <div class="modal-content"> 
            <div class="modal-header text_blanco_2 fondoo_azul_total_poppus"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                <h4 class="modal-title color_azul" id="myModalLabel">Cliente | Sector</h4>
            </div>

            <form name="frmDomicilio" id="frmDomicilio">

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
