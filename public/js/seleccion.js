$(function(){
    	//alert('javascript');
    	$('#table tr').click(function(event) {
	    var valor = document.getElementById("codigo");
	    var fila = event.target.parentNode;
	    valor.value = fila.children[2].innerHTML
	    $('#table tr').removeClass('seleccionado');
	    $(this).addClass('seleccionado');
		});
});