<?php session_start(); ?>
<html>
<head>
	<title>pagina de inicio</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido a mi pagina
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenido <?php echo $_SESSION['nombre'] ?> ! <a href='logout.php'>Cerrar sesión</a><br/>
		<br/>
		<a href='ver.php'>Ver y agregar comics</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar conectado para ver esta página.<br/><br/>";
		echo "<a href='login.php'>iniciar sesion</a> | <a href='registrar.php'>Registrarse</a>";
	}
	?>
	<div id="footer">
		Creado por <a href="https://berthaarelifuentesrodriguez.github.io/FuentesB_WEB/index.html">Bertha Areli Fuentes Rodriguez</a>
	</div>
</body>
</html>
