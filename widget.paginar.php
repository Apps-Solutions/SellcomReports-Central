<?php
if ($total > $maxPage) 
{
    print ("<div align='center'>");
    print makeHTMLPaginarListado($total, $maxPage, $terminamosconel, $page, $by, $orden, $tampag);
    ?>
    <br />
    <form name='tamanopag'  action='' method='post'>
        <div class="row  pading_top_5">
            <div class="col-xs-4 col-sm-5 col-md-5 col-lg-4"></div>
            <div class="col-xs-4 col-sm-2 col-md-2 col-lg-4">
                <div class="row">
                    <div class="col-lg-4 quitar_pading_derecha"><span class='datos-mostrar color_azul flotar_derecha '>Mostrar</span></div>
                    <div class="col-lg-4">
                        <div class="conte_select flotar_izuierda">	
                            <select name='tam' onchange="document.paginar.tampag.value = this.value;
                                    document.paginar.submit();" class="datos-mostrar class_select_pagina ">
                                <option value='10'<?php if ($tampag == "10") print "selected=\"selected\" "; ?>>10</option>
                                <option value='25'<?php if ($tampag == "25") print "selected=\"selected\" "; ?>>25</option>
                                <option value='50'<?php if ($tampag == "50") print "selected=\"selected\" "; ?>>50</option>
                                <option value='100'<?php if ($tampag == "100") print "selected=\"selected\" "; ?>>100</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 quitar_pading_izquierda"><span class='datos-mostrar color_azul flotar_izquierda'>Registros</span></div>
                </div>
            </div>
            <div class="col-xs-4 col-sm-5 col-md-5 col-lg-4"></div>
        </div>
    </form>
    <?php
    print ("</div>");
}
?>
