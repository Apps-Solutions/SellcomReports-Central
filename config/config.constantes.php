<?php

  /*   * ************** Definición de Errores BASE DE DATOS *************** */
  $iIBDNextError = 200;
  define("IBD_SUCCESS", $iIBDNextError++);
  define("IBD_ERR_CANTCONNECT", $iIBDNextError++);
  define("IBD_ERR_CANTSELECT", $iIBDNextError++);
  define("IBD_ERR_DBUNAVAILABLE", $iIBDNextError++);

  /*   * ************** Definición de Errores LOGIN *************** */
  $_iLOGINError = 200;
  define("LOGIN_SUCCESS", $_iLOGINError++);
  define("LOGIN_BADLOGIN", $_iLOGINError++);
  define("LOGIN_DBFAILURE", $_iLOGINError++);

  
  /*Class object.operations.php*/
  $error_class = 200;
  define(REGISTRO_SUCCESS, $error_class++);
  define(REGISTRO_ERROR, $error_class++);

  
  
  /*   * **************** Configuración WEB ***************** */
  define("NOMBRE_WEB", strtoupper(str_replace("www.", "", $_SERVER["SERVER_NAME"])));
  define("URL_WEB", "http://54.201.168.168/");
  define("MAIL_WEB", "");


  /*   * ************		LOG Definitions 	*************** */
  define('LOG_DIR', '../log/');
  define('LOG_FILE', 'fisa_log');
  define('LOG_TMPLT', '[%s] %s @ %s: %s');
  define('LOG_MAX_SIZE', '1073741824'); // 1G = 1073741824 bytes


  define('LOG_PRC_DOWN', 1);
  define('LOG_TRANS_ERR', 2);
  define('LOG_DB_ERR', 3);
  define('LOG_SESS_ERR', 4);
  define('LOG_INFO_ERR', 5);
  define('LOG_API_ERR', 6);

  define('CODE_RENOVADO_ID','93');
  DEFINE('STATUS_RENOVATION','RNVO');

  