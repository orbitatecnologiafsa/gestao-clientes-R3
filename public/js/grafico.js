

$(document).ready(function(){
   
      jQuery.ajax ({
        url: "http://127.0.0.1:8000/api/cliente/grafico/cidade",
        type: "GET",
        data: [],
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function(data){
            var dados = [];
            var dataCampo = [];
            jQuery.each(data, function(nome, item,cidade) {
              // jQuery.each(item,function(index,item){
               dados += "'"+nome+"',"
               dataCampo+= item

              // });
            });
            console.log([dados])
            console.log(dataCampo)
        }
    });

   
});
///api/cliente/grafico/cidade
