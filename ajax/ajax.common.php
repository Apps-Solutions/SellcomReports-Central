<?php
  require "../init.php";
  include_once('class.ajax.php');

  function guarda_Cliente($cliente, $nombre, $apellido, $email, $telefono)
  {
      global $MySession;
      $MyNegocio = new NEGOCIOS;
      $_error = false;

      $rules = array(
           "Cliente" => array("valor" => $cliente, "required", "length" => array("max" => "255")),
           "Nombre" => array("valor" => $nombre, "required", "length" => array("max" => "255")),
           "Apellido" => array("valor" => $apellido, "required", "length" => array("max" => "255")),
           "Email" => array("valor" => $email, "required", "email", "length" => array("max" => "255")),
           "Teléfono" => array("valor" => $telefono, "required", "numeric", "length" => array("max" => "12")),
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
                  }
              }
          }
      }

      return $respuesta;
  }

  function guarda_Informacion($sel_deal_status, $txt_deal_nombre, $sel_deal_cliente, $sel_deal_tipo, $sel_deal_sector, $txt_deal_valor, $sel_deal_moneda)
  {
      global $MySession;
      $MyNegocio = new NEGOCIOS();
      $_error = false;

      $rules = array(
           "Estatus" => array("valor" => $sel_deal_status, "required"),
           "Nombre" => array("valor" => $txt_deal_nombre, "required"),
           "Cliente" => array("valor" => $sel_deal_cliente, "required"),
           "Tipo" => array("valor" => $sel_deal_tipo, "required"),
           "Sector" => array("valor" => $sel_deal_sector, "required"),
           "Valor" => array("valor" => $txt_deal_valor, "required", "numeric", "length" => array("max" => "10"))
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
          $result = $MyNegocio->guarda_Informacion($txt_deal_nombre, $txt_deal_valor, $sel_deal_moneda, $MySession->Id(), $sel_deal_sector, $advance_percent = 0, $comment = '', $create_time = date("Y-m-d"), $sel_deal_status);

          if ($result == REGISTRO_SUCCESS)
          {
              $respuesta[0]["success"] = "Datos registrados correctamente";
          }
          else
          {
              $respuesta[0]["error"] = "Error al insertar los datos, intenta mas tarde";
          }
      }

      return $respuesta;
  }

  function guarda_Otros($moneda, $cobranza, $almacen, $embarcadero)
  {
      global $MySession;
      $_error = false;

      $MyFinanzas = new FINANZAS;

      $rules = array(
           "Cobranza Semanal" => array("valor" => $cobranza, "required", "numeric", "length" => array("max" => "10")),
           "Almacen Stock" => array("valor" => $almacen, "required", "numeric", "length" => array("max" => "10")),
           "Embarcadero Semanal" => array("valor" => $embarcadero, "required", "numeric", "length" => array("max" => "10"))
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
          $result = $MyFinanzas->guarda_Otros_Datos($moneda, $cobranza, $almacen, $embarcadero);

          if ($result == REGISTRO_SUCCESS)
          {
              $respuesta[0]["success"] = "Datos registrados correctamente";
          }
          else
          {
              $respuesta[0]["error"] = "Error al registrar los datos, intenta mas tarde";
          }
      }


      return $respuesta;
  }

  /* Atencion: Registrar todas las funciones si no se registran no funciona!!! */
  $MyAjax->register("guarda_Cliente");
  $MyAjax->register("guarda_Informacion");
  $MyAjax->register("guarda_Otros");

  $MyAjax->execute($CONTEXT);
  