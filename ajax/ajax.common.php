<?php

  require "../init.php";
  include_once('class.ajax.php');

  function guarda_Cliente($cliente, $nombre, $apellido, $email, $telefono)
  {
      global $MySession;
      $MyNegocio = new NEGOCIOS;
      $_error = false;

      $rules = array(
           "Empresa" => array("valor" => $cliente, "required", "field", "length" => array("max" => "255")),
           "Nombre" => array("valor" => $nombre, "required", "field", "length" => array("max" => "255")),
           "Apellido(s)" => array("valor" => $apellido, "required", "field", "length" => array("max" => "255")),
           "Email" => array("valor" => $email, "required", "email", "field", "length" => array("max" => "255")),
           "Teléfono" => array("valor" => $telefono, "required", "numeric", "field", "length" => array("max" => "12")),
      );


      $valid = validFormsServer($rules);

      if ($valid != "")
      {
          $respuesta[0]["error"] .= $valid;
          $_error = true;
      }

      if (!$MySession->LoggedIn())
      {
          $respuesta[0]["error"] = "No tienes  permisos";
          $_error = true;
      }

      if ($_error == false)
      {
          $people = $MyNegocio->guarda_Datos($nombre, $apellido, $email, $telefono);

          if ($people == REGISTRO_SUCCESS)
          {
              $people_id = $MyNegocio->getUltimoID();

              $contacto = $MyNegocio->guarda_Contacto($title = '', $people_id);

              if ($contacto == REGISTRO_SUCCESS)
              {
                  $contacto_id = $MyNegocio->getUltimoID();

                  $cliente = $MyNegocio->guarda_Cliente($cliente, $contacto_id);

                  if ($cliente == REGISTRO_SUCCESS)
                  {
                      $respuesta[0]["success"] = "Cliente registrado correctamente";
                      $respuesta[0]["function"] = "document.frmCliente.reset();";
                  }
              }
          }
      }

      return $respuesta;
  }

  function guarda_Informacion($sel_deal_status, $txt_deal_nombre, $sel_deal_cliente, $sel_deal_tipo, $sel_deal_sector, $txt_deal_valor, $sel_deal_moneda, $fecha)
  {
      global $MySession;
      $MyNegocio = new NEGOCIOS();
      $_error = false;

      $rules = array(
           "Fecha" => array("valor" => $fecha, "required", "field"),
           "Estatus" => array("valor" => $sel_deal_status, "required", "select"),
           "Nombre" => array("valor" => $txt_deal_nombre, "required", "field"),
           "Cliente" => array("valor" => $sel_deal_cliente, "required", "field"),
           "Tipo" => array("valor" => $sel_deal_tipo, "required", "select"),
           "Sector" => array("valor" => $sel_deal_sector, "required", "select"),
           "Valor" => array("valor" => $txt_deal_valor, "required", "field", "numeric", "length" => array("max" => "10"))
      );



      $valid = validFormsServer($rules);

      if ($valid != "")
      {
          $respuesta[0]["error"] = $valid;
          $_error = true;
      }

      if (!$MySession->LoggedIn())
      {
          $respuesta[0]["error"] = "No tienes  permisos";
          $_error = true;
      }


      if ($_error == false)
      {
          $fecha = explode("-", $fecha);
          $fecha = $fecha[2] . "-" . $fecha[0] . "-" . $fecha[1];

          $result = $MyNegocio->guarda_Deal($txt_deal_nombre, $MySession->Id(), $sel_deal_sector, $sel_deal_cliente, $sel_deal_tipo);

          if ($result == REGISTRO_SUCCESS)
          {
              $deal_id = $MyNegocio->getUltimoID();

              $result = $MyNegocio->guarda_DealHistory($deal_id, $sel_deal_status, $txt_deal_valor, $advance_percent = 0, $sel_deal_moneda, $fecha);

              if ($result == REGISTRO_SUCCESS)
              {
                  $respuesta[0]["success"] = "Datos registrados correctamente";
                  $respuesta[0]["function"] = "document.frmOtros.reset();";
              }
              else
              {
                  $respuesta[0]["error"] = "Error al insertar los datos, intenta mas tarde";
              }
          }
          else
          {
              $respuesta[0]["error"] = "Error al insertar los datos, intenta mas tarde";
          }
      }

      return $respuesta;
  }

  function guarda_Otros($moneda, $cobranza, $almacen, $embarcadero, $fecha)
  {
      global $MySession;
      $_error = false;

      $MyFinanzas = new FINANZAS;

      $rules = array(
           "Fecha" => array("valor" => $fecha, "required", "field"),
           "Cobranza Semanal" => array("valor" => $cobranza, "required", "field", "numeric", "length" => array("max" => "10")),
           "Almacen Stock" => array("valor" => $almacen, "required", "numeric", "field", "length" => array("max" => "10")),
           "Embarcadero Semanal" => array("valor" => $embarcadero, "required", "field", "numeric", "length" => array("max" => "10"))
      );



      $valid = validFormsServer($rules);

      if ($valid != "")
      {
          $respuesta[0]["error"] = ($valid);
          $_error = true;
      }

      if (!$MySession->LoggedIn())
      {
          $respuesta[0]["error"] = "No tienes  permisos";
          $_error = true;
      }

      if ($_error == false)
      {
          $fecha = explode("-", $fecha);
          $fecha = $fecha[2] . "-" . $fecha[0] . "-" . $fecha[1];

          $result = $MyFinanzas->guarda_Otros_Datos($moneda, $cobranza, $almacen, $embarcadero, $fecha);

          if ($result == REGISTRO_SUCCESS)
          {
              $respuesta[0]["success"] = "Datos registrados correctamente";
              $respuesta[0]["function"] = "document.frmOtros.reset();";
          }
          else
          {
              $respuesta[0]["error"] = "Error al registrar los datos, intenta mas tarde";
          }
      }


      return $respuesta;
  }

  function get_VAB($empleado, $moneda, $fecha)
  {
      global $MySession;
      $_error = FALSE;

      $MyFinanzas = new FINANZAS;

      $rules = array(
           "Empleado" => array("valor" => $empleado, "required", "select"),
           "Tipo Moneda" => array("valor" => $moneda, "required", "select"),
           "Fecha" => array("valor" => $fecha, "required", "field")
      );



      $valid = validFormsServer($rules);

      if ($valid != "")
      {
          $respuesta[0]["error"] = ($valid);
          $_error = TRUE;
      }

      if (!$MySession->LoggedIn())
      {
          $respuesta[0]["error"] = "No tienes  permisos";
          $_error = TRUE;
      }

      if ($_error === FALSE)
      {
          $fecha = explode('-', $fecha);
          $fecha = $fecha[2] . "-" . $fecha[0] . "-" . $fecha[1];


          /* Datos cuentas por cobrar */
          $cuentas = $MyFinanzas->get_CuentaCobrar($page = '1', $tampag = '1', $grupo = '', $orden = 'ac.employee_id', $empleado, $moneda, $fecha);


          if ($cuentas === REGISTRO_SUCCESS)
          {
              $fila = $MyFinanzas->getRows();

              $suma_actual = $fila["suma_actual"] > 0 ? $fila["suma_actual"] : "0";
              $suma130 = $fila["suma_1_30"] > 0 ? $fila["suma_1_30"] : "0";
              $suma3160 = $fila["suma_31_60"] > 0 ? $fila["suma_31_60"] : "0";
              $suma6190 = $fila["suma_61_90"] > 0 ? $fila["suma_61_90"] : "0";
              $suma90 = $fila["suma_mas_90"] > 0 ? $fila["suma_mas_90"] : "0";

              $suma_total = ($suma130 + $suma3160 + $suma6190 + $suma90);

              $respuesta[0]["cuenta"] = array("suma_actual" => $suma_actual, "suma130" => $suma130, "suma3160" => $suma3160, "suma6190" => $suma6190, "suma90" => $suma90, "suma_total" => $suma_total);
          }



          /* Datos remisiones de facturar */
          $remisiones = $MyFinanzas->get_Remisiones($page = '1', $tampag = '1', $grupo = '', $orden = 'ac.employee_id', $empleado, $moneda, $fecha);


          if ($remisiones === REGISTRO_SUCCESS)
          {
              $fila = $MyFinanzas->getRows();

              $suma130 = $fila["suma_0_30"] > 0 ? $fila["suma_0_30"] : "0";
              $suma3160 = $fila["suma_31_60"] > 0 ? $fila["suma_31_60"] : "0";
              $suma6190 = $fila["suma_61_90"] > 0 ? $fila["suma_61_90"] : "0";
              $suma90 = $fila["suma_mas_90"] > 0 ? $fila["suma_mas_90"] : "0";

              $suma_total = ($suma130 + $suma3160 + $suma6190 + $suma90);

              $respuesta[0]["remision"] = array("suma030" => $suma130, "suma3160" => $suma3160, "suma6190" => $suma6190, "suma90" => $suma90, "suma_total" => $suma_total);
          }



          /* Datos Ventas */
          $ventas = $MyFinanzas->get_Ventas($page = '1', $tampag = '1', $grupo = '', $orden = 's.id', $empleado, $moneda, $fecha);

          if ($ventas === REGISTRO_SUCCESS)
          {
              $fila = $MyFinanzas->getRows();

              $ventas = $fila["suma_actual"];

              if ($ventas > 0)
              {
                  $respuesta[0]["ventas"] = $ventas;
              }
              else
              {
                  $respuesta[0]["ventas"] = "0";
              }
          }


          /* Datos Almacen de proyectos STOCK */
          $stock = $MyFinanzas->get_Stock($page = '1', $tampag = '1', $grupo = '', $orden = 's.id', $empleado, $moneda, $fecha);

          if ($stock === REGISTRO_SUCCESS)
          {
              $fila = $MyFinanzas->getRows();

              $stock = $fila["stock"];

              if ($stock > 0)
              {
                  $respuesta[0]["stock"] = $stock;
              }
              else
              {
                  $respuesta[0]["stock"] = "0";
              }
          }


          /* Datos BackOrder */
          $back = $MyFinanzas->get_BackOrder($page = '1', $tampag = '1', $grupo = '', $orden = 'b.id', $empleado, $moneda, $fecha);

          if ($back === REGISTRO_SUCCESS)
          {
              $fila = $MyFinanzas->getRows();

              $back = $fila["back"];

              if ($back > 0)
              {
                  $respuesta[0]["back"] = $back;
              }
              else
              {
                  $respuesta[0]["back"] = "0";
              }
          }
      }

      return $respuesta;
  }

  function edita_Valores($id_deal, $estatus, $valor, $porcentaje, $fecha)
  {
      global $MySession;
      $_error = FALSE;

      $MyNegocio = new NEGOCIOS();

      $rules = array(
           "Fecha" => array("valor" => $fecha, "required", "field"),
           "Id" => array("valor" => $id_deal, "numeric", "required"),
           "Porcentaje" => array("valor" => $porcentaje, "numeric", "required", "field"),
      );



      $valid = validFormsServer($rules);

      if ($valid != "")
      {
          $respuesta[0]["error"] = ($valid);
          $_error = TRUE;
      }

      if (!$MySession->LoggedIn())
      {
          $respuesta[0]["error"] = "No tienes  permisos";
          $_error = TRUE;
      }

      if ($_error == FALSE)
      {
          $fecha = explode("-", $fecha);
          $fecha = $fecha[2] . "-" . $fecha[0] . "-" . $fecha[1];


          $result = $MyNegocio->editar_Valores($id_deal, $porcentaje, $fecha, $estatus, $valor);

          if ($result == REGISTRO_SUCCESS)
          {
              $respuesta[0]["success"] = "Valores Actualizados";
              $respuesta[0]["function"] = "window.location.reload();";
          }
          else
          {
              $respuesta[0]["error"] = "Intenta mas tarde";
          }
      }

      return $respuesta;
  }

  function guarda_kpi($moneda, $cliente, $empleado, $status, $valor, $fecha)
  {

      global $MySession;
      $_error = FALSE;

      $MyFinanzas = new FINANZAS();

      $rules = array(
           "Fecha" => array("valor" => $fecha, "required", "field"),
           "Moneda" => array("valor" => $moneda, "required", "select"),
           "Cliente" => array("valor" => $cliente, "required", "select"),
           "Empleado" => array("valor" => $empleado, "required", "select"),
           "Valor" => array("valor" => $valor, "numeric", "required", "field")
      );



      $valid = validFormsServer($rules);

      if ($valid != "")
      {
          $respuesta[0]["error"] = ($valid);
          $_error = TRUE;
      }

      if (!$MySession->LoggedIn())
      {
          $respuesta[0]["error"] = "No tienes  permisos";
          $_error = TRUE;
      }


      if ($_error == FALSE)
      {
          $fecha = explode("-", $fecha);
          $fecha = $fecha[2] . "-" . $fecha[0] . "-" . $fecha[1];


          $result = $MyFinanzas->guarda_Kpi($valor, $empleado, $moneda, $cliente, $fecha);

          if ($result == REGISTRO_SUCCESS)
          {
              $respuesta[0]["success"] = "Registrado correctamente";
              $respuesta[0]["function"] = "document.frmKpis.reset();";
          }
          else
          {
              $respuesta[0]["error"] = "Intenta mas tarde";
          }
      }

      return $respuesta;
  }

  /* Atencion: Registrar todas las funciones si no se registran no funciona!!! */
  $MyAjax->register("guarda_Cliente");
  $MyAjax->register("guarda_Informacion");
  $MyAjax->register("guarda_Otros");
  $MyAjax->register("get_VAB");
  $MyAjax->register("edita_Valores");
  $MyAjax->register("guarda_kpi");

  $MyAjax->execute($CONTEXT);
  