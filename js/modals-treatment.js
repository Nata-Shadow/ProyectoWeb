/*$(document).ready(function () {
    $("#enviarDatos").click(function () {
        let datos = $("#formulario-agregar").serialize();

        $.ajax({
            type: "POST",
            url: "php_bd/addNewPerson.php",
            data: datos,
            success: function (r) {
                if (r === 1){
                    alert("Se ha agregado correctamente");
                }else {
                    alert("No se ha agregado el registro");
                }
            }

        });
        return false;
    }
    )
}
);*/



function agregarDatos() {
    let datos = $("#formulario-agregar").serialize();

    $.ajax({
        type: "POST",
        url: "php_bd/addNewPerson.php",
        data: datos,
        success: function (data) {

            $("#users-table").ajax.reload(null, false);
            $("#Agregar").modal('hide');


        }
    });

}

function editar(elementos) {

    cadena = elementos.split('||');

    alert(cadena);
    $("gradoE").val(cadena[0]);
    $("nombreE").val(cadena[0]);
    $("departamentoE").val(cadena[0]);
    $("cargoE").val(cadena[0]);
    $("numeroE").val(cadena[0]);
}