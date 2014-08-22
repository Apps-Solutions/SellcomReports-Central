function peticion_ajax(method, query, funcion)
{
    $.ajax({
        type: method.toUpperCase(),
        url: "ajax/ajax.common.php",
        data: query,
        cache: false,
        success: function(response) {
            eval(funcion);
        },
        error: function() {
            alert("Error de peticion con el servidor");
        }
    });

    return true;
}


function pasarelaAjax(method, query, funcion, vars)
{
    peticion_ajax(method, query, funcion + "(response" + (vars != "" ? "," + vars : "") + ")");
}

