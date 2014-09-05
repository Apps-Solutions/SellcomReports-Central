<?php

  /* Todo lo relacionado al modulo de FINANZAS */

  class FINANZAS extends objectOperations
  {

      function guarda_Otros_Datos($currency_id, $cobranza_semanal, $almacen_stock, $embarcadero_semanal)
      {
          $tabla = "data";

          $nvoregistro = array("currency_id" => $currency_id,
               "week_collection" => $cobranza_semanal,
               "depot_stock" => $almacen_stock,
               "week_embarked" => $embarcadero_semanal,
               "register_date" => date("Y-m-d"));

          return $this->guardarRegistro($tabla, $nvoregistro);
      }

      function get_CuentaCobrar($page, $tampag, $grupo, $orden, $employee_id, $currency_id, $date)
      {
          $tabla = "accounts_receivable ac";

          $campos = array("SUM(ac.value) as suma_actual",
               "SUM(CASE WHEN ac.range_id = 2 THEN ac.value ELSE 0 END) as suma_1_30",
               "SUM(CASE WHEN ac.range_id = 3 THEN ac.value ELSE 0 END) as suma_31_60",
               "SUM(CASE WHEN ac.range_id = 4 THEN ac.value ELSE 0 END) as suma_61_90",
               "SUM(CASE WHEN ac.range_id = 5 THEN ac.value ELSE 0 END) as suma_mas_90");


          $condiciones = array("ac.currency_id" => $currency_id, "ac.employee_id" => $employee_id, "ac.register_date" => $date);

          return $this->getColeccion($page, $tampag, $grupo, $orden, $tabla, $campos, $condiciones);
      }

      function get_Remisiones($page, $tampag, $grupo, $orden, $employee_id, $currency_id, $date)
      {
          $tabla = "pending_referrals ac";

          $campos = array(
               "SUM(CASE WHEN ac.range_id = 1 THEN ac.value ELSE 0 END) as suma_0_30",
               "SUM(CASE WHEN ac.range_id = 3 THEN ac.value ELSE 0 END) as suma_31_60",
               "SUM(CASE WHEN ac.range_id = 4 THEN ac.value ELSE 0 END) as suma_61_90",
               "SUM(CASE WHEN ac.range_id = 5 THEN ac.value ELSE 0 END) as suma_mas_90");


          $condiciones = array("ac.currency_id" => $currency_id, "ac.employee_id" => $employee_id, "ac.register_date" => $date);

          return $this->getColeccion($page, $tampag, $grupo, $orden, $tabla, $campos, $condiciones);
      }

      function get_Ventas($page, $tampag, $grupo, $orden, $employee_id, $currency_id, $date)
      {
          $tabla = "sales s";
          $campos = array("SUM(s.value) as suma_actual");
          $condiciones = array("s.currency_id" => $currency_id, "s.employee_id" => $employee_id, "s.register_date" => $date);
          return $this->getColeccion($page, $tampag, $grupo, $orden, $tabla, $campos, $condiciones);
      }

      function get_Stock($page, $tampag, $grupo, $orden, $employee_id, $currency_id, $date)
      {
          $tabla = "stock s";
          $campos = array("SUM(s.value) as stock");
          $condiciones = array("s.currency_id" => $currency_id, "s.employee_id" => $employee_id, "s.register_date" => $date);

          return $this->getColeccion($page, $tampag, $grupo, $orden, $tabla, $campos, $condiciones);
      }

      function get_BackOrder($page, $tampag, $grupo, $orden, $employee_id, $currency_id, $date)
      {
          $tabla = "backorder b";
          $campos = array("SUM(b.value) as back");
          $condiciones = array("b.currency_id" => $currency_id, "b.employee_id" => $employee_id, "b.register_date" => $date);

          return $this->getColeccion($page, $tampag, $grupo, $orden, $tabla, $campos, $condiciones);
      }

      function guarda_Kpi($valor, $employee_id, $currency_id, $customer_id)
      {
          $tabla = "kpi_employee";

          $nvoregistro = array("amount" => $valor, "employee_id" => $employee_id, "currency_id" => $currency_id, "customer_id" => $customer_id,"date_register"=>date("Y-m-d"));

          return $this->guardarRegistro($tabla, $nvoregistro);
      }

      function guarda_Cuentas($value, $currency_id, $range_id, $employee_id)
      {
          $tabla = "accounts_receivable";

          $nvoregistro = array("value" => $value, "currency_id" => $currency_id, "range_id" => $range_id, "employee_id" => $employee_id, "register_date" => date("Y-m-d"));

          return $this->guardarRegistro($tabla, $nvoregistro);
      }

      function guarda_Remision($value, $currency_id, $range_id, $employee_id)
      {
          $tabla = "pending_referrals";

          $nvoregistro = array("value" => $value, "currency_id" => $currency_id, "range_id" => $range_id, "employee_id" => $employee_id, "register_date" => date("Y-m-d"));

          return $this->guardarRegistro($tabla, $nvoregistro);
      }

      function guarda_Venta($value, $currency_id, $employee_id)
      {
          $tabla = "sales";

          $nvoregistro = array("value" => $value, "currency_id" => $currency_id, "employee_id" => $employee_id, "register_date" => date("Y-m-d"));

          return $this->guardarRegistro($tabla, $nvoregistro);
      }

      function guarda_Stock($value, $currency_id, $employee_id)
      {
          $tabla = "stock";
          $nvoregistro = array("value" => $value, "currency_id" => $currency_id, "employee_id" => $employee_id, "register_date" => date("Y-m-d"));

          return $this->guardarRegistro($tabla, $nvoregistro);
      }

      function guarda_BackOrder($value, $currency_id, $employee_id)
      {
          $tabla = "backorder";
          $nvoregistro = array("value" => $value, "currency_id" => $currency_id, "employee_id" => $employee_id, "register_date" => date("Y-m-d"));

          return $this->guardarRegistro($tabla, $nvoregistro);
      }

      function get_Kpis($page, $tampag, $grupo, $orden, $anio, $mes)
      {
          $sql = "SELECT * FROM (
                SELECT 
                e.id as id_empleado, 
                concat(p.first_name,' ',p.last_name) as  empleado, 
                cu.company_name as cuenta,
                SUM(ke.amount) as monto,
                m.prefix as moneda,
                date_format(ke.date_register,'%Y-%m') as fecha
                FROM employee e 
                INNER JOIN people p ON e.people_id=p.id
                INNER JOIN kpi_employee ke ON e.id=ke.employee_id
                INNER JOIN currency m ON ke.currency_id=m.id
                INNER JOIN customer cu ON ke.customer_id=cu.id
                GROUP BY $grupo
                ORDER BY $orden
            ) as tbl_kpi where 1='1' AND tbl_kpi.fecha='$anio-$mes' ";



          $reg1 = ($page - 1) * $tampag;

          $this->m_ibd->Query("cuantos", $sql);

          $total = $this->m_ibd->Fetcharray("cuantos");

          $this->m_total = count($total);

          $sql .= " LIMIT $reg1, $tampag";

          //echo $sql;
          
          $result = $this->m_ibd->Query("kpis", $sql);

          if ($result == IBD_SUCCESS)
          {
              $filas = $this->m_ibd->Fetcharray("kpis");

              if (count($filas) > 0)
              {
                  return $filas;
              }
              else
              {
                  return 0;
              }
          }

          $this->m_ibd->Liberar("kpis");
      }

  }

  $MyFinanzas = new FINANZAS();
  