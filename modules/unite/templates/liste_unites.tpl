{*
	Template Smarty listant les unites du jeu
*}
	{if (!empty($listeUnites) && sizeof($listeUnites) > 0)}
		<select id="listeUnites" name="listeUnites" style="display:inline;">
			<option value="-1" selected>Choisissez une Unit&eacute; &agrave; traiter</option>
			<option value="0">Ajoutez une Unit&eacute;</option>
			{foreach from=$listeUnites item=unite}
				<option value="{$unite->getId()}">{$unite->getNom()}</option>
			{/foreach}
		</select>
	{else}
		Aucune unit&eacute; en base.
	{/if}