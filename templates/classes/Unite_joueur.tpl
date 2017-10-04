{*
	Template auto genere pour la classe Unite_joueur
	AUTO-GENERATED FILE on 06/06/2017 11:24:57
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="unite_joueur"/>
	{/if}

	<table>
	<caption>{$unite_joueur->getNom()} (identifiant {$unite_joueur->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$unite_joueur->getChemin()}" alt="{$unite_joueur->getNom()}"/>
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
				{$unite_joueur->getMembre()}
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
				{if ($unite_joueur->getMembre() > 0)}
					{$unite_joueur->getMembreObject()->getPseudo()}
					
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
				{$unite_joueur->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$unite_joueur->getempty()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				id
			</td>
			<td align="center">
				{$unite_joueur->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$unite_joueur->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nom
			</td>
			<td align="center">
				{$unite_joueur->getNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nom" id="nom" value="{$unite_joueur->getnom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				description
			</td>
			<td align="center">
				{$unite_joueur->getDescription()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<textarea cols="20" rows="5" name="description" id="description">{$unite_joueur->getdescription()}</textarea>
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_av
			</td>
			<td align="center">
				{$unite_joueur->getDef_av()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_av" id="def_av" value="{$unite_joueur->getdef_av()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_ar
			</td>
			<td align="center">
				{$unite_joueur->getDef_ar()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_ar" id="def_ar" value="{$unite_joueur->getdef_ar()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_g
			</td>
			<td align="center">
				{$unite_joueur->getDef_g()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_g" id="def_g" value="{$unite_joueur->getdef_g()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_d
			</td>
			<td align="center">
				{$unite_joueur->getDef_d()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_d" id="def_d" value="{$unite_joueur->getdef_d()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				mouvement
			</td>
			<td align="center">
				{$unite_joueur->getMouvement()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="mouvement" id="mouvement" value="{$unite_joueur->getmouvement()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				capacite
			</td>
			<td align="center">
				{$unite_joueur->getCapacite()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="capacite" id="capacite" value="{$unite_joueur->getcapacite()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				pilote
			</td>
			<td align="center">
				{$unite_joueur->getPilote()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="pilote" id="pilote" value="{$unite_joueur->getpilote()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				co_pilote
			</td>
			<td align="center">
				{$unite_joueur->getCo_pilote()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="co_pilote" id="co_pilote" value="{$unite_joueur->getco_pilote()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				experience
			</td>
			<td align="center">
				{$unite_joueur->getExperience()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="experience" id="experience" value="{$unite_joueur->getexperience()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				equipementarmegauche
			</td>
			<td align="center">
				{$unite_joueur->getEquipementarmegauche()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementarmegauche" id="equipementarmegauche" value="{$unite_joueur->getequipementarmegauche()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementarmegauche
			</td>
			<td align="center">
				{if ($unite_joueur->getEquipementarmegauche() > 0)}
					{$unite_joueur->getEquipementarmegaucheObject()->getNom()}
					
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
				equipementarmedroite
			</td>
			<td align="center">
				{$unite_joueur->getEquipementarmedroite()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementarmedroite" id="equipementarmedroite" value="{$unite_joueur->getequipementarmedroite()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementarmedroite
			</td>
			<td align="center">
				{if ($unite_joueur->getEquipementarmedroite() > 0)}
					{$unite_joueur->getEquipementarmedroiteObject()->getNom()}
					
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
				equipementarmure
			</td>
			<td align="center">
				{$unite_joueur->getEquipementarmure()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementarmure" id="equipementarmure" value="{$unite_joueur->getequipementarmure()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementarmure
			</td>
			<td align="center">
				{if ($unite_joueur->getEquipementarmure() > 0)}
					{$unite_joueur->getEquipementarmureObject()->getNom()}
					
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
				equipementcoiffe
			</td>
			<td align="center">
				{$unite_joueur->getEquipementcoiffe()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementcoiffe" id="equipementcoiffe" value="{$unite_joueur->getequipementcoiffe()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementcoiffe
			</td>
			<td align="center">
				{if ($unite_joueur->getEquipementcoiffe() > 0)}
					{$unite_joueur->getEquipementcoiffeObject()->getNom()}
					
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
				equipementetendart
			</td>
			<td align="center">
				{$unite_joueur->getEquipementetendart()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementetendart" id="equipementetendart" value="{$unite_joueur->getequipementetendart()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementetendart
			</td>
			<td align="center">
				{if ($unite_joueur->getEquipementetendart() > 0)}
					{$unite_joueur->getEquipementetendartObject()->getNom()}
					
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
				toucher
			</td>
			<td align="center">
				{$unite_joueur->getToucher()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="toucher" id="toucher" value="{$unite_joueur->gettoucher()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				initiative
			</td>
			<td align="center">
				{$unite_joueur->getInitiative()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="initiative" id="initiative" value="{$unite_joueur->getinitiative()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				sauvegarde
			</td>
			<td align="center">
				{$unite_joueur->getSauvegarde()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="sauvegarde" id="sauvegarde" value="{$unite_joueur->getsauvegarde()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				endurance
			</td>
			<td align="center">
				{$unite_joueur->getEndurance()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="endurance" id="endurance" value="{$unite_joueur->getendurance()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				cac
			</td>
			<td align="center">
				{$unite_joueur->getCac()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="cac" id="cac" value="{$unite_joueur->getcac()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				fo
			</td>
			<td align="center">
				{$unite_joueur->getFo()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fo" id="fo" value="{$unite_joueur->getfo()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				attaque
			</td>
			<td align="center">
				{$unite_joueur->getAttaque()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="attaque" id="attaque" value="{$unite_joueur->getattaque()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				intell
			</td>
			<td align="center">
				{$unite_joueur->getIntell()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="intell" id="intell" value="{$unite_joueur->getintell()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ty
			</td>
			<td align="center">
				{$unite_joueur->getTy()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ty" id="ty" value="{$unite_joueur->getty()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				camp
			</td>
			<td align="center">
				{$unite_joueur->getCamp()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeCamp))}
						<select id="listecamp" name="camp" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Camp</option>
							{foreach from=$listeCamp item=camp}
								<option value="{$camp->getId()}">{$camp->getNom()} ({$camp->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oCamp
			</td>
			<td align="center">
				{if ($unite_joueur->getCamp() > 0)}
					{$unite_joueur->getCampObject()->getNom()}
					
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
				cout
			</td>
			<td align="center">
				{$unite_joueur->getCout()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="cout" id="cout" value="{$unite_joueur->getcout()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_creation
			</td>
			<td align="center">
				{$unite_joueur->getDate_creation()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_creation" id="date_creation" value="{$unite_joueur->getdate_creation()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				chemin
			</td>
			<td align="center">
				{$unite_joueur->getChemin()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="chemin" id="chemin" value="{$unite_joueur->getchemin()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				dimension
			</td>
			<td align="center">
				{$unite_joueur->getDimension()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeDimension))}
						<select id="listedimension" name="dimension" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Dimension</option>
							{foreach from=$listeDimension item=dimension}
								<option value="{$dimension->getId()}">{$dimension->getNom()} ({$dimension->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oDimension
			</td>
			<td align="center">
				{if ($unite_joueur->getDimension() > 0)}
					{$unite_joueur->getDimensionObject()->getNom()}
					
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
				aattaquecetour
			</td>
			<td align="center">
				{$unite_joueur->getAattaquecetour()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="aattaquecetour" id="aattaquecetour" value="{$unite_joueur->getaattaquecetour()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				sestdeplacecetour
			</td>
			<td align="center">
				{$unite_joueur->getSestdeplacecetour()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="sestdeplacecetour" id="sestdeplacecetour" value="{$unite_joueur->getsestdeplacecetour()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				achargecetour
			</td>
			<td align="center">
				{$unite_joueur->getAchargecetour()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="achargecetour" id="achargecetour" value="{$unite_joueur->getachargecetour()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				tile
			</td>
			<td align="center">
				{$unite_joueur->getTile()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeTile))}
						<select id="listetile" name="tile" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Tile</option>
							{foreach from=$listeTile item=tile}
								<option value="{$tile->getId()}">{$tile->getX()} / {$tile->getY()} ({$tile->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				pdv
			</td>
			<td align="center">
				{$unite_joueur->getPdv()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="pdv" id="pdv" value="{$unite_joueur->getpdv()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ingame
			</td>
			<td align="center">
				{$unite_joueur->getIngame()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ingame" id="ingame" value="{$unite_joueur->getingame()}"/>				</td>
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


