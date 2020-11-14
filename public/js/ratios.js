//$(function(){
      //alert('javascript');
  $(document).on('click',"#resultados-razonLiquidez",function(){
  //$("body").on("click", "#resultados-razonLiquidez", function() {
  
  function razonLiquidez(){
    var numerador = $("#activoCorriente-razonLiquidez").val();
    var denominador = $("#pasivoCorriente-razonLiquidez").val();
    var total = (numerador / denominador);
    
    $("#inputTotal-razonLiquidez").val(total).toFixed(5);
    }

//########################################################
function razonEfectivo(){
    var numerador1 = 0;
    $(".input_numerador_efectivo").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );
  var denominador1 = 0;
    $(".input_numerador_valorCortoPlazo").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador1 += eval($(this).val());
        }
      }
    );
    //var pc = document.getElementById('pasivoCorriente-razonEfectivo');
    var pc = $("#pasivoCorriente-razonEfectivo").val();
    //console.log(pc);
    var total1 = ((numerador1 + denominador1) / pc).toFixed(5);

    
    $("#inputTotal-razonEfectivo").val(total1);

    $("#id_numerador_efectivo").change(function() {
    var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros = texto.replace(/[^0-9.]/g, '');
    $(".input_numerador_efectivo").val(numeros);
  });

  $("#id_numerador_valorCortoPlazo").change(function() {
    var texto1 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros1 = texto1.replace(/[^0-9.]/g, '');
    $(".input_numerador_valorCortoPlazo").val(numeros1);
  });

}
    //#########################################33
function razonCapital(){
    var numerador2 = $("#activoCorriente-razonCapital").val();
    var denominador2 = $("#pasivoCorriente-razonCapital").val();
    var at = $("#activoTotal-razonCapital").val();
    var total2 = ((numerador2 - denominador2) / at).toFixed(5);
    
    $("#inputTotal-razonCapital").val(total2);

    }

function razonRapida(){
    var numerador2 = $("#activoCorriente-razonRapida").val();
    var denominador2 = $("#pasivoCorriente-razonRapida").val();
    var inv = $("#inventario-razonRapida").val();
    var total2 = ((numerador2 - inv) / denominador2).toFixed(5);
    
    $("#inputTotal-razonRapida").val(total2);

    }    

var btn = document.querySelector('#resultados-razonLiquidez');

    btn.addEventListener('click',razonLiquidez, false);
    btn.addEventListener('click',razonCapital, false);
    btn.addEventListener('click',razonEfectivo, false);
    btn.addEventListener('click',razonRapida, false);

  });
//#########################RATIOS DE ACTIVIDAD###########################################

  $(document).on('click',"#resultados-razonActividad",function(){

function razonInventario(){
    var numerador12 = 0;
    $("#input_numerador_costosVentas_razonInventario").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_costosVentas_razonInventario").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_costosVentas_razonInventario").val(numeros12);
  });

    var denominador12 = $("#inventario-razonInventario").val();
  
    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonInventario").val(total12);    

}

    function razonDiasInventario(){
    var numerador12 = 0;
    $("#input_numerador_costosVentas_razonDiasInventario").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_costosVentas_razonDiasInventario").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_costosVentas_razonDiasInventario").val(numeros12);
  });

    var denominador12 = $("#inventario-razonDiasInventario").val();
  
    var total12 = (denominador12 / (numerador12 * 365)).toFixed(5);

    $("#inputTotal-razonDiasInventario").val(total12);    

}

function razonCxC(){
    var numerador12 = 0;
    $("#input_numerador_ventasNetas_razonCxC").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_ventasNetas_razonCxC").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_ventasNetas_razonCxC").val(numeros12);
  });

    var denominador12 = $("#CxC-razonCxC").val();
  
    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonCxC").val(total12);    

}

function razonMedioC(){
    var numerador12 = 0;
    $("#input_numerador_ventasNetas_razonMedioC").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_ventasNetas_razonMedioC").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_ventasNetas_razonMedioC").val(numeros12);
  });

    var denominador12 = $("#CxC-razonMedioC").val();
  
    var total12 = ((denominador12 * 365) / numerador12).toFixed(5);

    $("#inputTotal-razonMedioC").val(total12);    

}

