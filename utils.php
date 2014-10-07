<?php

  $method = strtolower($_SERVER['REQUEST_METHOD']);
  $http_vars = array();
  switch ($method)
  {
      case 'get':
          $CONTEXT = & $_GET;
          break;
      case 'post':
          $CONTEXT = & $_POST;
          break;
      default:
          $CONTEXT = array();
          break;
  }

  function Sanitizacion($var)
  {
      $var = htmlspecialchars($var, ENT_NOQUOTES);

      if (!get_magic_quotes_gpc())
      {
          $var = addslashes($var);
      }
      return utf8_decode($var);
  }

  $_Months = Array('01' => "Ene",
       '02' => "Feb",
       '03' => "Mar",
       '04' => "Abr",
       '05' => "May",
       '06' => "Jun",
       '07' => "Jul",
       '08' => "Ago",
       '09' => "Sep",
       '10' => "Oct",
       '11' => "Nov",
       '12' => "Dic");



  $months = Array(1 => "Enero",
       2 => "Febrero",
       3 => "Marzo",
       4 => "Abril",
       5 => "Mayo",
       6 => "Junio",
       7 => "Julio",
       8 => "Agosto",
       9 => "Septiembre",
       10 => "Octubre",
       11 => "Noviembre",
       12 => "Diciembre");




  $_Monthsre = Array("Enero" => 1,
       "Febrero" => 2,
       "Marzo" => 3,
       "Abril" => 4,
       "Mayo" => 5,
       "Junio" => 6,
       "Julio" => 7,
       "Agosto" => 8,
       "Septiembre" => 9,
       "Octubre" => 10,
       "Noviembre" => 11,
       "Diciembre" => 12);


  $_MonthsE = Array('01' => "Enero",
       '02' => "Febrero",
       '03' => "Marzo",
       '04' => "Abril",
       '05' => "Mayo",
       '06' => "Junio",
       '07' => "Julio",
       '08' => "Agosto",
       '09' => "Septiembre",
       '10' => "Octubre",
       '11' => "Noviembre",
       '12' => "Diciembre");

  $_MonthsE2S = array(
       "january" => "enero",
       "february" => "febrero",
       "march" => "marzo",
       "april" => "abril",
       "may" => "mayo",
       "june" => "junio",
       "july" => "julio",
       "august" => "agosto",
       "september" => "septiembre",
       "october" => "octubre",
       "november" => "noviembre",
       "december" => "diciembre"
  );

  function LimitePalabras($limit, $txt)
  {

      $contador = 0;
      $arrayTexto = split(' ', $txt);
      $newtxt = '';

      while ($limit >= strlen($newtxt) + strlen($arrayTexto[$contador]) && isset($arrayTexto[$contador]))
      {

          $newtxt .= ' ' . $arrayTexto[$contador];
          $contador++;
      }
      return $newtxt;
  }

  function makeHTMLPaginar($numrows1, $maxPage, $terminamosconel, $paginanum, $seccion, $caption)
  {

      if ($terminamosconel >= $numrows1)
      {
          $terminamoscon = $numrows1;
      }
      else
      {
          $terminamoscon = $terminamosconel;
      }
      $empezamoscon = $terminamosconel - 9;

      if ($paginanum > 1)
      {
          $page = $paginanum - 1;

          $prev = '<span>
                        <a href="javascript: FuncPaginar(\'' . $page . '\',\'' . $seccion . '\');">
                            <img class="img_middle" src="/images/flecha-atras.jpg" width="22" height="16" alt="icono-queremos-tomar"  />
                            </a>
                    </span><a href="javascript: FuncPaginar(\'' . $page . '\',\'' . $seccion . '\');"> Anterior</a>';
      }
      else
      {
          $prev = '';
      }

      if ($paginanum < $maxPage)
      {
          $page = $paginanum + 1;

          $next = '<a href="javascript: FuncPaginar(\'' . $page . '\',\'' . $seccion . '\');"> Siguiente</a><span><a href="javascript: FuncPaginar(\'' . $page . '\',\'' . $seccion . '\');">
                <img class="img_middle" src="/images/flecha-siguiente.jpg"  width="22" height="16" alt="icono-queremos-tomar"  /></a>
                </span>';
      }
      else
      {
          $next = '';
      }


      $html .= "<div class=\"texto-siguiente\">" . $prev . "  $empezamoscon - $terminamoscon (de $numrows1 $caption) " . $next . "</div>";
      return $html;
  }

  function makeHTMLPaginar50($numrows1, $maxPage, $terminamosconel, $paginanum, $seccion, $caption)
  {

      if ($terminamosconel >= $numrows1)
      {
          $terminamoscon = $numrows1;
      }
      else
      {
          $terminamoscon = $terminamosconel;
      }
      $empezamoscon = $terminamosconel - 49;

      if ($paginanum > 1)
      {
          $page = $paginanum - 1;

          $prev = '<span class="conte-flecha-siguiente">
                        <a href="javascript: FuncPaginar(\'' . $page . '\',\'' . $seccion . '\');">
                            <img class="img_middle" src="/images/flecha-atras.jpg" width="22" height="16" alt="icono-queremos-tomar"  />
                            </a>
                    <a href="javascript: FuncPaginar(\'' . $page . '\',\'' . $seccion . '\');"> Anterior</a></span>';
      }
      else
      {
          $prev = '';
      }

      if ($paginanum < $maxPage)
      {
          $page = $paginanum + 1;

          $next = '<span class="conte-flecha-siguiente"><a href="javascript: FuncPaginar(\'' . $page . '\',\'' . $seccion . '\');"> Siguiente</a><a href="javascript: FuncPaginar(\'' . $page . '\',\'' . $seccion . '\');">
                <img class="img_middle" src="/images/flecha-siguiente.jpg"  width="22" height="16" alt="icono-queremos-tomar"  /></a>
                </span>';
      }
      else
      {
          $next = '';
      }


      $html .= "<span class=\"texto-siguiente\"><span class=\"conte-texto-siguiente\">" . $prev . "  $empezamoscon - $terminamoscon (de $numrows1 $caption) " . $next . " </span> </span>";
      return $html;
  }

  function makeHTMLPaginarNorm($numrows1, $maxPage, $terminamosconel, $paginanum, $caption, $tampag = '10')
  {

      if ($terminamosconel >= $numrows1)
      {
          $terminamoscon = $numrows1;
      }
      else
      {
          $terminamoscon = $terminamosconel;
      }
      $empezamoscon = $terminamosconel - ($tampag - 1);

      if ($paginanum > 1)
      {
          $page = $paginanum - 1;
          $prev = " <a href=\"javascript: PaginarSimple($page);\">";
          $prev .= "<img class='img_middle' src='/images/atras.gif' width='24' height='18' align='absmiddle' border='0'/>  Anterior</a> ";
      }
      else
      {
          $prev = '';
      }

      if ($paginanum < $maxPage)
      {
          $page = $paginanum + 1;
          $next = " <a href=\"javascript: PaginarSimple($page);\"> ";
          $next .= "Siguiente <img class='img_middle' src='/images/siguiente.gif' width='24' height='18' align='absmiddle' border='0'/></a> ";
      }
      else
      {
          $next = '';
      }


      $html .= "<div class='col_560'><span class='bsnaviresult'>" . $first . $prev . "  $empezamoscon - $terminamoscon (de $numrows1 $caption) " . $next . $last . "</span></div>";
      return $html;
  }

  function makeHTMLPaginarMarco($numrows1, $maxPage, $terminamosconel, $paginanum)
  {

      global $_Strings;
      if ($terminamosconel >= $numrows1)
      {
          $terminamoscon = $numrows1;
      }
      else
      {
          $terminamoscon = $terminamosconel;
      }
      $empezamoscon = $terminamosconel - 9;
      $html .= "<span class='resultadocount'>$empezamoscon " . $_Strings["a"] . " $terminamoscon " . $_Strings["De"] . " $numrows1</span>";
      return $html;
  }

  function getAcentos($text)
  {
      $caracteres = array("ACUTE;" => "acute;", "TILDE;" => "tilde;", "EXCL;" => "excl;", "GRAVE;" => "grave;");

      foreach ($caracteres as $key => $value)
      {
          $text = str_replace($key, $value, $text);
      }
      return $text;
  }

  function getCodifica($txt)
  {
      return utf8_encode($txt);
  }

  function reemplaza($datos)
  {
      $acentos = array(
           "&" => "&amp;",
           "“" => "&quot;",
           "<strong>" => "",
           "</strong>" => "",
           "ñ" => "&ntilde;",
           "Ñ" => "&Ntilde;",
           "á" => "&aacute;",
           "Á" => "&Aacute;",
           "é" => "&eacute;",
           "É" => "&Eacute;",
           "í" => "&iacute;",
           "Í" => "&Iacute;",
           "ó" => "&oacute;",
           "Ó" => "&Oacute;",
           "ö" => "&ouml;",
           "Ö" => "&Ouml;",
           "ú" => "&uacute;",
           "Ú" => "&Uacute;",
           "ü" => "&uuml;",
           "Ü" => "&Uuml;",
           "<a" => "a",
           "</a>" => "a",
           "" => "<!--StartFragment-->",
           "" => "<!--EndFragment-->",
           "“" => "",
           "”" => "",
           "<b>" => "",
           "</b>" => "",
           "<it>" => "",
           "</it>" => "",
           "<u>" => "",
           "</u>" => "",
           "<i>" => "",
           "</i>" => "",
           ". " => "",
           "<br>" => " ",
           "<br/>" => " "
      );

      foreach ($acentos as $llave => $valor)
      {
          $datos = str_replace($llave, $valor, $datos);
      }

      return $datos;
  }

  function ValidaMail($pMail)
  {
      if (ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@+([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$", $pMail))
      {
          return true;
      }
      else
      {
          return false;
      }
  }

//Acentos en Mayusculas
  function Convert($cadena)
  {
      $Acentos = strtr($cadena, "àèìòùáéíóúçñäëïöüãâ", "ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜÃÂ");
      return $Acentos;
  }

  function Espacioswhite($text)
  {
      if (empty($text))
      {
          return true;
      }

      $text = str_replace(" ", "", $text);

      if (strlen($text) == 0)
      {
          return true;
      }
      return false;
  }

  function getPathImg($file)
  {
      return "gfx/" . $file;
  }

  function getToken($name = '')
  {
      $alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdfghijklmnopqrstuvwxyz0123456789";
      $token = md5(substr(md5(str_shuffle($alphanum)), 0, 10));
      $_SESSION["token_" . $name] = $token;

      return $token;
  }

  function url_valida($url)
  {
      static $urlregex = "^(https?|ftp)\:\/\/([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?[a-z0-9+\$_-]+(\.[a-z0-9+\$_-]+)*(\:[0-9]{2,5})?(\/([a-z0-9+\$_-]\.?)+)*\/?(\?[a-z+&\$_.-][a-z0-9;:@/&%=+\$_.-]*)?(#[a-z_.-][a-z0-9+\$_.-]*)?\$";

      return eregi($urlregex, $url);
  }

  function validaCaracteres($txt)
  {
      $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_.";
      for ($i = 0; $i < strlen($txt); $i++)
      {
          if (strpos($permitidos, substr($txt, $i, 1)) === false)
          {

              return false;
          }
      }
      return true;
  }

  function validFormsServer($rules)
  {
      $msg = "";
      foreach ($rules as $campo => $rule)
      {

          $valor = $rule['valor'];


          if (in_array("required", $rule) && in_array("select", $rule) && $valor == "")
          {
              $msg .= "Favor de seleccionar el campo $campo\n";
          }

          if (in_array("required", $rule) && in_array("field", $rule) && $valor == "")
          {
              $msg .= "Favor de llenar el campo $campo\n";
          }

          if ($valor != "" && in_array("valid_chars", $rule) && !validaCaracteres($valor))
          {
              $msg = "El campo $campo contiene caracteres no permitidos";
          }
          if ($valor != "" && in_array("email", $rule) && !ValidaMail($valor))
          {
              $msg .= "El formato del campo $campo no es válido\n";
          }
          if ($valor != "" && in_array("url", $rule) && !url_valida($valor))
          {
              $msg = "El formato del campo $campo no es válido";
          }
          if ($valor != "" && in_array("numeric", $rule) && !is_numeric($valor))
          {
              $msg .= "El formato del campo $campo no es válido";
          }
          if (in_array("length", $rule) && in_array("min", $rule["length"]) && strlen($valor) < $rule["leng"]["min"])
          {
              $msg = "El campo $campo no debe tener menos de " . $rule["leng"]["min"] . " caracteres";
          }
          if ($valor != "" && in_array("length", $rule) && in_array("max", $rule["length"]) && strlen($valor) < $rule["leng"]["max"])
          {
              $msg = "El campo $campo no debe tener mas de " . $rule["leng"]["max"] . " caracteres";
          }
          if ($valor != "" && in_array("apropiado", $rule) && isApropiado($valor) == false)
          {
              $msg = "El campo $campo no debe tener palabras inapropiadas";
          }
      }

      return $msg;
  }

  function makeHTMLOrder($order, $ordercampo, $campo, $caption, $page, $width)
  {
      if ($campo == $ordercampo && (!empty($campo) && !empty($ordercampo)))
      {
          $order = $order == "ASC" ? "DESC" : "ASC";

          $thisClass = $order == "ASC" ? "class='MyASC'" : "class='MyDESC'";

          $thisimagen = $order == "ASC" ? "<img src='gfx/img/icono_arriba.png'>&nbsp;" : "<img src='gfx/img/icono_abajo.png'>&nbsp;";
      }
      else
      {
          $thisClass = "class='MyDESC'";
          $thisimagen = "<img src='gfx/img/icono_abajo.png'>&nbsp;";
      }


      if (!empty($width))
      {
          $thisWidth = "width='$width'";
      }

      if (!empty($caption))
      {
          $caption = "<a href=\"javascript:PaginacionSubmit('$page','$campo','$order');\" >$thisimagen $caption</a>";
      }

      print ("<th $thisClass> $caption</th>");
  }

  function selectTipoMoneda($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("id", "name", "prefix");
      $condiciones = array("1" => "1");

      $result = $consultas->SeleccionarTablaFila("currency", $campos, $condiciones, "", "id");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          if (!empty($title)):
              $html .= "<option value=''>$title</option>";
          endif;

          while ($row = $consultas->Fetch()):

              $html .= "<option value='" . $row["id"] . "' ";


              if ($row["id"] == $value):

                  $html .= "selected='selected'";
              endif;


              $html .= ">" . utf8_encode($row["name"]) . " - " . $row["prefix"] . "</option>";

          endwhile;

          $html .= "</select>";
      }

      return $html;
  }

  function selectCliente($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();

      $campos = array("id", "company_name");
      $condiciones = array("1" => "1");

      $result = $consultas->SeleccionarTablaFila("customer", $campos, $condiciones, "", "id");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          if (!empty($title)):
              $html .= "<option value=''>$title</option>";
          endif;

          while ($row = $consultas->Fetch()):

              $html .= "<option value='" . $row["id"] . "' ";


              if ($row["id"] == $value):

                  $html .= "selected='selected'";
              endif;


              $html .= ">" . utf8_encode($row["company_name"]) . "</option>";

          endwhile;

          $html .= "</select>";
      }

      return $html;
  }

  function selectSector($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();

      $campos = array("id", "name", "prefix");
      $condiciones = array("1" => "1");

      $result = $consultas->SeleccionarTablaFila("sector", $campos, $condiciones, "", "id");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          if (!empty($title)):
              $html .= "<option value=''>$title</option>";
          endif;

          while ($row = $consultas->Fetch()):

              $html .= "<option value='" . $row["id"] . "' ";


              if ($row["id"] == $value):

                  $html .= "selected='selected'";
              endif;


              $html .= ">" . utf8_encode($row["name"]) . "</option>";

          endwhile;

          $html .= "</select>";
      }

      return $html;
  }

  function selectStatus($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();

      $campos = array("id", "name", "prefix");
      $condiciones = array("1" => "1");

      $result = $consultas->SeleccionarTablaFila("deal_status", $campos, $condiciones, "", "id");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          if (!empty($title)):
              $html .= "<option value=''>$title</option>";
          endif;

          while ($row = $consultas->Fetch()):

              $html .= "<option value='" . $row["id"] . "' ";


              if ($row["id"] == $value):

                  $html .= "selected='selected'";
              endif;


              $html .= ">" . utf8_encode($row["name"]) . "</option>";

          endwhile;

          $html .= "</select>";
      }

      return $html;
  }

  function selectEmpleado($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("em.id", "em.title", "CONCAT(pe.first_name,' ',pe.last_name) as nombre");

      $condicion = array("1" => "1");

      $inner = array("employee em:people pe" => "em.people_id=pe.id");

      $result = $consultas->QueryINNERJOIN($inner, $campos, $condicion, "", "em.id");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          if (!empty($title)):
              $html .= "<option value=''>$title</option>";
          endif;

          while ($row = $consultas->Fetch()):

              $html .= "<option value='" . $row["id"] . "' ";


              if ($row["id"] == $value):

                  $html .= "selected='selected'";
              endif;


              $html .= ">" . utf8_encode($row["nombre"]) . "</option>";

          endwhile;

          $html .= "</select>";
      }

      return $html;
  }

  function selectTipo($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("id", "name");

      $condicion = array("1" => "1");

      $tabla = "types";

      $result = $consultas->SeleccionarTablaFila($tabla, $campos, $condicion, $group = '', $order = 'id');

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          if (!empty($title)):
              $html .= "<option value=''>$title</option>";
          endif;

          while ($row = $consultas->Fetch()):

              $html .= "<option value='" . $row["id"] . "' ";


              if ($row["id"] == $value):

                  $html .= "selected='selected'";
              endif;


              $html .= ">" . utf8_encode($row["name"]) . "</option>";

          endwhile;

          $html .= "</select>";
      }

      return $html;
  }

  function makeHTMLPaginarListado($numrows1, $maxPage, $terminamosconel, $paginanum, $by, $order, $tampag)
  {
      if ($terminamosconel >= $numrows1)
      {
          $terminamoscon = $numrows1;
      }
      else
      {
          $terminamoscon = $terminamosconel;
      }
      $empezamoscon = $terminamosconel - ($tampag - 1);

      if ($paginanum > 1)
      {
          $page = $paginanum - 1;
          $prev = " <a  href=\"javascript: PaginacionSubmit('$page','$by','$order');\" class='datos'>";
          $prev .= "Anterior</a> ";
      }
      else
      {
          $prev = '';
      }

      if ($paginanum < $maxPage)
      {
          $page = $paginanum + 1;
          $next = " <a  href=\"javascript: PaginacionSubmit('$page','$by','$order');\" class='datos'> ";
          $next .= "Siguiente </a> ";
      }
      else
      {
          $next = '';
      }

      $html .= "<span class='datos'>" . $first . $prev . "  $empezamoscon - $terminamoscon (de $numrows1) " . $next . $last . "</span>";

      if ($tampag <= $numrows1)
      {

          $html .= "<br />";

          $anterior = $paginanum - 1;
          $posterior = $paginanuml + 1;

          if ($paginanum > 1)
              $html .= "<a  href=\"javascript: PaginacionSubmit('1','$by','$order');\" class='datos'>&laquo;</a> ";
          else
              $html.= "<span class='datos'><b>&laquo;</b></span>";


          if ($paginanum < 6)
          {
              for ($i = 1; $i < $paginanum; $i++)
                  $html .= "<a  href=\"javascript: PaginacionSubmit('$i','$by','$order');\" class='datos'> $i</a> ";
          }
          else
          {
              for ($i = $paginanum - 5; $i < $paginanum; $i++)
                  $html .= "<a  href=\"javascript: PaginacionSubmit('$i','$by','$order');\" class='datos'> $i</a> ";
          }

          $html .= "<span class='datos'>[<b>$paginanum</b>]</span>";

          if ($paginanum + 6 > $maxPage)
          {
              for ($i = $paginanum + 1; $i <= $maxPage; $i++)
                  $html .= "<a  href=\"javascript: PaginacionSubmit('$i','$by','$order');\" class='datos'> $i</a> ";
          }
          else
          {
              for ($i = $paginanum + 1; $i <= $paginanum + 6; $i++)
                  $html .= "<a  href=\"javascript: PaginacionSubmit('$i','$by','$order');\" class='datos'> $i</a> ";
          }
          if ($paginanum < $maxPage)
              $html .= "<a  href=\"javascript: PaginacionSubmit('$maxPage','$by','$order');\" class='datos'> &raquo;</a>";
          else
              $html .= "<span class='datos'><b>&raquo;</b></span>";

          $html .= "<br />";
      }

      return $html;
  }

  function toBytes($bytes)
  {
      if ($bytes >= 1073741824)
      {
          $bytes = number_format($bytes / 1073741824, 2) . ' GB';
      }
      elseif ($bytes >= 1048576)
      {
          $bytes = number_format($bytes / 1048576, 2) . ' MB';
      }
      elseif ($bytes >= 1024)
      {
          $bytes = number_format($bytes / 1024, 2) . ' KB';
      }
      elseif ($bytes > 1)
      {
          $bytes = $bytes . ' bytes';
      }
      elseif ($bytes == 1)
      {
          $bytes = $bytes . ' byte';
      }
      else
      {
          $bytes = '0 bytes';
      }

      return $bytes;
  }

  function getReparto($total, $personas)
  {
      $reparto = array();

      $cantidad = ($total / $personas);

      $contador = 1;

      for ($i = 1; $i <= $total; $i++)
      {
          if ($contador <= $personas)
          {
              for ($x = 1; $x <= ($cantidad); $x++)
              {
                  $reparto[$contador][] = $x;
              }
          }

          $contador++;
      }

      return $reparto;
  }

  function calendar($month, $year)
  {
      $dato = array();


      $current_month = date("m");
      $current_year = date("Y");


      if (!empty($month))
      {
          if ($month < 10)
          {
              $month = "0" . $month;

              $current_month = $month - 1;
          }
          else
          {
              $current_month = $month;
          }
      }






      $dato["month"] = $current_month;
      //$dato["year"] = date("Y");


      return $dato;
  }

  function get_date($date,$day=1)
  {
      
      if (!empty($date))
      {
          $nueva = strtotime('+'.$day.'day', strtotime($date));

          $nueva = date('Y-m-j', $nueva);
      }

      return $nueva;
  }
  
  
   function moneda_formato($value)
  {
      $moneda = number_format($value, 2, '.', ',');

      return $moneda;
  }