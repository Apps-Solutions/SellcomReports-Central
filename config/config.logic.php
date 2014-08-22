<?php
/*CONFIGURACION DE LOGICA DEL SISTEMA*/
$_command=1001;

define("HOME",			    "");
define("LOGIN",			    "login");
define("NEGOCIOS",                     "negocios");
define("KPIS",                     "kpis");

define("FINANZAS",                     "finanzas");
define("REPORTES",                     "reporte");
define("REPORTES_GRAFICAS",                     "reporte-grafica");
define("REPORTES_KPIS","grafica-kpi");
define("TESTER","test");



$uiCommand=array();

$uiCommand[HOME]	=	array(
	array(NIVEL_ADMIN,NIVEL_FINANZAS,NIVEL_VENTAS), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."base/home.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"ajax.sucursal.js" //Ajax File
);
 
$uiCommand[LOGIN]	=	array(
	array(NIVEL_USERPUBLICO),
	" | Login ",
	"frm.login.php",
	"",
	"",
	"ajax.recover.js"
);


$uiCommand[NEGOCIOS]	=	array(
	array(NIVEL_ADMIN), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."negocios.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"ajax.negocios.js" //Ajax File
);


$uiCommand[KPIS]	=	array(
	array(NIVEL_ADMIN), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."kpis.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"ajax.usuario.js" //Ajax File
);


/*******     Administrador   *********************/

$uiCommand[FINANZAS]	=	array(
	array(NIVEL_ADMIN,NIVEL_FINANZAS), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."finanzas.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"ajax.finanzas.js" //Ajax File
);

/*******     REportes   *********************/
$uiCommand[REPORTES]	=	array(
	array(NIVEL_ADMIN,NIVEL_FINANZAS), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."reportes.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"" //Ajax File
);

$uiCommand[REPORTES_GRAFICAS]	=	array(
	array(NIVEL_ADMIN,NIVEL_FINANZAS), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."graficas.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"" //Ajax File
);

$uiCommand[REPORTES_KPIS]	=	array(
	array(NIVEL_ADMIN,NIVEL_FINANZAS), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."reporte_kpi.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"" //Ajax File
);



$uiCommand[TESTER]	=	array(
	array(NIVEL_EJECUTIVO), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."test.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"" //Ajax File
);