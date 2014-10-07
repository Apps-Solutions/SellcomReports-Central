<?php

  class REPORTES extends objectOperations
  {

      public $cuartos;
      public $totales;

      public function get_Kpis($page, $tampag, $grupo, $orden, $anio, $mes)
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

      function get_TablaGrafica($page, $tampag, $grupo, $orden)
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

          $this->m_ibd->Query("cuantos", $sql);

          $total = $this->m_ibd->Fetcharray("cuantos");

          $this->m_total = count($total);

          $sql .= " LIMIT $reg1, $tampag $orden";

          //echo $sql;

          $result = $this->m_ibd->Query("tabla_grafica", $sql);

          if ($result == IBD_SUCCESS)
          {
              $filas = $this->m_ibd->Fetcharray("tabla_grafica");

              if (count($filas) > 0)
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

      public function get_Inicio($page, $tampag, $grupo, $orden, $b_fecha = '')
      {
          $sql = "SELECT 
                    dh.register_date            as Fecha,
                    IFNULL(dj.forecast50,0)     as Forecast50,
                    IFNULL(dh.forecast80,0)     as Forecast80,
                    IFNULL(dk.forecast100,0)    as Forecast100,
                    IFNULL(ba.backorder,0)      as Backorder,
                    IFNULL(depot.stock,0)       as Stock,
                    IFNULL(rm.remision,0)       as Remision,
                    IFNULL(rs.remisionsemanal,0)  as RemisionSemanal
                    FROM deal de 
                    INNER JOIN deal_history dh 
                    ON de.id=dh.deal_id
                    LEFT JOIN 
                    (
                        SELECT dj.register_date as fecha, 
                        SUM(dj.value) as forecast50 
                        FROM deal d 
                        INNER JOIN deal_history dj
                        ON d.id=dj.deal_id
                        WHERE dj.deal_status_id=1 
                        AND dj.advance_percent=50  
                        GROUP BY dj.register_date
                    ) 
                    as dj ON dh.register_date=dj.fecha
                    LEFT JOIN 
                    (
                        SELECT dh.register_date as fecha, 
                        SUM(dh.value) as forecast80 
                        FROM deal d
                        INNER JOIN deal_history dh
                        ON d.id=dh.deal_id
                        WHERE dh.deal_status_id=1 
                        AND dh.advance_percent=80  
                        GROUP BY dh.register_date
                    ) 
                    as dh ON dh.register_date=dh.fecha
                    LEFT JOIN 
                    (
                        SELECT dk.register_date as fecha, 
                        SUM(dk.value) as forecast100 
                        FROM deal d 
                        INNER JOIN deal_history dk
                        ON d.id=dk.deal_id
                        WHERE dk.deal_status_id=2 
                        AND dk.advance_percent=99  
                        GROUP BY dk.register_date
                    ) 
                    as dk ON dh.register_date=dk.fecha
                    LEFT JOIN 
                    (
                        SELECT dm.register_date as fecha, 
                        SUM(dm.value) as backorder 
                        FROM deal d 
                        INNER JOIN deal_history dm
                        ON d.id=dm.deal_id
                        WHERE dm.deal_status_id=2 
                        GROUP BY dm.register_date
                    )
                    as ba ON dh.register_date=ba.fecha
                    LEFT JOIN 
                    (
                        SELECT 
                        da.register_date as fecha, 
                        SUM(da.depot_stock) as stock
                        FROM db_kpis.data da
                        GROUP BY da.register_date
                    ) as depot ON dh.register_date=depot.fecha
                    LEFT JOIN 
                    (
                        SELECT 
                        pr.register_date as fecha,
                        SUM(pr.value) as remision 
                        FROM pending_referrals pr 
                        GROUP BY pr.register_date
                    )
                    as rm ON dh.register_date=rm.fecha
                    LEFT JOIN 
                    (
                        SELECT 
                        rs.register_date as fecha,
                        SUM(rs.value) as remisionsemanal 
                        FROM pending_referrals rs 
                        GROUP BY rs.register_date
                    )
                    as rs ON dh.register_date=rs.fecha ";


          if (!empty($b_fecha))
          {
              $b_fecha = explode('-', $b_fecha);

              $anio = $b_fecha[0];
              $mes = $b_fecha[1];

              $sql .=" WHERE YEAR(dh.register_date) = '$anio' AND MONTH(dh.register_date) = '$mes' ";
          }

          $sql .= " GROUP BY dh.register_date";

          $reg1 = ($page - 1) * $tampag;

          $this->m_ibd->Query("cuantos", $sql);

          $total = $this->m_ibd->FetchArray("cuantos");

          $this->m_total = count($total);

          $sql .= " ORDER BY $orden LIMIT $reg1, $tampag";

          //echo $sql;
          $data = $this->m_ibd->Query('result', $sql);

          if ($data == IBD_SUCCESS)
          {
              $filas = $this->m_ibd->Fetcharray('result');

              if (count($filas) > 0)
              {
                  return $filas;
              }
              else
              {
                  return array();
              }
          }

          $this->m_ibd->Liberar("result");
      }

      public function get_Inicio2($page, $tampag, $grupo, $orden, $b_fecha = '')
      {
          $sql = "SELECT 
                        dh.register_date as fecha,
                        IFNULL(pr.total,0) as PendienteFacturar,
                        IFNULL(pr2.total,0) as PendienteFacturar2,
                        IFNULL(ar.total,0) as CuentaCobrar
                        FROM deal de 
                        INNER JOIN deal_history dh
                        ON de.id=dh.deal_id
                        LEFT JOIN 
                        (
                            SELECT 
                            pr.register_date as fecha, 
                            SUM(pr.value) as total 
                            FROM pending_referrals pr 
                            GROUP BY pr.register_date

                        ) 
                        as pr ON dh.register_date=pr.fecha
                        LEFT JOIN 
                        (
                            SELECT 
                            pr2.register_date as fecha, 
                            SUM(pr2.value) as total 
                            FROM pending_referrals pr2 
                            GROUP BY pr2.register_date

                        ) 
                        as pr2 ON dh.register_date=pr2.fecha
                        LEFT JOIN 
                        (
                            SELECT 
                            ar.register_date as fecha, 
                            SUM(ar.value) as total 
                            FROM accounts_receivable ar 
                            GROUP BY ar.register_date
                        )
                        as ar ON dh.register_date=ar.fecha ";

          if (!empty($b_fecha))
          {
              $b_fecha = explode('-', $b_fecha);

              $anio = $b_fecha[0];
              $mes = $b_fecha[1];

              $sql .=" WHERE YEAR(dh.register_date) = '$anio' AND MONTH(dh.register_date) = '$mes' ";
          }
          
          $sql.=" GROUP BY dh.register_date ";

          $reg1 = ($page - 1) * $tampag;

          $this->m_ibd->Query("cuantos", $sql);

          $total = $this->m_ibd->FetchArray("cuantos");

          $this->m_total = count($total);

          $sql .= " ORDER BY $orden LIMIT $reg1, $tampag";

          //echo $sql;
          $data = $this->m_ibd->Query('result', $sql);

          if ($data == IBD_SUCCESS)
          {
              $filas = $this->m_ibd->Fetcharray('result');

              if (count($filas) > 0)
              {
                  return $filas;
              }
              else
              {
                  return array();
              }
          }

          $this->m_ibd->Liberar("result");
      }

      public function reporte_AnioMes($page, $tampag, $grupo, $orden, $anio = '')
      {
          global $_Monthsre;
          $sql = "SELECT 
                grafica.Ano as Anio,
                SUM(grafica.Ene) as Enero,
                SUM(grafica.Feb) as Febrero,
                SUM(grafica.Mar) as Marzo,
                SUM(grafica.Abr) as Abril,
                SUM(grafica.May) as Mayo,
                SUM(grafica.Jun) as Junio,
                SUM(grafica.Jul) as Julio,
                SUM(grafica.Ago) as Agosto,
                SUM(grafica.Sep) as Septiembre,
                SUM(grafica.Oct) as Octubre,
                SUM(grafica.Nov) as Noviembre,
                SUM(grafica.Dic) as Diciembre
                FROM 
                (
                    SELECT
                        YEAR(ac.register_date) as Ano,
                        SUM(IF(MONTH(ac.register_date) =1,value,0)) as Ene,
                        SUM(IF(MONTH(ac.register_date) =2,value,0)) as Feb,
                        SUM(IF(MONTH(ac.register_date) =3,value,0)) as Mar,
                        SUM(IF(MONTH(ac.register_date) =4,value,0)) as Abr,
                        SUM(IF(MONTH(ac.register_date) =5,value,0)) as May,
                        SUM(IF(MONTH(ac.register_date) =6,value,0)) as Jun,
                        SUM(IF(MONTH(ac.register_date) =7,value,0)) as Jul,
                        SUM(IF(MONTH(ac.register_date) =8,value,0)) as Ago,
                        SUM(IF(MONTH(ac.register_date) =9,value,0)) as Sep,
                        SUM(IF(MONTH(ac.register_date) =10,value,0)) as Oct,
                        SUM(IF(MONTH(ac.register_date) =11,value,0)) as Nov,
                        SUM(IF(MONTH(ac.register_date) =12,value,0)) as Dic
                    FROM accounts_receivable ac GROUP BY ac.register_date

                    UNION ALL

                    SELECT 
                        YEAR(pr.register_date) as Ano,
                        SUM(IF(MONTH(pr.register_date) =1,value,0)) as Ene,
                        SUM(IF(MONTH(pr.register_date) =2,value,0)) as Feb,
                        SUM(IF(MONTH(pr.register_date) =3,value,0)) as Mar,
                        SUM(IF(MONTH(pr.register_date) =4,value,0)) as Abr,
                        SUM(IF(MONTH(pr.register_date) =5,value,0)) as May,
                        SUM(IF(MONTH(pr.register_date) =6,value,0)) as Jun,
                        SUM(IF(MONTH(pr.register_date) =7,value,0)) as Jul,
                        SUM(IF(MONTH(pr.register_date) =8,value,0)) as Ago,
                        SUM(IF(MONTH(pr.register_date) =9,value,0)) as Sep,
                        SUM(IF(MONTH(pr.register_date) =10,value,0)) as Oct,
                        SUM(IF(MONTH(pr.register_date) =11,value,0)) as Nov,
                        SUM(IF(MONTH(pr.register_date) =12,value,0)) as Dic
                    FROM pending_referrals pr GROUP BY pr.register_date

                    UNION ALL

                   SELECT 
                        YEAR(s.register_date) as Ano,
                        SUM(IF(MONTH(s.register_date) =1,value,0)) as Ene,
                        SUM(IF(MONTH(s.register_date) =2,value,0)) as Feb,
                        SUM(IF(MONTH(s.register_date) =3,value,0)) as Mar,
                        SUM(IF(MONTH(s.register_date) =4,value,0)) as Abr,
                        SUM(IF(MONTH(s.register_date) =5,value,0)) as May,
                        SUM(IF(MONTH(s.register_date) =6,value,0)) as Jun,
                        SUM(IF(MONTH(s.register_date) =7,value,0)) as Jul,
                        SUM(IF(MONTH(s.register_date) =8,value,0)) as Ago,
                        SUM(IF(MONTH(s.register_date) =9,value,0)) as Sep,
                        SUM(IF(MONTH(s.register_date) =10,value,0)) as Oct,
                        SUM(IF(MONTH(s.register_date) =11,value,0)) as Nov,
                        SUM(IF(MONTH(s.register_date) =12,value,0)) as Dic
                    FROM sales s GROUP BY s.register_date

                    UNION ALL

                    SELECT 
                        YEAR(t.register_date) as Ano,
                        SUM(IF(MONTH(t.register_date) =1,value,0)) as Ene,
                        SUM(IF(MONTH(t.register_date) =2,value,0)) as Feb,
                        SUM(IF(MONTH(t.register_date) =3,value,0)) as Mar,
                        SUM(IF(MONTH(t.register_date) =4,value,0)) as Abr,
                        SUM(IF(MONTH(t.register_date) =5,value,0)) as May,
                        SUM(IF(MONTH(t.register_date) =6,value,0)) as Jun,
                        SUM(IF(MONTH(t.register_date) =7,value,0)) as Jul,
                        SUM(IF(MONTH(t.register_date) =8,value,0)) as Ago,
                        SUM(IF(MONTH(t.register_date) =9,value,0)) as Sep,
                        SUM(IF(MONTH(t.register_date) =10,value,0)) as Oct,
                        SUM(IF(MONTH(t.register_date) =11,value,0)) as Nov,
                        SUM(IF(MONTH(t.register_date) =12,value,0)) as Dic
                    FROM stock t GROUP BY t.register_date

                    UNION ALL

                     SELECT 
                        YEAR(b.register_date) as Ano,
                        SUM(IF(MONTH(b.register_date) =1,value,0)) as Ene,
                        SUM(IF(MONTH(b.register_date) =2,value,0)) as Feb,
                        SUM(IF(MONTH(b.register_date) =3,value,0)) as Mar,
                        SUM(IF(MONTH(b.register_date) =4,value,0)) as Abr,
                        SUM(IF(MONTH(b.register_date) =5,value,0)) as May,
                        SUM(IF(MONTH(b.register_date) =6,value,0)) as Jun,
                        SUM(IF(MONTH(b.register_date) =7,value,0)) as Jul,
                        SUM(IF(MONTH(b.register_date) =8,value,0)) as Ago,
                        SUM(IF(MONTH(b.register_date) =9,value,0)) as Sep,
                        SUM(IF(MONTH(b.register_date) =10,value,0)) as Oct,
                        SUM(IF(MONTH(b.register_date) =11,value,0)) as Nov,
                        SUM(IF(MONTH(b.register_date) =12,value,0)) as Dic
                    FROM backorder b GROUP BY b.register_date
                ) 
                AS grafica WHERE grafica.Ano <=" . date('Y') . "   ";


          if (!empty($anio))
          {
              //$sql .= " WHERE grafica.Ano='$anio'";
          }

          $sql .= " GROUP BY $grupo";

          $reg1 = ($page - 1) * $tampag;

          $this->m_ibd->Query("cuantos", $sql);

          $total = $this->m_ibd->FetchArray("cuantos");

          $this->m_total = count($total);

          $sql .= " ORDER BY $orden LIMIT $reg1, $tampag";

          // echo $sql;
          $data = $this->m_ibd->Query('reporte', $sql);

          if ($data == IBD_SUCCESS)
          {
              $filas = $this->m_ibd->Fetcharray('reporte');

              if (count($filas) > 0)
              {
                  $rows = array();
                  $data = array();
                  $this->cuartos = array();
                  $this->totales = array();

                  foreach ($filas as $k => $v)
                  {
                      $rows['Anios'][] = ($v['Anio']);

                      $rows['Enero'][$v['Anio']] = $v['Enero'];
                      $rows['Febrero'][$v['Anio']] = $v['Febrero'];
                      $rows['Marzo'][$v['Anio']] = $v['Marzo'];

                      $rows['Abril'][$v['Anio']] = $v['Abril'];
                      $rows['Mayo'][$v['Anio']] = $v['Mayo'];
                      $rows['Junio'][$v['Anio']] = $v['Junio'];

                      $rows['Julio'][$v['Anio']] = $v['Julio'];
                      $rows['Agosto'][$v['Anio']] = $v['Agosto'];
                      $rows['Septiembre'][$v['Anio']] = $v['Septiembre'];

                      $rows['Octubre'][$v['Anio']] = $v['Octubre'];
                      $rows['Noviembre'][$v['Anio']] = $v['Noviembre'];
                      $rows['Diciembre'][$v['Anio']] = $v['Diciembre'];

                      $this->totales[$v['Anio']] = ($v['Enero'] + $v['Febrero'] + $v['Marzo'] + $v['Abril'] + $v['Mayo'] + $v['Junio'] + $v['Julio'] + $v['Agosto'] + $v['Septiembre'] + $v['Octubre'] + $v['Noviembre'] + $v['Diciembre']);

                      $this->cuartos['Q1'][$v['Anio']] = ($v['Enero'] + $v['Febrero'] + $v['Marzo']);
                      $this->cuartos['Q2'][$v['Anio']] = ($v['Abril'] + $v['Mayo'] + $v['Junio']);
                      $this->cuartos['Q3'][$v['Anio']] = ($v['Julio'] + $v['Agosto'] + $v['Septiembre']);
                      $this->cuartos['Q4'][$v['Anio']] = ($v['Octubre'] + $v['Noviembre'] + $v['Diciembre']);
                  }

                  return $rows;
              }
              else
              {
                  return array();
              }
          }

          $this->m_ibd->Liberar("reporte");
      }

  }

  $MyReportes = new REPORTES();
  