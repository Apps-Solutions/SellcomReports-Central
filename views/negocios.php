<?php
$page = isset($CONTEXT["page"]) ? Sanitizacion($CONTEXT["page"]) : "1";
$tampag = isset($CONTEXT["tampag"]) ? Sanitizacion($CONTEXT["tampag"]) : "10";
$orden = isset($CONTEXT["order"]) ? Sanitizacion($CONTEXT["order"]) : "DESC";
$by = isset($CONTEXT["por"]) ? Sanitizacion($CONTEXT["por"]) : "d.id";

$cliente = isset($CONTEXT["cliente"]) ? Sanitizacion($CONTEXT["cliente"]) : "";
$sector = isset($CONTEXT["sector"]) ? Sanitizacion($CONTEXT["sector"]) : "";
$tipo = isset($CONTEXT["tipo"]) ? Sanitizacion($CONTEXT["tipo"]) : "";
$nombre = isset($CONTEXT["nombre"]) ? Sanitizacion($CONTEXT["nombre"]) : "";


$result = $MyNegocio->get_Negocios($page,$tampag,$grupo = '',$by." ".$orden,$MySession->Id(),$cliente,$sector,$tipo,$nombre);

$total = $MyNegocio->getTotal();
$terminamosconel = $page * $tampag;
$maxPage = ceil($total / $tampag);
?>
<div class="row" style="margin-left: 1px; margin-right: 1px;">
     <div class="col-md-2">
          <div class="row">
               <div class="col-sm-12 col-md-12 bg_color_menu">
                    NEGOCIOS
               </div>
          </div>
     </div>
     <div class="col-md-10">
          <div class="row">
               <div class="col-md-12"></div>
          </div>
     </div>
</div>
<form id='paginar' name='paginar' method="GET" action="" onsubmit="this.page.value = '1';" >
     <input type="hidden" name="controller" id="controller" value="<?php print $MyIndex->Command();?>" />
     <input type="hidden" name="page" id="page" value="<?php print $page;?>" />
     <input type="hidden" name="por" id="por" value="<?php print $by;?>" />
     <input type="hidden" name="order" id="order" value="<?php print $orden;?>" />
     <input type="hidden" name="tampag" id="tampag" value="<?php print $tampag;?>" />
     <div class="row margen_negocio_dato" style="border-top-right-radius: 10px;">
          <div class="col-md-3">
               <div class="row">
                    <div class="col-md-12 margen_top_5" style="font-size: 1.4em; text-align: center;">Filtros</div>
               </div>
          </div>
          <div class="col-md-3">
               <div class="row">
                    <div class="col-md-12 margen_top_5">
                         <?php echo selectCliente("cliente",$cliente,$title = 'Cliente',$extra = "class='select_negocio'");?>
                    </div>
               </div>
          </div>
          <div class="col-md-3">
               <div class="row">
                    <div class="col-md-12 margen_top_5">
                         <?php echo selectSector("sector",$sector,$title = 'Sector',$extra = "class='select_negocio'");?>
                    </div>
               </div>
          </div>
          <div class="col-md-3">
               <div class="row">
                    <div class="col-md-12 margen_top_5">
                         <?php echo selectTipo("tipo",$tipo,$title = 'Tipo',$extra = "class='select_negocio'");?>
                    </div>
               </div>
          </div>
     </div>
     <div class="row margen_negocio_dato">
          <div class="col-md-3">
               <div class="row">
                    <div class="col-md-12 margen_top_5">                        
                         <input type="search" class="textbox" name="nombre" placeholder="Escribe y enter para buscar por Nombre" />
                    </div>
               </div>
          </div>
          <div class="col-md-3">
               <div class="row">
                    <div class="col-md-12 margen_top_5">
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
                    <div class="col-md-12 margen_top_5">
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
                    <div class="col-md-12 margen_top_5">
                         <button type="submit" name="buscar" style="background-color: #262626;">Buscar</button>
                    </div>
               </div>
          </div>
     </div>
</form>
<div class="row bgk_blanco_general" style="padding: 10px;">
     <table class="table table-striped">
          <thead>
               <?php echo makeHTMLOrder($orden,$by,'ds.name','Estatus',$page);?>
               <?php echo makeHTMLOrder($orden,$by,'cu.company_name','Cliente',$page);?>
               <?php echo makeHTMLOrder($orden,$by,'se.name','Sector',$page);?>
               <?php echo makeHTMLOrder($orden,$by,'d.deal_name','Nombre',$page);?>
               <?php echo makeHTMLOrder($orden,$by,'ti.name','Tipo',$page);?>
               <?php echo makeHTMLOrder($orden,$by,'dh.value','Valor',$page);?>
          <th>&nbsp;</th>
          </thead>
          <tbody>
               <?php
               if($total > 0):
                    while($fila = $MyNegocio->getRows()):
                         ?>
                         <tr>
                              <td><?php print $fila["deal_status"]." ".$fila["advance_percent"]." %";?></td>
                              <td><?php print $fila["cliente"];?></td>
                              <td><?php print $fila["sector"];?></td>
                              <td><?php print $fila["deal_name"];?></td>
                              <td><?php print $fila["tipo"];?></td>
                              <td><?php print $fila["value"];?></td>
                              <td><a href="javascript: void(0);" onclick="setPorcentaje(<?php echo $fila["id"];?>,<?php echo $fila["advance_percent"];?>,<?php echo $fila["id_deal_status"];?>,<?php echo $fila["value"];?>);" data-toggle='modal' data-target='.bs-ver-modal-lg'><img src="gfx/img/ver.png" width="23" height="23" alt="<?php echo $fila["deal_name"];?>" /></a></td>
                         </tr>
                         <?php
                    endwhile;
               else:
                    ?>
                    <tr>
                         <td colspan="6" class="text-danger text-center" style="font-size: 1.2em;">No se encontraron resultados con su busqueda</td>
                    </tr>
               <?php endif;?>
          </tbody>
     </table>
     <?php
     $celda1 = 5;
     $celda2 = 2;
     $celda3 = 5;

     include("widget.paginar.php");
     ?>
</div>
<?php include "widget.modals.negocios.php";?>
<script type="text/javascript">
     window.onload = function() {
          new JsDatePick({
               useMode: 2,
               isStripped: false,
               target: "fecha"
          });
          
          
          new JsDatePick({
               useMode: 2,
               isStripped: false,
               target: "fecha_s"
          });
     };
</script>