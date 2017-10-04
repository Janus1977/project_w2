<table>
	<tr>
		<td width="151" height="251" v-align="center" align="center">
			{if (isset($nombreAvatarsDispos) && $nombreAvatarsDispos > 0) }
				{* avatar actuel associe au compte *}
				{assign var="idDiv" value="avatarEnCours"}
				{include file="{$TEMPLATES_COMPTE}avatar.tpl"}
			{else}
				Aucun avatar disponible
			{/if}
		</td>
		<td>
			<table>
				<tr>
					<td align="left">Pseudo:</td>
					<td align="left">{$smarty.session.compte->getPseudo()}</td>
				</tr>
				<tr>
					<td align="left">Rang:</td>
					<td align="left">{$smarty.session.compte->getPseudo()}</td>
				</tr>
				<tr>
					<td align="left">Derni&egrave;re connexion:</td>
					<td align="left">{$smarty.session.derniere_connexion->getDate_connexion()}</td>
				</tr>
				<tr>
					<td align="left">Nombre d'avatar utilis&eacute;:</td>
					<td align="left">{$nombreAvatarsDispos} / 5</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center" v-align="center">
			<input 	type="button"
					id="gereAvatars"
					name="gereAvatars"
					onclick="chargeModule('compte',1)"
					value="Gestion des avatars"/>
		</td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
</table>