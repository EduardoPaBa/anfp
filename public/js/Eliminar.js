$(function() {
	 var form = document.getElementById('miFormulario');
	 form.addEventListener('submit', function(event) {
	   // si es false entonces que no haga el submit
	   if (!confirm('Realmente desea eliminar?')) {
	     event.preventDefault();
	   }
	 }, false);
});