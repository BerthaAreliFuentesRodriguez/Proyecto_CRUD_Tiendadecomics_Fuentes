<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("conexion.php");

if(isset($_POST['update']))
{	
	$idcomic = $_POST['idcomic'];
	$nomcomic = $_POST['nomcomic'];
	$autor = $_POST['autor'];
	$editorial = $_POST['editorial'];
	$proveedor = $_POST['provee'];
	$tipo = $_POST['tipo'];
	$genero = $_POST['genero'];
	$clasificacion= $_POST['clasifi'];	
	
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
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE comics SET nomcomic='$nomcomic', autor='$autor', editorial='$editorial', proveedor='$proveedor', tipo='$tipo', genero='$genero', clasificacion='$clasificacion' WHERE idcomic=$idcomic");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: ver.php");
	}
}
?>
<?php
//getting id from url
$idcomic = $_GET['idcomic'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM comics WHERE idcomic=$idcomic");

while($res = mysqli_fetch_array($result))
{
	$nomcomic = $res['nomcomic'];
	$autor = $res['autor'];
	$editorial = $res['editorial'];
	$proveedor = $res['proveedor'];
	$tipo = $res['tipo'];
	$genero = $res['genero'];
	$clasificacion= $res['clasificacion'];
}
?>
<html>
<head>	
	<title>editar datos</title>
</head>

<body>
	<a href="index.php">inicio</a> | <a href="ver.php">ver comics</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
		<tr> 
				<td>Nombre del comic</td>
				<td><input type="text" name="nomcomic" value="<?php echo $nomcomic;?>"></td>
			</tr>
			<tr> 
				<td>Autor</td>
				<td><input type="text" name="autor" value="<?php echo $autor;?>"></td>
			</tr>
			<tr> 
				<td>Editorial</td>
				<td><input type="text" name="editorial" value="<?php echo $editorial;?>"></td>
			</tr>
			<tr> 
				<td>Proveedor</td>
				<td><input type="text" name="provee" value="<?php echo $proveedor;?>"></td>
			</tr>
			<tr> 
				<td>Tipo</td>
				<td><input type="text" name="tipo" value="<?php echo $tipo;?>"></td>
			</tr>
			<tr> 
				<td>Genero</td>
				<td><input type="text" name="genero" value="<?php echo $genero;?>"></td>
			</tr>
			<tr> 
				<td>Clasificacion</td>
				<td><input type="text" name="clasifi" value="<?php echo $clasificacion;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="idcomic" value=<?php echo $_GET['idcomic'];?>></td>
				<td><input type="submit" name="update" value="Editar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
