{*
	Template Smarty listant les cartes de jeu en edition
*}
	{if (sizeof($listeCartesEnEdition) > 0)}
		<span style="text-align:left; ">Pour une carte sauv&eacute;e => </span>
		<select id="nomCarteEnregistree" name="nomCarteEnregistree"
				onchange="afficheCarte(parseInt(this[this.selectedIndex].value),'',0,0)">
			<option selected>Choisissez dans la liste</option>
			{foreach from=$listeCartesEnEdition item=carte}
			    <option value="{utf8_encode($carte->getId())}">{utf8_encode($carte->getNom())}({$carte->getNb_cases_x()}x{$carte->getNb_cases_y()})</option>
			{/foreach}
		</select>
	{/if}