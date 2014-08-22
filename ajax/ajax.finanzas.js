function guarda_Otros()
{
    var moneda = $("select[name='tipo_moneda']").val();
    var cobranza = $("input[name='txt_cobranza']").val();
    var almacen = $("input[name='txt_almacen']").val();
    var embarcadero = $("input[name='txt_embarcadero']").val();

    var query = "function=guarda_Otros&vars_ajax[]=" + moneda + "&vars_ajax[]=" + cobranza + "&vars_ajax[]=" + almacen + "&vars_ajax[]=" + embarcadero;

    pasarelaAjax("POST", query, "result", "");
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
    }
    else
    {
        alert("Error de conexion, tiempo de espera agotado");
    }
}


$(document).ready(function() {

    $("#guarda_otros").click(function() {
        guarda_Otros();
    });

});