$(function(){
    	//alert('javascript');
    	$('#tabla tr').click(function(event) {
    	//var valor = document.getElementById("codigo");
	    var valor = document.getElementById("activo");
	    var valor1 = document.getElementById("pasivo");
	    var fila = event.target.parentNode;
	    //var fila0 = event.target.parentNode;
	    //var fila1 = event.target.parentNode;
	    valor.value = fila.children[2].innerHTML;
	    //valor0.value = fila0.children[2].innerHTML;
	    //valor1.value = fila1.children[2].innerHTML;
	    $('#tabla tr').removeClass('seleccionado');
	    $(this).addClass('seleccionado');

	    $('.sel').select2();
		});

		$("#sel").select2({
             allowClear:true,
             placeholder: 'Search for a disease'
           });
});