{*
	Template auto genere pour la classe Arene_joueur
	AUTO-GENERATED FILE on 23/02/2017 14:21:07
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="arene_joueur"/>
	{/if}

	<table>
	<caption>{$arene_joueur->getNom()} (identifiant {$arene_joueur->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$arene_joueur->getChemin()}" alt="{$arene_joueur->getNom()}"/>
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
				{$arene_joueur->getMembre()}
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
				{if ($arene_joueur->getMembre() > 0)}
					{$arene_joueur->getMembreObject()->getPseudo()}
					
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
				{$arene_joueur->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$arene_joueur->getempty()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				titre
			</td>
			<td align="center">
				{$arene_joueur->getTitre()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="titre" id="titre" value="{$arene_joueur->gettitre()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nb_joueur_min
			</td>
			<td align="center">
				{$arene_joueur->getNb_joueur_min()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nb_joueur_min" id="nb_joueur_min" value="{$arene_joueur->getnb_joueur_min()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oNb_joueur_min
			</td>
			<td align="center">
				{if ($arene_joueur->getNb_joueur_min() > 0)}
					{$arene_joueur->getNb_joueur_minObject()->getNom()}
					
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
				{$arene_joueur->getNb_joueur_max()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nb_joueur_max" id="nb_joueur_max" value="{$arene_joueur->getnb_joueur_max()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oNb_joueur_max
			</td>
			<td align="center">
				{if ($arene_joueur->getNb_joueur_max() > 0)}
					{$arene_joueur->getNb_joueur_maxObject()->getNom()}
					
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
				{$arene_joueur->getFantassins_min()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassins_min" id="fantassins_min" value="{$arene_joueur->getfantassins_min()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oFantassins_min
			</td>
			<td align="center">
				{if ($arene_joueur->getFantassins_min() > 0)}
					{$arene_joueur->getFantassins_minObject()->getNom()}
					
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
				{$arene_joueur->getFantassins_max()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassins_max" id="fantassins_max" value="{$arene_joueur->getfantassins_max()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oFantassins_max
			</td>
			<td align="center">
				{if ($arene_joueur->getFantassins_max() > 0)}
					{$arene_joueur->getFantassins_maxObject()->getNom()}
					
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
				{$arene_joueur->getMotorise_min()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="motorise_min" id="motorise_min" value="{$arene_joueur->getmotorise_min()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				motorise_max
			</td>
			<td align="center">
				{$arene_joueur->getMotorise_max()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="motorise_max" id="motorise_max" value="{$arene_joueur->getmotorise_max()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				aerien_min
			</td>
			<td align="center">
				{$arene_joueur->getAerien_min()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="aerien_min" id="aerien_min" value="{$arene_joueur->getaerien_min()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				aerien_max
			</td>
			<td align="center">
				{$arene_joueur->getAerien_max()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="aerien_max" id="aerien_max" value="{$arene_joueur->getaerien_max()}"/>				</td>
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


