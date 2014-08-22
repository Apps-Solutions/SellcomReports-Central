<nav class="navbar navbar-default">
    <div class="navbar-header">
        <?php if ($MySession->LoggedIn()): ?>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only" >Cambiar Navegacion</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
          <?php endif; ?>
        <img src="gfx/img/sellcom80.png"  title="SELLCOM" alt="SELLCOM" class="img_main"/>
    </div>

    <?php if ($MySession->LoggedIn()): ?>
          <div class="collapse navbar-collapse navbar-ex1-collapse" style="margin-top: 50px; margin-left: 80px;">
              <div class="container">
                  <ul class="nav navbar-nav navbar-left texto_22">
                      <li> 
                          <a href="index.php?command=<?php echo NEGOCIOS; ?>">
                              <?php if ($MyIndex->MyCommand() == NEGOCIOS): ?> <img src="gfx/img/linea_en_barra.png">&nbsp;<?php endif; ?>NEGOCIOS
                          </a>
                      </li>
                      <li> 
                          <a href="index.php?command=<?php echo KPIS; ?>">
                              <?php if ($MyIndex->MyCommand() == KPIS): ?><img src="gfx/img/linea_en_barra.png">&nbsp;<?php endif; ?>KPI'S
                          </a>
                      </li>
                      <li>
                          <a href="index.php?command=<?php echo FINANZAS; ?>">
                              <?php if ($MyIndex->MyCommand() == FINANZAS): ?><img src="gfx/img/linea_en_barra.png">&nbsp;<?php endif; ?>FINANZAS
                          </a>
                      </li>
                      <li>
                          <a href="index.php?command=<?php echo REPORTES; ?>">
                              <?php if (in_array($MyIndex->MyCommand(),array(REPORTES,REPORTES_GRAFICAS,REPORTES_KPIS))): ?><img src="gfx/img/linea_en_barra.png">&nbsp;<?php endif; ?>REPORTES
                          </a>
                      </li>
                      <!--<li>
                          <a href="index.php?command=<?php echo TESTER; ?>">TEST</a>
                      </li>-->
                  </ul>
                  <p class="navbar-text navbar-right"><b>Bienvenido:</b> <?php echo $MySession->Name(); ?>
                      <a href="logout.php" class="navbar-link">
                          <img src="gfx/img/icono_salir.png" width="18" height="18" alt="cerrar session" title="salir" />
                      </a>
                  </p>
              </div>
          </div>
      <?php endif; ?>
</nav>