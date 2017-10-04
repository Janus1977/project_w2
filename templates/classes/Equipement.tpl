{*
	Template auto genere pour la classe Equipement
	AUTO-GENERATED FILE on 03/04/2017 15:27:38
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="equipement"/>
	{/if}

	<table>
	<caption>{$equipement->getNom()} (identifiant {$equipement->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$equipement->getChemin()}" alt="{$equipement->getNom()}"/>
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
				{$equipement->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$equipement->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nom
			</td>
			<td align="center">
				{$equipement->getNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nom" id="nom" value="{$equipement->getnom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				description
			</td>
			<td align="center">
				{$equipement->getDescription()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<textarea cols="20" rows="5" name="description" id="description">{$equipement->getdescription()}</textarea>
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				categorie
			</td>
			<td align="center">
				{$equipement->getCategorie()}
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
				{if ($equipement->getCategorie() > 0)}
					{$equipement->getCategorieObject()->getNom()}
					
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
				{$equipement->getCp()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="cp" id="cp" value="{$equipement->getcp()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				lp
			</td>
			<td align="center">
				{$equipement->getLp()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="lp" id="lp" value="{$equipement->getlp()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				mtcp
			</td>
			<td align="center">
				{$equipement->getMtcp()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="mtcp" id="mtcp" value="{$equipement->getmtcp()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				mtlp
			</td>
			<td align="center">
				{$equipement->getMtlp()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="mtlp" id="mtlp" value="{$equipement->getmtlp()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				dommage
			</td>
			<td align="center">
				{$equipement->getDommage()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="dommage" id="dommage" value="{$equipement->getdommage()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				msvg
			</td>
			<td align="center">
				{$equipement->getMsvg()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="msvg" id="msvg" value="{$equipement->getmsvg()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				gabarit
			</td>
			<td align="center">
				{$equipement->getGabarit()}
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
				{if ($equipement->getGabarit() > 0)}
					{$equipement->getGabaritObject()->getNom()}
					
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
				{$equipement->getType()}
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
				{if ($equipement->getType() > 0)}
					{$equipement->getTypeObject()->getNom()}
					
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
				{$equipement->getFo()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fo" id="fo" value="{$equipement->getfo()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				sauvegarde
			</td>
			<td align="center">
				{$equipement->getSauvegarde()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="sauvegarde" id="sauvegarde" value="{$equipement->getsauvegarde()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				mmvt
			</td>
			<td align="center">
				{$equipement->getMmvt()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="mmvt" id="mmvt" value="{$equipement->getmmvt()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				encombrement
			</td>
			<td align="center">
				{$equipement->getEncombrement()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="encombrement" id="encombrement" value="{$equipement->getencombrement()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				deux_mains
			</td>
			<td align="center">
				{$equipement->getDeux_mains()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="deux_mains" id="deux_mains" value="{$equipement->getdeux_mains()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				cout
			</td>
			<td align="center">
				{$equipement->getCout()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="cout" id="cout" value="{$equipement->getcout()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_creation
			</td>
			<td align="center">
				{$equipement->getDate_creation()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_creation" id="date_creation" value="{$equipement->getdate_creation()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				chemin
			</td>
			<td align="center">
				{$equipement->getChemin()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="chemin" id="chemin" value="{$equipement->getchemin()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				tile
			</td>
			<td align="center">
				{$equipement->getTile()}
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
				{$equipement->getUsure()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="usure" id="usure" value="{$equipement->getusure()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				demontable
			</td>
			<td align="center">
				{$equipement->getDemontable()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="demontable" id="demontable" value="{$equipement->getdemontable()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_fin_reparation
			</td>
			<td align="center">
				{$equipement->getDate_fin_reparation()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_fin_reparation" id="date_fin_reparation" value="{$equipement->getdate_fin_reparation()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ingame
			</td>
			<td align="center">
				{$equipement->getIngame()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ingame" id="ingame" value="{$equipement->getingame()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$equipement->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$equipement->getempty()}"/>				</td>
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


