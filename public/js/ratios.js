$(function(){
      //alert('javascript');

      //########## PRIMER ANIO #####################################
      var claseActivo = $("#activosCorrientes").val();
      var claseActivoNo = $("#activosCorrientesNo").val();
      var grupoActivo = $("#totalActivos").val();

      var clasePasivo = $("#pasivosCorrientes").val();
      var clasePasivoNo = $("#pasivosCorrientesNo").val();
      var grupoPasivo = $("#totalPasivos").val();

      var grupoPatrimonio = $("#totalPatrimonio").val();

      $("#activoCorriente-razonLiquidez").val(claseActivo);
      $("#pasivoCorriente-razonLiquidez").val(clasePasivo);

      $("#pasivoCorriente-razonEfectivo").val(clasePasivo);

      $("#activoCorriente-razonRapida").val(claseActivo);
      $("#pasivoCorriente-razonRapida").val(clasePasivo);

      $("#activoCorriente-razonCapital").val(claseActivo);
      $("#pasivoCorriente-razonCapital").val(clasePasivo);
      $("#activoTotal-razonCapital").val(grupoActivo);
      $("#activoFijoNeto-razonActivoF").val(claseActivoNo);
      
      $("#activoTotal-razonIndiceA").val(grupoActivo);

      $("#activoTotal-razonRentActivo").val(grupoActivo);

      $("#pasivoTotal-razonEndeudo").val(grupoPasivo);
      $("#activoTotal-razonEndeudo").val(grupoActivo);

      $("#activoTotal-razonPropiedad").val(grupoActivo);
      $("#pasivoTotal-razonEndeudoPatr").val(grupoPasivo);

      $("#input_numerador_patrimonio_razonPropiedad").val(grupoPatrimonio);
      $("#input_numerador_patrimonioP_razonNetaP").val(grupoPatrimonio);

      $("#input_pasivoTotal_razonEndeudoPatr").val(grupoPasivo);
      $("#input_patrimonio_razonEndeudoPatr").val(grupoPatrimonio);
      
      var pasivo = $("#input_pasivoTotal_razonEndeudoPatr").val();
      var patrimonio = $("#input_patrimonio_razonEndeudoPatr").val();
      var grupoPasivoPatrimonio = (parseFloat(pasivo) + parseFloat(patrimonio)).toFixed(5);
      
      $("#input_numerador_patrimonioTotal_razonEndeudoPatr").val(grupoPasivoPatrimonio);
      

      
      //########## SEGUNDO ANIO #####################################
      var claseActivo1 = $("#activosCorrientes1").val();
      var claseActivoNo1 = $("#activosCorrientesNo1").val();
      var grupoActivo1 = $("#totalActivos1").val();

      var clasePasivo1 = $("#pasivosCorrientes1").val();
      var clasePasivoNo1 = $("#pasivosCorrientesNo1").val();
      var grupoPasivo1 = $("#totalPasivos1").val();

      var grupoPatrimonio1 = $("#totalPatrimonio1").val();

      $("#activoCorriente-razonLiquidez1").val(claseActivo1);
      $("#pasivoCorriente-razonLiquidez1").val(clasePasivo1);

      $("#pasivoCorriente-razonEfectivo1").val(clasePasivo1);

      $("#activoCorriente-razonRapida1").val(claseActivo1);
      $("#pasivoCorriente-razonRapida1").val(clasePasivo1);

      $("#activoCorriente-razonCapital1").val(claseActivo1);
      $("#pasivoCorriente-razonCapital1").val(clasePasivo1);
      $("#activoTotal-razonCapital1").val(grupoActivo1);
      $("#activoFijoNeto-razonActivoF1").val(claseActivoNo1);

      $("#activoTotal-razonIndiceA1").val(grupoActivo1);

      $("#activoTotal-razonRentActivo1").val(grupoActivo1);

      $("#pasivoTotal-razonEndeudo1").val(grupoPasivo1);
      $("#activoTotal-razonEndeudo1").val(grupoActivo1);

      $("#activoTotal-razonPropiedad1").val(grupoActivo1);
      $("#pasivoTotal-razonEndeudoPatr1").val(grupoPasivo1);
      $("#input_numerador_patrimonio_razonPropiedad1").val(grupoPatrimonio1);
      //$("#input_numerador_patrimonioTotal_razonEndeudoPatr1").val(grupoPatrimonio1);
      $("#input_numerador_patrimonioP_razonNetaP1").val(grupoPatrimonio1);

      $("#input_pasivoTotal_razonEndeudoPatr1").val(grupoPasivo1);
      $("#input_patrimonio_razonEndeudoPatr1").val(grupoPatrimonio1);
      
      var pasivo1 = $("#input_pasivoTotal_razonEndeudoPatr1").val();
      var patrimonio1 = $("#input_patrimonio_razonEndeudoPatr1").val();
      var grupoPasivoPatrimonio1 = (parseFloat(pasivo1) + parseFloat(patrimonio1)).toFixed(5);
      
      $("#input_numerador_patrimonioTotal_razonEndeudoPatr1").val(grupoPasivoPatrimonio1);

      //alert(input);

  $(document).on('click',"#resultados-razonLiquidez",function(){
  //$("body").on("click", "#resultados-razonLiquidez", function() {
  
  function razonPromedio(){
    var numerador = $("#activoCorriente-razonLiquidez2").val();
    var denominador = $("#activoCorriente-razonLiquidez3").val();
    var total = (numerador/ ((parseFloat(numerador) + parseFloat(denominador))/2));
    
    $("#inputTotal-razonLiquidezP").val(total).toFixed(5);
    }

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
    btn.addEventListener('click',razonPromedio, false);

  });

//############################# RATIOS 2 ##################################
  $(document).on('click',"#resultados-razonLiquidez1",function(){
  //$("body").on("click", "#resultados-razonLiquidez", function() {
  
  

  function razonLiquidez1(){
    var numerador = $("#activoCorriente-razonLiquidez1").val();
    var denominador= $("#pasivoCorriente-razonLiquidez1").val();
    //var denominador1 = $("#pasivoCorriente-razonLiquidez").val();
    //var total = (numerador / ((parseFloat(denominador) + parseFloat(denominador1))/2));
    var total = (numerador / denominador);
    
    $("#inputTotal-razonLiquidez1").val(total).toFixed(5);
    }

//########################################################
function razonEfectivo1(){
    var numerador1 = 0;
    $(".input_numerador_efectivo1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );
  var denominador1 = 0;
    $(".input_numerador_valorCortoPlazo1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador1 += eval($(this).val());
        }
      }
    );
    //var pc = document.getElementById('pasivoCorriente-razonEfectivo');
    var pc = $("#pasivoCorriente-razonEfectivo1").val();
    //console.log(pc);
    var total1 = ((numerador1 + denominador1) / pc).toFixed(5);

    
    $("#inputTotal-razonEfectivo1").val(total1);

    $("#id_numerador_efectivo1").change(function() {
    var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros = texto.replace(/[^0-9.]/g, '');
    $(".input_numerador_efectivo1").val(numeros);
  });

  $("#id_numerador_valorCortoPlazo1").change(function() {
    var texto1 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros1 = texto1.replace(/[^0-9.]/g, '');
    $(".input_numerador_valorCortoPlazo1").val(numeros1);
  });

}
    //#########################################33
function razonCapital1(){
    var numerador2 = $("#activoCorriente-razonCapital1").val();
    var denominador2 = $("#pasivoCorriente-razonCapital1").val();
    var at = $("#activoTotal-razonCapital1").val();
    var total2 = ((numerador2 - denominador2) / at).toFixed(5);
    
    $("#inputTotal-razonCapital1").val(total2);

    }

function razonRapida1(){
    var numerador2 = $("#activoCorriente-razonRapida1").val();
    var denominador2 = $("#pasivoCorriente-razonRapida1").val();
    var inv = $("#inventario-razonRapida1").val();
    var total2 = ((numerador2 - inv) / denominador2).toFixed(5);
    
    $("#inputTotal-razonRapida1").val(total2);

    }    

var btn = document.querySelector('#resultados-razonLiquidez1');

    btn.addEventListener('click',razonLiquidez1, false);
    btn.addEventListener('click',razonCapital1, false);
    btn.addEventListener('click',razonEfectivo1, false);
    btn.addEventListener('click',razonRapida1, false);
    //btn.addEventListener('click',razonPromedio, false);

  });
//#########################RATIOS DE ACTIVIDAD###########################################

  //$(document).on('click',"#resultados-razonActividad",function(){

function razonInventario(){
    
    var numerador12 = $("#id_numerador_costosVentas_razonInventario").val();
    var denominador12 = $("#inventario-razonInventario").val();
  
    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonInventario").val(total12);    

}

    function razonDiasInventario(){
    

    var numerador12 = $("#id_numerador_costosVentas_razonDiasInventario").val();
    var denominador12 = $("#inventario-razonDiasInventario").val();
  
    var total12 = (denominador12 / (numerador12 / 365)).toFixed(5);

    $("#inputTotal-razonDiasInventario").val(total12);    

}

function razonCxC(){

    var numerador12 = $("#id_numerador_ventasNetas_razonCxC").val();
    var denominador12 = $("#CxC-razonCxC").val();
  
    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonCxC").val(total12);    

}

function razonMedioC(){
    
    var numerador12 = $("#id_numerador_ventasNetas_razonMedioC").val();
    var denominador12 = $("#CxC-razonMedioC").val();
  
    var total12 = ((denominador12 * 365) / numerador12).toFixed(5);

    $("#inputTotal-razonMedioC").val(total12);    

}

function razonCxP(){
      
    var numerador1 = $("#id_numerador_compras_razonCxP").val();
    var denominador1 = $("#CxP-razonCxP").val();
    var total1 = ((numerador1 ) / denominador1).toFixed(5);

    $("#inputTotal-razonCxP").val(total1);

}

function razonMedioP(){

    var numerador1 = $("#id_numerador_compras_razonMedioP").val();  
    var denominador1 = $("#mCxP-razonCxP").val();
    var total1 = ((denominador1 * 365 ) / numerador1).toFixed(5);

    $("#inputTotal-razonMedioP").val(total1);  

}

function razonIndiceA(){
    
    var numerador12 = $("#id_numerador_ventasNetas_razonIndiceA").val();
    var denominador12 = $("#activoTotal-razonIndiceA").val();
  
    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonIndiceA").val(total12);    

}

function razonActivosF(){
    
    var numerador12 = $("#id_numerador_ventasNetas_razonActivosF").val();
    var denominador12 = $("#activoFijoNeto-razonActivoF").val();

    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonActivosF").val(total12);    

}

function razonMargenB(){
   

/*    var ingreso = $("#id_numerador_ventasNetas_razonMedioC").val();
    var costosv = $("#id_numerador_costosVentas_razonInventario").val();

    var utilidadB = (ingreso - costosv);

    $("#utilidadB-razonMargenB").val(utilidadB);*/

    var numerador12 = $("#id_numerador_ventasNetas_razonMargenB").val();
    var denominador12 = $("#utilidadB-razonMargenB").val();
  
    var total12 = (denominador12/ numerador12).toFixed(5);

    $("#inputTotal-razonMargenB").val(total12);    

}

function razonMargenO(){
    
    var numerador12 = $("#id_numerador_ventas_razonMargenO").val();

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


  //});

//#########################RATIOS DE ACTIVIDAD 1 ###########################################

  //$(document).on('click',"#resultados-razonActividad1",function(){

function razonInventario1(){
    
    var numerador12 = $("#id_numerador_costosVentas_razonInventario1").val();
    var denominador1 = $("#inventario-razonInventario1").val();
    var denominador2 = $("#inventario-razonInventario").val();
  
    var total12 = (numerador12 / ((parseFloat(denominador1) + parseFloat(denominador2))/2)).toFixed(5);

    $("#inputTotal-razonInventario1").val(total12);    

}

    function razonDiasInventario1(){
    
    var numerador12 = $("#id_numerador_costosVentas_razonDiasInventario1").val();
    var denominador1 = $("#inventario-razonDiasInventario1").val();
    var denominador2 = $("#inventario-razonDiasInventario").val();
  
    //var total12 = (numerador12 / ((parseFloat(denominador1) + parseFloat(denominador2))/2)).toFixed(5);
    var total12 = ( ((parseFloat(denominador1) + parseFloat(denominador2))/2) / (numerador12 / 365)).toFixed(5);

    $("#inputTotal-razonDiasInventario1").val(total12);    

}

function razonCxC1(){
    
    var numerador12 = $("#id_numerador_ventasNetas_razonCxC1").val();

    var denominador1 = $("#CxC-razonCxC1").val();
    var denominador2 = $("#CxC-razonCxC").val();
  
    var total12 = ( numerador12 / ((parseFloat(denominador1) + parseFloat(denominador2))/2)).toFixed(5);

    $("#inputTotal-razonCxC1").val(total12);    

}

function razonMedioC1(){
    
    var numerador12 = $("#id_numerador_ventasNetas_razonMedioC1").val();
    var denominador1 = $("#CxC-razonMedioC1").val();
    var denominador2 = $("#CxC-razonMedioC").val();
  
    var total12 = (((((parseFloat(denominador1) + parseFloat(denominador2))/2) * 365) / numerador12)).toFixed(5);

    $("#inputTotal-razonMedioC1").val(total12);    

}

function razonCxP1(){
  
    var numerador1 = $("#id_numerador_compras_razonCxP1").val();  
    var denominador1 = $("#CxP-razonCxP1").val();
    var denominador2 = $("#CxP-razonCxP").val();
    //var total1 = ( / numerador1).toFixed(5);
    var total1 = ((numerador1 ) / ((parseFloat(denominador1) + parseFloat(denominador2))/2)).toFixed(5);

    
    $("#inputTotal-razonCxP1").val(total1);

}

function razonMedioP1(){
    
    var numerador1 = $("#id_numerador_compras_razonMedioP1").val();
    var denominador1 = $("#mCxP-razonCxP1").val();
    var denominador2 = $("#CxP-razonCxP").val();
    var total1 = ((((parseFloat(denominador1) + parseFloat(denominador2))/2)*365 ) / numerador1).toFixed(5);
    
    $("#inputTotal-razonMedioP1").val(total1);
}

function razonIndiceA1(){
    var numerador12 = $("#id_numerador_ventasNetas_razonIndiceA1").val();
    var denominador1 = $("#activoTotal-razonIndiceA1").val();
    var denominador2 = $("#activoTotal-razonIndiceA").val();
  
    var total12 = (numerador12 / ((parseFloat(denominador1) + parseFloat(denominador2))/2)).toFixed(5);

    $("#inputTotal-razonIndiceA1").val(total12);    

}

function razonActivosF1(){


     var numerador12 = $("#id_numerador_ventasNetas_razonActivosF1").val();
     var denominador1 = $("#activoFijoNeto-razonActivoF1").val();
     var denominador2 = $("#activoFijoNeto-razonActivoF").val();
  
    var total12 = (numerador12 / ((parseFloat(denominador1) + parseFloat(denominador2))/2)).toFixed(5);

    $("#inputTotal-razonActivosF1").val(total12);    

}

function razonMargenB1(){
    
    /*
    var ingreso = $("#id_numerador_ventasNetas_razonMedioC").val();
    var costosv = $("#id_numerador_costosVentas_razonInventario").val();

    var utilidadB = (ingreso - costosv);

    $("#utilidadB-razonMargenB1").val(utilidadB);*/

    var numerador12 = $("#id_numerador_ventasNetas_razonMargenB1").val();
    var denominador12 = $("#utilidadB-razonMargenB1").val();
  
    var total12 = (denominador12/ numerador12).toFixed(5);

    $("#inputTotal-razonMargenB1").val(total12);    

}

function razonMargenO1(){
    var numerador12 = $("#id_numerador_ventas_razonMargenO1").val();

    var denominador12 = $("#utilidadO-razonMargenO1").val();
  
    var total12 = (denominador12/ numerador12).toFixed(5);

    $("#inputTotal-razonMargenO1").val(total12);    

}

var btn1 = document.querySelector('#resultados-razonActividad1');

    btn1.addEventListener('click',razonInventario1, false);
    btn1.addEventListener('click',razonDiasInventario1, false);
    btn1.addEventListener('click',razonCxC1, false);
    btn1.addEventListener('click',razonMedioC1, false);
    btn1.addEventListener('click',razonCxP1, false);
    btn1.addEventListener('click',razonMedioP1, false);
    btn1.addEventListener('click',razonIndiceA1, false);
    btn1.addEventListener('click',razonActivosF1, false);
    btn1.addEventListener('click',razonMargenB1, false);
    btn1.addEventListener('click',razonMargenO1, false);


  //});

//#########################RATIOS DE RENTABILIDAD###########################################

$(document).on('click',"#resultados-razonRentabilidad",function(){


function razonNetaPatr(){
  /*
    var numerador12 = 0;
    $("#input_numerador_patrimonioP_razonNetaP").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonioP_razonNetaP").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonioP_razonNetaP").val(numeros12);
  });*/

    var numerador12 = $("#input_numerador_patrimonioP_razonNetaP").val();
    var denominador12 = $("#utilidadN-razonNetaP").val();
  
    var total12 = (denominador12/ numerador12).toFixed(5);

    $("#inputTotal-razonNetaPatr").val(total12);    

}

function razonAccion(){
    
    var numerador = $("#utilidadN-razonAccion").val();
    var denominador = $("#numeroAcciones").val();
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonAccion").val(total);    

}

function razonActivoTotal(){
    
    var numerador = $("#utilidadN-razonRentActivo").val();
    var denominador = $("#activoTotal-razonRentActivo").val();
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonActivoTotal").val(total);    

}

function razonRentVentas(){
    
    var numerador = $("#utilidadN-razonRentVentas").val();
    var denominador = $("#id_numerador_ventas_razonRentVentas").val();
/*
    var denominador = 0;
    $("#input_numerador_ventas_razonRentVentas").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador += eval($(this).val());
        }
      }
    );

    $("#id_numerador_ventas_razonRentVentas").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_ventas_razonRentVentas").val(numeros12);
  });
  */
    
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonRentVentas").val(total);    

}

function razonInversion(){
    
   
    var denominador1 = 0;
    $("#input_numerador_inv_razonInversion").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador1 += eval($(this).val());
        }
      }
    );


    $("#id_numerador_inv_razonInversion").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_inv_razonInversion").val(numeros12);
  });

    var numerador1 = $("#id_numerador_ing_razonInversion").val();
  
    var total1 = ((numerador1 - denominador1)/ denominador1).toFixed(5);

    $("#inputTotal-razonInversion").val(total1);

}


