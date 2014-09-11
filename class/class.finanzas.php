<?php

/* Todo lo relacionado al modulo de FINANZAS */

class FINANZAS extends objectOperations
{

     function guarda_Otros_Datos($currency_id,$cobranza_semanal,$almacen_stock,$embarcadero_semanal,$fecha)
     {
          $tabla = "data";

          $nvoregistro = array("currency_id"=>$currency_id,
              "week_collection"=>$cobranza_semanal,
              "depot_stock"=>$almacen_stock,
              "week_embarked"=>$embarcadero_semanal,
              "register_date"=>$fecha);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }

     function get_CuentaCobrar($page,$tampag,$grupo,$orden,$employee_id,$currency_id,$date)
     {
          $tabla = "accounts_receivable ac";

          $campos = array("SUM(ac.value) as suma_actual",
              "SUM(CASE WHEN ac.range_id = 2 THEN ac.value ELSE 0 END) as suma_1_30",
              "SUM(CASE WHEN ac.range_id = 3 THEN ac.value ELSE 0 END) as suma_31_60",
              "SUM(CASE WHEN ac.range_id = 4 THEN ac.value ELSE 0 END) as suma_61_90",
              "SUM(CASE WHEN ac.range_id = 5 THEN ac.value ELSE 0 END) as suma_mas_90");


          $condiciones = array("ac.currency_id"=>$currency_id,"ac.employee_id"=>$employee_id,"ac.register_date"=>$date);

          return $this->getColeccion($page,$tampag,$grupo,$orden,$tabla,$campos,$condiciones);
     }

     function get_Remisiones($page,$tampag,$grupo,$orden,$employee_id,$currency_id,$date)
     {
          $tabla = "pending_referrals ac";

          $campos = array(
              "SUM(CASE WHEN ac.range_id = 1 THEN ac.value ELSE 0 END) as suma_0_30",
              "SUM(CASE WHEN ac.range_id = 3 THEN ac.value ELSE 0 END) as suma_31_60",
              "SUM(CASE WHEN ac.range_id = 4 THEN ac.value ELSE 0 END) as suma_61_90",
              "SUM(CASE WHEN ac.range_id = 5 THEN ac.value ELSE 0 END) as suma_mas_90");


          $condiciones = array("ac.currency_id"=>$currency_id,"ac.employee_id"=>$employee_id,"ac.register_date"=>$date);

          return $this->getColeccion($page,$tampag,$grupo,$orden,$tabla,$campos,$condiciones);
     }

     function get_Ventas($page,$tampag,$grupo,$orden,$employee_id,$currency_id,$date)
     {
          $tabla = "sales s";
          $campos = array("SUM(s.value) as suma_actual");
          $condiciones = array("s.currency_id"=>$currency_id,"s.employee_id"=>$employee_id,"s.register_date"=>$date);
          return $this->getColeccion($page,$tampag,$grupo,$orden,$tabla,$campos,$condiciones);
     }

     function get_Stock($page,$tampag,$grupo,$orden,$employee_id,$currency_id,$date)
     {
          $tabla = "stock s";
          $campos = array("SUM(s.value) as stock");
          $condiciones = array("s.currency_id"=>$currency_id,"s.employee_id"=>$employee_id,"s.register_date"=>$date);

          return $this->getColeccion($page,$tampag,$grupo,$orden,$tabla,$campos,$condiciones);
     }

     function get_BackOrder($page,$tampag,$grupo,$orden,$employee_id,$currency_id,$date)
     {
          $tabla = "backorder b";
          $campos = array("SUM(b.value) as back");
          $condiciones = array("b.currency_id"=>$currency_id,"b.employee_id"=>$employee_id,"b.register_date"=>$date);

          return $this->getColeccion($page,$tampag,$grupo,$orden,$tabla,$campos,$condiciones);
     }

     function guarda_Kpi($valor,$employee_id,$currency_id,$customer_id,$fecha)
     {
          $tabla = "kpi_employee";

          $nvoregistro = array("amount"=>$valor,
              "employee_id"=>$employee_id,
              "currency_id"=>$currency_id,
              "customer_id"=>$customer_id,
              "date_register"=>$fecha);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }

     function guarda_Cuentas($value,$currency_id,$range_id,$employee_id,$fecha)
     {
          $tabla = "accounts_receivable";

          $nvoregistro = array("value"=>$value,"currency_id"=>$currency_id,"range_id"=>$range_id,"employee_id"=>$employee_id,"register_date"=>$fecha);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }

     function guarda_Remision($value,$currency_id,$range_id,$employee_id,$fecha)
     {
          $tabla = "pending_referrals";

          $nvoregistro = array("value"=>$value,"currency_id"=>$currency_id,"range_id"=>$range_id,"employee_id"=>$employee_id,"register_date"=>$fecha);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }

     function guarda_Venta($value,$currency_id,$employee_id,$fecha)
     {
          $tabla = "sales";

          $nvoregistro = array("value"=>$value,"currency_id"=>$currency_id,"employee_id"=>$employee_id,"register_date"=>$fecha);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }

     function guarda_Stock($value,$currency_id,$employee_id,$fecha)
     {
          $tabla = "stock";
          $nvoregistro = array("value"=>$value,"currency_id"=>$currency_id,"employee_id"=>$employee_id,"register_date"=>$fecha);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }

     function guarda_BackOrder($value,$currency_id,$employee_id,$fecha)
     {
          $tabla = "backorder";
          $nvoregistro = array("value"=>$value,"currency_id"=>$currency_id,"employee_id"=>$employee_id,"register_date"=>$fecha);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }


     function get_KPIObjetivo($page,$tampag,$grupo,$orden,$empleado_id,$cliente_id)
     {
          $campos = array("SUM(IFNULL(e.amount,0)) as kpi_objetivo");
          $tabla = "kpi_employee e";
          $condiciones = array("e.employee_id"=>$empleado_id,"e.customer_id"=>$cliente_id);

          return $this->getColeccion($page,$tampag,$grupo,$orden,$tabla,$campos,$condiciones);
     }

     function get_KPIAlcanzado($page,$tampag,$grupo,$orden,$empleado_id)
     {
          $campos = array("SUM(IFNULL(s.value,0)) as kpi_alcanzado");
          $tabla = "sales s";
          $condiciones = array("s.employee_id"=>$empleado_id);

          return $this->getColeccion($page,$tampag,$grupo,$orden,$tabla,$campos,$condiciones);
     }

}

$MyFinanzas = new FINANZAS();
