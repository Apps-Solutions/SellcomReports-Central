<?php
/*CONFIGURACION DE LOGICA DEL SISTEMA*/
$_command=1001;

define("HOME",			    "");
define("LOGIN",			    "login");
define("NEGOCIOS",                     "negocios");
define("KPIS",                     "kpis");

define("FINANZAS",                     "finanzas");
define("REPORTES",                     "reportes");



$uiCommand=array();

$uiCommand[HOME]	=	array(
	array(NIVEL_EJECUTIVO), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."home.php", //Archivo PHP
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
	array(NIVEL_EJECUTIVO), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."negocios.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"ajax.usuario.js" //Ajax File
);


$uiCommand[KPIS]	=	array(
	array(NIVEL_EJECUTIVO), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."kpis.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"ajax.usuario.js" //Ajax File
);


/*******     Administrador   *********************/

$uiCommand[FINANZAS]	=	array(
	array(NIVEL_EJECUTIVO), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."finanzas.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"" //Ajax File
);

/*******     REportes   *********************/
$uiCommand[REPORTES]	=	array(
	array(NIVEL_EJECUTIVO), //Controla los permisos
	"", //Titulo
	DIRECTORY_VIEWS."reportes.php", //Archivo PHP
	"", //array("ejemplo.js","ejemplo2.js")
	"", //array("css.css","css2.css")
	"" //Ajax File
);