<?php
require "../init.php";

$empleado = isset($CONTEXT["sel_empleado"]) ? Sanitizacion($CONTEXT["sel_empleado"]) : "";
$moneda = isset($CONTEXT["tipo_moneda"]) ? Sanitizacion($CONTEXT["tipo_moneda"]) : "";
$fecha = isset($CONTEXT["fecha"]) ? Sanitizacion($CONTEXT["fecha"]) : "";

$cuentas = isset($CONTEXT["cuentas"]) ? ($CONTEXT["cuentas"]) : "";
$remision = isset($CONTEXT["remision"]) ? ($CONTEXT["remision"]) : "";


$ventas = isset($CONTEXT["ventas"]) ? Sanitizacion($CONTEXT["ventas"]) : "";
$stock = isset($CONTEXT["stock"]) ? Sanitizacion($CONTEXT["stock"]) : "";
$back_order = isset($CONTEXT["back_order"]) ? Sanitizacion($CONTEXT["back_order"]) : "";


$http_vars = $CONTEXT;

$error = FALSE;


if(empty($empleado))
{
     $http_vars["MsgErr"] = "Selecciona un Empleado\n";
     $error = TRUE;
}

if(empty($moneda))
{
     $http_vars["MsgErr"] = "Selecciona el Tipo de Moneda\n";
     $error = TRUE;
}

$rules = array(
    "Fecha"=>array("valor"=>$fecha,"required"),
    "Ventas"=>array("valor"=>$ventas,"required","numeric","length"=>array("max"=>"10")),
    "Almacen de proyectos"=>array("valor"=>$stock,"required","numeric","length"=>array("max"=>"10")),
    "Back Order"=>array("valor"=>$back_order,"required","numeric","length"=>array("max"=>"10"))
);

$valid = validFormsServer($rules);

if($valid != "")
{
     $http_vars["MsgErr"] .= $valid;
     $error = TRUE;
}



if($error == FALSE)
{
     $fecha = explode("-",$fecha);
     $fecha = $fecha[2]."-".$fecha[0]."-".$fecha[1];


     /* Cuentas por cobrar */
     $c = 2;
     foreach($cuentas as $valor)
     {
          if($valor != "")
          {
               $MyFinanzas->guarda_Cuentas(Sanitizacion($valor),$moneda,$c,$empleado,$fecha);
               $c++;
          }
     }

     /* Remisiones pendientes */
     $r = 1;

     foreach($remision as $valor)
     {
          if($valor != "")
          {
               if($r != 2)
               {
                    $range_id = $r;
               }
               else
               {
                    $range_id = 3;
                    $r++;
               }

               $MyFinanzas->guarda_Remision(Sanitizacion($valor),$moneda,$range_id,$empleado,$fecha);

               $r++;
          }
     }

     /* Ventas */
     $_ventas = $MyFinanzas->guarda_Venta($ventas,$moneda,$empleado,$fecha);

     /* Stock */
     $_stock = $MyFinanzas->guarda_Stock($stock,$moneda,$empleado,$fecha);

     /* BackOrder */
     $_back = $MyFinanzas->guarda_BackOrder($back_order,$moneda,$empleado,$fecha);

     $http_vars["MsgSas"] = "Registrado correctamente";

     $location = $_SERVER["HTTP_REFERER"];
}
else
{
     $location = $_SERVER["HTTP_REFERER"];
}
$_SESSION["cookie_http_vars"] = $http_vars;
header("HTTP/1.1 302 Moved Temporarily");
header("Location: ".$location);
