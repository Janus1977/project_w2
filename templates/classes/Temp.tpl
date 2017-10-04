{*
	Template auto genere pour la classe Temp
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="temp"/>
	{/if}

	<table>
	<caption>{$temp->getNom()} (identifiant {$temp->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$temp->getChemin()}" alt="{$temp->getNom()}"/>
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				Caract&eacute;ristiques actuelles
				</td>
				<td>
				Caract&eacute;ristiques &agrave; appliquer
			{else}
				Caract&eacute;ristiques
			{/if}
			</td>
		</tr>
		<tr>
			<td align="left">
				id
			</td>
			<td align="center">
				{$temp->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$temp->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				pseudo
			</td>
			<td align="center">
				{$temp->getPseudo()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="pseudo" id="pseudo" value="{$temp->getpseudo()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				password
			</td>
			<td align="center">
				{$temp->getPassword()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="password" id="password" value="{$temp->getpassword()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				email
			</td>
			<td align="center">
				{$temp->getEmail()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="email" id="email" value="{$temp->getemail()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				adresse_ip
			</td>
			<td align="center">
				{$temp->getAdresse_ip()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="adresse_ip" id="adresse_ip" value="{$temp->getadresse_ip()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_inscription
			</td>
			<td align="center">
				{$temp->getDate_inscription()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_inscription" id="date_inscription" value="{$temp->getdate_inscription()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_suppression
			</td>
			<td align="center">
				{$temp->getDate_suppression()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_suppression" id="date_suppression" value="{$temp->getdate_suppression()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				checksum
			</td>
			<td align="center">
				{$temp->getChecksum()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="checksum" id="checksum" value="{$temp->getchecksum()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$temp->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$temp->getempty()}"/>				</td>
			{/if}
		</tr>
	</table>
	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		</form>
	{/if}


	{*
		Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
		Il sera preserve lors de la reconstruction automatique.
	 *}
	{*[TAG1]*}	{*[/TAG1]*}


