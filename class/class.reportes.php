<?php

class REPORTES extends objectOperations
{

     function get_Kpis($page,$tampag,$grupo,$orden,$anio,$mes)
     {
          $sql = "SELECT * FROM (
                SELECT
                e.id as id_empleado,
                CONCAT(p.first_name,' ',p.last_name) as  empleado,
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

          $this->m_ibd->Query("cuantos",$sql);

          $total = $this->m_ibd->Fetcharray("cuantos");

          $this->m_total = count($total);

          $sql .= " LIMIT $reg1, $tampag";

          //echo $sql;

          $result = $this->m_ibd->Query("kpis",$sql);

          if($result == IBD_SUCCESS)
          {
               $filas = $this->m_ibd->Fetcharray("kpis");

               if(count($filas) > 0)
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

     function get_TablaGrafica($page,$tampag,$grupo,$orden)
     {
          $sql = "SELECT * FROM (
                                   SELECT 
                                   YEAR(pr.register_date) as anio,
                                   MONTHNAME(pr.register_date) as mes,
                                   SUM(pr.value) as suma_cobrar,
                                   SUM(ar.value) as suma_remision, 
                                   SUM(sa.value) as ventas,
                                   SUM(st.value) as stock,
                                   SUM(ba.value) as backorder
                                   FROM pending_referrals pr 
                                   INNER JOIN accounts_receivable ar ON pr.register_date=ar.register_date 
                                   INNER JOIN sales sa ON pr.register_date=sa.register_date
                                   INNER JOIN stock st ON pr.register_date=st.register_date
                                   INNER JOIN backorder ba ON pr.register_date=ba.register_date
                                   GROUP BY pr.register_date
                                   ) AS tbl GROUP BY $grupo";

          $reg1 = ($page - 1) * $tampag;

          $this->m_ibd->Query("cuantos",$sql);

          $total = $this->m_ibd->Fetcharray("cuantos");

          $this->m_total = count($total);

          $sql .= " LIMIT $reg1, $tampag $orden";

          //echo $sql;

          $result = $this->m_ibd->Query("tabla_grafica",$sql);

          if($result == IBD_SUCCESS)
          {
               $filas = $this->m_ibd->Fetcharray("tabla_grafica");

               if(count($filas) > 0)
               {
                    return $filas;
               }
               else
               {
                    return 0;
               }
          }

          $this->m_ibd->Liberar("tabla_grafica");
     }

}

$MyReportes = new REPORTES();
