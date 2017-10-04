{*
	Template auto genere pour la classe Equipement_joueur
	AUTO-GENERATED FILE on 03/04/2017 15:27:43
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="equipement_joueur"/>
	{/if}

	<table>
	<caption>{$equipement_joueur->getNom()} (identifiant {$equipement_joueur->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$equipement_joueur->getChemin()}" alt="{$equipement_joueur->getNom()}"/>
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
				{$equipement_joueur->getMembre()}
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
				{if ($equipement_joueur->getMembre() > 0)}
					{$equipement_joueur->getMembreObject()->getPseudo()}
					
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
				{$equipement_joueur->getUnite_joueur()}
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
				{if ($equipement_joueur->getUnite_joueur() > 0)}
					{$equipement_joueur->getUnite_joueurObject()->getNom()}
					
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
				{$equipement_joueur->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$equipement_joueur->getempty()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				id
			</td>
			<td align="center">
				{$equipement_joueur->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$equipement_joueur->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nom
			</td>
			<td align="center">
				{$equipement_joueur->getNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nom" id="nom" value="{$equipement_joueur->getnom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				description
			</td>
			<td align="center">
				{$equipement_joueur->getDescription()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<textarea cols="20" rows="5" name="description" id="description">{$equipement_joueur->getdescription()}</textarea>
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				categorie
			</td>
			<td align="center">
				{$equipement_joueur->getCategorie()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeCategorie))}
						<select id="listecategorie" name="categorie" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Categorie</option>
							{foreach from=$listeCategorie item=categorie}
								<option value="{$categorie->getId()}">{$categorie->getNom()} ({$categorie->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oCategorie
			</td>
			<td align="center">
				{if ($equipement_joueur->getCategorie() > 0)}
					{$equipement_joueur->getCategorieObject()->getNom()}
					
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
				cp
			</td>
			<td align="center">
				{$equipement_joueur->getCp()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="cp" id="cp" value="{$equipement_joueur->getcp()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				lp
			</td>
			<td align="center">
				{$equipement_joueur->getLp()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="lp" id="lp" value="{$equipement_joueur->getlp()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				mtcp
			</td>
			<td align="center">
				{$equipement_joueur->getMtcp()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="mtcp" id="mtcp" value="{$equipement_joueur->getmtcp()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				mtlp
			</td>
			<td align="center">
				{$equipement_joueur->getMtlp()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="mtlp" id="mtlp" value="{$equipement_joueur->getmtlp()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				dommage
			</td>
			<td align="center">
				{$equipement_joueur->getDommage()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="dommage" id="dommage" value="{$equipement_joueur->getdommage()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				msvg
			</td>
			<td align="center">
				{$equipement_joueur->getMsvg()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="msvg" id="msvg" value="{$equipement_joueur->getmsvg()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				gabarit
			</td>
			<td align="center">
				{$equipement_joueur->getGabarit()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeGabarit))}
						<select id="listegabarit" name="gabarit" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Gabarit</option>
							{foreach from=$listeGabarit item=gabarit}
								<option value="{$gabarit->getId()}">{$gabarit->getNom()} ({$gabarit->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oGabarit
			</td>
			<td align="center">
				{if ($equipement_joueur->getGabarit() > 0)}
					{$equipement_joueur->getGabaritObject()->getNom()}
					
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
				{$equipement_joueur->getType()}
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
				{if ($equipement_joueur->getType() > 0)}
					{$equipement_joueur->getTypeObject()->getNom()}
					
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
				fo
			</td>
			<td align="center">
				{$equipement_joueur->getFo()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fo" id="fo" value="{$equipement_joueur->getfo()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				sauvegarde
			</td>
			<td align="center">
				{$equipement_joueur->getSauvegarde()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="sauvegarde" id="sauvegarde" value="{$equipement_joueur->getsauvegarde()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				mmvt
			</td>
			<td align="center">
				{$equipement_joueur->getMmvt()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="mmvt" id="mmvt" value="{$equipement_joueur->getmmvt()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				encombrement
			</td>
			<td align="center">
				{$equipement_joueur->getEncombrement()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="encombrement" id="encombrement" value="{$equipement_joueur->getencombrement()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				deux_mains
			</td>
			<td align="center">
				{$equipement_joueur->getDeux_mains()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="deux_mains" id="deux_mains" value="{$equipement_joueur->getdeux_mains()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				cout
			</td>
			<td align="center">
				{$equipement_joueur->getCout()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="cout" id="cout" value="{$equipement_joueur->getcout()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_creation
			</td>
			<td align="center">
				{$equipement_joueur->getDate_creation()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_creation" id="date_creation" value="{$equipement_joueur->getdate_creation()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				chemin
			</td>
			<td align="center">
				{$equipement_joueur->getChemin()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="chemin" id="chemin" value="{$equipement_joueur->getchemin()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				tile
			</td>
			<td align="center">
				{$equipement_joueur->getTile()}
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
				usure
			</td>
			<td align="center">
				{$equipement_joueur->getUsure()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="usure" id="usure" value="{$equipement_joueur->getusure()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				demontable
			</td>
			<td align="center">
				{$equipement_joueur->getDemontable()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="demontable" id="demontable" value="{$equipement_joueur->getdemontable()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_fin_reparation
			</td>
			<td align="center">
				{$equipement_joueur->getDate_fin_reparation()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_fin_reparation" id="date_fin_reparation" value="{$equipement_joueur->getdate_fin_reparation()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ingame
			</td>
			<td align="center">
				{$equipement_joueur->getIngame()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ingame" id="ingame" value="{$equipement_joueur->getingame()}"/>				</td>
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


