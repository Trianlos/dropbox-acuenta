<?php

function Conectarse()
{
  $link = mysqli_connect("localhost", "root", "", "testeando");
	return $link;
}

$link = Conectarse();
$user="";
$user=$_POST['user'];
$pass1="";
$pass1=$_POST['pass1'];
$pass2="";
$pass2=$_POST['pass2'];
// echo "Hola ".$user;

$consulta="SELECT * FROM users WHERE name='$user'";
$resultado=mysqli_query($link,$consulta);
$filas=mysqli_num_rows($resultado);
if($filas>0){
	
	echo "<script>alert('El Usuario ya se encuentra registrado')</script>";
	echo "<script>window.location='new_user.html'</script>";
	
		
}
else{
	
	if($pass1 == $pass2)
{
	mysqli_query($link, "insert into users (name,pass) values ('$user','$pass1')");
	echo "<script>alert('El usuario se ha creado.')</script>";
	echo "<script>window.location='index.html'</script>";
}
else
{
	echo "<script>alert('Las contraseñas no coinciden.')</script>";
	echo "<script>window.location='new_user.html'</script>";
}
	
}
mysqli_free_result($resultado);
mysqli_close($link);
?>