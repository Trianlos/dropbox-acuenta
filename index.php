    <!DOCTYPE html>
<HTML> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Foro</title>

<style>

<!-- body {background-color:navy;} -->


img{
display:block;
margin-left:auto;
margin-right:aut;
<!--margin:auto;   esto es lo mismo que las sentencias anteriores-->
}

h1 {text-align: center; 
	color:white;}

h2 {text-align: center;
	color:white;}
	
a {color:white;}




</style>




</head>

<body style="background-image:url('foro.jpg')">

<header>
	<nav>
		<a href="index.html" style="margin-right:4px">Inicio</a>
		<a href="new_user.html" style="margin-right:4px">Crear Usuario</a>
	</nav>
</header>

<!-- <img src="images/foro.jpg" alt="Logo del laboratorio"> -->



<h1> Foro Informática </h1>
<!--Este es un título del tamaño mas grande-->




<h2>Testeando</h2>
<!--Titulo de tamaño h2-->

<!-- <INPUT TYPE='TEXT'> -->
<!-- <INPUT type='submit' name="entrar" id="entrar"> -->
<!-- <form action="/action_page.php" method="post"> -->
<!-- User:     <input type="text" name="fname"><br> -->
<!-- Password: <input type="text" name="lname"><br> -->
<!-- <button type="submit" value="Submit">Aceptar</button> -->
<!-- <button type="reset" value="Reset">Reset</button> -->
<!-- </form> -->
<!-- action="validar.php" method="post" -->
<!-- <form >      -->

<!-- bgcolor="white" -->
	<!-- <table border="0" align="center" >   -->
		<!-- <tr> -->
			<!-- <td  style="color:white;">User:</td> -->
			<!-- <td> -->
				<!-- <input type="text" name="user"><br> -->
			<!-- </td> -->
		<!-- </tr> -->
		
		<!-- <tr> -->
			<!-- <td  style="color:white;">Password:</td> -->
			<!-- <td> -->
				<!-- <input type="password" name="pass"><br> -->
			<!-- </td> -->
		<!-- </tr> -->
		
		<!-- <tr> -->
			<!-- <td> -->
				<!-- <button type="submit" value="Submit">Aceptar</button> -->
			<!-- </td> -->
			<!-- <td align="center"> -->
				<!-- <button onclick="val(document.getElementById('user').value, document.getElementById('pass').value);">Aceptar</button> -->
				<!-- <button type="submit" value="Submit">Aceptar</button> -->
				<!-- <button type="reset" value="Reset">Reset</button>				 -->
			<!-- </td> -->
		<!-- </tr> -->
	<!-- </table> -->
<!-- <script> -->
 
        <!-- function val(user, pass) -->
        <!-- { -->
            <!-- $.ajax({ -->
                <!-- url: "val.php", -->
                <!-- type: "POST", -->
                <!-- data: "user="+user+"&pass="+pass, -->
                <!-- success: function(resp){ -->
                <!-- $('#resultado').html(resp) -->
                <!-- }        -->
            <!-- }); -->
        <!-- } -->
<!-- </script> -->

<!-- </form> -->

<div >
        <div id="formulario"    >
            <form method="POST" action="return false" onsubmit="return false">
                <div id="resultado"></div>
                
                <p><input type="text" name="user" id="user" value="" placeholder="Usuario"></p>
                <p><input type="password" name="pass" id="pass" value="" placeholder="Password"></p>
                <p><button onclick="Validar(document.getElementById('user').value, document.getElementById('pass').value);">Accesar</button></p>
            </form>
            <script>
     
            function Validar(user, pass)
            {
                $.ajax({
                    url: "val.php",
                    type: "POST",
                    data: "user="+user+"&pass="+pass,
                    success: function(resp){
                    $('#resultado').html(resp)
                    }       
                });
            }
            </script>
        </div>
    </div>




</body>
</HTML>