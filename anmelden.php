<?php
	session_start();
	
	$login = $_POST['login'];
	$password = $_POST['pass'];
	
	//$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	//$password = htmlentities($password, ENT_QUOTES, "UTF-8");
	$submit = $_POST['submit'];
	
	if ((isset($submit)) && (!$login == null) && (!$password == null))  {
		header('Location: test.php');
		exit();
	} else {
		$_SESSION['falsch'] = "Bitte vervollständigen Sie die Daten!";
		header('Location: index.php');
		exit();
	}

	
	
	
	
	
	
?>