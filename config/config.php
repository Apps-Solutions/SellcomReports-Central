<?php

  $isdevelopment = true;

  /*   * **************** Configuración BASE DE DATOS ***************** */

  if ($isdevelopment)
  {
      define("DBCONNECT", 'localhost');
      define("DBUSERNAME", 'root');
      define("DBPASSWORD", 'root');
      define("DBNAME", 'db_fisa');
  }
  else
  {
      define("DBCONNECT", 'localhost');
      define("DBUSERNAME", 'fisa');
      define("DBPASSWORD", 'fisabd');
      define("DBNAME", 'db_fisa');
  }

  /*   * **************************NIVEL PERSMISOS************************** */
  define("NIVEL_USERPUBLICO", 0);
  define("NIVEL_ADMIN", 1);
  define("NIVEL_GERENTE_SUCURSAL", 2);
  define("NIVEL_GERENTE_VENTAS", 3);
  define("NIVEL_EJECUTIVO", 4);
  define("NIVEL_OPERACION", 5);


  require 'config.constantes.php';



  /*   * *********LOGIGA DEL SISTEMA********* */
  require 'config.logic.php';
  