var btn2 = document.querySelector('#resultados-razonRentabilidad');

    btn2.addEventListener('click',razonNetaPatr, false);
    btn2.addEventListener('click',razonAccion, false);
    btn2.addEventListener('click',razonActivoTotal, false);
    btn2.addEventListener('click',razonRentVentas, false);
    btn2.addEventListener('click',razonInversion, false);





//###############################################
 // $("body").on("click", "#resultados_razonEfectivo", function() {
  
  //});

  

});

//#########################RATIOS DE RENTABILIDAD###########################################

$(document).on('click',"#resultados-razonRentabilidad1",function(){


function razonNetaPatr1(){
  /*
    var numerador12 = 0;
    $("#input_numerador_patrimonioP_razonNetaP1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonioP_razonNetaP1").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonioP_razonNetaP1").val(numeros12);
  });
  */
    var numerador2 = $("#input_numerador_patrimonioP_razonNetaP").val();
    var numerador12 = $("#input_numerador_patrimonioP_razonNetaP1").val();
    var denominador12 = $("#utilidadN-razonNetaP1").val();
  
    var total12 = (denominador12/ ((parseFloat(numerador12) + parseFloat(numerador2))/2)).toFixed(5);

    $("#inputTotal-razonNetaPatr1").val(total12);    

}

function razonAccion1(){
    
    var numerador = $("#utilidadN-razonAccion1").val();
    var denominador = $("#numeroAcciones1").val();
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonAccion1").val(total);    

}

function razonActivoTotal1(){
    
    var numerador = $("#utilidadN-razonRentActivo1").val();
    var denominador1 = $("#activoTotal-razonRentActivo1").val();
    var denominador2 = $("#activoTotal-razonRentActivo").val();
  
    var total = (numerador / ((parseFloat(denominador1) + parseFloat(denominador2))/2)).toFixed(5);

    $("#inputTotal-razonActivoTotal1").val(total);    

}

function razonRentVentas1(){
    
    var numerador = $("#utilidadN-razonRentVentas1").val();
    var denominador = $("#id_numerador_ventas_razonRentVentas1").val();
/*
    var denominador = 0;
    $("#input_numerador_ventas_razonRentVentas1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador += eval($(this).val());
        }
      }
    );

    $("#id_numerador_ventas_razonRentVentas1").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_ventas_razonRentVentas1").val(numeros12);
  });
  */  
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonRentVentas1").val(total);    

}

function razonInversion1(){
    
   
    var denominador12 = 0;
    $("#input_numerador_inv_razonInversion1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador12 += eval($(this).val());
        }
      }
    );


    $("#id_numerador_inv_razonInversion1").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_inv_razonInversion1").val(numeros12);
  });

    var numerador12 = $("#id_numerador_ing_razonInversion1").val();

  
    var total12 = ((numerador12 - denominador12)/ denominador12).toFixed(5);

    $("#inputTotal-razonInversion1").val(total12);    

}


