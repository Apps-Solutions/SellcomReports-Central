<?php

class Ajax
{
    var $functions;
    
    function __construct() 
    {
        $this->functions = array();
    }
    
    function register($function)
    {
        $this->functions[] = $function;
    }
    
    function execute($request)
    {
        if(!empty($request["vars_ajax"]))
        {

            foreach ($request["vars_ajax"] as $var)
            {
                $n_vars .= "'".trim(Sanitizacion(($var)))."',";
            }
            $n_vars = substr($n_vars,0,-1);
        }
        if(!empty($request["function"]) && in_array($request["function"], $this->functions))
        {
            eval("echo json_encode(".Sanitizacion($request["function"])."(".$n_vars."));");
        }
        else
        {
            echo json_encode(array("message" => "La funcion solicitada no existe"));
        }
    }
}
$MyAjax = new AJAX;