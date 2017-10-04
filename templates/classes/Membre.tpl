{*
	Template auto genere pour la classe Membre
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="membre"/>
	{/if}

	<table>
	<caption>{$membre->getNom()} (identifiant {$membre->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$membre->getChemin()}" alt="{$membre->getNom()}"/>
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
				{$membre->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$membre->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				pseudo
			</td>
			<td align="center">
				{$membre->getPseudo()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="pseudo" id="pseudo" value="{$membre->getpseudo()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				password
			</td>
			<td align="center">
				{$membre->getPassword()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="password" id="password" value="{$membre->getpassword()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				mail
			</td>
			<td align="center">
				{$membre->getMail()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="mail" id="mail" value="{$membre->getmail()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_inscription
			</td>
			<td align="center">
				{$membre->getDate_inscription()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_inscription" id="date_inscription" value="{$membre->getdate_inscription()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				staff
			</td>
			<td align="center">
				{$membre->getStaff()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="staff" id="staff" value="{$membre->getstaff()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				groupe
			</td>
			<td align="center">
				{$membre->getGroupe()}
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
				{if ($membre->getGroupe() > 0)}
					{$membre->getGroupeObject()->getNom()}
					
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
				experience
			</td>
			<td align="center">
				{$membre->getExperience()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="experience" id="experience" value="{$membre->getexperience()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				description
			</td>
			<td align="center">
				{$membre->getDescription()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<textarea cols="20" rows="5" name="description" id="description">{$membre->getdescription()}</textarea>
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				cle_activation
			</td>
			<td align="center">
				{$membre->getCle_activation()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="cle_activation" id="cle_activation" value="{$membre->getcle_activation()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				avatar
			</td>
			<td align="center">
				{$membre->getAvatar()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="avatar" id="avatar" value="{$membre->getavatar()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				design
			</td>
			<td align="center">
				{$membre->getDesign()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeDesign))}
						<select id="listedesign" name="design" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Design</option>
							{foreach from=$listeDesign item=design}
								<option value="{$design->getId()}">{$design->getNom()} ({$design->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oDesign
			</td>
			<td align="center">
				{if ($membre->getDesign() > 0)}
					{$membre->getDesignObject()->getNom()}
					
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
				points
			</td>
			<td align="center">
				{$membre->getPoints()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="points" id="points" value="{$membre->getpoints()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_der_connexion
			</td>
			<td align="center">
				{$membre->getDate_der_connexion()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_der_connexion" id="date_der_connexion" value="{$membre->getdate_der_connexion()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$membre->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$membre->getempty()}"/>				</td>
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


