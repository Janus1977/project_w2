{*
	Template auto genere pour la classe Message
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="message"/>
	{/if}

	<table>
	<caption>{$message->getNom()} (identifiant {$message->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$message->getChemin()}" alt="{$message->getNom()}"/>
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
				{$message->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$message->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				id_parent
			</td>
			<td align="center">
				{$message->getId_parent()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id_parent" id="id_parent" value="{$message->getid_parent()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				id_auteur_message
			</td>
			<td align="center">
				{$message->getId_auteur_message()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id_auteur_message" id="id_auteur_message" value="{$message->getid_auteur_message()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oId_auteur_message
			</td>
			<td align="center">
				{if ($message->getId_auteur_message() > 0)}
					{$message->getId_auteur_messageObject()->getNom()}
					
				{else}
					Aucun
				{/if}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center">
				&nbsp;
			</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				contenu_message
			</td>
			<td align="center">
				{$message->getContenu_message()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="contenu_message" id="contenu_message" value="{$message->getcontenu_message()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oContenu_message
			</td>
			<td align="center">
				{if ($message->getContenu_message() > 0)}
					{$message->getContenu_messageObject()->getNom()}
					
				{else}
					Aucun
				{/if}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center">
				&nbsp;
			</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_creation_message
			</td>
			<td align="center">
				{$message->getDate_creation_message()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_creation_message" id="date_creation_message" value="{$message->getdate_creation_message()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oDate_creation_message
			</td>
			<td align="center">
				{if ($message->getDate_creation_message() > 0)}
					{$message->getDate_creation_messageObject()->getNom()}
					
				{else}
					Aucun
				{/if}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center">
				&nbsp;
			</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_modification_message
			</td>
			<td align="center">
				{$message->getDate_modification_message()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_modification_message" id="date_modification_message" value="{$message->getdate_modification_message()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oDate_modification_message
			</td>
			<td align="center">
				{if ($message->getDate_modification_message() > 0)}
					{$message->getDate_modification_messageObject()->getNom()}
					
				{else}
					Aucun
				{/if}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center">
				&nbsp;
			</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$message->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$message->getempty()}"/>				</td>
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


