<?php
  require 'init.php';

  $command = isset($_POST['command']) ? $_POST['command'] : $_GET['command'];
  $MyIndex->Logic($command);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reportes SELLCOM</title>

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">

        <script src="jquery/jquery-1.11.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="row">
            <div class="col-lg-12" style="background-color: #d5d5d5;">

                <div class="col-lg-2">
                    <img src="gfx/img/sellcom.gif" width="60" height="60" title="SELLCOM" alt="SELLCOM" class="img_main"/>
                </div>

                <?php if ($MySession->LoggedIn()): ?>
                      <div class="col-lg-7">
                          <div class="row"><div class="col-lg-12 height_main">&nbsp;</div></div>
                          <div class="row">
                              <div class="col-lg-2 margen_bottom_5"><a href="index.php?command=<?php echo NEGOCIOS; ?>">NEGOCIOS</a></div>
                              <div class="col-lg-2 margen_bottom_5"><a href="index.php?command=<?php echo KPIS; ?>">KPI'S</a></div>
                              <div class="col-lg-2 margen_bottom_5"><a href="index.php?command=<?php echo FINANZAS; ?>">FINANZAS</a></div>
                              <div class="col-lg-2 margen_bottom_5"><a href="index.php?command=<?php echo REPORTES;?>">REPORTES</a></div>
                          </div>
                      </div>

                      <div class="col-lg-3">
                          <div class="row"><div class="col-lg-12 height_main">&nbsp;</div></div>
                          <div class="row">
                                  <div class="col-lg-7 margen_bottom_5"><?php echo $MySession->Name(); ?></div>
                                  <div class="col-lg-5 margen_bottom_5">
                                      Salir &nbsp;&nbsp;
                                      <a href="logout.php">
                                          <img src="gfx/img/icono_salir.png" width="25" height="25" alt="cerrar session" title="salir" />
                                      </a>
                                  </div>
                          </div>
                      </div>
                  <?php endif; ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <section>
                    <?php
                      include_once 'getcookiedata.php';
                      include_once $MyIndex->MyPHPFile();
                      $MyDebug->Dump();
                    ?>
                </section>
            </div>
            <div class="row">
                &nbsp;
            </div>
        </div>
    </body>
</html>