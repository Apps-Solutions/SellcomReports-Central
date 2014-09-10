<?php

/* Todo lo relacionado al modulo de negocios */

class NEGOCIOS extends objectOperations
{

     function guarda_Datos($nombre,$apellido,$email,$telefono)
     {
          $tabla = "people";

          $nvoregistro = array("first_name"=>$nombre,"last_name"=>$apellido,"email"=>$email,"phone"=>$telefono);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }

     function guarda_Contacto($title,$people_id)
     {
          $tabla = "contact";

          $nvoregistro = array("title"=>$title,"people_id"=>$people_id);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }

     function guarda_Cliente($cliente,$contact_id,$nombre_cuenta = '')
     {
          $tabla = "customer";
          $nvoregistro = array("company_name"=>$cliente,"account_name"=>$nombre_cuenta,"contact_id"=>$contact_id);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }

     function guarda_Deal($deal_name,$employee_id,$sector_id,$customer_id,$id_tipo)
     {
          $tabla = "deal";

          $nvoregistro = array(
              "deal_name"=>$deal_name,
              "employee_id"=>$employee_id,
              "sector_id"=>$sector_id,
              "delete_status"=>"1",
              "customer_id"=>$customer_id,
              "types_id"=>$id_tipo);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }

     function guarda_DealHistory($deal_id,$deal_status_id,$value,$advance_percent,$currency_id,$fecha)
     {
          $tabla = "deal_history";

          $nvoregistro = array(
              "deal_id"=>$deal_id,
              "deal_status_id"=>$deal_status_id,
              "value"=>$value,
              "register_date"=>$fecha,
              "advance_percent"=>$advance_percent,
              "currency_id"=>$currency_id);

          return $this->guardarRegistro($tabla,$nvoregistro);
     }

     function get_Negocios($page,$tampag,$grupo,$orden,$empleado_id,$cliente = '',$sector = '',$tipo = '',$nombre = '')
     {




          $tabla = array("deal d:deal_history dh"=>"d.id=dh.deal_id",
              ":currency c"=>"dh.currency_id=c.id",
              ":employee e"=>"d.employee_id=e.id",
              ":people p"=>"e.people_id=p.id",
              ":sector se"=>"d.sector_id=se.id",
              ":deal_status ds"=>"dh.deal_status_id=ds.id",
              ":customer cu"=>"d.customer_id=cu.id",
              ":types ti"=>"d.types_id=ti.id");

          $campos = array("d.id",
              "d.deal_name",
              "dh.value",
              "dh.advance_percent",
              "dh.comment",
              "d.create_time",
              "d.delete_status",
              "c.name as moneda",
              "se.name as sector",
              "ds.id as id_deal_status",
              "ds.name as deal_status",
              "cu.company_name as cliente",
              "ti.name as tipo");

          $condiciones = array("d.employee_id"=>$empleado_id);

          if($cliente != "")
          {
               $condiciones["cu.id"] = $cliente;
          }

          if($sector != "")
          {
               $condiciones["se.id"] = $sector;
          }

          if($tipo != "")
          {
               $condiciones["ti.id"] = $tipo;
          }

          if($nombre != "")
          {
               $condiciones["d.deal_name LIKE '%$nombre%' OR cu.company_name LIKE '%$nombre%' AND 1"] = "1";
          }

          return $this->getColeccion($page,$tampag,$grupo,$orden,$tabla,$campos,$condiciones);
     }

     function editar_Valores($id,$porcentaje,$fecha,$estatus = '',$valor = '')
     {

          $nvoregistro = array("advance_percent"=>"'".$porcentaje."'","register_date"=>"'".$fecha."'");

          if($estatus != '')
          {
               $nvoregistro["deal_status_id"] = "'".$estatus."'";
          }

          if($valor != '')
          {
               $nvoregistro["value"] = "'".$valor."'";
          }

          $condiciones = array("deal_id"=>$id);

          $tabla = "deal_history";

          return $this->editarRegistro($tabla,$nvoregistro,$condiciones);
     }

}

$MyNegocio = new NEGOCIOS;
