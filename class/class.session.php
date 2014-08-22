<?php
  class MYSESSION
  {

      var $m_id;
      var $m_nombre;
      var $m_nivel;
      var $m_email;
      private $msg;

      function MYSESSION()
      {
          $this->I_Init();
      }

      function I_Init()
      {
          global $MyDebug;
          $MyDebug->SetDebug(1);

          $this->m_id = "";
          $this->m_nombre = "";
          $this->m_nivel = 0;
          $this->m_email = "";


          if (
                  isset($_SESSION['my_name']) && ($_SESSION['my_name'] != "") &&
                  isset($_SESSION['my_nivel']) && ($_SESSION['my_nivel'] != "") &&
                  isset($_SESSION['my_id']) && ($_SESSION['my_id'] != "") &&
                  isset($_SESSION['my_email']) && ($_SESSION['my_email'] != "")
          )
          {
              $this->m_nombre = $_SESSION['my_name'];
              $this->m_nivel = $_SESSION['my_nivel'];
              $this->m_email = $_SESSION['my_email'];
              $this->m_id = $_SESSION['my_id'];

              $MyDebug->DebugMessage("SESSION::Login:[" . $this->m_nivel . "][" . $this->m_email . "][" . $this->m_id . "]");


              $this->msg = "@class SESSION::I_Init :  " . $MyDebug->Dump();

              //$this->set_Error();
          }
      }

      function LoggedIn()
      {
          return ($this->m_id != "");
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

      function Id()
      {
          return $this->m_id;
      }

      function SetVar($varname, $value)
      {
          $_SESSION[$varname] = $value;
      }

      function GetVar($varname)
      {
          return ( isset($_SESSION[$varname]) ? $_SESSION[$varname] : "" );
      }

      function set_Error()
      {
          global $MyLog;

          $MyLog->write_log($this->msg);
      }

      function EndSession()
      {
          $_SESSION['my_name'] = "";
          $_SESSION['my_email'] = "";
          $_SESSION['my_id'] = "";
          $_SESSION['my_nivel'] = 0;
          session_destroy();
          session_start();
          $this->I_Init();
      }

  }
  $MySession = new MYSESSION;