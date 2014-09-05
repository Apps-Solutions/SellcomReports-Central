<?php
  $isdevelopment = true;

  /*   * **************** Configuración BASE DE DATOS ***************** */

  if ($isdevelopment)
  {
      define("DBCONNECT", 'localhost');
      define("DBUSERNAME", 'root');
      define("DBPASSWORD", 'root');
      define("DBNAME", 'db_kpis');
  }
  else
  {
      define("DBCONNECT", 'localhost');
      define("DBUSERNAME", 'fisa');
      define("DBPASSWORD", 'fisabd');
      define("DBNAME", 'db_kpis');
  }

  /*   * **************************NIVEL PERSMISOS************************** */
  define("NIVEL_USERPUBLICO", 0);
  define("NIVEL_ADMIN", 1);
  define("NIVEL_FINANZAS", 2);
  define("NIVEL_VENTAS", 3);

  require 'config.constantes.php';

  /*   * *********LOGIGA DEL SISTEMA********* */
  require 'config.logic.php';