var btn2 = document.querySelector('#resultados-razonRentabilidad1');

    btn2.addEventListener('click',razonNetaPatr1, false);
    btn2.addEventListener('click',razonAccion1, false);
    btn2.addEventListener('click',razonActivoTotal1, false);
    btn2.addEventListener('click',razonRentVentas1, false);
    btn2.addEventListener('click',razonInversion1, false);

//###############################################
 // $("body").on("click", "#resultados_razonEfectivo", function() {
  
  //});

});

//#########################RATIOS DE RENTABILIDAD###########################################

$(document).on('click',"#resultados-razonGradoEnd",function(){

function razonGradoEnd(){
    
    var numerador = $("#pasivoTotal-razonEndeudo").val();
    var denominador = $("#activoTotal-razonEndeudo").val();
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonGradoEnd").val(total);    

}

function razonPropiedad(){
/*    
    var numerador1 = 0;
    $("#input_numerador_patrimonio_razonPropiedad").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonio_razonPropiedad").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonio_razonPropiedad").val(numeros12);
  });
  */
    var numerador1 = $("#input_numerador_patrimonio_razonPropiedad").val();
    var denominador1 = $("#activoTotal-razonPropiedad").val();
  
    var total1 = (numerador1 / denominador1).toFixed(5);

    $("#inputTotal-razonPropiedad").val(total1);    

}

function razonEndeudoPatr(){
    /*
    var numerador1 = 0;
    $("#input_numerador_patrimonioTotal_razonEndeudoPatr").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonioTotal_razonEndeudoPatr").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonioTotal_razonEndeudoPatr").val(numeros12);
  });*/
    var numerador1 = $("#input_numerador_patrimonioTotal_razonEndeudoPatr").val();
    var denominador1 = $("#pasivoTotal-razonEndeudoPatr").val();
  
    var total1 = (denominador1 / numerador1).toFixed(5);

    $("#inputTotal-razonEndeudoPatr").val(total1);    

}

function razonGastosF(){
    
    var numerador1 = $("#id_numerador_g_razonGastosF").val();
    var denominador1 = $("#cobertura-razonGastosF").val();
  
    var total1 = (denominador1 / numerador1).toFixed(5);

    $("#inputTotal-razonGastosF").val(total1);    

}

var btn3 = document.querySelector('#resultados-razonGradoEnd');

    btn3.addEventListener('click',razonGradoEnd, false);
    btn3.addEventListener('click',razonPropiedad, false);
    btn3.addEventListener('click',razonEndeudoPatr, false);
    btn3.addEventListener('click',razonGastosF, false);

});


