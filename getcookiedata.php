<?php
  if (isset($_SESSION["cookie_http_vars"]) && !empty($_SESSION["cookie_http_vars"])):

      foreach ($_SESSION["cookie_http_vars"] as $key => $value)
      {
          foreach ($_SESSION["cookie_http_vars"] as $key => $value)
          {
              $FORM[$key] = (!is_array($value) ? utf8_encode($value) : $value);
          }
      }
      if (!empty($FORM['MsgErr']) || !empty($FORM['MsgSas'])):
          ?>

          <?php
          if (isset($FORM['MsgErr']))
          {
              ?>
              <div class="alert-danger text-center">
                  <?php echo nl2br($FORM['MsgErr']); ?>
              </div>
              <?php
          }

          if (isset($FORM['MsgSas']))
          {
              ?>
              <div class="alert-success text-center">
                  <?php
                  echo nl2br($FORM['MsgSas']);
                  ?>
              </div>
              <?php
          }
          ?>
      <?php endif; ?>

      <?php $_SESSION["cookie_http_vars"] = array(); ?>
  <?php endif; ?>