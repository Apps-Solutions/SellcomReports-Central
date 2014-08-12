<?php

  class LOGIN
  {

      var $m_ibd;
      var $m_user;
      var $m_nombre;
      var $m_nivel;
      var $m_email;
      var $m_branch_id;
      var $m_id;
      var $m_plantilla;
      private $msg;
      private $origen;

      function LOGIN()
      {
          $this->Iniciar();
      }

      function Iniciar()
      {
          $this->m_ibd = new IBD;
          $this->m_plantilla = new Plantilla;
      }

      function User()
      {
          return $this->m_user;
      }

      function Name()
      {
          return $this->m_nombre;
      }

      function Level()
      {
          return $this->m_nivel;
      }

      function Email()
      {
          return $this->m_email;
      }

      function Branch()
      {
          return $this->m_branch_id;
      }

      function Id()
      {
          return $this->m_id;
      }

      function Loggin($usuario, $hash)
      {
          $consulta = "SELECT p.name,p.email, u.profile_id, u.username, u.id,u.branch_id 
                                FROM fs_people p
                                INNER JOIN fs_user u ON p.id=u.people_id
                                WHERE u.username='$usuario' AND u.password='$hash' AND u.status=1";

          //echo $consulta;
          if (($result = $this->m_ibd->Query("Login", $consulta)) != IBD_SUCCESS)
          {
              return $result;
          }

          if (($result = $this->m_ibd->NumeroRegistros("Login")) < 1)
          {
              $this->m_ibd->Liberar("Login");
              return LOGIN_BADLOGIN;
          }

          $registro = $this->m_ibd->Fetch("Login");


          if (!$registro)
          {
              $result = LOGIN_DBFAILURE;
          }
          else
          {
              $this->m_nombre = utf8_encode($registro['name']);
              $this->m_user = $registro["username"];
              $this->m_nivel = $registro['profile_id'];
              $this->m_email = $registro['email'];
              $this->m_id = $registro['id'];
              $this->m_branch_id = $registro['branch_id'];

              $result = LOGIN_SUCCESS;
              $this->msg = "SUCCESS @class LOGIN::Loggin usuario[" . $usuario . "] password[" . $hash . "]";
              $this->origen = "SISTEMA";
              //$this->set_Log();
          }

          $this->m_ibd->Liberar("Login");
          return $result;
      }

      function Forgot($email, $user = '')
      {
          $consulta = "SELECT id,password,user  FROM users WHERE email='$email' ";

          if (!empty($user)):
              $consulta .= "AND user ='$user' ";
          endif;

          $consulta .=" AND status='1'";

          if (($result = $this->m_ibd->Query("forgot", $consulta)) != IBD_SUCCESS)
          {
              return $result;
          }

          if (($result = $this->m_ibd->NumeroRegistros("forgot")) < 1)
          {
              $this->m_ibd->Liberar("forgot");
              return LOGIN_BADLOGIN;
          }

          $registro = $this->m_ibd->Fetch("forgot");

          if (!$registro)
          {
              $result = LOGIN_DBFAILURE;
          }
          else
          {

              $this->m_plantilla->asigna_variables(array("password" => $registro["password"], "user" => $registro["user"]));
              $ContenidoString = $this->m_plantilla->muestra("../" . DIRECTORY_VIEWS . "/templates/recoverpasword.tpl");

              $headers = "From: " . NOMBRE_WEB . "<" . MAIL_WEB . ">\r\n";
              $headers .= "Reply-To: " . MAIL_WEB . "\r\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
              Correo::Enviar(utf8_decode("Recordatorio de contraseña"), $email, $ContenidoString, $headers);

              $result = LOGIN_SUCCESS;
          }

          $this->m_ibd->Liberar("forgot");
          return $result;
      }

      function set_Log()
      {
          global $MyLog;

          //$MyLog->write_log($this->msg,  $this->origen);
      }

  }
  