//#########################RATIOS DE RENTABILIDAD###########################################

$(document).on('click',"#resultados-razonGradoEnd1",function(){

function razonGradoEnd1(){
    
    var numerador = $("#pasivoTotal-razonEndeudo1").val();
    var denominador = $("#activoTotal-razonEndeudo1").val();
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonGradoEnd1").val(total);    

}

function razonPropiedad1(){
    /*
    var numerador1 = 0;
    $("#input_numerador_patrimonio_razonPropiedad1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonio_razonPropiedad1").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonio_razonPropiedad1").val(numeros12);
  });
  */
    var numerador1 = $("#input_numerador_patrimonio_razonPropiedad1").val();
    var denominador1 = $("#activoTotal-razonPropiedad1").val();
  
    var total1 = (numerador1 / denominador1).toFixed(5);

    $("#inputTotal-razonPropiedad1").val(total1);    

}

function razonEndeudoPatr1(){
    /*
    var numerador1 = 0;
    $("#input_numerador_patrimonioTotal_razonEndeudoPatr1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonioTotal_razonEndeudoPatr1").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonioTotal_razonEndeudoPatr1").val(numeros12);
  });*/
    var numerador1 = $("#input_numerador_patrimonioTotal_razonEndeudoPatr1").val();
    var denominador1 = $("#pasivoTotal-razonEndeudoPatr1").val();
  
    var total1 = (denominador1 / numerador1).toFixed(5);

    $("#inputTotal-razonEndeudoPatr1").val(total1);    

}

function razonGastosF1(){
    
    var numerador1 = $("#id_numerador_g_razonGastosF1").val();
    var denominador1 = $("#cobertura-razonGastosF1").val();
  
    var total1 = (denominador1 / numerador1).toFixed(5);

    $("#inputTotal-razonGastosF1").val(total1);    

}

var btn3 = document.querySelector('#resultados-razonGradoEnd1');

    btn3.addEventListener('click',razonGradoEnd1, false);
    btn3.addEventListener('click',razonPropiedad1, false);
    btn3.addEventListener('click',razonEndeudoPatr1, false);
    btn3.addEventListener('click',razonGastosF1, false);

});

});