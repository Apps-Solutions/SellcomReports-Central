<?php
  if ($total > $maxPage)
  {
      print ("<div align='center'>");
      print makeHTMLPaginarListado($total, $maxPage, $terminamosconel, $page, $by, $orden, $tampag);
      ?>
      <br/>
      <form name='tamanopag'  action='' method='post'>
          <div class="row">
              <div class="col-md-5"></div>
              <div class="col-md-2">
                  <div class="row">
                      <div class="col-md-3"><span class=' '>Mostrar</span></div>
                      <div class="col-md-6">
                          <center>	
                              <select name='tam' onchange="document.paginar.tampag.value = this.value;
                                      document.paginar.submit();" class="select_filtro" style="">
                                  <option value='10'<?php if ($tampag == "10") print "selected=\"selected\" "; ?>>10</option>
                                  <option value='25'<?php if ($tampag == "25") print "selected=\"selected\" "; ?>>25</option>
                                  <option value='50'<?php if ($tampag == "50") print "selected=\"selected\" "; ?>>50</option>
                                  <option value='100'<?php if ($tampag == "100") print "selected=\"selected\" "; ?>>100</option>
                              </select>
                          </center>
                      </div>
                      <div class="col-md-3"><span class=''>Registros</span></div>
                  </div>
              </div>
              <div class="col-md-5"></div>
          </div>
      </form>
      <?php
      print ("</div>");
  }
?>
