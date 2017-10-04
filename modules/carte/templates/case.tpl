{*
	Template Smarty d'une case de carte
	$case == l'objet case passe pour affichage
	code couleur du contour d'une case (mode EDITION)
		ROUGE	=>	juste inseree (VIDE)
		JAUNE	=>	un plateau affecte (PLATEAU)
		BLEU	=>	un plateau affecte et un decor affecte (DECOR)
		VERT	=>	un plateau affecte et une unite sur la case sans decor (UNITE)
		ORANGE	=>	un plateau affecte et une unite sur la case avec decor (DECOR_UNITE)
		
	code couleur du remplissage d'une case (mode EDITION)
		ROUGE	=>	bloquee
		VERT	=>	lien entre case
*}
	{if (!isset($majCase))}
	<div 
		id="case_{$case->getX()}_{$case->getY()}"
		style="position: absolute;
		top: {$TAILLE_CASE_Y * ($case->getY() - $yDebut)}px;
		left: {$TAILLE_CASE_X * ($case->getX() - $xDebut)}px;
		
		{* Les bordures *}
		{if ($EDITION_CARTE === true)}		
			{if ($case->getEtatCase() == $VIDE)}
				border: 1px solid red;
			{else if ($case->getEtatCase() == $PLATEAU)}
				border: 1px solid yellow;
			{else if ($case->getEtatCase() == $DECOR)}
				border: 1px solid blue;
			{else if ($case->getEtatCase() == $UNITE)}
				border: 1px solid green;
			{else if ($case->getEtatCase() == $DECOR_UNITE)}
				border: 1px solid orange;
			{/if}
		{/if}
		
		{* Les remplissages *}
		{if ($EDITION_CARTE === true)}
			{if ({$case->getBloque()})}
				background-color: #FF0000;
			{else}
				{if ($case->getEtatCase() == $LIEN)}
					background-color: green;
				{else}
					background-color: transparent;
				{/if}
			{/if}
		{else}
			{* hors edition, il faudra gerer les differentes options (depl,att,charge...) *}
		{/if}
		
		{* Gestion de la transparence *}
		{if ($EDITION_CARTE === true)}
			opacity:0.50;
			{* 
				-moz-opacity:0.25;
				-khtml-opacity:0.25;
				filter:alpha(opacity=25);
			*}
		{/if}
		
		width:   {$TAILLE_CASE_X}px;
		height:  {$TAILLE_CASE_Y}px;
		text-align:center;
		vertical-align: middle;
		z-index: 1">
	{/if}
	{if ($EDITION_CARTE === true)}
		{* DEBUT LIEN *}
		<a 	onmouseover="BulleWrite('<div style=\'border:1px solid black; background-color:white;\'>{$case->donneInfoCase($EDITION_CARTE)}</div>',15,15);{$actionJavascriptSupplementaire}"
			href="javascript:montreOptionsCase({$case->getId()})">
				
			{* DECOR *}
			{if ($case->getDecor() > 0)}
				{* Affichage du decor *}
				{assign var="top" value=0}
				{assign var="left" value=0}
				{assign var="width" value=$TAILLE_CASE_X}
				{assign var="height" value=$TAILLE_CASE_Y}
				{include file="{$TEMPLATE_DECORS}"}
			{else}
				<font style="font-weight: bold;font-size:10px;text-align:center;color: white;">{$case->getX()}/{$case->getY()}</font>
				<img src="{$URL_IMGS}spacer_{$TAILLE_CASE_X}_{$TAILLE_CASE_Y}.gif" style="width: {$TAILLE_CASE_X}px; height: {$TAILLE_CASE_Y}px;" alt="test spacer"/>
			{/if}
				
			{* UNITE / UNITE_JOUEUR*}
			{if ($case->getUnite() > 0 || $case->getUnite_joueur() > 0)}
				{* Affichage de l'unite *}
				{assign var="top" value=0}
				{assign var="left" value=0}
				{assign var="width" value=$TAILLE_CASE_X}
				{assign var="height" value=$TAILLE_CASE_Y}
				{include file=$TEMPLATES_UNITE}
			{/if}
		</a>
				{* FIN LIEN *}
	{else}
		{* hors edition, il faudra gerer les differentes options (depl,att,charge...) *}
		<a 	onmouseover="BulleWrite('<div style=\'border:1px solid black; background-color:white;\'>{$case->donneInfoCase($EDITION_CARTE)}</div>',15,15);"
			href="javascript:montreOptionsCase({$case->getId()})">
			<img src="{$URL_IMGS}spacer_{$TAILLE_CASE_X}_{$TAILLE_CASE_Y}.gif" style="width: {$TAILLE_CASE_X}px; height: {$TAILLE_CASE_Y}px;" alt="test spacer"/>
		</a>
	{/if}
	
	{* FIN DIV CASE *}
	{if (!isset($majCase))}
	</div>
	{/if}
