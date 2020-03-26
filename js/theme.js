(function($) {

	// Ahora puedes usar $. Puedes comprobarlo usando la siguiente línea:
	// console.log($);
    // Recuerda que solo puedes usar $ DENTRO de esta función.

    // Galeria
    document.getElementById('gallery-links').onclick = function(event) {
    	event = event || window.event
    	var target = event.target || event.srcElement,
    	link = target.src ? target.parentNode : target,
    	options = { index: link, event: event },
    	links = this.getElementsByTagName('a')
    	blueimp.Gallery(links, options)
    }

    $('#navbarContent #v-pills-tab').on('hover', function (e) {
        e.preventDefault()
        $(this).tab('show')
    });

})( jQuery );