function editCliente()
{
    var id = $("input[name='id']").val();
    var name = $("input[name='name']").val();
    var contrato = $("input[name='contrato']").val();
    var nocliente = $("input[name='nocliente']").val();
    var domicilio = $("input[name='domicilio']").val();
    var telprincipal = $("input[name='telprincipal']").val();
    var telcel = $("input[name='telcel']").val();
    var calidad = $("input[name='calidad']").val();
    var tipo = $("input[name='tipo']").val();
    var status = $("input[name='status']").val();
    var ultima = $("input[name='ultima']").val();
    var capital = $("input[name='capital']").val();



    var query = "function=editCliente&vars_ajax[]=" + id + "&vars_ajax[]=" + name + "&vars_ajax[]=" + contrato + "&vars_ajax[]=" + nocliente;
    query += "&vars_ajax[]=" + domicilio + "&vars_ajax[]=" + telprincipal + "&vars_ajax[]=" + telcel + "&vars_ajax[]=" + calidad + "&vars_ajax[]=" + tipo;
    query += "&vars_ajax[]=" + status + "&vars_ajax[]=" + ultima + "&vars_ajax[]=" + capital;

    pasarelaAjax("POST", query, "result", "");
}


function getAddress()
{
    var id = $("input[name='id']").val();
    var query = "function=getAddress&vars_ajax[]=" + id;
    pasarelaAjax("POST", query, "resultAddress", "");
}

function resultAddress(response)
{
    var respuesta = null;

    if (response != "null")
    {
        respuesta = eval("(" + response + ")");

        if (respuesta[0] && respuesta[0]["error"])
        {
            alert(respuesta[0]["error"]);
        }

        if (respuesta[0] && respuesta[0]["data"])
        {
            $("input[name='direccion']").val(respuesta[0]["data"].address);

        }
    }
    else
    {
        alert("Error de conexion tiempo de esper agotado");
    }

}



function getPhones()
{
    var id = $("input[name='id']").val();
    var query = "function=getTelefonos&vars_ajax[]=" + id;
    pasarelaAjax("POST", query, "resultPhone", "");
}

function resultPhone(response)
{
    var respuesta = null;

    if (response != "null")
    {
        respuesta = eval("(" + response + ")");

        if (respuesta[0] && respuesta[0]["error"])
        {
            alert(respuesta[0]["error"]);
        }

        if (respuesta[0] && respuesta[0]["data"])
        {
            $("input[name='tel_prin']").val(respuesta[0]["data"].main);
            $("input[name='tel_cel']").val(respuesta[0]["data"].celphone);
            $("input[name='tel_otro']").val(respuesta[0]["data"].otherphone);
            $("input[name='tel_nuevo']").val(respuesta[0]["data"].newphone);
        }
    }
    else
    {
        alert("Error de conexion tiempo de esper agotado");
    }

}



function editPhones()
{
    var id = $("input[name='id']").val();
    var main = $("input[name='tel_prin']").val();
    var celphone = $("input[name='tel_cel']").val();
    var otherphone = $("input[name='tel_otro']").val();
    var newphone = $("input[name='tel_nuevo']").val();

    var query = "function=editPhones&vars_ajax[]=" + id + "&vars_ajax[]=" + main + "&vars_ajax[]=" + celphone + "&vars_ajax[]=" + otherphone + "&vars_ajax[]=" + newphone;

    pasarelaAjax("POST", query, "result", "");
}

function Address()
{
    var id = $("input[name='id']").val();
    var direccion = $("input[name='direccion']").val();


    var query = "function=Address&vars_ajax[]=" + id + "&vars_ajax[]=" + direccion;

    pasarelaAjax("POST", query, "result", "");
}


function saveHistory()
{
    var id_assigned = $("input[name='assigned_id']").val();
    
    var medio_contacto_id   = $("select[name='otromedio']").val();
    var respuesta_id        = $("select[name='respuestacliente']").val();
    var tel_contacto        = $("select[name='tel_contacto']").val();
    var observacion         = $("textarea[name='observaciones']").val().replace(/\n\r?/g, '\\n').replace(/&/g, '%26');

    var fecha_cita          = $("input[name='fecha_cita']").val();
    var hora_cita           = $("input[name='hora_cita']").val();

    var query = "function=saveHistory&vars_ajax[]="+id_assigned+"&vars_ajax[]=" + medio_contacto_id;
    query += "&vars_ajax[]=" + respuesta_id + "&vars_ajax[]=" + tel_contacto + "&vars_ajax[]=" + observacion;
    query += "&vars_ajax[]=" + fecha_cita + "&vars_ajax[]=" + hora_cita;

    pasarelaAjax("POST", query, "resultHistory", "");
}

function resultHistory(response)
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
            window.location.href = "index.php?command=busqueda";
        }
    }
    else
    {
        alert("Tiempo de espera Agotado!, Vuelve a intentarlo");
    }
}

/*Funcion generica para editCliente, editPhones*/
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
            //alert(respuesta[0]["success"]);
            window.location.reload();

        }

    }
    else
    {
        alert("Tiempo de espera Agotado!, Vuelve a intentarlo");
    }
}


function enabletelefono()
{
    $("#tel_prin").prop("disabled", false);
    $("#tel_cel").prop("disabled", false);
    $("#tel_otro").prop("disabled", false);
    $("#tel_nuevo").prop("disabled", false);


}



function enabledData()
{
    $("#editcustomer").attr("disabled", "disabled");
    $("#name").prop("disabled", false);
    $("#contrato").prop("disabled", false);
    $("#nocliente").prop("disabled", false);
    $("#domicilio").prop("disabled", false);
    $("#telprincipal").prop("disabled", false);
    $("#telcel").prop("disabled", false);
    $("#calidad").prop("disabled", false);
    $("#tipo").prop("disabled", false);
    $("#status").prop("disabled", false);
    $("#ultima").prop("disabled", false);
    $("#capital").prop("disabled", false);

    $("#savecustomer").prop("disabled", "");

}


function enableDir()
{
    $("#direccion").prop("disabled", false);
}