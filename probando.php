<?php
	session_start();
	$varsesion = $_SESSION['user'];
	$user = $_SESSION['user'];
	$id = $_SESSION['id'];
	
	//error_reporting(0);
	if($varsesion == null || $varsesion = ''){
		echo 'Usted no tiene autorización';
		die();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Inicio</title>
	
	<style>
		h1 {text-align:center;color:white;}
		body {background-color:navy;}
		a {color:white;}
		li {color:white;}
		th {color:white;}
		td {color:white;}
		table {color:red;background-color:red;}
	</style>
</head>
<body>
<header>
	<nav>
		<a href="cerrarsesion.php" style="margin-right:4px">Cerrar sesión</a>
	</nav>
</header>

<h1><?php echo "Bienvenido ".$user."!"?></h1>
	<?php
		// function Conectarse()
// {
  // $link = mysqli_connect("localhost", "root", "", "testeando");
	// return $link;
// }
// $link = Conectarse();
		$dbh = new PDO("mysql:host=localhost;dbname=testeando", "root", "");
		if(isset($_POST['btn'])){
			$texto=$_FILES['myfile']['name'];
			$texto_cambiado=str_replace(" ","_",$texto);
			// $consulta="SELECT id FROM users WHERE name='Trianlos'";
			// $resultado=mysqli_query($link,$consulta);
			$id = $_SESSION['id'];
			$name = $texto_cambiado;
			$type = $_FILES['myfile']['type'];
			$data = file_get_contents($_FILES['myfile']['tmp_name']);
			$user = $_SESSION['user'];
			$stmt = $dbh->prepare("Insert into files (name,type,data,user,fk_id) values(?,?,?,?,?)");
			// $stmt->bindParam(1,$resultado);
			$stmt->bindParam(1,$name);
			$stmt->bindParam(2,$type);
			$stmt->bindParam(3,$data);
			$stmt->bindParam(4,$user);
			$stmt->bindParam(5,$id);
			$stmt->execute();			
		}
		// mysqli_free_result($resultado);
	
	// mysqli_close($link);
	?>
	<center>
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="myfile"/>
		<button name="btn">Subir Archivo</button>	
	</form>
	<p></p> 
	<ol>
	<?php
		$stat = $dbh->prepare("select * from files where fk_id='$id'");
		$stat->execute();
		// while($row = $stat->fetch()){
			// echo "<a target='_blank' href='view.php?id=".$row['id']."'>".$row['name']."</a>";
		// }
		
		echo "<table border=1><tr><th>Nombre</th><th>Tipo</th><th>Enlace de Descarga</th></tr>";

    while($row = $stat->fetch()) 
	{
        echo "<tr><td>" . $row["name"]. "</td><td>". $row["type"] ."</td><td><a target='_blank' href='view.php?id=".$row['id']."'>Descargar</a></td></tr>";
	}
echo "</table>";
		
	?>
	</ol>
	</center>
</body>
</html>