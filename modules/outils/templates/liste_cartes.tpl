{*
	Template Smarty listant les cartes du jeu
*}
	{if (!empty($listeCartes) && sizeof($listeCartes) > 0)}
		<select id="nomCarte" name="nomCarte"
				onchange="afficheListeCasesCarte(parseInt(this[this.selectedIndex].value))">
			<option value="-1" selected>Choisissez dans la liste</option>
			{foreach from=$listeCartes item=carte}
			    <option value="{utf8_encode($carte->getId())}">{utf8_encode($carte->getNom())}({$carte->getNb_cases_x()}x{$carte->getNb_cases_y()})</option>
			{/foreach}
		</select>
	{/if}