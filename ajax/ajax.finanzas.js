

function guarda_Otros()
{
     var fecha = $("input[name='fecha']").val();
     var moneda = $("select[name='tipo_moneda']").val();
     var cobranza = $("input[name='txt_cobranza']").val();
     var almacen = $("input[name='txt_almacen']").val();
     var embarcadero = $("input[name='txt_embarcadero']").val();

     var query = "function=guarda_Otros&vars_ajax[]=" + moneda + "&vars_ajax[]=" + cobranza + "&vars_ajax[]=" + almacen + "&vars_ajax[]=" + embarcadero + "&vars_ajax[]=" + fecha;

     pasarelaAjax("POST", query, "result", "");
}

function get_VAB()
{
     var empleado_id = $("select[name='sel_empleado']").val();
     var tipo_moneda = $("select[name='tipo_moneda']").val();
     var fecha = $("input[name='fecha']").val();

     var query = "function=get_VAB&vars_ajax[]=" + empleado_id + "&vars_ajax[]=" + tipo_moneda + "&vars_ajax[]=" + fecha;
     pasarelaAjax("POST", query, "resultVAB", "");
}

function resultVAB(response)
{
     $("input[name='ventas']").val("");
     $("input[name='stock']").val("");
     $("input[name='back_order']").val("");

     var respuesta = null;
     if (response != "null")
     {
	respuesta = eval("(" + response + ")");

	if (respuesta[0] && respuesta[0]["error"])
	{
	     alert(respuesta[0]["error"]);
	}
	if (respuesta[0] && respuesta[0]["cuenta"] && respuesta[0]["remision"] && respuesta[0]["ventas"] && respuesta[0]["stock"] && respuesta[0]["back"])
	{

	     $("#cuenta1").val(respuesta[0]["cuenta"].suma_actual);
	     $("#cuenta2").val(respuesta[0]["cuenta"].suma130);
	     $("#cuenta3").val(respuesta[0]["cuenta"].suma3160);
	     $("#cuenta4").val(respuesta[0]["cuenta"].suma6190);
	     $("#cuenta5").val(respuesta[0]["cuenta"].suma90);
	     $("input[name='cte_suma_total']").val(respuesta[0]["cuenta"].suma_total);

	     $("#remision1").val(respuesta[0]["remision"].suma030);
	     $("#remision2").val(respuesta[0]["remision"].suma3160);
	     $("#remision3").val(respuesta[0]["remision"].suma6190);
	     $("#remision4").val(respuesta[0]["remision"].suma90);
	     $("input[name='rm_suma_total']").val(respuesta[0]["remision"].suma_total);

	     $("input[name='ventas']").val(respuesta[0]["ventas"]);
	     $("input[name='stock']").val(respuesta[0]["stock"]);
	     $("input[name='back_order']").val(respuesta[0]["back"]);
	}
     }
     else
     {
	alert("Error de conexion, tiempo de espera agotado");
     }
}

function result(response)
{
     var respuesta = null;

     if (response != "null")
     {
	respuesta = eval("(" + response + ")");

	if (respuesta[0] && respuesta[0]["error"])
	{
	     alert(respuesta[0]["error"]);
	}

	if (respuesta[0] && respuesta[0]["success"])
	{
	     alert(respuesta[0]["success"]);
	}

	if (respuesta[0] && respuesta[0]["function"])
	{
	     eval(respuesta[0]["function"]);
	}
     }
     else
     {
	alert("Error de conexion, tiempo de espera agotado");
     }
}



function guarda_Kpis()
{
     var fecha = $("input[name='fecha']").val();
     var moneda = $("select[name='tipo_moneda_k']").val();
     var cliente = $("select[name='sel_cliente_k']").val();
     var empleado = $("select[name='sel_empleado_k']").val();
     var estatus = $("input[name='txt_status']").val();
     var valor = $("input[name='txt_valor']").val();

     var query = "function=guarda_kpi&vars_ajax[]=" + moneda + "&vars_ajax[]=" + cliente + "&vars_ajax[]=" + empleado + "&vars_ajax[]=" + estatus + "&vars_ajax[]=" + valor + "&vars_ajax[]=" + fecha;

     pasarelaAjax("POST", query, "result", "");


}


$(document).ready(function() {

     $("#guarda_otros").click(function() {
	guarda_Otros();
     });

     $("#btn_consulta").click(function() {
	get_VAB();
     });

     $("#guarda_kpi").click(function() {
	guarda_Kpis();
     });


});