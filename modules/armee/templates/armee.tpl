{*
	Template Smarty pour le module 'ARMEE'
*}
<table align="center" style=" width: 400px;">
	<caption>Affichage des arm&eacute;es par membre</caption>
	<tr>
		<td colspan="2" align="center">
			<table>
				<tr>
					<td style="text-align: left;" colspan="2">Cr&eacute;er une arm&eacute;e</td>
				</tr>
				<tr>
					<td style="text-align: left;">=> Membre :</td>
					<td style="text-align: center;" colspan="2">{include file="../../../modules/membre/templates/liste_membre.tpl"}</td>
				</tr>
				<tr>
					<td style="text-align: left;">=> Nom Arm&eacute;e :</td>
					<td style="text-align: center;"><input type="text" size="20" id="nomNouvelleArmee"  name="nomNouvelleArmee"/></td>
					<td><input type="button" onclick="ajouteArmee()" value="Ajouter"/></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="background-color: black;height: 1px;"></td>
	</tr>
	{if (isset($aListeArmeesMembre))}
		<tr>
			<td style="text-align: center;">Membre</td>
			<td style="text-align: center;">Armee</td>
		</tr>
		{foreach from=$aListeArmeesMembre item=armeesMembres}
			<tr>
				<td style="text-align: center;">{$armeesMembres.membre}</td>
				<td style="text-align: center;">
				{if (is_array($armeesMembres.armees))}
					<table align="center">
					{foreach from=$armeesMembres.armees item=armee}
						<tr>
							<td style="text-align: center;">{$armee.nom}</td>
							<td style="text-align: center;"><input type="button" onclick="afficheDetails({$armee.id})" value="D&eacute;tails"/></td>
						</tr>
					{/foreach}
					</table>					
				{else}
				{/if}
				</td>
			</tr>
		{/foreach}
	{else}
		<tr><td style="text-align: center;">Pas d'arm&eacute;es en base</td></tr>
	{/if}
</table>