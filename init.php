<?php
  session_start();
  if (isset($_GET["dbg"]))
      ini_set("display_errors", 1);

  ini_set('session.cookie_domain', str_replace("www.", "", $_SERVER['HTTP_HOST']));

  define("DIRECTORY_VIEWS", "views/");
  define("DIRECTORY_CLASS", "class/");
  define("DIRECTORY_TEMPLATES", "templates/");
  define("DIRECTORY_BASE", "base/");
  define("DIRECTORY_CONFIG", "config/");

  require_once(DIRECTORY_CONFIG . 'config.php');
  include_once(DIRECTORY_CLASS . 'class.debug.php');
//include_once(DIRECTORY_CLASS  . 'class.log.php');

  $MyDebug->SetDebug(0);
  include_once('utils.php');
  include_once(DIRECTORY_CLASS . 'class.session.php');
  include_once(DIRECTORY_CLASS . 'class.logic.php');
  include_once(DIRECTORY_CLASS . 'class.consultas.php');
  include_once(DIRECTORY_CLASS . 'class.object.operations.php');
  include_once(DIRECTORY_CLASS . "class.correo.php");
  include_once(DIRECTORY_CLASS . "class.plantilla.php");

  /* Clases secundarias */
  include_once DIRECTORY_CLASS . 'class.negocios.php';
  include_once DIRECTORY_CLASS . 'class.finanzas.php';
  include_once DIRECTORY_CLASS . 'class.reportes.php';
  