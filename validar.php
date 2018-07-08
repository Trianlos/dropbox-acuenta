<?php
	
session_start();
	
$user=$_POST['user'];
$pass=$_POST['pass'];
$_SESSION['user']=$user;


function Conectarse()
{
  $link = mysqli_connect("localhost", "root", "", "testeando");
	return $link;
}
$link = Conectarse();



$consulta="SELECT * FROM users WHERE name='$user' and  pass='$pass'";
$cons="SELECT id FROM users WHERE name='$user' and  pass='$pass'";

$resultado=mysqli_query($link,$consulta);


$filas=mysqli_num_rows($resultado);

$result = mysqli_query($link, $cons);

    while($row = mysqli_fetch_assoc($result)) 
	{
        $_SESSION['id'] = $row['id'];
    }




if($filas>0){
	
	// echo "<script>window.location='panel.php'</script>";
	header("Location:new.php");
	
	
}
else{
	// echo "Error en los datos ingresados";
	echo "<script>alert('El Usuario NO se encuentra registrado')</script>";
	echo "<script>window.location='index.html'</script>";
}



mysqli_free_result($resultado);
mysqli_free_result($result);
	
	mysqli_close($link);




?>