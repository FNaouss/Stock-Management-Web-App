<?php
	$username='root';
	$password='';

	try{
		$bdd=new PDO("mysql:host=localhost;dbname=virgin",$username,$password);
	}catch(PDOException $e){
		echo $e->POSTMessage();
	}
	
?>