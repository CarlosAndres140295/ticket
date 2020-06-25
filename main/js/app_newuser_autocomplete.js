$(document).ready(function() {


	(function() { 
		listartipodocumento();
		listargenero();
	})();
	
	function listartipodocumento() {
		// body...
		const data = new FormData();
		data.append('parametro', 'tipo_documento');

		fetch('modulocliente/app.php', {
  			   method: 'POST',
  	           body: data})
		  .then(function(response) {
		    return response.json();
		  })
		  .then(function(datos) {
		    // console.log(datos);
		     for (var i in datos) {
      		  var newRow =`<option value="${datos[i].tido_id}">${datos[i].tido_abreviacion}</option>`;
		      $(newRow).appendTo("#tipo_documento");
  			  }

		  });

	}

		function listargenero() {
		// body...
		const data = new FormData();
		data.append('parametro', 'genero');

		fetch('modulocliente/app.php', {
  			   method: 'POST',
  	           body: data})
		  .then(function(response) {
		    return response.json();
		  })
		  .then(function(datos) {
		    // console.log(datos);
		     for (var i in datos) {
      		  var newRow =`<option value="${datos[i].gene_id}">${datos[i].gene_nombre}</option>`;
		      $(newRow).appendTo("#genero");
  			  }

		  });

	}


	var a=document.getElementById("guardar_cliente")
	a.addEventListener("click",GuardarCliente)

	function GuardarCliente() {
		// body...
    	var formulario=$('#form_cliente').serialize();
    	// alert(formulario);
		fetch('modulocliente/validarCliente.php',{
		method:'POST',
		body:formulario
		})
		.then(res=>res.json())
		.then(data=>{
			// console.log(data)
			if (data==='Error') {
				// respuesta.innerHTML=`
	   //              <div class="alert alert-danger" role="alert">
	   //              Llena todos los campos del formulario
	   //      		</div>
	   //              `
	   // alert('Eror')
	   console.log(data)
			}else{
				// respuesta.innerHTML=`
	   //              <div class="alert alert-primary" role="alert">
	   //               ${data}
	   //      		</div>
	   //              `
			}
		})
	}
});