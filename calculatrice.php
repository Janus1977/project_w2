<?php
	if (!empty($_POST)) {
		echo '<pre>'.print_r($_POST,true).'</pre>';
		$affichage = $_POST['affichage'];
		if ($affichage == '0' && $_POST['data'] != '=') {
			$affichage = $_POST['data'];
		} else {
			if ($_POST['data'] == '=') {
				/* realiser l'operation */
				/* afficher le resultat */
				/* vider les parametres */
				unset($_POST['data']);
			} else {
				$affichage .= $_POST['data'];
			}			
		}
		if ($_POST['data'] == 'C') {
			/* clear */
			$affichage = 0;
		}
	}
	
?>
<form id="myForm" action="#" method="post">
	<table>
		<caption>
			<input type="text" readonly="true" value="<?php echo (empty($affichage)) ? '0' :$affichage; ?>">
			<input type="hidden" name="affichage" value="<?php echo (empty($affichage)) ? '0' :$affichage; ?>">
		</caption>
		<tr>
			<td>
				<input type="submit" name="data" value="1" >
			</td>
			<td><input type="submit" name="data" value="2">
			</td>
			<td><input type="submit" name="data" value="3">
			</td>
			<td><input type="submit" name="data" value="x">
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="data" value="4">
			</td>
			<td><input type="submit" name="data" value="5">
			</td>
			<td><input type="submit" name="data" value="6">
			</td>
			<td><input type="submit" name="data" value="+">
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="data" value="7">
			</td>
			<td><input type="submit" name="data" value="8">
			</td>
			<td><input type="submit" name="data" value="9">
			</td>
			<td><input type="submit" name="data" value="-">
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="data" value="0">
			</td>
			<td><input type="submit" name="data" value="C">
			</td>
			<td><input type="submit" name="data" value="=">
			</td>
			<td><input type="submit" name="data" value="/">
			</td>
		</tr>
	</table>
</form>
