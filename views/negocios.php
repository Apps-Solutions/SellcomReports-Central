<?php
  $page = isset($CONTEXT["page"]) ? Sanitizacion($CONTEXT["page"]) : "1";
  $tampag = isset($CONTEXT["tampag"]) ? Sanitizacion($CONTEXT["tampag"]) : "10";
  $orden = isset($CONTEXT["order"]) ? Sanitizacion($CONTEXT["order"]) : "DESC";
  $by = isset($CONTEXT["por"]) ? Sanitizacion($CONTEXT["por"]) : "d.id";

  $cliente = isset($CONTEXT["cliente"]) ? Sanitizacion($CONTEXT["cliente"]) : "";
  $sector = isset($CONTEXT["sector"]) ? Sanitizacion($CONTEXT["sector"]) : "";
  $tipo = isset($CONTEXT["tipo"]) ? Sanitizacion($CONTEXT["tipo"]) : "";
  $nombre = isset($CONTEXT["nombre"]) ? Sanitizacion($CONTEXT["nombre"]) : "";


  $result = $MyNegocio->get_Negocios($page, $tampag, $grupo = '', $by . " " . $orden, $MySession->Id(), $cliente, $sector, $tipo, $nombre);

  $total = $MyNegocio->getTotal();
  $terminamosconel = $page * $tampag;
  $maxPage = ceil($total / $tampag);
?>
<div class="row">
    <div class="col-md-12">
        <div class="row" style="margin-left: 1px;">

            <div class="col-md-2 bg_color_menu texto_21 padding_titulo_principal text-center">
                <div class="row">
                    <div class="col-md-12">NEGOCIOS</div>
                </div>
            </div>
            <div class="col-md-10">
            </div>
        </div>

        <form id='paginar' name='paginar' method="GET" action="" onsubmit="this.page.value = '1';" >
            <input type="hidden" name="command" id="command" value="<?php print $MyIndex->MyCommand(); ?>" />
            <input type="hidden" name="page" id="page" value="<?php print $page; ?>" />
            <input type="hidden" name="por" id="por" value="<?php print $by; ?>" />
            <input type="hidden" name="order" id="order" value="<?php print $orden; ?>" />
            <input type="hidden" name="tampag" id="tampag" value="<?php print $tampag; ?>" />

            <div class="row  padding_titulo_principal" style="background-color: #34b05f; color:#fff; margin-left: 1px; margin-right: 1px; border-top-right-radius: 10px;">

                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 text-center texto_21">Filtros</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo selectCliente("cliente", $cliente, $title = 'Cliente', $extra = "class='select_filtro'"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo selectSector("sector", $sector, $title = 'Sector', $extra = "class='select_filtro'"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <select name="tipo" class="select_filtro">
                                <option value="">Tipo</option>
                                <option value='PSG'>PSG</option>
                                <option value='EB'>EB</option>
                                <option value='IPG'>IPG</option>
                                <option value='SAMNSUNG'>SAMNSUNG</option>
                                <option value='APPLE'>APPLE</option>
                                <option value='OTROS'>OTROS</option>
                                <option value='SERVICIOS'>SERVICIOS</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row padding_titulo_principal" style=" background-color: #34b05f; color:#fff;margin-left: 1px; margin-right: 1px;">


                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">                        
                            <input type="search" class="textbox-finanzas" name="nombre" placeholder="Escribe y enter para buscar por Nombre" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" data-toggle='modal' data-target='.bs-otro-modal-lg'>
                                <img src="gfx/img/icono_mas.png"/>
                            </a>
                            &nbsp;
                            <span>Agregar nuevos datos</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 ">
                            <a href="#" data-toggle='modal' data-target='.bs-nuevo-cliente-modal-lg'>
                                <img src="gfx/img/icono_mas.png" alt="Nuevo cliente" title="Nuevo cliente"/>
                            </a>
                            &nbsp;
                            <span>Agregar nuevo cliente</span> 
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" name="buscar" style="background-color: #262626;">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 bgk_blanco_general" style="padding: 20px;">
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
                        <?php
                          if ($total > 0):
                              while ($fila = $MyNegocio->getRows()):
                                  ?>
                                  <tr>
                                      <td><?php print $fila["deal_status"]; ?></td>
                                      <td><?php print $fila["cliente"]; ?></td>
                                      <td><?php print $fila["sector"]; ?></td>
                                      <td><?php print $fila["deal_name"]; ?></td>
                                      <td><?php print "PSG"; ?></td>
                                      <td><?php print $fila["value"]; ?></td>
                                      <td><a href="#" data-toggle='modal' data-target='.bs-ver-modal-lg'><img src="gfx/img/ver.png" width="30" height="30"></a></td>
                                  </tr>
                                  <?php
                              endwhile;
                          else:
                              ?>
                              <tr>
                                  <td colspan="6" class="text-danger">No se encontraron registros</td>
                              </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php
                  include("widget.paginar.php");
                ?>
            </div>
        </div>
        <?php include "widget.modals.negocios.php"; ?>
    </div> 
</div>