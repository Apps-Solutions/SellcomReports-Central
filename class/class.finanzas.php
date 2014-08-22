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

  }

  $MyFinanzas = new FINANZAS();
  