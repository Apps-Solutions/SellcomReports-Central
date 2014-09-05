<?php

  class INDEX
  {

      var $f_js;
      var $f_file;
      var $f_title;
      var $f_css;
      var $f_ajax;
      var $f_model;

      function INDEX()
      {
          $this->f_js = "";
          $this->f_file = "";
          $this->f_title = "";
          $this->f_css = "";
          $this->f_ajax = "";
          $this->f_model = "";
      }

      function Title()
      {
          return $this->f_title;
      }

      function PHPFile()
      {
          return $this->f_file;
      }

      function ModelFile()
      {
          return $this->f_model;
      }

      function JSFile()
      {
          return $this->f_js;
      }

      function CSSFile()
      {
          return $this->f_css;
      }

      function AjaxFile()
      {
          return $this->f_ajax;
      }

      function Command()
      {
          return $this->f_command;
      }

      function Logic($command)
      {
          global $uiCommand;
          global $MySession;

          if (!in_array($MySession->Level(), $uiCommand[$command][0]))
          {
              $command = LOGIN;
          }

          if (($MySession->LoggedIn() && $command == LOGIN) || !isset($uiCommand[$command]))
          {
              $command = HOME;
          }



          $this->f_title = $uiCommand[$command][1];
          $this->f_file = $uiCommand[$command][2];
          $this->f_js = $uiCommand[$command][3];
          $this->f_css = $uiCommand[$command][4];
          $this->f_ajax = $uiCommand[$command][5];
          $this->f_model = $uiCommand[$command][6];
          $this->f_command = $command;
      }

  }

  $MyIndex = new INDEX;
  