<?php

  /* Todo lo relacionado al modulo de negocios */

  class NEGOCIOS extends objectOperations
  {

      function guarda_Datos($nombre, $apellido, $email, $telefono)
      {
          $tabla = "people";

          $nvoregistro = array("first_name" => $nombre, "last_name" => $apellido, "email" => $email, "phone" => $telefono);

          return $this->guardarRegistro($tabla, $nvoregistro);
      }

      function guarda_Contacto($title, $people_id)
      {
          $tabla = "contact";

          $nvoregistro = array("title" => $title, "people_id" => $people_id);

          return $this->guardarRegistro($tabla, $nvoregistro);
      }

      function guarda_Cliente($cliente, $contact_id, $nombre_cuenta = '')
      {
          $tabla = "customer";
          $nvoregistro = array("company_name" => $cliente, "account_name" => $nombre_cuenta, "contact_id" => $contact_id);

          return $this->guardarRegistro($tabla, $nvoregistro);
      }

      function guarda_Informacion($deal_name, $value, $currency_id, $employee_id, $sector_id, $advance_percent, $comment, $create_time, $deal_id)
      {
          $tabla = "deal";

          $nvoregistro = array(
               "deal_name" => $deal_name,
               "value" => $value,
               "currency_id" => $currency_id,
               "employee_id" => $employee_id,
               "sector_id" => $sector_id,
               "advance_percent" => $advance_percent,
               "comment" => $comment,
               "create_time" => $create_time,
               "delete_status" => "1",
               "deal_status_id" => $deal_id);

          return $this->guardarRegistro($tabla, $nvoregistro);
      }

      function get_Negocios($page, $tampag, $grupo, $orden, $empleado_id, $cliente = '', $sector = '', $tipo = '', $nombre = '')
      {
          $tabla = array("deal d:currency c"    => "d.currency_id=c.id",
                        ":employee e"           => "d.employee_id=e.id",
                        ":people p"             => "e.people_id=p.id",
                        ":sector se"            => "d.sector_id=se.id",
                        ":deal_status ds"       => "d.deal_status_id=ds.id", 
                        ":contact co"           => "p.id=co.people_id",
                        ":customer cu"          => "co.id=cu.contact_id");

                        $campos = array("d.id",
                             "d.deal_name",
                             "d.value",
                             "d.advance_percent",
                             "d.comment",
                             "d.create_time",
                             "d.delete_status",
                             "c.name as moneda",
                             "se.name as sector",
                             "ds.name as deal_status",
                             "cu.company_name as cliente");

          $condiciones = array("d.employee_id" => $empleado_id);

          if ($cliente != "")
          {
              $condiciones["cu.id"] = $cliente;
          }

          if ($sector != "")
          {
              $condiciones["se.id"] = $sector;
          }

          if ($tipo != "")
          {
              $condiciones["pendiente"] = $tipo;
          }


          if ($nombre != "")
          {
              $condiciones["d.deal_name LIKE '%$nombre%' AND 1"] = "1";
          }

          return $this->getColeccion($page, $tampag, $grupo, $orden, $tabla, $campos, $condiciones);
      }

  }

  $MyNegocio = new NEGOCIOS;