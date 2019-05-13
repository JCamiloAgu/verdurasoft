document.getElementById("ingresar-ventas").addEventListener("click",function(){
	document.getElementById("content-formulario").classList.add("mostrar-formulario")
	document.getElementById("form-register").classList.add("mostrar")

})

document.getElementById("cerrar_ingresar").addEventListener("click",function(){
	document.getElementById("content-formulario").classList.remove("mostrar-formulario")
	document.getElementById("form-register").classList.remove("mostrar")
})


for (var i = document.getElementsByClassName('eliminar-formulario').length - 1; i >= 0; i--) {
	document.getElementsByClassName('eliminar-formulario')[i].addEventListener('click', function(){

		for (var i = document.getElementsByClassName('eliminar-formulario').length - 1; i >= 0; i--) {
			document.getElementsByClassName('eliminar-formulario')[i].addEventListener('click', function(){
				text = this.parentElement.parentElement.childNodes

				swal({
				  title: "VerduraSoft",
				  text: "¿seguro que deseas eliminar la factura "+ text[9].innerHTML + " con codigo de usuario " + text[1].innerHTML + " con codigo de producto "+ text[3].innerHTML +" ?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    swal( " Factura " + text[3].innerHTML + " ha sido eliminada", {
				      icon: "success",
				    });
				  }
				});
			})
		}
	})
}

document.getElementById('form-register').addEventListener('keyup',function(){
	
	precio = document.getElementById('form-content-ingresar').childNodes[5].childNodes[1].value
	cu = document.getElementById('form-content-ingresar').childNodes[5].childNodes[3].value

	document.getElementById('form-content-ingresar').childNodes[7].value = precio * cu
})
var cantidad = document.getElementById("cantidad").innerHTML
var valor =document.getElementById("valor").innerHTML
document.getElementById("total").innerHTML = cantidad*valor


for (var i = document.getElementsByClassName('editar-formulario').length - 1; i >= 0; i--) {

	document.getElementsByClassName('editar-formulario')[i].addEventListener('click', function(){

		var text = this.parentElement.parentElement.childNodes

		document.getElementById('form-content-actualizar').childNodes[1].childNodes[1].value = text[1].innerHTML
		document.getElementById('form-content-actualizar').childNodes[1].childNodes[3].value = text[3].innerHTML
		document.getElementById('form-content-actualizar').childNodes[3].value = text[9].innerHTML
		document.getElementById('form-content-actualizar').childNodes[5].childNodes[1].value = text[11].innerHTML
		document.getElementById('form-content-actualizar').childNodes[5].childNodes[3].value = text[13].innerHTML

		precio = document.getElementById('form-content-actualizar').childNodes[5].childNodes[1].value
		cu = document.getElementById('form-content-actualizar').childNodes[5].childNodes[3].value

		document.getElementById('form-content-actualizar').childNodes[7].value = precio * cu



		document.getElementById("content-formulario").classList.add("mostrar-formulario")		
		document.getElementById("form-actualizar").classList.add("mostrar")

	})
}

document.getElementById('form-actualizar').addEventListener('keyup',function(){
	
	precio = document.getElementById('form-content-actualizar').childNodes[5].childNodes[1].value
	cu = document.getElementById('form-content-actualizar').childNodes[5].childNodes[3].value

	document.getElementById('form-content-actualizar').childNodes[7].value = precio * cu
})


document.getElementById("cerrar_editar").addEventListener("click",function(){
	document.getElementById("content-formulario").classList.remove("mostrar-formulario")
	document.getElementById("form-actualizar").classList.remove("mostrar")
})
