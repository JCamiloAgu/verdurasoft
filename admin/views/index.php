<?php

	session_start();
	if (isset($_SESSION['ident'])) {

		include('../../controllers/conexion.php');
		$id = $_SESSION['ident'];
		$query= "SELECT * FROM admins WHERE id = '$id';";
		$consulta = mysqli_query($conexion, $query);
		$mostrar = mysqli_fetch_array($consulta);


		if ($result = $conexion->query("SELECT * FROM productos")) {

	    /* determinar el número de filas del resultado */
	    $row_cnt = $result->num_rows;



	    /* cerrar el resultset */
	    $result->close();
		}

	    if ($result2 = $conexion->query("SELECT * FROM compras")) {

	    /* determinar el número de filas del resultado */
	    $row_cnt2 = $result2->num_rows;



	    /* cerrar el resultset */
	    $result2->close();

}
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>VerduraSoft | Administración</title>
	<script src="../js/code_jquery.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="../css/index.css">
	<link rel="shortcut icon" href="../../public/img/favicon.png">


</head>
<body>
	<div class="container">
		<header class="content-header">
			<nav class="main-nav">
				<div class="content-user">
						<img src="<?php echo '../'.$mostrar['foto']; ?>" alt="img" class="content-img">
						<p class="text"> <?php echo $mostrar['nombre']; ?> <?php echo $mostrar['apellido']; ?></p>
				</div>
				<div class="container-menu">
					<div class="todo">
						<div class="caja">
							<div class="fecha">
								<p id="diaSemana" class="diaSemana"></p>
								<p id="dia" class="dia"></p>
								<p>de</p>
								<p id="mes" class="mes"></p>
								<p>del</p>
								<p id="year" class="year"></p>
							</div>
							<div class="reloj">
								<p id="horas" class="horas"></p>
								<p>:</p>
								<p id="minutos" class="minutos"></p>
								<p>:</p>
								<p id="segundos" class="segundos"></p>
								<p id="ampm" class="ampm"></p>
							</div>
						</div>
    			</div>
					<img class="icon" id="menu" src="../img/user-solid.svg">
					<ul class="content-menu">
						<li class="item"><a href="./auth/editar.admin.php?id= <?php echo $id?>" class="link">Editar perfil</a></li>
						<li class="item"><a href="../../controllers/admins/session.salir.admin.php" class="link">Cerrar sesión</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<section>
			<aside class="container-aside">
					<ul class="aside-list">
						<li>
							<a href="#">Inicio</a>
						</li>
						<li class="aside-item">
							<a href="admin.php">Admins</a>
						</li>
						<li class="aside-item">
							<a href="user.php">Usuarios</a>
						</li>
						<li class="aside-item">
							<a href="productos.php">Productos</a>
						</li>
						<li class="aside-item">
							<a href="compras.php">Compras</a>
						</li>
					</ul>
					<ul class="aside-list ultimo">
						<a href="#">Productos: <?php echo $row_cnt; ?></a>
						<a href="#">Compras:  <?php echo $row_cnt2; ?></a>
					</ul>
			</aside>
			<article  class="container-article">

			</article>

		</section>
	</div>

	<script src="../js/llegada-login.js"></script>
	<script src="../js/index.js"></script>
</body>
</html>

<?php
}
	else{
		echo '<script languaje="javascript">
		var mensaje ="Usted no tiene acceso a este contenido, por favor inicie sesión";
		alert(mensaje);
		window.location.href= "../"
		</script>';
	}
?>
