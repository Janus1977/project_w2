{*
	Template Smarty pour le generateur
*}

<form action="#" method="post">
	<table>
		<tr>
			<td colspan="2">
				<input type="submit" value="GO">
			</td>
			<td><input id="choix" name="choix" type="radio" value="testUnitaires"></td>
			<td>TESTS UNITAIRES</td>
			<td><input id="choix" name="choix" type="radio" value="testAvances"></td>
			<td>TESTS AVANC&Eacute;S</td>
			<td><input id="choix" name="choix" type="radio" value="compilation"></td>
			<td>COMPILATION&nbsp;
				<select id="table" name="table" size="1">
					<option value="">Tables...</option>
					<?php
						foreach ($_SESSION['tables'] AS $table) {
							echo '<option value="'.$table.'">'.$table.'</option>';
						}
					?>
				</select>
				<br/>recr&eacute;ation des classes
				<br/><input type="checkbox" id="creeFichierSQL" name="creeFichierSQL"/>Cr&eacute;&eacute; fichier SQL
				<br/><input type="checkbox" id="compilationObjets" name="compilationObjets" checked="checked">OBJETS
				&nbsp;&nbsp;<input type="checkbox" id="compilationFabriques" name="compilationFabriques" checked="checked">FABRIQUES
				&nbsp;&nbsp;<input type="checkbox" id="compilationManagers" name="compilationManagers" checked="checked">MANAGERS
				&nbsp;&nbsp;<input type="checkbox" id="compilationTemplates" name="compilationTemplates" checked="checked">TEMPLATES
			</td>
		</tr>
	</table>
</form>
<hr>