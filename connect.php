<?php
	$host = 'host';
	$db_user = 'user';
	$db_password = 'password';
	$db_name = 'name';
	
	$verbinden = @new mysqli($host, $db_user, $db_password, $db_name);
	$verbinden->set_charset("utf8");
	if( mysqli_connect_errno()) {
		echo '<span style="color: red">Falsche Verbinden mit Datenbank</span>';
	}
?>