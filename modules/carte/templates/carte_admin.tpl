{*
	Affichage des carte côté administration
	
		- Liste des cartes (toutes)
		- Possibilité de modifier des données
*}
{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
	{* Affichage de l a liste des Carte avec miniature *}
	<table>
		<caption>Liste de toutes les cartes</caption>
		<tr>
	{assign var=cpt value=1}
	{foreach from=$listeCartes item=carte}
		<td align="center">
			{$carte->getNom()}<br/>
			<img src="{$URL_IMGS_MINI_CARTES}{$carte->getNom()}.jpg" width="200" height="200"/><br/>
			<input type="button" value="Jouer" onclick="joueCarte('{$smarty.session.user->getId()}','{$carte->getId()}');"/>
			{if ($carte->getEdition() == 0)}
				<input type="button" value="&Eacute;diter" onclick="editeCarte('{$carte->getId()}');"/>
			{else}
				<input type="button" value="Publier" onclick="publieCarte('{$carte->getId()}');"/>
			{/if}
		</td>
		{if (($cpt > 1) && ($cpt%5 == 0))}
			</tr>
			<tr>
		{/if}
		{assign var=cpt value=$cpt+1}
	{/foreach}
	</table>
{else}
{/if}