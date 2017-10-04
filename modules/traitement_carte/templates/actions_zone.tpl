{*
	Template d'affichage d'une action sur une zone de la carte.
*}
<fieldset>
<legend>Bloquer une zone</legend>
	<table>
		<tr>
			<td align="left">Centre de la zone d'effet:</td>
			<td align="right">
				<table>
					<tr>
						<td align="left">X:</td>
						<td align="right"><input type="text" id="xCentre" name="xCentre" size="4" maxsize="3" value="0"/></td>
					</tr>
					<tr>
						<td align="left">Y:</td>
						<td align="left"><input type="text" id="yCentre" name="yCentre" size="4" maxsize="3" value="0"/></td>
					</tr>
				</table>				
			</td>
		</tr>
		<tr>
			<td align="left">Rayon de la zone d'effet:</td>
			<td align="right">
				<select id="rayonAction" name="rayonAction">
					<option value="">Choisissez...</option>
					<option value="1">1 case</option>
					<option value="2">2 cases</option>
					<option value="3">3 cases</option>
					<option value="4">4 cases</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="left">Action affect&eacute;e &agrave; la zone d'effet:</td>
			<td align="right">
				<select id="actionSurZone" name="actionSurZone">
					<option value="">Choisissez...</option>
					<option value="bloque">Bloquer la zone</option>
					<option value="debloque">D&eacute;bloquer la zone</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="4" align="right">
				<input type="button" id="valideActionZone" value="Valide action" onclick="actionZone({$idCarte});"/>
			</td>
		</tr>
	</table>
</fieldset>