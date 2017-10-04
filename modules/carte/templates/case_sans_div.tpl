{*
	Template Smarty d'une case de carte
	$case == l'objet case passe pour affichage
*}

	{if ($EDITION_CARTE == true)}
		{* DEBUT LIEN *}
		<a 	onmouseover="BulleWrite('<div style=\'border:1px solid black; background-color:white;\'>{$case->donneInfoCase()}</div>',15,15);{$actionJavascriptSupplementaire}"
			href="javascript:montreOptionsCase({$case->getId()})">
			&nbsp;
			<font style="font-weight: bold;font-size:10px;text-align:center;color: white;">{$case->getX()}/{$case->getY()}</font>
			<img src="{$URL_IMGS}spacer_{$TAILLE_CASE_X}_{$TAILLE_CASE_Y}.gif" style="width: {$TAILLE_CASE_X}px; height: {$TAILLE_CASE_Y}px;" alt="test spacer"/>
		</a>
		{* FIN LIEN *}
	{else}
		{* hors edition, il faudra gerer les differentes options (depl,att,charge...) *}
	{/if}
