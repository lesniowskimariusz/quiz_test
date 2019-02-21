<?php
	session_start();
	// verbinden mit Datenbank
	require_once 'header.php';
	
	// pobranie numru pytania - lub zainicjowanie numeru 1
	if (!isset($_SESSION['akt_num_frage'])) {
		$frage_num = 1;
		$_SESSION['akt_num_frage'] = $frage_num;
	} else {
		$frage_num = $_SESSION['akt_num_frage'];
	}
	
	
	// pobranie zestawu danych dla wybranego numeru pytania
	$query_1 = "SELECT * FROM frage WHERE nummer =" .$frage_num;
	$result = @$verbinden->query($query_1);
	
	// utworzenie tablicy i pzypisanie danych do zmiennych
	while ($row = mysqli_fetch_array($result)) {
	
		$text = $row['text'];
		$bild_link = $row['bild_link'];
		$ant_1 = $row['ant_1'];
		$ant_2 = $row['ant_2'];
		$ant_3 = $row['ant_3'];
		$ant_4 = $row['ant_4'];
		$richtig = $row['richt'];
		$gut_ant = $row[$richtig];		
		
	}
	// wyczyszczenie zapytania i zamkniecie polaczenia
	$result->free();
	$verbinden->close();
		
?>
<article>
	<header>
		<div id="frag" class="fragen">
		<p><?php
	// jesli jest pytanie tekstowe to wyswietla tekst pytania
		if(isset($text)){
			echo '<h2>'.$text.'</h2>';
		}
		?></p>
		</div>

		<div class="bild">
		<?php
	// jesli jest pytanie z obrazem wyswietla obraz
		if($bild_link != null){
			echo '<p class="bild">'.'<img src="'.$bild_link.'" alt="Bild von Frage">'.'<br />'.'</p>';
		}
		?>
		</div>
	</header>
	<div class="antworte">
		<p id="ant_1" class="ant" onclick="control1_<?php if($ant_1 == $gut_ant) {echo "gut";} else {echo"falsch";}?>()"><?php if(isset($ant_1)){echo $ant_1;} ?></p>
		<p id="ant_2" class="ant" onclick="control2_<?php if($ant_2 == $gut_ant) {echo "gut";} else {echo"falsch";}?>()"><?php if(isset($ant_2)){echo $ant_2;} ?></p>
		<p id="ant_3" class="ant" onclick="control3_<?php if($ant_3 == $gut_ant) {echo "gut";} else {echo"falsch";}?>()"><?php if(isset($ant_3)){echo $ant_3;} ?></p>
		<p id="ant_4" class="ant" onclick="control4_<?php if($ant_4 == $gut_ant) {echo "gut";} else {echo"falsch";}?>()"><?php if(isset($ant_4)){echo $ant_4;} ?></p>
	</div>
</article>
<hr>
<nav>
	<div class="navigation">
		<div class="zuruck">
			<form action="zuruck.php" method="post">
				<input type="submit" value="Zurück">
			</form>
		</div>
		<div class="akt_num_frage">
			Frage Nummer: <?php echo $_SESSION['akt_num_frage'];?>
		</div>
		<div class="weiter">
			<form action="weiter.php" method="post">
			<input type="submit" value="Weiter">
			</form>
		</div>
	</div>
	<div class="wachlen">
			<form action="wachlen.php" method="post">
			<output class="achtung"><?php
				if(isset($_SESSION['no_num'])) {
					echo $_SESSION['no_num'];
					unset($_SESSION['no_num']);
				}
			?></output>
			Zur Frage Nr.: 
			<input type="text" name="wachlen_frage">
			<input type="submit" value="Geh">
			</form>
	</div>
		<div class="clear"></div>
</nav>	
	<script type="text/javascript" src="js/script.js"></script>
<?php	
	include_once 'footer.php';
?>
