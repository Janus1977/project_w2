{*
	Template Smarty pour le module 'OUTILS'
*}
<table>
	<tr style="outline: thin solid blue;">
		<td valign="top">
			<table>
				<caption><b>Cr&eacute;er une nouvelle unit&eacute;</b></caption>
				<tr>
					<td>A VOIR</td>
				</tr>
			</table>
		</td>
		<td valign="top">
			<table>
				<caption><b>Cr&eacute;er une nouvelle unit&eacute; pour un joueur</b></caption>
				<tr>
					<td>A VOIR</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr style="outline: thin solid blue;">
		<td valign="top">
			<table>
				<caption><b>Placer une unit&eacute; sur une case</b></caption>
				<tr>
					<td>Unit&eacute;:</td>
					<td>
						{if (!empty($listeUnites) && sizeof($listeUnites) > 0)}
							<select id="nomUnitePlacer" name="nomUnitePlacer">
								<option value="-1" selected>Choisissez dans la liste</option>
								{foreach from=$listeUnites item=unite}
								    <option value="{utf8_encode($unite->getId())}">{utf8_encode($unite->getNom())}</option>
								{/foreach}
							</select>
						{/if}
					</td>
				</tr>
				<tr>
					<td>Carte:</td><td>{include file="{$TPL_OUTILS}liste_cartes.tpl"}</td>
				</tr>
				<tr>
					<td>Case:</td><td><div id="liste_cases_carte">&nbsp;</div></td>
				</tr>
				<tr>
					<td><input type="checkbox" name="validPutUnitOnMap" id="validPutUnitOnMap"/> Cocher pour valider</td>
					<td align="right">
					<input 	type="button" 
							name="putUnitOnMap" 
							id="putUnitOnMap" 
							value="Placer l'unit&eacute;" 
							onclick="placeUniteSurCase()"/>
					</td>
				</tr>
			</table>
		</td>
		<td valign="top">
			<table>
				<caption><b>Retirer une unit&eacute; sur une case</b></caption>
				<tr>
					<td>Unit&eacute;:</td>
					<td align="center">
						{if (!empty($listeUnitesSurCase) && sizeof($listeUnitesSurCase) > 0)}
							<select id="nomUniteSupp" name="nomUniteSupp"
									onchange="alert(parseInt(this[this.selectedIndex].value))">
								<option value="-1" selected>Choisissez dans la liste</option>
								{foreach from=$listeUnitesSurCase item=unite}
								    <option value="{utf8_encode($unite->getId())}">{utf8_encode($unite->getNom())}</option>
								{/foreach}
							</select>
						{else}
							Aucune unit&eacute; disponible
						{/if}
					</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="validHoldUnitFromMap" id="validHoldUnitFromMap"/> Cocher pour valider</td>
					<td align="right">
						<input 	type="button" 
							name="holdtUnitFromMap" 
							id="holdtUnitFromMap" 
							value="Retirer l'unit&eacute;"
							onclick="retireUniteSurCase()"/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr style="outline: thin solid blue;">
		<td valign="top">
			<table>
				<caption><b>Ajouter un &eacute;quipement sur une case</b></caption>
				<tr>
					<td>&Eacute;quipement:</td>
					<td align="center">
						{if (!empty($listeEquipements) && sizeof($listeEquipements) > 0)}
							<select id="nomEquipementPlacer" name="nomEquipementPlacer"
									onchange="alert(parseInt(this[this.selectedIndex].value))">
								<option value="-1" selected>Choisissez dans la liste</option>
								{foreach from=$listeEquipements item=equipement}
								    <option value="{utf8_encode($equipement->getId())}">{utf8_encode($equipement->getNom())}</option>
								{/foreach}
							</select>
						{else}
							Aucun &eacute;quipement disponible
						{/if}
					</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="validPutEquipmentOnMap" id="validPutEquipmentOnMap"/> Cocher pour valider</td>
					<td align="right"><input type="button" name="holdtUnitFromMap" id="holdtUnitFromMap" value="Ajouter l'&eacute;quipement"/></td>
				</tr>
			</table>
		</td>
		<td valign="top">
			<table>
				<caption><b>Retirer un &eacute;quipement d'une case</b></caption>
				<tr>
					<td>&Eacute;quipement:</td>
					<td align="center">
						{if (!empty($listeEquipementsSurCase) && sizeof($listeEquipementsSurCase) > 0)}
							<select id="nomEquipementSupp" name="nomEquipementSupp"
									onchange="alert(parseInt(this[this.selectedIndex].value))">
								<option value="-1" selected>Choisissez dans la liste</option>
								{foreach from=$listeEquipementsSurCase item=equipement}
								    <option value="{utf8_encode($equipement->getId())}">{utf8_encode($equipement->getNom())}</option>
								{/foreach}
							</select>
						{else}
							Aucun &eacute;quipement disponible
						{/if}
					</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="validHoldEquipmentFromMap" id="validHoldEquipmentFromMap"/> Cocher pour valider</td>
					<td align="right"><input type="button" name="holdtUnitFromMap" id="holdtUnitFromMap" value="Retirer l'&eacute;quipement"/></td>
				</tr>
			</table>
		</td>
	</tr>

</table>