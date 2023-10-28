<html>
<head>
	<title>Register</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['nombre'];
	$email = $_POST['email'];
	$user = $_POST['nomusuario'];
	$pass = $_POST['contrasena'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='registrar.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(nombre, correo, nomusuario, contrasena) VALUES('".$name."', '".$email."', '".$user."', md5('".$pass."'))")
			or die("Error de Registro, Vuelve a Intentarlo.");
			
		echo "Registro Exitoso";
		echo "<br/>";
		echo "<a href='login.php'>Iniciar Sesion</a>";
	}
} else {
?>
	<p><font size="+2">Registro</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Nombre Usuario</td>
				<td><input type="text" name="nomusuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contrasena"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Registrar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>