{*
	Template auto genere pour la classe Arene_unites
	AUTO-GENERATED FILE on 23/02/2017 14:21:07
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="arene_unites"/>
	{/if}

	<table>
	<caption>{$arene_unites->getNom()} (identifiant {$arene_unites->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$arene_unites->getChemin()}" alt="{$arene_unites->getNom()}"/>
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
				membre
			</td>
			<td align="center">
				{$arene_unites->getMembre()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeMembre))}
						<select id="listemembre" name="membre" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Membre</option>
							{foreach from=$listeMembre item=membre}
								<option value="{$membre->getId()}">{$membre->getPseudo()} ({$membre->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oMembre
			</td>
			<td align="center">
				{if ($arene_unites->getMembre() > 0)}
					{$arene_unites->getMembreObject()->getPseudo()}
					
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
				type
			</td>
			<td align="center">
				{$arene_unites->getType()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeType))}
						<select id="listetype" name="type" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Type</option>
							{foreach from=$listeType item=type}
								<option value="{$type->getId()}">{$type->getNom()} ({$type->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oType
			</td>
			<td align="center">
				{if ($arene_unites->getType() > 0)}
					{$arene_unites->getTypeObject()->getNom()}
					
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
				{$arene_unites->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$arene_unites->getempty()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				titre
			</td>
			<td align="center">
				{$arene_unites->getTitre()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="titre" id="titre" value="{$arene_unites->gettitre()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nb_joueur_min
			</td>
			<td align="center">
				{$arene_unites->getNb_joueur_min()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nb_joueur_min" id="nb_joueur_min" value="{$arene_unites->getnb_joueur_min()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oNb_joueur_min
			</td>
			<td align="center">
				{if ($arene_unites->getNb_joueur_min() > 0)}
					{$arene_unites->getNb_joueur_minObject()->getNom()}
					
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
				nb_joueur_max
			</td>
			<td align="center">
				{$arene_unites->getNb_joueur_max()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nb_joueur_max" id="nb_joueur_max" value="{$arene_unites->getnb_joueur_max()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oNb_joueur_max
			</td>
			<td align="center">
				{if ($arene_unites->getNb_joueur_max() > 0)}
					{$arene_unites->getNb_joueur_maxObject()->getNom()}
					
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
				fantassins_min
			</td>
			<td align="center">
				{$arene_unites->getFantassins_min()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassins_min" id="fantassins_min" value="{$arene_unites->getfantassins_min()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oFantassins_min
			</td>
			<td align="center">
				{if ($arene_unites->getFantassins_min() > 0)}
					{$arene_unites->getFantassins_minObject()->getNom()}
					
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
				fantassins_max
			</td>
			<td align="center">
				{$arene_unites->getFantassins_max()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassins_max" id="fantassins_max" value="{$arene_unites->getfantassins_max()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oFantassins_max
			</td>
			<td align="center">
				{if ($arene_unites->getFantassins_max() > 0)}
					{$arene_unites->getFantassins_maxObject()->getNom()}
					
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
				motorise_min
			</td>
			<td align="center">
				{$arene_unites->getMotorise_min()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="motorise_min" id="motorise_min" value="{$arene_unites->getmotorise_min()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				motorise_max
			</td>
			<td align="center">
				{$arene_unites->getMotorise_max()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="motorise_max" id="motorise_max" value="{$arene_unites->getmotorise_max()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				aerien_min
			</td>
			<td align="center">
				{$arene_unites->getAerien_min()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="aerien_min" id="aerien_min" value="{$arene_unites->getaerien_min()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				aerien_max
			</td>
			<td align="center">
				{$arene_unites->getAerien_max()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="aerien_max" id="aerien_max" value="{$arene_unites->getaerien_max()}"/>				</td>
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


