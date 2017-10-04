{*
	TEMPLATE SMARTY POUR LE MODULE UNITE
*}
{if (	isset($smarty.session.staffSession) &&
		$smarty.session.staffSession == 1 &&
		isset($listeUnites) &&
		isset($listeUnitesJoueurs))}
	{* que veut-on faire ? *}
	{* Administration *}
	<div id="info_unite" name="info_unite"></div>
	<table>
		<tr>
			<td align="center">
		    	<input type="button" id="afficheUnite" onclick="afficheUnite();" value="Charger l'unit&eacute;"/>&nbsp;&nbsp;&nbsp;
		    	<input type="button" id="supprimeUnite" onclick="supprimeUnite();" value="Supprimer l'unit&eacute;"/>&nbsp;&nbsp;&nbsp;
		    	<input type="button" id="modifieUnite" onclick="modifieUnite();" value="Modifier l'unit&eacute;"/>&nbsp;&nbsp;&nbsp;
		    	<input type="button" id="ajouteUnite" onclick="ajouteUnite('unite');" value="Ajouter une unit&eacute;"/>&nbsp;&nbsp;&nbsp;
				<input type="button" id="cloneUnite" onclick="cloneUnite();" value="Cl&ocirc;ner l'unit&eacute;"/><br>
			</td>
		</tr>
		<tr>
			<td align="center">
				<div id="afficheListeUnites" name="afficheListeUnites" style="display:inline;">
					{include file="{$TEMPLATES_UNITE}liste_unites.tpl"}
				</div>
				&nbsp;&nbsp;&nbsp;
				<div id="afficheListeUnitesJoueur" name="afficheListeUnitesJoueur" style="display:inline;">
					{include file="{$TEMPLATES_UNITE}liste_unites_joueur.tpl"}
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div name="affichage" id="affichage"></div>
			</td>
		</tr>
	</table>
{else}
	{* Affichage dans la carte *}
	{* Partie pour les UNITE *}
	{if ($case->getUnite() > 0)}
        <div
    		id="unite_{$case->getId()}_{$case->getUniteObject()->getId()}"
		    style="position: absolute;
		    top: {$top}px;
		    left: {$left}px;
		    background-image: url({$URL_IMGS_UNITE}{$case->getUniteObject()->getChemin()});
		    background-repeat:no-repeat;
    		z-index: 3;
		    width:   {$width}px;
		    height:  {$height}px;
		    opacity: 1;"
	    >
	    {if ($EDITION_CARTE === false)}
    		<!-- <a 	onmouseover="BulleWrite('<div style=\'border:1px solid black; background-color:white;\'>{$case->donneInfoCase($EDITION_CARTE)}</div>',15,15);"
		    href="javascript:montreOptionsCase({$case->getId()})"> -->
		    <!-- Changement optionCase => actionUnite -->
		    <a 	onmouseover="BulleWrite('<div style=\'border:1px solid black; background-color:white;\'>{$case->donneInfoCase($EDITION_CARTE)}</div>',15,15);"
		    href="javascript:montreActionUnite({$case->getUniteObject()->getId()},'unite')">
    			<img src="{$URL_IMGS}spacer_{$TAILLE_CASE_X}_{$TAILLE_CASE_Y}.gif" style="width: {$TAILLE_CASE_X}px; height: {$TAILLE_CASE_Y}px;" alt="test spacer"/>
		    </a>
	    {/if}
	    </div>
    {/if}
	{* Partie pour les UNITE_JOUEUR *}
	{if ($case->getUnite_joueur() > 0)}
        <div
    		id="unite_{$case->getId()}_{$case->getUnite_joueurObject()->getId()}"
		    style="position: absolute;
		    top: {$top}px;
		    left: {$left}px;
		    background-image: url({$URL_IMGS_UNITE}{$case->getUnite_joueurObject()->getChemin()});
		    background-repeat:no-repeat;
    		z-index: 3;
		    width:   {$width}px;
		    height:  {$height}px;
		    opacity: 1;"
	    >
	    {if ($EDITION_CARTE === false)}
    		<!-- <a 	onmouseover="BulleWrite('<div style=\'border:1px solid black; background-color:white;\'>{$case->donneInfoCase($EDITION_CARTE)}</div>',15,15);"
		    href="javascript:montreOptionsCase({$case->getId()})"> -->
		    <!-- Changement optionCase => actionUnite -->
		    <a 	onmouseover="BulleWrite('<div style=\'border:1px solid black; background-color:white;\'>{$case->donneInfoCase($EDITION_CARTE)}</div>',15,15);"
		    href="javascript:montreActionUnite({$case->getUnite_joueurObject()->getId()},'unite_joueur')">
    			<img src="{$URL_IMGS}spacer_{$TAILLE_CASE_X}_{$TAILLE_CASE_Y}.gif" style="width: {$TAILLE_CASE_X}px; height: {$TAILLE_CASE_Y}px;" alt="test spacer"/>
		    </a>
	    {/if}
	    </div>
	{/if}
{/if}
</body>
</html>