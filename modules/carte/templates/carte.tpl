{*
	Template Smarty pour le module carte => affichage strict de la carte
	Pour que la carte fonctionne il faut:
	    - Une zone d'affichage de la carte (case + decor + unite)
	    - Une zone de gestion du clic sur la case => options (case / unité)
*}
{* Pour faire simple, je vais faire un tableau de 1 ligne, je sais c'est pas beau mais c'est pratique (cf FF) *}
<table>
	<tr>
		<td><div id="menu_carte_gauche">{*include file='{$TPL_BASE}menu_v_g.tpl'*}</div></td>
		<td>
			{if (!empty($oCarte))}
				{* Affichage des cases de la carte *}

				{* Affichage MODE EDITION *}
				{if (isset($EDITION_CARTE) && $EDITION_CARTE === true)}		
					<fieldset width="100%" height="100%">
					<legend>Informations Carte {$oCarte->getNom()}</legend>
						Dimensions de la carte:
							<ul>
								<li>Abscisse: {$oCarte->getNb_cases_x()} case(s)</li>
								<li>Ordonn&eacute;e: {$oCarte->getNb_cases_y()} case(s)</li>
							</ul>
						Nombre de d&eacute;cor: 
						Edition Carte: {$EDITION_CARTE}
						{if (!empty($smarty.session.carte))}
							Dimensions de la carte: {$smarty.session.carte->getNb_cases_x()} x {$smarty.session.carte->getNb_cases_y()} case(s)
						{/if}
					</fieldset>
				{/if}
				{* Fin affichage MODE EDITION *}
				
				<div id="carte" style="position: relative;
								min-width: {$TAILLE_CASE_X * $oCarte->getNb_cases_x() + $TAILLE_CASE_X}px;
								min-height: {$TAILLE_CASE_Y * $oCarte->getNb_cases_y() + $TAILLE_CASE_Y}px;
								max-width: {$TAILLE_CASE_X * $oCarte->getNb_cases_x() + $TAILLE_CASE_X}px;
								max-height: {$TAILLE_CASE_Y * $oCarte->getNb_cases_y() + $TAILLE_CASE_Y}px;
								border: 1px solid blue;
								/*top: 0px;
								left: 0px;*/
								z-index: 0;
								overflow: auto;
								background:url('{$cheminImageFond}?{$random}') 0 0 no-repeat;">
					{*AFFICHAGE DES CASES*}
					{foreach from=$aCasesCarte item=case}
						
						{include file='./case.tpl'}
						{*
							si nous sommes en EDITION alors l'accès au decor est sur la case le portant uniquement pour pouvoir
			    			acceder aux autres cases, sinon le decor revcouvre les cases correspondant a sa taille
						*}
						{if (isset($EDITION_CARTE) && $EDITION_CARTE === false)}
							{if ($case->getDecor() > 0)}
								{* Affichage du decor *}
								{assign var="top" value="{$TAILLE_CASE_Y * ($case->getY() - $yDebut)}"}
								{assign var="left" value="{$TAILLE_CASE_X * ($case->getX() - $xDebut)}"}
								{assign var="width" value="{$TAILLE_CASE_X * ($case->getDecorObject()->getDimensionObject()->getLargeur())}"}
								{assign var="height" value="{$TAILLE_CASE_Y * ($case->getDecorObject()->getDimensionObject()->getLongueur())}"}
								{include file=$TEMPLATE_DECORS}
							{/if}
							{if ($case->getUnite() > 0)}
								{* Affichage du decor *}
								{assign var="top" value="{$TAILLE_CASE_Y * ($case->getY() - $yDebut)}"}
								{assign var="left" value="{$TAILLE_CASE_X * ($case->getX() - $xDebut)}"}
								{assign var="width" value="{$TAILLE_CASE_X * ($case->getUniteObject()->getDimensionObject()->getLargeur())}"}
								{assign var="height" value="{$TAILLE_CASE_Y * ($case->getUniteObject()->getDimensionObject()->getLongueur())}"}
								{include file=$TEMPLATES_UNITE}
							{/if}
						{/if}
					{/foreach}
					{if ($EDITION_CARTE === false)}
					<div id="optionsCase" style="position: relative;
											z-index: 0;
											overflow: auto;
											border: 1px solid black;"></div>
					{/if}
				{else}
					<br>Aucune carte choisie.
				{/if}
			</div>
		</td>
		<td><div id="menu_carte_droite">{*include file='{$TPL_BASE}menu_v_d.tpl'*}</div></td>
	</tr>
</table>