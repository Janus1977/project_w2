{*
	Template Smarty pour la mini_carte
*}
{if ($accesDirect === true)}
	{* Acces via l'URL *}
	{foreach from=$aListeMiniCartesSmarty item=miniCarte}
		<br/><img src="{$urlMiniCartesSmarty}{$miniCarte.nom}" style="border: 1px solid red;" alt="{$miniCarte.nom} {$miniCarte.dimension}" title="{$miniCarte.nom} {$miniCarte.dimension}"/>
	{/foreach}
{else}
	{* Acces via un outil *}
	{if (isset($dataMiniCarte) && $dataMiniCarte) }
		<div id="mini_carte" style="top:0px;
									left:0px;
									overflow: auto;
									width: {$largeurCarte}px;
									height: {$hauteurCarte}px;
									z-index: -1; 
									border: 1px solid green;
									background:url('{$cheminImageMiniCarte}?{$random}') 0 0 no-repeat;">
			{if (isset($dataPosition) && $dataPosition)}
				<div id="testPosition" style="	position: relative;
												top: {$positionTop}px;
												left: {$positionLeft}px;
												width: 4px;
												height: 4px;
												z-index: 1;
												background:url('{$cheminPointRouge}?{$random}') 0 0 no-repeat;">
				</div>
			{/if}
		</div>
		<div id="partie_affichee">
		</div>
	{else}
		Aucune mini carte cr&eacute;&eacute;e
		<br/>	
		<input type="button" onclick="" value="Cr&eacute;er la mini carte correspondante."/>
	{/if}
{/if}