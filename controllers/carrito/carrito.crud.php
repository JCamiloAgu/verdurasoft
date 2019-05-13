<?php
session_start();
if(isset($_SESSION['id_usuario'])){

	if(isset($_GET["page"])){
		$page=$_GET["page"];
	}else{
		$page=0;
	}

	include('../conexion.php');

	switch($page){

		// Agregar
		case 1:
		$cantidad = ($_POST['cantidad'] + $_POST['cantidadActual']);
		$producto_id = $_POST['producto_id'];
		$query= "SELECT * FROM productos WHERE id = '$producto_id';";
		$consulta = mysqli_query($conexion, $query);
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
		$producto = mysqli_fetch_row($consulta);
		$nombre = $producto[3];
		$valor = $producto[6];
		$subtotal = $cantidad * $valor;
		$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'producto'=>$nombre, 'cantidad'=>$cantidad, 'precio'=>$valor, 'subtotal'=>$subtotal);
		$json['success'] = true;
		echo json_encode($json);
		break;

		// Eliminar
		case 2:
		$json = array();
		$json['msj'] = 'Producto Eliminado';
		$json['success'] = true;

		if (isset($_POST['id'])) {
			unset($_SESSION['detalle'][$_POST['id']]);
			echo json_encode($json);
		}
		break;

		// Guardar compra
		case 3:
		if ($_SESSION['detalle'] != '') {
			$factura = rand().$_SESSION['id_usuario'];
			foreach ($_SESSION['detalle'] as $row) {
				$id = 0;
				$usuarios_id = $_SESSION['id_usuario'];
				$productos_id = $row['id'];
				$cantidad = $row['cantidad'];
				$valor = $row['subtotal'];

				$query= "SELECT * FROM productos WHERE id = '$productos_id';";
				$consulta1 = mysqli_query($conexion, $query);
				$consulta1 = mysqli_fetch_row($consulta1);

				$query = "INSERT INTO compras(id, usuarios_id, productos_id, factura, cantidad, valor, estado)
				VALUES($id, '$usuarios_id', '$productos_id', '$factura', '$cantidad', '$valor', 'espera';)";
				$consulta2 = mysqli_query($conexion, $query);

				$query = "UPDATE productos SET cantidad = '$consulta1[5] - $cantidad' WHERE id = '$productos_id';)";
				$consulta3 = mysqli_query($conexion, $query);
			}
			echo '<script languaje="javascript">
			var mensaje ="La compra fue hecha, haz el pago en un efecti con este codigo:' . $factura .' ";
			alert(mensaje);
			window.location.href= "../../public/views/carrito/factura.php"
			</script>';
		}

		break;
	}
}
else {
	$json = array();
	$json['success'] = false;
	$json['msj'] = 'sesion';
	echo json_encode($json);
}


?>
