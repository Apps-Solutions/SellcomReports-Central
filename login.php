<?php
  require 'init.php';
  include_once(DIRECTORY_CLASS . 'class.login.php');

  $login = new LOGIN;

  $usuario = isset($CONTEXT["usuario"]) ? Sanitizacion($CONTEXT["usuario"]) : "";
  $contrasena = isset($CONTEXT["contrasena"]) ? Sanitizacion($CONTEXT["contrasena"]) : "";
  $error = false;

  if (empty($usuario))
  {
      $http_vars["MsgErr"] .= "Favor de llenar el campo Usuario\n";
      $error = true;
  }
  if (empty($contrasena))
  {
      $http_vars["MsgErr"] .= "Favor de llenar el campo Contrase&ntilde;a\n";
      $error = true;
  }
  if ($error == false)
  {
      
      //$result = $login->Loggin($usuario, md5($contrasena));

      //if ($result == LOGIN_SUCCESS)
      if($usuario == 'mtarangov' && $contrasena =='mtarangov')
      {
          $MySession->setVar('my_name', 'Ricardo Centeno');
          $MySession->SetVar('my_nivel', '4');
          $MySession->SetVar('my_email', 'ricardo@gmail.com');
          $MySession->SetVar('my_id', '2');
          $MySession->SetVar('my_user', 'RICHAR');

          $location = "index.php";
      }
      else
      {
          $http_vars["MsgErr"] .= "El Usuario o la Contrase&ntilde;a no son correctos ";
          $location = "index.php?command=" . LOGIN;
      }
      
    
  }
  else
  {
      $location = "index.php?command=" . LOGIN;
  }
  $_SESSION["cookie_http_vars"] = $http_vars;
  header("HTTP/1.1 302 Moved Temporarily");
  header("Location: $location");
  