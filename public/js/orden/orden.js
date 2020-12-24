function calcularCosto(km) {
    
    let ruta = $('#ruta_calculoCosto').val();
    $.ajax({
        url: ruta,
        type: "GET",
        data: { km: km },
        dataType: "json",
        success: function(res) {
            if (res!="") {
                $("#costo").val(res[0].costo);    
            }else{
                $("#costo").val(0);
            }
            
        }
    });
}
