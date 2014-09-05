function guarda_Cliente()
{
    var cliente = $("input[name='txt_cliente']").val();
    var nombre = $("input[name='txt_nombre']").val();
    var apellido = $("input[name='txt_apellido']").val();
    var email = $("input[name='txt_email']").val();
    var telefono = $("input[name='txt_telefono']").val();


    var query = "function=guarda_Cliente&vars_ajax[]=" + cliente + "&vars_ajax[]=" + nombre + "&vars_ajax[]=" + apellido + "&vars_ajax[]=" + email;
    query += "&vars_ajax[]=" + telefono;

    pasarelaAjax("POST", query, "result", "");
}

function guarda_Informacion()
{
    var sel_deal_status = $("select[name='sel_deal_status']").val();
    var txt_deal_nombre = $("input[name='txt_deal_nombre']").val();
    var sel_deal_cliente = $("select[name='sel_deal_cliente']").val();
    var sel_deal_tipo = $("select[name='sel_deal_tipo']").val();
    var sel_deal_sector = $("select[name='sel_deal_sector']").val();
    var txt_deal_valor = $("input[name='txt_deal_valor']").val();
    var sel_deal_moneda = $("select[name='sel_deal_moneda']").val();

    var query = "function=guarda_Informacion&vars_ajax[]=" + sel_deal_status + "&vars_ajax[]=" + txt_deal_nombre + "&vars_ajax[]=" + sel_deal_cliente;
    query += "&vars_ajax[]=" + sel_deal_tipo + "&vars_ajax[]=" + sel_deal_sector + "&vars_ajax[]=" + txt_deal_valor + "&vars_ajax[]=" + sel_deal_moneda;

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
        
        if(respuesta[0] && respuesta[0]["function"])
        {
            eval(respuesta[0]["function"]);
        }
    }
    else
    {
        alert("Error de conexion, tiempo de espera agotado");
    }
}

function editarPorcentaje()
{
    var id = $("input[name='id_deal']").val();
    var valor = $("input[name='txt_estatus_edit']").val();


    var query = "function=edita_Porcentaje&vars_ajax[]=" + id + "&vars_ajax[]=" + valor;

    pasarelaAjax("POST", query, "result", "");
}

function setPorcentaje(id_deal, valor)
{
    $("input[name='id_deal']").val(id_deal);
    $("input[name='txt_estatus_edit']").val(valor);
}


$(document).ready(function() {

    $("#guarda_cliente").click(function() {
        guarda_Cliente();
    });


    $("#guarda_deal").click(function() {
        guarda_Informacion();
    });
    
     $("#edita_porcentaje").click(function() {
        editarPorcentaje();
    });
});