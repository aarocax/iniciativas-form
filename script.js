(function($){

	$("#subscrition-form").submit(function(e){
		e.preventDefault();

		$( "#results" ).html( "sending..." );

   	$.ajax({
		  method: "POST",
		  url: "process-form.php",
		  data: $("#subscrition-form").serialize()
		})
	  .done(function( response ) {
	    switch(response) {
			  case 'ok':
			    $("#subscrition-form").hide();
	    		$( "#results" ).html( "gracias por suscribirse a nuestro newsletter..." );	
			    break;
			  case 'ko':
	    		$( "#results" ).html( "no es posible realizar la subscripción. Por favor inténtelo más tarde..." );	
			    break;
			  default:
			  	$( "#results" ).html( "" );	
	    		$( "#error" ).html( "el email facilitado no es válido" );
			} 
	    
	  });

 	});

})(jQuery)