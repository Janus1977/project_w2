{*
	Template Smarty d'affichage d'une image
*}
	{if (isset($IMG))}
	{*	
		{if ($MODIFIE)}
			<div id="grille" style="position:absolute; width:{$WIDTH}px; height:{$HEIGHT}px; border:1px solid red; z-index:0;">
			</div>
		{/if}
	*}
		<div id="image" style="position:relative; top:0px; left:0px; width:{$WIDTH}px; height:{$HEIGHT}px; border:1px solid blue; z-index:1;">
			<img id="imgactuelle" src="{$IMG}?{$random}" alt="image" style="max-width:{$WIDTH}px; max-height:{$HEIGHT}px;"/>
		</div>
		{if (!isset($jeu) || !$jeu)}
			<br/>
			Dimensions image: {$CASE_WIDTH}x{$CASE_HEIGHT} cases
			<br/>
			Chemin image: {$IMG}
		{/if}
	{else}
		{if (pasDeMiniature)}
			Pas de Miniature pour '{$nomImage}'
			<br/>
			<input type="button" onclick="creerMiniature('{$cheminVersImage}')" value="Cr&eacute;er une miniature">
		{else}
			{* ne devrait jamais arriver...puisque je charge les image du repertoire. *}
			Pas d'image <a href="">Charger une image</a>
		{/if}
	{/if}