{*
	Template auto genere pour la classe Unite
	AUTO-GENERATED FILE on 03/10/2017 14:32:14
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="unite"/>
	{/if}

	<table>
	<caption>{$unite->getNom()} (identifiant {$unite->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$unite->getChemin()}" alt="{$unite->getNom()}"/>
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
				{$unite->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$unite->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nom
			</td>
			<td align="center">
				{$unite->getNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nom" id="nom" value="{$unite->getnom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				description
			</td>
			<td align="center">
				{$unite->getDescription()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<textarea cols="20" rows="5" name="description" id="description">{$unite->getdescription()}</textarea>
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_av
			</td>
			<td align="center">
				{$unite->getDef_av()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_av" id="def_av" value="{$unite->getdef_av()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_ar
			</td>
			<td align="center">
				{$unite->getDef_ar()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_ar" id="def_ar" value="{$unite->getdef_ar()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_g
			</td>
			<td align="center">
				{$unite->getDef_g()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_g" id="def_g" value="{$unite->getdef_g()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_d
			</td>
			<td align="center">
				{$unite->getDef_d()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_d" id="def_d" value="{$unite->getdef_d()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				mouvement
			</td>
			<td align="center">
				{$unite->getMouvement()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="mouvement" id="mouvement" value="{$unite->getmouvement()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				capacite
			</td>
			<td align="center">
				{$unite->getCapacite()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="capacite" id="capacite" value="{$unite->getcapacite()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				pilote
			</td>
			<td align="center">
				{$unite->getPilote()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="pilote" id="pilote" value="{$unite->getpilote()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				co_pilote
			</td>
			<td align="center">
				{$unite->getCo_pilote()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="co_pilote" id="co_pilote" value="{$unite->getco_pilote()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				experience
			</td>
			<td align="center">
				{$unite->getExperience()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="experience" id="experience" value="{$unite->getexperience()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				equipementarmegauche
			</td>
			<td align="center">
				{$unite->getEquipementarmegauche()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementarmegauche" id="equipementarmegauche" value="{$unite->getequipementarmegauche()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementarmegauche
			</td>
			<td align="center">
				{if ($unite->getEquipementarmegauche() > 0)}
					{$unite->getEquipementarmegaucheObject()->getNom()}
					
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
				{$unite->getEquipementarmedroite()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementarmedroite" id="equipementarmedroite" value="{$unite->getequipementarmedroite()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementarmedroite
			</td>
			<td align="center">
				{if ($unite->getEquipementarmedroite() > 0)}
					{$unite->getEquipementarmedroiteObject()->getNom()}
					
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
				{$unite->getEquipementarmure()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementarmure" id="equipementarmure" value="{$unite->getequipementarmure()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementarmure
			</td>
			<td align="center">
				{if ($unite->getEquipementarmure() > 0)}
					{$unite->getEquipementarmureObject()->getNom()}
					
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
				{$unite->getEquipementcoiffe()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementcoiffe" id="equipementcoiffe" value="{$unite->getequipementcoiffe()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementcoiffe
			</td>
			<td align="center">
				{if ($unite->getEquipementcoiffe() > 0)}
					{$unite->getEquipementcoiffeObject()->getNom()}
					
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
				{$unite->getEquipementetendart()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementetendart" id="equipementetendart" value="{$unite->getequipementetendart()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementetendart
			</td>
			<td align="center">
				{if ($unite->getEquipementetendart() > 0)}
					{$unite->getEquipementetendartObject()->getNom()}
					
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
				{$unite->getToucher()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="toucher" id="toucher" value="{$unite->gettoucher()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				initiative
			</td>
			<td align="center">
				{$unite->getInitiative()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="initiative" id="initiative" value="{$unite->getinitiative()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				sauvegarde
			</td>
			<td align="center">
				{$unite->getSauvegarde()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="sauvegarde" id="sauvegarde" value="{$unite->getsauvegarde()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				endurance
			</td>
			<td align="center">
				{$unite->getEndurance()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="endurance" id="endurance" value="{$unite->getendurance()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				cac
			</td>
			<td align="center">
				{$unite->getCac()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="cac" id="cac" value="{$unite->getcac()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				fo
			</td>
			<td align="center">
				{$unite->getFo()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fo" id="fo" value="{$unite->getfo()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				attaque
			</td>
			<td align="center">
				{$unite->getAttaque()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="attaque" id="attaque" value="{$unite->getattaque()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				intell
			</td>
			<td align="center">
				{$unite->getIntell()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="intell" id="intell" value="{$unite->getintell()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ty
			</td>
			<td align="center">
				{$unite->getTy()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ty" id="ty" value="{$unite->getty()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				camp
			</td>
			<td align="center">
				{$unite->getCamp()}
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
				{if ($unite->getCamp() > 0)}
					{$unite->getCampObject()->getNom()}
					
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
				{$unite->getCout()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="cout" id="cout" value="{$unite->getcout()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_creation
			</td>
			<td align="center">
				{$unite->getDate_creation()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_creation" id="date_creation" value="{$unite->getdate_creation()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				chemin
			</td>
			<td align="center">
				{$unite->getChemin()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="chemin" id="chemin" value="{$unite->getchemin()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				dimension
			</td>
			<td align="center">
				{$unite->getDimension()}
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
				{if ($unite->getDimension() > 0)}
					{$unite->getDimensionObject()->getNom()}
					
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
				{$unite->getAattaquecetour()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="aattaquecetour" id="aattaquecetour" value="{$unite->getaattaquecetour()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				sestdeplacecetour
			</td>
			<td align="center">
				{$unite->getSestdeplacecetour()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="sestdeplacecetour" id="sestdeplacecetour" value="{$unite->getsestdeplacecetour()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				achargecetour
			</td>
			<td align="center">
				{$unite->getAchargecetour()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="achargecetour" id="achargecetour" value="{$unite->getachargecetour()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				tile
			</td>
			<td align="center">
				{$unite->getTile()}
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
				{$unite->getPdv()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="pdv" id="pdv" value="{$unite->getpdv()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ingame
			</td>
			<td align="center">
				{$unite->getIngame()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ingame" id="ingame" value="{$unite->getingame()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$unite->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$unite->getempty()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				aListeActions
			</td>
			<td align="center">
				{$unite->getAListeActions()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="alisteactions" id="alisteactions" value="{$unite->getaListeActions()}"/>				</td>
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


