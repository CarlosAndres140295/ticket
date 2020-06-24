$(document).ready(function() {

	(function() { 
		listartipodocumento();
	})();
	
	function listartipodocumento() {
		// body...
		// alert('Listardocumento')
		// fetch('modulocliente/app.php')
		//   .then(function(response) {
		//     return response.json();
		//   })
		//   .then(function(myJson) {
		//     // console.log(myJson);
		//   });

		$.ajax({
		url: "../modulocliente/app.php",
		type: "json",
		success: function(response){
		    console.log(response)
		}
		});

	}
	

});