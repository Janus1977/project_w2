{*
	Template Smarty de la liste des avatars d'un compte
*}
<table border="1" align="center">
	<tr>
		<td colspan="2">
			<div id="infos_compte" name="infos_compte"></div>
		</td>
	</tr>
	<tr>
		<td><div id="affichageCompte" nom="affichageCompte">{include file="{$TEMPLATES_COMPTE}gere{$template}.tpl"}</div></td>
	</tr>
</table>