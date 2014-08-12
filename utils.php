<?php

  $method = strtolower($_SERVER['REQUEST_METHOD']);
  $http_vars = array();
  switch ($method)
  {
      case 'get':
          $CONTEXT = & $_GET;
          //$http_vars = $HTTP_GET_VARS;
          break;
      case 'post':
          $CONTEXT = & $_POST;
          //$http_vars = $HTTP_POST_VARS;
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



  $months = Array(1 => "Ene",
       2 => "Feb",
       3 => "Mar",
       4 => "Abr",
       5 => "May",
       6 => "Jun",
       7 => "Jul",
       8 => "Ago",
       9 => "Sep",
       10 => "Oct",
       11 => "Nov",
       12 => "Dic");




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

  

  function IP_REAL()
  {

      if (isset($_SERVER))
      {
          if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
              $ip = Sanitizacion($_SERVER["HTTP_X_FORWARDED_FOR"]);
          elseif (isset($_SERVER["HTTP_CLIENT_IP"]))
              $ip = Sanitizacion($_SERVER["HTTP_CLIENT_IP"]);
          else
              $ip = Sanitizacion($_SERVER["REMOTE_ADDR"]);
      }
      else
      {
          if (getenv('HTTP_X_FORWARDED_FOR'))
              $ip = Sanitizacion(getenv('HTTP_X_FORWARDED_FOR'));
          elseif (getenv('HTTP_CLIENT_IP'))
              $ip = Sanitizacion(getenv('HTTP_CLIENT_IP'));
          else
              $ip = Sanitizacion(getenv('REMOTE_ADDR'));
      }

      return $ip;
  }

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
      // return "skin/".TEMA_WEB."/images/qt/".$file;
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


          if (in_array("required", $rule) && $valor == "")
          {
              $msg = "Favor de llenar el campo $campo";
          }
          if ($valor != "" && in_array("valid_chars", $rule) && !validaCaracteres($valor))
          {
              $msg = "El campo $campo contiene caracteres no permitidos";
          }
          if ($valor != "" && in_array("email", $rule) && !ValidaMail($valor))
          {
              $msg = "El formato del campo $campo no es valido";
          }
          if ($valor != "" && in_array("url", $rule) && !url_valida($valor))
          {
              $msg = "El formato del campo $campo no es valido";
          }
          if ($valor != "" && in_array("numeric", $rule) && !is_numeric($valor))
          {
              $msg = "El formato del campo $campo no es valido";
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



  function edad($fecha_nac)
  {
      $dia = date("d");
      $mes = date("m");
      $anno = date("Y");

      $dia_nac = substr($fecha_nac, 8, 2);
      $mes_nac = substr($fecha_nac, 5, 2);
      $anno_nac = substr($fecha_nac, 0, 4);

      if ($mes_nac > $mes)
      {
          $calc_edad = $anno - $anno_nac - 1;
      }
      else
      {
          if ($mes == $mes_nac AND $dia_nac > $dia)
          {
              $calc_edad = $anno - $anno_nac - 1;
          }
          else
          {
              $calc_edad = $anno - $anno_nac;
          }
      }
      return $calc_edad;
  }

  function valida_imagen($file, $width = 0, $height = 0, $tipos = false)
  {
      if (file_exists($file))
      {
          $img_info = getimagesize($file);
          if ($img_info === FALSE)
          {
              return array(FALSE, "No se recibió un archivo de imágen.");
          }
          else
          {

              if (!$tipos)
                  $tipos = array('image/jpeg', 'image/png');

              $w = $img_info[0];
              $h = $img_info[1];
              $mime = $img_info['mime'];
              if ($width > 0)
              {
                  if ($width != $w)
                      return array(FALSE, "Largo de imágen inválido.");
              } else if ($height > 0)
              {
                  if ($height != $h)
                      return array(FALSE, "Altura de imágen inválido.");
              } else if (!in_array($mime, $tipos))
              {
                  return array(FALSE, 'Tipo de imágen inválida. ');
              }
              else
              {
                  return array(TRUE, 'OK');
              }
          }
      }
      else
      {
          return array(FALSE, "No se encontró la imágen.");
      }
  }

  
  function makeHTMLOrder($order, $ordercampo, $campo, $caption, $page, $width, $id = '')
  {


      if ($campo == $ordercampo && (!empty($campo) && !empty($ordercampo)))
      {
          $order = $order == "ASC" ? "DESC" : "ASC";

          $thisClass = $order == "ASC" ? "class='MyASC agustar_2'" : "class='MyDESC agustar_2'";
          $flecha = $order == "ASC" ? "<div class='clas_arriba'><a href=\"javascript:PaginacionSubmit('$page','$campo','$order');\"></a></div>" : "<div class='clas_abajo'><a href=\"javascript:PaginacionSubmit('$page','$campo','$order');\"></a></div>";
      }
      else
      {
          $thisClass = "class='MyASC agustar_2'";
          $flecha = "<div class='clas_abajo'><a href=\"javascript:PaginacionSubmit('$page','$campo','$order');\"></a></div>";
      }

      if (!empty($width))
      {
          $thisWidth = "width='$width'";
      }

      if (!empty($order) && !empty($caption))
      {
          $caption = "<div class='clas_titulos'><a href=\"javascript:PaginacionSubmit('$page','$campo','$order');\" >$caption</a></div>";
      }
      else if (!empty($id) && !empty($caption))
      {
          $caption = "<a href='#' data-toggle='modal' data-target='.bs-usuario-modal-lg' >$caption</a>";
      }
      else
      {
          $caption = $caption;
          $flecha = "";
      }

      if (!empty($id))
      {
          $id = "id='$id'";
      }



      print ("<td $id  $thisWidth  $thisClass>$caption &nbsp; " . $flecha . "</td>");
  }

  function selectSucursales($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("id", "name");
      $condiciones = array("status" => "1");

      $result = $consultas->SeleccionarTablaFila("fs_branch", $campos, $condiciones, "", "id");

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

  function selectGerentes($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      
      
      $campos = array("fs_people.name","fs_user.id");
      
      $condiciones = array("fs_user.status" => "1", "fs_user.profile_id" => NIVEL_GERENTE);
                                     
      $inner = array("fs_people:fs_user"=>"fs_people.id=fs_user.people_id");
      
      $result = $consultas->QueryINNERJOIN($inner, $campos, $condiciones, "", "fs_user.id");  
    
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

  function getSucursal($id)
  {
      $consultas = new CONSULTAS();

      $campos = array("id", "name");
      $condicion = array("id" => $id);

      $result = $consultas->SeleccionarTablaFila("fs_branch", $campos, $condicion, "", "id");

      if ($result == CONSULTAS_SUCCESS)
      {
          $fila = $consultas->Fetch();

          $name = utf8_encode($fila["name"]);
      }
      else
      {
          $name = "";
      }

      return $name;
  }

  function selectRegion($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("DISTINCT(region) as region");
      $condiciones = array("status" => "1");

      $result = $consultas->SeleccionarTablaFila("fs_branch", $campos, $condiciones, "", "id");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          // if(!empty($title)):
          $html .= "<option value=''>$title</option>";
          // endif;

          while ($row = $consultas->Fetch()):

              if ($row["region"] != ""):
                  $html .= "<option value='" . $row["region"] . "' ";


                  if ($row["region"] == $value):

                      $html .= "selected='selected'";
                  endif;


                  $html .= ">" . ($row["region"]) . "</option>";
              endif;


          endwhile;

          $html .= "</select>";
      }

      return $html;
  }

  function selectDivision($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("DISTINCT(division) as division");
      $condiciones = array("status" => "1");

      $result = $consultas->SeleccionarTablaFila("fs_branch", $campos, $condiciones, "", "id");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          // if(!empty($title)):
          $html .= "<option value=''>$title</option>";
          // endif;

          while ($row = $consultas->Fetch()):

              if ($row["division"] != ""):
                  $html .= "<option value='" . $row["division"] . "' ";


                  if ($row["division"] == $value):

                      $html .= "selected='selected'";
                  endif;


                  $html .= ">" . ($row["division"]) . "</option>";

              endif;

          endwhile;

          $html .= "</select>";
      }

      return $html;
  }

  function selectEjecutivo($id, $id_gerente, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("fs_user.id", "fs_people.name");
      $condiciones = array("fs_user.status" => "1", "fs_user.profile_id" => NIVEL_EJECUTIVO,"fs_user.branch_id"=>$id_gerente);

      $inner = array("fs_user:fs_people" => "fs_user.people_id=fs_people.id");

      $result = $consultas->QueryINNERJOIN($inner, $campos, $condiciones, "", "fs_people.name");

      //$result = $consultas->SeleccionarTablaFila("fs_user", $campos, $condiciones, "", "name");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          // if(!empty($title)):
          $html .= "<option value=''>$title</option>";
          // endif;

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

  function selectCampaign($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("id","name");
      $condiciones = array("status" => "1");

      $result = $consultas->SeleccionarTablaFila("fs_campaign", $campos, $condiciones, "", "id");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          // if(!empty($title)):
          $html .= "<option value=''>$title</option>";
          // endif;

          while ($row = $consultas->Fetch()):

              $html .= "<option value='" . $row["id"] . "' ";


              if ($row["name"] == $value):

                  $html .= "selected='selected'";
              endif;


              $html .= ">" . utf8_encode($row["name"]) . "</option>";

          endwhile;

          $html .= "</select>";
      }

      return $html;
  }

  function selectContrato($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("fs_contract.contract_number_id as contrato");
      $condiciones = array("status" => "1");

      $result = $consultas->SeleccionarTablaFila("fs_contract", $campos, $condiciones, "", "contrato");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          // if(!empty($title)):
          $html .= "<option value=''>$title</option>";
          // endif;

          while ($row = $consultas->Fetch()):

              $html .= "<option value='" . $row["contrato"] . "' ";


              if ($row["contrato"] == $value):

                  $html .= "selected='selected'";
              endif;


              $html .= ">" . ($row["contrato"]) . "</option>";

          endwhile;

          $html .= "</select>";
      }

      return $html;
  }

  function selectPuesto($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("id", "name");
      $condiciones = array("status" => "1");

      $result = $consultas->SeleccionarTablaFila("fs_profile", $campos, $condiciones, "", "id");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          // if(!empty($title)):
          $html .= "<option value=''>$title</option>";
          // endif;

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

  function selectAsignacion($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("DISTINCT(score) as valor");
      $condiciones = array("status" => "1");

      $result = $consultas->SeleccionarTablaFila("fs_contract", $campos, $condiciones, "", "id");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          // if(!empty($title)):
          $html .= "<option value=''>$title</option>";
          // endif;

          while ($row = $consultas->Fetch()):

              $html .= "<option value='" . $row["valor"] . "' ";


              if ($row["valor"] == $value):

                  $html .= "selected='selected'";
              endif;


              $html .= ">" . utf8_encode($row["valor"]) . "</option>";

          endwhile;

          $html .= "</select>";
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
  
  
  function selectRespuesta($id, $tipo='CALL',$value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("id","code", "name");
      $condiciones = array("status" => "1","type"=>$tipo);

      $result = $consultas->SeleccionarTablaFila("fs_type_answer", $campos, $condiciones, "", "id");

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
  
  
  function selectTipoContacto($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("id", "name");
      $condiciones = array("status" => "1");

      $result = $consultas->SeleccionarTablaFila("fs_type_contact", $campos, $condiciones, "", "id");

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
  
  
  
  function selectTipoRenovacion($id, $value = '', $title = '', $extra = '')
  {
      $consultas = new CONSULTAS();
      $campos = array("DISTINCT(type_renovation) as name");
      $condiciones = array("1" => "1");

      $result = $consultas->SeleccionarTablaFila("fs_contract", $campos, $condiciones, "", "name");

      if ($result == CONSULTAS_SUCCESS)
      {
          $html = "<select name='$id' id='$id' $extra>";

          if (!empty($title)):
              $html .= "<option value=''>$title</option>";
          endif;

          while ($row = $consultas->Fetch()):

              $html .= "<option value='" . $row["name"] . "' ";


              if ($row["name"] == $value):

                  $html .= "selected='selected'";
              endif;


              $html .= ">" . utf8_encode($row["name"]) . "</option>";

          endwhile;

          $html .= "</select>";
      }

      return $html;
  }