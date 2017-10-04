{*
	Template auto genere pour la classe Partie
	AUTO-GENERATED FILE on 12/05/2017 15:42:37
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="partie"/>
	{/if}

	<table>
	<caption>{$partie->getNom()} (identifiant {$partie->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$partie->getChemin()}" alt="{$partie->getNom()}"/>
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
				{$partie->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$partie->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nom
			</td>
			<td align="center">
				{$partie->getNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nom" id="nom" value="{$partie->getnom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				carte
			</td>
			<td align="center">
				{$partie->getCarte()}
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
				{if ($partie->getCarte() > 0)}
					{$partie->getCarteObject()->getNom()}
					
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
				date_creation
			</td>
			<td align="center">
				{$partie->getDate_creation()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_creation" id="date_creation" value="{$partie->getdate_creation()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_fin
			</td>
			<td align="center">
				{$partie->getDate_fin()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_fin" id="date_fin" value="{$partie->getdate_fin()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ia
			</td>
			<td align="center">
				{$partie->getIa()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ia" id="ia" value="{$partie->getia()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$partie->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$partie->getempty()}"/>				</td>
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


