{*
	Template auto genere pour la classe Inventaire
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="inventaire"/>
	{/if}

	<table>
	<caption>{$inventaire->getNom()} (identifiant {$inventaire->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$inventaire->getChemin()}" alt="{$inventaire->getNom()}"/>
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
				{$inventaire->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$inventaire->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				membre
			</td>
			<td align="center">
				{$inventaire->getMembre()}
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
				{if ($inventaire->getMembre() > 0)}
					{$inventaire->getMembreObject()->getPseudo()}
					
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
				unite
			</td>
			<td align="center">
				{$inventaire->getUnite()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeUnite))}
						<select id="listeunite" name="unite" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Unite</option>
							{foreach from=$listeUnite item=unite}
								<option value="{$unite->getId()}">{$unite->getNom()} ({$unite->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oUnite
			</td>
			<td align="center">
				{if ($inventaire->getUnite() > 0)}
					{$inventaire->getUniteObject()->getNom()}
					
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
				equipement
			</td>
			<td align="center">
				{$inventaire->getEquipement()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeEquipement))}
						<select id="listeequipement" name="equipement" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Equipement</option>
							{foreach from=$listeEquipement item=equipement}
								<option value="{$equipement->getId()}">{$equipement->getNom()} ({$equipement->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipement
			</td>
			<td align="center">
				{if ($inventaire->getEquipement() > 0)}
					{$inventaire->getEquipementObject()->getNom()}
					
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
				unite_joueur
			</td>
			<td align="center">
				{$inventaire->getUnite_joueur()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeUnite_joueur))}
						<select id="listeunite_joueur" name="unite_joueur" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Unite_joueur</option>
							{foreach from=$listeUnite_joueur item=unite_joueur}
								<option value="{$unite_joueur->getId()}">{$unite_joueur->getNom()} ({$unite_joueur->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oUnite_joueur
			</td>
			<td align="center">
				{if ($inventaire->getUnite_joueur() > 0)}
					{$inventaire->getUnite_joueurObject()->getNom()}
					
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
				equipement_joueur
			</td>
			<td align="center">
				{$inventaire->getEquipement_joueur()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeEquipement_joueur))}
						<select id="listeequipement_joueur" name="equipement_joueur" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Equipement_joueur</option>
							{foreach from=$listeEquipement_joueur item=equipement_joueur}
								<option value="{$equipement_joueur->getId()}">{$equipement_joueur->getNom()} ({$equipement_joueur->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipement_joueur
			</td>
			<td align="center">
				{if ($inventaire->getEquipement_joueur() > 0)}
					{$inventaire->getEquipement_joueurObject()->getNom()}
					
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
				{$inventaire->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$inventaire->getempty()}"/>				</td>
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


