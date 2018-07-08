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
<title>Portal web - aprenderaprogramar.com</title> <meta charset="utf-8">
<style type="text/css">
 

body {background-color: navy;}

a {color:white;}

div {border-style: solid; border-width: 2px;
	margin: 7px; padding: 7px; background-color: navy; color:white;}
	
#caja1{border-color:white;}

#caja2{margin:0 7px 7px 7px; border-color:white;
	width:200px; float:left; height:auto;}
	
#caja3{margin:0 7px 7px 0px; border-color:white;
	width:1091px; float:right; height:auto;}
	
#caja4{border-color:orange; clear:both; height:55px;}

td {padding:7px;}



</style>
</head>
<body>
<header>
	<nav>
		<a href="cerrarsesion.php" style="margin-right:4px">Cerrar sesión</a>
	</nav>
</header>
<center>
<div id="caja1"><h1><?php echo "Bienvenido ".$user."!"?></h1></div>
</center>
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
<div id="caja2"><a href="" style="margin-right:4px">Crear Carpeta</a></div>

<div id="caja3">
<center>
<form method="post" enctype="multipart/form-data">
		<input type="file" name="myfile"/>
		<button name="btn">Subir Archivo</button>	
</form>
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
</div>

</body>
</html>