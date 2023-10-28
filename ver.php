<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("conexion.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM comics WHERE login_id=".$_SESSION['id']." ORDER BY idcomic DESC");
?>

<html>
<head>
	<title>vista de comics</title>
</head>

<body>
	<a href="index.php">inicio</a> | <a href="anadir.html">Agregar comic</a> | <a href="logout.php">Cerrar sesión</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>ID Comic</td>
			<td>Nombre del comic</td>
			<td>Autor</td>
			<td>Editorial</td>
			<td>Proveedor</td>
			<td>Tipo</td>
			<td>Genero</td>
			<td>clasificacion</td>
			<td>Acciones</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td><center>".$res['idcomic']."</center></td>";
			echo "<td><center>".$res['nomcomic']."</center></td>";
			echo "<td><center>".$res['autor']."</center></td>";
			echo "<td><center>".$res['editorial']."</center></td>";	
			echo "<td><center>".$res['proveedor']."</center></td>";
			echo "<td><center>".$res['tipo']."</center></td>";
			echo "<td><center>".$res['genero']."</center></td>";
			echo "<td><center>".$res['clasificacion']."</center></td>";
			echo "<td><center><a href=\"editar.php?idcomic=$res[idcomic]\">Editar</a> | <a href=\"eliminar.php?idcomic=$res[idcomic]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></center></td>";		
		}
		?>
	</table>	
</body>
</html>
