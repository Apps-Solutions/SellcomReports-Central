
<div class="row" style="margin-left: 1px; margin-right: 1px;">

    <div class="col-md-2 bg_color_menu">
        <div class="row">
            <div class="col-md-12">
                FINANZAS
            </div>
        </div>
    </div>

    <div class="col-md-2" style="margin-left: 10px; margin-right: 1px;">
        <div class="row">
            <div class="col-md-12 bg_color_menu" style="font-size: 1.1em;"> 
                <span>Agregar Otros Datos</span> &nbsp;
                <a href="#" data-toggle='modal' data-target='.bs-otros-datos-modal-lg'><img src="gfx/img/icono_mas.png"/></a>
            </div>
        </div>
    </div>

    <div class="col-md-2" style="margin-left: 10px; margin-right: 1px;">
        <div class="row">
            <div class="col-md-12 bg_color_menu" style="font-size: 1.1em;"> 
                <span>Capturar KIPI'S</span> &nbsp;
                <a href="#" data-toggle='modal' data-target='.bs-captura-kpi-datos-modal-lg'><img src="gfx/img/icono_mas.png"/></a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12"></div>
        </div>
    </div>
</div>


<div class="row bgk_blanco_general" style="padding: 10px;">


    <div class="row  margen_bottom_10">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="row"><div class="col-md-12" style="font-size: 1.5em;">Empleado</div></div>
        </div>
        <div class="col-xs-3 col-sm-2 col-md-2">
            <div class="row"><div class="col-md-12" style="font-size: 1.2em;">Cuentas por cobrar</div></div>
        </div>
        <div class="col-xs-3 col-sm-4 col-md-4">
            <div class="row"><div class="col-md-12" style="font-size: 1.2em;">Remisiones pendientes de facturar</div></div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="row"><div class="col-md-12" style="font-size: 1.2em;">Ventas</div></div>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1">
            <div class="row"><div class="col-md-12"></div></div>
        </div>
    </div>
    <?php
      $_cuentas = isset($FORM["cuentas"]) ? $FORM["cuentas"] : "";
      $_remision = isset($FORM["remision"]) ? $FORM["remision"] : "";
      $_ventas = isset($FORM["ventas"]) ? Sanitizacion($FORM["ventas"]) : "";
      $_stock = isset($FORM["stock"]) ? Sanitizacion($FORM["stock"]) : "";
      $_back = isset($FORM["back_order"]) ? Sanitizacion($FORM["back_order"]) : "";
      $_empleado = isset($FORM["sel_empleado"]) ? Sanitizacion($FORM["sel_empleado"]) : "";
    ?>
    <form name="frmFinanzas" action="<?php echo DIRECTORY_VIEWS; ?>submit.finanzas.php" method="POST">
        <div class="row  margen_bottom_10">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                          echo selectEmpleado("sel_empleado", $_empleado, $title = 'Empleado', $extra = "class='select_general'");
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2">
                <div class="row">
                    <div class="col-md-12"><input type="text" class="textbox-finanzas" name="cuentas[]" id="cuenta1" value="<?php print $_cuentas[0]; ?>" placeholder="Suma actual" /></div>
                </div>
            </div>
            <div class="col-xs-3 col-sm-4 col-md-4">
                <div class="row">
                    <div class="col-md-12"><input type="text" class="textbox-finanzas" name="remision[]" id="remision1" value="<?php print $_remision[0]; ?>" placeholder="Suma de 0 a 30" /></div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="row">
                    <div class="col-md-12"><input type="text" class="textbox-finanzas" name="ventas" value="<?php print $_ventas; ?>" placeholder="Ventas" /></div>
                </div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1"><div class="row"><div class="col-md-12"></div></div></div>
        </div>

        <div class="row  margen_bottom_10">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="row">
                    <div class="col-md-6" style="font-size: 1.2em;">
                        Tipo de Moneda:
                    </div>
                    <div class="col-md-6">
                        <?php echo selectTipoMoneda("tipo_moneda", $value = '', $title = '', $extra = "class='select_general'"); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2">
                <div class="row">
                    <div class="col-md-12"><input type="text" class="textbox-finanzas" name="cuentas[]" id="cuenta2" value="<?php print $_cuentas[1]; ?>" placeholder="Suma de 1 a 30" /></div>
                </div>
            </div>
            <div class="col-xs-3 col-sm-4 col-md-4">
                <div class="row">
                    <div class="col-md-12"><input type="text" class="textbox-finanzas" name="remision[]" id="remision2" value="<?php print $_remision[1]; ?>" placeholder="Suma de 31 a 60"/></div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-3">
                <div class="row">
                    <div class="col-md-12" style="font-size: 1.2em;">Almacen de proyectos</div>
                </div>
            </div>
        </div>


        <div class="row margen_bottom_10 ">
            <div class="col-xs-3 col-sm-3 col-md-3" style="font-size: 1.5em;">Fecha</div>
            <div class="col-xs-3 col-sm-2 col-md-2">
                <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="cuentas[]" id="cuenta3" value="<?php print $_cuentas[2]; ?>" placeholder="Suma de 31 a 60" /></div></div>
            </div>
            <div class="col-xs-3 col-sm-4 col-md-4">
                <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="remision[]" id="remision3" value="<?php print $_remision[2]; ?>" placeholder="Suma de 61 a 90" /></div></div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="stock" value="<?php print $_stock; ?>" placeholder="Stock" /></div></div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1">
                <div class="row"><div class="col-md-12"></div></div>
            </div>
        </div>

        <div class="row  margen_bottom_10">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="textbox-finanzas" id="fecha" name="fecha" value="" placeholder=""/>
                    </div>
                    <div class="col-md-6"><button name="btn_consulta" id="btn_consulta" type="button">Consultar</button></div>
                </div>
            </div>
            <div class="col-xs-3 col-sm-2 col-md-2">
                <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="cuentas[]" id="cuenta4" value="<?php print $_cuentas[3]; ?>" placeholder="Suma de 61 a 90" /></div></div>
            </div>
            <div class="col-xs-3 col-sm-4 col-md-4">
                <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="remision[]" id="remision4" value="<?php print $_remision[3]; ?>" placeholder="Suma de Más de 90" /></div></div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="row"><div class="col-md-12" style="font-size: 1.2em;">Back Order</div></div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1">
                <div class="row"><div class="col-md-12"></div></div>
            </div>
        </div>

        <div class="row  margen_bottom_10">
            <div class="col-xs-3 col-sm-3 col-md-3"><div class="row"><div class="col-md-12"></div></div></div>
            <div class="col-xs-3 col-sm-2 col-md-2">
                <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="cuentas[]" id="cuenta5" value="<?php print $_cuentas[4]; ?>" placeholder="Suma de Más de 90" /></div></div>
            </div>
            <div class="col-xs-3 col-sm-4 col-md-4">
                <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="rm_suma_total" value="" placeholder="Suma de Total General" disabled="true"/></div></div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="back_order" value="<?php print $_back; ?>" placeholder="Back Order"/></div></div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1"><div class="row"><div class="col-md-12"></div></div></div>
        </div>

        <div class="row  margen_bottom_10">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="row">
                    <div class="col-md-12"></div>
                </div>
            </div>
            <div class="col-xs-3 col-sm-4 col-md-2">
                <div class="row"><div class="col-md-12"><input type="text" class="textbox-finanzas" name="cte_suma_total" value="" placeholder="Suma de Total" disabled="true"/></div></div>
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
                    <div class="col-md-12"><button type="submit" name="update">Registrar</button></div>
                </div>
            </div>
        </div>

    </form>
</div>
<?php include "widget.modals.finanzas.php"; ?>
<script type="text/javascript">
    window.onload = function() {
        new JsDatePick({
            useMode: 2,
            isStripped: false,
            target: "fecha"
        });
    };
</script>