{*
	Template auto genere pour la classe Tile
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="tile"/>
	{/if}

	<table>
	<caption>{$tile->getNom()} (identifiant {$tile->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$tile->getChemin()}" alt="{$tile->getNom()}"/>
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
				{$tile->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$tile->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				carte
			</td>
			<td align="center">
				{$tile->getCarte()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeCarte))}
						<select id="listecarte" name="carte" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Carte</option>
							{foreach from=$listeCarte item=carte}
								<option value="{$carte->getId()}">{$carte->getNom()} ({$carte->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oCarte
			</td>
			<td align="center">
				{if ($tile->getCarte() > 0)}
					{$tile->getCarteObject()->getNom()}
					
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
				x
			</td>
			<td align="center">
				{$tile->getX()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="x" id="x" value="{$tile->getx()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				y
			</td>
			<td align="center">
				{$tile->getY()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="y" id="y" value="{$tile->gety()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				vision
			</td>
			<td align="center">
				{$tile->getVision()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="vision" id="vision" value="{$tile->getvision()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				unite
			</td>
			<td align="center">
				{$tile->getUnite()}
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
				{if ($tile->getUnite() > 0)}
					{$tile->getUniteObject()->getNom()}
					
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
				{$tile->getUnite_joueur()}
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
				{if ($tile->getUnite_joueur() > 0)}
					{$tile->getUnite_joueurObject()->getNom()}
					
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
				decor
			</td>
			<td align="center">
				{$tile->getDecor()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeDecor))}
						<select id="listedecor" name="decor" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Decor</option>
							{foreach from=$listeDecor item=decor}
								<option value="{$decor->getId()}">{$decor->getNom()} ({$decor->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oDecor
			</td>
			<td align="center">
				{if ($tile->getDecor() > 0)}
					{$tile->getDecorObject()->getNom()}
					
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
				{$tile->getEquipement()}
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
				{if ($tile->getEquipement() > 0)}
					{$tile->getEquipementObject()->getNom()}
					
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
				{$tile->getEquipement_joueur()}
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
				{if ($tile->getEquipement_joueur() > 0)}
					{$tile->getEquipement_joueurObject()->getNom()}
					
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
				etatCase
			</td>
			<td align="center">
				{$tile->getEtatCase()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="etatcase" id="etatcase" value="{$tile->getetatCase()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				bloque
			</td>
			<td align="center">
				{$tile->getBloque()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="bloque" id="bloque" value="{$tile->getbloque()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				tile
			</td>
			<td align="center">
				{$tile->getTile()}
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
				empty
			</td>
			<td align="center">
				{$tile->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$tile->getempty()}"/>				</td>
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


