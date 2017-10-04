{*
	Template Smarty d'affichage d'un equipement.
*}
{* L'affichage de l'equipement *}
<table border="1">
	<tr>
		{* L'image affectee *}
		<td align="center" valign="top">
			{include file="{$TPL_BASE}affiche_image.tpl"}
		</td>
		{* la liste des caracteristiques *}
		<td align="center" valign="top">
			<table border="1">
				<tr>
					<td colspan="2">Caract&eacute;ristiques</td>
				</tr>
				<tr>
					<td align="left">nom</td>
					<td align="right">valeur</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		{* la description de l'equipement *}
		<td colspan="2" align="center" valign="top">
			<textarea width="100%">description</textarea>
		</td>
	</tr>
</table>