<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Añadir datos</title>
</head>

<body>
<?php
//including the database connection file
include_once("conexion.php");

if(isset($_POST['Submit'])) {	
	$nomcomic = $_POST['nomcomic'];
	$autor = $_POST['autor'];
	$editorial = $_POST['editorial'];
	$proveedor = $_POST['provee'];
	$tipo = $_POST['tipo'];
	$genero = $_POST['genero'];
	$clasificacion= $_POST['clasifi'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($nomcomic) || empty($autor) || empty($editorial) || empty($proveedor) || empty($tipo) || empty($genero) || empty($clasificacion)) {
				
		if(empty($nomcomic)) {
			echo "<font color='red'>El campo de nombre del comic está vacío.</font><br/>";
		}
		
		if(empty($autor)) {
			echo "<font color='red'>El campo autor está vacío.</font><br/>";
		}
		
		if(empty($editorial)) {
			echo "<font color='red'>El campo Editorial está vacío.</font><br/>";
		}

		if(empty($proveedor)) {
			echo "<font color='red'>El campo Proveedor está vacío.</font><br/>";
		}
		
		if(empty($tipo)) {
			echo "<font color='red'>El campo Tipo está vacío.</font><br/>";
		}

		if(empty($genero)) {
			echo "<font color='red'>El campo Genero está vacío.</font><br/>";
		}

		if(empty($clasificacion)) {
			echo "<font color='red'>El campo Clasificacion está vacío.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Regresar</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO comics(nomcomic, autor, editorial, proveedor, tipo, genero, clasificacion, login_id) VALUES('$nomcomic','$autor','$editorial','$proveedor','$tipo','$genero','$clasificacion', '$loginId')");
		
		//display success message
		echo "<font color='green'>Datos agregados exitosamente.";
		echo "<br/><a href='ver.php'>ver resultados</a>";
	}
}
?>
</body>
</html>
