{*
	Template Smarty listant les unites du jeu
*}
	{if (!empty($listeUnitesJoueurs) && sizeof($listeUnitesJoueurs) > 0)}
		<select id="listeUnitesJoueur" name="listeUnitesJoueur">
			<option value="-1" selected>Choisissez une Unit&eacute; de joueur &agrave; traiter</option>
			<option value="0">Ajoutez une Unit&eacute; de joueur</option>
			{assign var="memoJoueur" value=""}
			{foreach $listeUnitesJoueurs AS $unitesJoueur}
				{if (strlen(trim($memoJoueur)) == 0)}
					<optgroup label="{$unitesJoueur->getMembreObject()->getPseudo()}">
					{assign var="memoJoueur" value=$unitesJoueur->getMembreObject()->getPseudo()}
				{else}
					{if ($memoJoueur != $unitesJoueur->getMembreObject()->getPseudo())}
						</optgroup>
						<optgroup label="{$unitesJoueur->getMembreObject()->getPseudo()}">
						{assign var="memoJoueur" value=$unitesJoueur->getMembreObject()->getPseudo()}
					{/if}
				{/if}
				<option value="{$unitesJoueur->getId()}">{$unitesJoueur->getNom()}</option>
			{/foreach}
		</select>
	{else}
		Aucune unit&eacute; de joueur en base.
	{/if}