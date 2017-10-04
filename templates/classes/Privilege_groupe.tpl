{*
	Template auto genere pour la classe Privilege_groupe
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="privilege_groupe"/>
	{/if}

	<table>
	<caption>{$privilege_groupe->getNom()} (identifiant {$privilege_groupe->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$privilege_groupe->getChemin()}" alt="{$privilege_groupe->getNom()}"/>
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
				privilege
			</td>
			<td align="center">
				{$privilege_groupe->getPrivilege()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listePrivilege))}
						<select id="listeprivilege" name="privilege" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Privilege</option>
							{foreach from=$listePrivilege item=privilege}
								<option value="{$privilege->getId()}">{$privilege->getNom()} ({$privilege->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oPrivilege
			</td>
			<td align="center">
				{if ($privilege_groupe->getPrivilege() > 0)}
					{$privilege_groupe->getPrivilegeObject()->getNom()}
					
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
				groupe
			</td>
			<td align="center">
				{$privilege_groupe->getGroupe()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeGroupe))}
						<select id="listegroupe" name="groupe" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Groupe</option>
							{foreach from=$listeGroupe item=groupe}
								<option value="{$groupe->getId()}">{$groupe->getNom()} ({$groupe->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oGroupe
			</td>
			<td align="center">
				{if ($privilege_groupe->getGroupe() > 0)}
					{$privilege_groupe->getGroupeObject()->getNom()}
					
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
				{$privilege_groupe->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$privilege_groupe->getempty()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				id
			</td>
			<td align="center">
				{$privilege_groupe->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$privilege_groupe->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nom
			</td>
			<td align="center">
				{$privilege_groupe->getNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nom" id="nom" value="{$privilege_groupe->getnom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				description
			</td>
			<td align="center">
				{$privilege_groupe->getDescription()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<textarea cols="20" rows="5" name="description" id="description">{$privilege_groupe->getdescription()}</textarea>
				</td>
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


