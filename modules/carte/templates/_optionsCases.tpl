{*
	Template Smarty pour les options d'une case dont un pleatau a ete afecte
*}
<fieldset>
	<legend>Les options disponbles pour la case <i>ID{$case->getID()}</i></legend>
	<table width="500px" border="1">
		{* Si la case est vide on peut seulement lui mettre un plateau de jeu *}
		{if ($case->getEtatCase() == 0)}
			<tr>
				<td align="left">
					<input type="radio" id="typeActif" name="typeActif" value="sol" onclick="activeTypeImage('sol')"/>&nbsp;&nbsp;Sol
				</td>
				<td align="right">
					<select id="image_sol" name="image_sol" style="display:inline;" disabled="disabled"
							onchange="afficheImage(this[this.selectedIndex].value,'sol');">
						<option value="" selected>Choisir une image pour le sol</option>
						{foreach from=$listeSol item=image}
						    <option value="{utf8_encode($image.nom)}">{utf8_encode($image.nom)}</option>
						{/foreach}
					</select>
				</td>
			</tr>
			<tr>
				<td align="right" colspan="2">
					<input type="button" onclick="ajouteImageCarte({$case->getID()})" value="Ajouter l'image &agrave; la carte"/>
				</td>
			</tr>
		{else}
			{* Sinon on peut lui ajouter un decor, la bloquer...etc*}
			<tr>
				<td align="left">
					<input type="radio" id="typeActif" name="typeActif" value="decor" onclick="activeTypeImage('decor')"/>&nbsp;&nbsp;D&eacute;cor
				</td>
				<td align="right">
					<select id="image_decor" name="image_decor" style="display:inline;" disabled="disabled"
							onchange="afficheImage(this[this.selectedIndex].value,'decor');">
						<option value="" selected>Choisir un d&eacute;cor pour la case</option>
						{foreach from=$listeDecor item=image}
						    <option value="{utf8_encode($image.nom)}">{utf8_encode($image.nom)}</option>
						{/foreach}
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<table width="500px" border="1">
						<tr>
							<td>
								{if ($case->estBloquee())}
									{* identifiant div: "case_x_y" *}
									<input 	type="button" value="D&eacute;bloquer la case" 
											onclick="debloqueCase({$case->getID()},'case_{$case->getX()}_{$case->getY()}')"/>
								{else}
									<input 	type="button" value="Bloquer la case" 
											onclick="bloqueCase({$case->getID()},'case_{$case->getX()}_{$case->getY()}')"/>
								{/if}
							</td>
						</tr>
					</table>
				</td>
			</tr>
		{/if}
	</table>
</fieldset>