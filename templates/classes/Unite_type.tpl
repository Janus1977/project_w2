{*
	Template auto genere pour la classe Unite_type
	AUTO-GENERATED FILE on 23/02/2017 14:21:09
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="unite_type"/>
	{/if}

	<table>
	<caption>{$unite_type->getNom()} (identifiant {$unite_type->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$unite_type->getChemin()}" alt="{$unite_type->getNom()}"/>
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
				empty
			</td>
			<td align="center">
				{$unite_type->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$unite_type->getempty()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				id
			</td>
			<td align="center">
				{$unite_type->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$unite_type->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nom
			</td>
			<td align="center">
				{$unite_type->getNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nom" id="nom" value="{$unite_type->getnom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				description
			</td>
			<td align="center">
				{$unite_type->getDescription()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<textarea cols="20" rows="5" name="description" id="description">{$unite_type->getdescription()}</textarea>
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_av
			</td>
			<td align="center">
				{$unite_type->getDef_av()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_av" id="def_av" value="{$unite_type->getdef_av()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_ar
			</td>
			<td align="center">
				{$unite_type->getDef_ar()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_ar" id="def_ar" value="{$unite_type->getdef_ar()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_g
			</td>
			<td align="center">
				{$unite_type->getDef_g()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_g" id="def_g" value="{$unite_type->getdef_g()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				def_d
			</td>
			<td align="center">
				{$unite_type->getDef_d()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="def_d" id="def_d" value="{$unite_type->getdef_d()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				mouvement
			</td>
			<td align="center">
				{$unite_type->getMouvement()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="mouvement" id="mouvement" value="{$unite_type->getmouvement()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				capacite
			</td>
			<td align="center">
				{$unite_type->getCapacite()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="capacite" id="capacite" value="{$unite_type->getcapacite()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				pilote
			</td>
			<td align="center">
				{$unite_type->getPilote()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="pilote" id="pilote" value="{$unite_type->getpilote()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				co_pilote
			</td>
			<td align="center">
				{$unite_type->getCo_pilote()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="co_pilote" id="co_pilote" value="{$unite_type->getco_pilote()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				experience
			</td>
			<td align="center">
				{$unite_type->getExperience()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="experience" id="experience" value="{$unite_type->getexperience()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				equipementarmegauche
			</td>
			<td align="center">
				{$unite_type->getEquipementarmegauche()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementarmegauche" id="equipementarmegauche" value="{$unite_type->getequipementarmegauche()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementarmegauche
			</td>
			<td align="center">
				{if ($unite_type->getEquipementarmegauche() > 0)}
					{$unite_type->getEquipementarmegaucheObject()->getNom()}
					
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
				{$unite_type->getEquipementarmedroite()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementarmedroite" id="equipementarmedroite" value="{$unite_type->getequipementarmedroite()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementarmedroite
			</td>
			<td align="center">
				{if ($unite_type->getEquipementarmedroite() > 0)}
					{$unite_type->getEquipementarmedroiteObject()->getNom()}
					
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
				{$unite_type->getEquipementarmure()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementarmure" id="equipementarmure" value="{$unite_type->getequipementarmure()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementarmure
			</td>
			<td align="center">
				{if ($unite_type->getEquipementarmure() > 0)}
					{$unite_type->getEquipementarmureObject()->getNom()}
					
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
				{$unite_type->getEquipementcoiffe()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementcoiffe" id="equipementcoiffe" value="{$unite_type->getequipementcoiffe()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementcoiffe
			</td>
			<td align="center">
				{if ($unite_type->getEquipementcoiffe() > 0)}
					{$unite_type->getEquipementcoiffeObject()->getNom()}
					
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
				{$unite_type->getEquipementetendart()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="equipementetendart" id="equipementetendart" value="{$unite_type->getequipementetendart()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oEquipementetendart
			</td>
			<td align="center">
				{if ($unite_type->getEquipementetendart() > 0)}
					{$unite_type->getEquipementetendartObject()->getNom()}
					
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
				{$unite_type->getToucher()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="toucher" id="toucher" value="{$unite_type->gettoucher()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				initiative
			</td>
			<td align="center">
				{$unite_type->getInitiative()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="initiative" id="initiative" value="{$unite_type->getinitiative()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				sauvegarde
			</td>
			<td align="center">
				{$unite_type->getSauvegarde()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="sauvegarde" id="sauvegarde" value="{$unite_type->getsauvegarde()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				endurance
			</td>
			<td align="center">
				{$unite_type->getEndurance()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="endurance" id="endurance" value="{$unite_type->getendurance()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				cac
			</td>
			<td align="center">
				{$unite_type->getCac()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="cac" id="cac" value="{$unite_type->getcac()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				fo
			</td>
			<td align="center">
				{$unite_type->getFo()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fo" id="fo" value="{$unite_type->getfo()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				attaque
			</td>
			<td align="center">
				{$unite_type->getAttaque()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="attaque" id="attaque" value="{$unite_type->getattaque()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				intell
			</td>
			<td align="center">
				{$unite_type->getIntell()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="intell" id="intell" value="{$unite_type->getintell()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ty
			</td>
			<td align="center">
				{$unite_type->getTy()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ty" id="ty" value="{$unite_type->getty()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				camp
			</td>
			<td align="center">
				{$unite_type->getCamp()}
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
				{if ($unite_type->getCamp() > 0)}
					{$unite_type->getCampObject()->getNom()}
					
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
				{$unite_type->getCout()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="cout" id="cout" value="{$unite_type->getcout()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_creation
			</td>
			<td align="center">
				{$unite_type->getDate_creation()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_creation" id="date_creation" value="{$unite_type->getdate_creation()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				chemin
			</td>
			<td align="center">
				{$unite_type->getChemin()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="chemin" id="chemin" value="{$unite_type->getchemin()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				dimension
			</td>
			<td align="center">
				{$unite_type->getDimension()}
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
				{if ($unite_type->getDimension() > 0)}
					{$unite_type->getDimensionObject()->getNom()}
					
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
				{$unite_type->getAattaquecetour()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="aattaquecetour" id="aattaquecetour" value="{$unite_type->getaattaquecetour()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				sestdeplacecetour
			</td>
			<td align="center">
				{$unite_type->getSestdeplacecetour()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="sestdeplacecetour" id="sestdeplacecetour" value="{$unite_type->getsestdeplacecetour()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				achargecetour
			</td>
			<td align="center">
				{$unite_type->getAchargecetour()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="achargecetour" id="achargecetour" value="{$unite_type->getachargecetour()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				tile
			</td>
			<td align="center">
				{$unite_type->getTile()}
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
				{$unite_type->getPdv()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="pdv" id="pdv" value="{$unite_type->getpdv()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ingame
			</td>
			<td align="center">
				{$unite_type->getIngame()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ingame" id="ingame" value="{$unite_type->getingame()}"/>				</td>
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


