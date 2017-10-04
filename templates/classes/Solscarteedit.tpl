{*
	Template auto genere pour la classe Solscarteedit
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="solscarteedit"/>
	{/if}

	<table>
	<caption>{$solscarteedit->getNom()} (identifiant {$solscarteedit->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$solscarteedit->getChemin()}" alt="{$solscarteedit->getNom()}"/>
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
				{$solscarteedit->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$solscarteedit->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				carte
			</td>
			<td align="center">
				{$solscarteedit->getCarte()}
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
				{if ($solscarteedit->getCarte() > 0)}
					{$solscarteedit->getCarteObject()->getNom()}
					
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
				sol
			</td>
			<td align="center">
				{$solscarteedit->getSol()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeSol))}
						<select id="listesol" name="sol" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Sol</option>
							{foreach from=$listeSol item=sol}
								<option value="{$sol->getId()}">{$sol->getNom()} ({$sol->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oSol
			</td>
			<td align="center">
				{if ($solscarteedit->getSol() > 0)}
					{$solscarteedit->getSolObject()->getNom()}
					
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
				{$solscarteedit->getX()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="x" id="x" value="{$solscarteedit->getx()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				y
			</td>
			<td align="center">
				{$solscarteedit->getY()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="y" id="y" value="{$solscarteedit->gety()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$solscarteedit->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$solscarteedit->getempty()}"/>				</td>
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


