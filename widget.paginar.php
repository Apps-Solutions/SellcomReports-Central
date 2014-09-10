<?php
if ( $total > $maxPage )
{
    print ("<div align='center'>" );
    print makeHTMLPaginarListado( $total, $maxPage, $terminamosconel, $page, $by, $orden, $tampag );
    ?>
    <br/>
    <form name='tamanopag'  action='' method='post'>
        <div class="row">
            <div class="col-xs-2 col-sm-4 col-md-<?php echo $celda1;?>"></div>
            <div class="col-xs-8 col-sm-4 col-md-<?php echo $celda2;?>">
                <div class="row">
                    <div class="col-xs-3 col-sm-4 col-md-3 text-right">Mostrar</div>
                    <div class="col-xs-6 col-sm-4 col-md-6">
                        <center>	
                            <select name='tam' onchange="document.paginar.tampag.value = this.value;
                                    document.paginar.submit();" class="select_general" style="height: 25px;">
                                <option value='10'<?php if ( $tampag == "10" ) print "selected=\"selected\" "; ?>>10</option>
                                <option value='25'<?php if ( $tampag == "25" ) print "selected=\"selected\" "; ?>>25</option>
                                <option value='50'<?php if ( $tampag == "50" ) print "selected=\"selected\" "; ?>>50</option>
                                <option value='100'<?php if ( $tampag == "100" ) print "selected=\"selected\" "; ?>>100</option>
                            </select>
                        </center>
                    </div>
                    <div class="col-xs-3 col-sm-4 col-md-3 text-left">Registros</div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-4 col-md-<?php echo $celda3;?>"></div>
        </div>
    </form>
    <?php
    print ("</div>" );
}
?>
