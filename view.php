<?php
	$dbh = new PDO("mysql:host=localhost;dbname=testeando", "root", "");
	$id = isset($_GET['id'])? $_GET['id'] : "";
	$stat = $dbh->prepare("select * from files where id=?");
		$stat->bindParam(1,$id);
		$stat->execute();
		$row = $stat->fetch();
		header('Content-type:'.$row['type']);
		header('Content-Disposition: attachment; filename='.$row['name']);
		echo $row['data'];
		
	?>