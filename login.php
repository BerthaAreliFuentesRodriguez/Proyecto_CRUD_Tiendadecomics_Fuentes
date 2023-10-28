<?php session_start(); ?>
<html>
<head>
	<title>inicio de sesion</title>
</head>

<body>
<a href="index.php">inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$usuario = mysqli_real_escape_string($mysqli, $_POST['username']);
	$contrasena = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($usuario == "" || $contrasena == "") {
		echo "Cualquier campo de nombre de usuario o contraseña está vacío.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE nomusuario='".$usuario."' AND contrasena=md5('".$contrasena."')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['nomusuario'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Usuario o contraseña invalido.";
			echo "<br/>";
			echo "<a href='login.php'>Regresar</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">iniciar sesion</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">nombre de usuario</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>contrasena</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
