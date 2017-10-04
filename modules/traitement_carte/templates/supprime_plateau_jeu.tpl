{*
	Template Smarty pour la liste des plateaux de jeux affecte a la carte en edition.
*}
	{if (sizeof($listePlateauxCarte) > 0)}
		Supprimer des plateaux de jeu:&nbsp;
		<select id="supprimePlateauCarte" onchange="supprimerImageCarte();">
			<option value="" selected>Choisir un plateau &agrave; supprimer</option>
			{foreach from=$listePlateauxCarte item=plateau}
				<option value="{$plateau->getId()}">{$plateau->getPlateau()->getNom()}</option>
			{/foreach}
		</select>
	{/if}