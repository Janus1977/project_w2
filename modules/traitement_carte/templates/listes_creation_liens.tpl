{*
	Template pour l'affichage de la liste pour creation de lien.
*}

{if ($case->getEtatCase() == 98)}
	{if ($case->getIdtile() == 0)}
		{* case liante "non liee" *}
		<table>
			<tr>
				<td align="left" colspan="3">Lier la case ({$case->getId()}) avec:</td>
			</tr>
			<tr>
				<td>
					<div id="liste_cartes">
						{include file="./liste_cartes_jeu.tpl"}
					</div>
				</td>
				<td>
					<div id="liste_cases_liens_carte">
						{include file="./liste_cases_liens_carte.tpl"}
					</div>
				</td>
				<td>
					<input
						type="button"
						id="boutonOKLien"
						name="boutonOKLien"
						value="Lier"
						disabled="disabled"
						onClick="creeLienEntreCases({$case->getId()})"
					/>
				</td>
			</tr>
		</table>
	{else}
		{* case liante "liee" *}
		Case li&eacute;e avec la case {$case->getIdtile()} de la carte {$caseLiee->getCarte()->getNom()}.
		{* On donne la possibilite de charger la carte liee *}
		<br/>
		<input
			type="button"
			id="boutonChargeCarteliee"
			name="boutonChargeCarteliee"
			style="align:center;"
			value="Charger la carte li&eacute;e"			
			onclick="afficheCarte({$caseLiee->getCarte()->getId()},'',0,0)"
		/>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input
			type="button"
			id="boutonSupprimeLienCases"
			name="boutonSupprimeLienCases"
			style="align:center;"
			value="Supprimer le lien"			
			onclick="supprimeLienEntreCases({$case->getId()},{$caseLiee->getId()})"
		/>
	{/if}
{/if}
