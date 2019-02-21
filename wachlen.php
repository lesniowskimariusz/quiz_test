<?php
	session_start();

	if((isset($_POST['wachlen_frage'])) && (is_numeric($_POST['wachlen_frage'])) && ($_POST['wachlen_frage'] <= 310) && ($_POST['wachlen_frage'] > 0)){
		$wachlen_frage = $_POST['wachlen_frage'];
		
		settype($wachlen_frage, 'integer');
				
		$_SESSION['akt_num_frage'] = $wachlen_frage;
		header('Location: index.php#frag');
	} else {
		$_SESSION['no_num'] = '<span style="color: red">Schreib nur Nummer (1 bis 310)! </span>';
		header('Location: index.php');
	}
?>