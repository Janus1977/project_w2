{*
	Template auto genere pour la classe Oldcarte
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="oldcarte"/>
	{/if}

	<table>
	<caption>{$oldcarte->getNom()} (identifiant {$oldcarte->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$oldcarte->getChemin()}" alt="{$oldcarte->getNom()}"/>
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
				id_carte
			</td>
			<td align="center">
				{$oldcarte->getId_carte()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id_carte" id="id_carte" value="{$oldcarte->getid_carte()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oId_carte
			</td>
			<td align="center">
				{if ($oldcarte->getId_carte() > 0)}
					{$oldcarte->getId_carteObject()->getNom()}
					
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
				{$oldcarte->getX()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="x" id="x" value="{$oldcarte->getx()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				y
			</td>
			<td align="center">
				{$oldcarte->getY()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="y" id="y" value="{$oldcarte->gety()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				vision
			</td>
			<td align="center">
				{$oldcarte->getVision()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="vision" id="vision" value="{$oldcarte->getvision()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				terrain
			</td>
			<td align="center">
				{$oldcarte->getTerrain()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeTerrain))}
						<select id="listeterrain" name="terrain" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Terrain</option>
							{foreach from=$listeTerrain item=terrain}
								<option value="{$terrain->getId()}">{$terrain->getNom()} ({$terrain->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oTerrain
			</td>
			<td align="center">
				{if ($oldcarte->getTerrain() > 0)}
					{$oldcarte->getTerrainObject()->getNom()}
					
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
				{$oldcarte->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$oldcarte->getempty()}"/>				</td>
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


