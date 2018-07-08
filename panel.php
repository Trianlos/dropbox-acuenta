<?php
	session_start();
	$varsesion = $_SESSION['user'];
	// error_reporting(0);
	if($varsesion == null || $varsesion = ''){
		echo 'Usted no tiene autorización';
		die();
	}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Inicio</title>
<style>

h1 {text-align:center;
	color:white;
	}
	
a {color:white;}

body {background-color:navy;}



</style>

</head>
<body>
<header>
	<nav>
		<a href="index.html" style="margin-right:4px">Inicio</a>
		<a href="cerrarsesion.php" style="margin-right:4px">Cerrar sesión</a>
	</nav>
</header>

<h1>Bienvenido a Dropbox versión Acuenta!!!!!!!</h1>

<center>
	<form action="file.php" method="post" enctype="multipart/form-data">
		<input type="file" name="archivo" id="archivo"></input>
		<input type="submit" value="Subir archivo"></input>
	</form>
</center>

</body>
</html> 