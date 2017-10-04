{*
	Template Smarty pour le module 'ARSENAL_IMPERIAL'
*}
<table>
	{* les "onglets" *}
	<tr>
		<td>
		<input type="button" id="accueil" onclick="afficheArsenal('accueil');" value="Accueil"/>&nbsp;&nbsp;&nbsp;
		<input type="button" id="reparation" onclick="afficheArsenal('reparation');" value="R&eacute;parations"/>&nbsp;&nbsp;&nbsp;
		<input type="button" id="demontage" onclick="afficheArsenal('demontage');" value="D&eacute;montage"/>&nbsp;&nbsp;&nbsp;
		<input type="button" id="customisation" onclick="afficheArsenal('customisation');" value="Customisation"/>&nbsp;&nbsp;&nbsp;
		   	
		<!--
		<a href="javascript:afficheArsenal('accueil');">ACCUEIL</a></td>
		<td><a href="javascript:afficheArsenal('reparation');">R&Eacute;PARATIONS</a></td>
		<td><a href="javascript:afficheArsenal('demontage');">D&Eacute;MONTAGE</a></td>
		<td><a href="javascript:afficheArsenal('customisation');">CUSTOMISATION</a>
		-->
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<div id="contenu_arsenal_imperial" name="contenu_arsenal_imperial"></div>
		</td>
	</tr>
</table>