function razonCxP(){
    var numerador1 = 0;
    $("#input_numerador_compras_razonCxP").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );
  var denominador1 = 0;
    $("#input_denominador_razonCxP").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador1 += eval($(this).val());
        }
      }
    );

    var total1 = ((numerador1 ) / denominador1).toFixed(5);

    
    $("#inputTotal-razonCxP").val(total1);

    $("#id_numerador_compras_razonCxP").change(function() {
    var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros = texto.replace(/[^0-9.]/g, '');
    $("#input_numerador_compras_razonCxP").val(numeros);
  });

  $("#id_denominador_razonCxP").change(function() {
    var texto1 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros1 = texto1.replace(/[^0-9.]/g, '');
    $("#input_denominador_razonCxP").val(numeros1);
  });

}

function razonMedioP(){
    var numerador1 = 0;
    $("#input_numerador_compras_razonMedioP").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );
  var denominador1 = 0;
    $("#input_denominador_razonMedioP").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador1 += eval($(this).val());
        }
      }
    );

    var total1 = ((denominador1 * 365 ) / numerador1).toFixed(5);

    
    $("#inputTotal-razonMedioP").val(total1);

    $("#id_numerador_compras_razonMedioP").change(function() {
    var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros = texto.replace(/[^0-9.]/g, '');
    $("#input_numerador_compras_razonMedioP").val(numeros);
  });

  $("#id_denominador_razonMedioP").change(function() {
    var texto1 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros1 = texto1.replace(/[^0-9.]/g, '');
    $("#input_denominador_razonMedioP").val(numeros1);
  });

}

function razonIndiceA(){
    var numerador12 = 0;
    $("#input_numerador_ventasNetas_razonIndiceA").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_ventasNetas_razonIndiceA").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_ventasNetas_razonIndiceA").val(numeros12);
  });

    var denominador12 = $("#activoTotal-razonIndiceA").val();
  
    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonIndiceA").val(total12);    

}

function razonActivosF(){
    var numerador12 = 0;
    $("#input_numerador_ventasNetas_razonActivosF").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );
   
    var denominador12 = 0;
    $("#input_numerador_activoFijo_razonActivosF").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador12 += eval($(this).val());
        }
      }
    );

     $("#id_numerador_ventasNetas_razonActivosF").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_ventasNetas_razonActivosF").val(numeros12);
  });


    $("#id_numerador_activoFijo_razonActivosF").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_activoFijo_razonActivosF").val(numeros12);
  });
  
    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonActivosF").val(total12);    

}

function razonMargenB(){
    var numerador12 = 0;
    $("#input_numerador_ventasNetas_razonMargenB").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_ventasNetas_razonMargenB").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_ventasNetas_razonMargenB").val(numeros12);
  });

    var denominador12 = $("#utilidadB-razonMargenB").val();
  
    var total12 = (denominador12/ numerador12).toFixed(5);

    $("#inputTotal-razonMargenB").val(total12);    

}

function razonMargenO(){
    var numerador12 = 0;
    $("#input_numerador_ventas_razonMargenO").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_ventas_razonMargenO").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_ventas_razonMargenO").val(numeros12);
  });

    var denominador12 = $("#utilidadO-razonMargenO").val();
  
    var total12 = (denominador12/ numerador12).toFixed(5);

    $("#inputTotal-razonMargenO").val(total12);    

}

var btn1 = document.querySelector('#resultados-razonActividad');

    btn1.addEventListener('click',razonInventario, false);
    btn1.addEventListener('click',razonDiasInventario, false);
    btn1.addEventListener('click',razonCxC, false);
    btn1.addEventListener('click',razonMedioC, false);
    btn1.addEventListener('click',razonCxP, false);
    btn1.addEventListener('click',razonMedioP, false);
    btn1.addEventListener('click',razonIndiceA, false);
    btn1.addEventListener('click',razonActivosF, false);
    btn1.addEventListener('click',razonMargenB, false);
    btn1.addEventListener('click',razonMargenO, false);


  });



//###############################################
 // $("body").on("click", "#resultados_razonEfectivo", function() {
  
  //});

  



//});