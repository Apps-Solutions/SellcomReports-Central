<?php
  require 'init.php';
  $command = isset($_POST['controller']) ? $_POST['controller'] : $_GET['controller'];
  $MyIndex->Logic($command);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reportes KPI'S SELLCOM</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">
        <script src="jquery/jquery-1.11.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link href="jquery/calendario/css/jsDatePick_ltr.min.css" rel="stylesheet">

        <script src='ajax/ajax.js'  type='text/javascript'></script>
        <script src='jquery/js/functions.js'  type='text/javascript'></script>
        <?php if ($MyIndex->AjaxFile() != ""): ?>
              <script src='ajax/<?php print $MyIndex->AjaxFile(); ?>'  type='text/javascript'></script>
              <?php
          endif;
          if ($MyIndex->JSFile() != ""):
              if (count($MyIndex->JSFile()) > 0) :
                  foreach ($MyIndex->JSFile() as $js):
                      print ("<script src='jquery/js/" . $js . "'  type='text/javascript'></script>\n");
                  endforeach;
              endif;
          endif;
        ?>
        <script src="jquery/calendario/js/jsDatePick.min.1.3.js"></script>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php include DIRECTORY_VIEWS . "base/menu.php"; ?>
        <div class="container">
            <?php
              include_once 'getcookiedata.php';
              include_once $MyIndex->PHPFile();
              $MyDebug->Dump();
            ?>
        </div>
    </body>
</html>