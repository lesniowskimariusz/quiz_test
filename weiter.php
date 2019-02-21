<?php
	session_start();
	
	if ((isset($_SESSION['akt_num_frage'])) && ($_SESSION['akt_num_frage'] < 310)) {
		$akt_num_frage = $_SESSION['akt_num_frage'];
		$akt_num_frage += 1;
		$_SESSION['akt_num_frage'] = $akt_num_frage;
		header('Location: index.php#frag');
	} else {
		header('Location: index.php#frag');
	}
?>