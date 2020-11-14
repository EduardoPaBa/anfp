$(function(){
      //alert('javascript');
  $("body").on("click", "#resultados", function() {
  var numerador = 0
    $(".input_numerador").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador += eval($(this).val());
        }
      }
    );
  var denominador = 0
    $(".input_denominador").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador += eval($(this).val());
        }
      }
    );
    var total = numerador / denominador;
    
    $("#inputTotal").val(total);
  });

  $("#id_numerador").change(function() {
    var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros = texto.replace(/[^0-9.]/g, '');
    $(".input_numerador").val(numeros);
  });

  $("#id_denominador").change(function() {
    var texto1 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros1 = texto1.replace(/[^0-9.]/g, '');
    $(".input_denominador").val(numeros1);
  });



});