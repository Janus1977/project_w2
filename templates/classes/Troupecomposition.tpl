{*
	Template auto genere pour la classe Troupecomposition
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="troupecomposition"/>
	{/if}

	<table>
	<caption>{$troupecomposition->getNom()} (identifiant {$troupecomposition->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$troupecomposition->getChemin()}" alt="{$troupecomposition->getNom()}"/>
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
				{$troupecomposition->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$troupecomposition->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				troupe
			</td>
			<td align="center">
				{$troupecomposition->getTroupe()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeTroupe))}
						<select id="listetroupe" name="troupe" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Troupe</option>
							{foreach from=$listeTroupe item=troupe}
								<option value="{$troupe->getId()}">{$troupe->getNom()} ({$troupe->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oTroupe
			</td>
			<td align="center">
				{if ($troupecomposition->getTroupe() > 0)}
					{$troupecomposition->getTroupeObject()->getNom()}
					
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
				{$troupecomposition->getUnite_joueur()}
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
				{if ($troupecomposition->getUnite_joueur() > 0)}
					{$troupecomposition->getUnite_joueurObject()->getNom()}
					
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
				hero
			</td>
			<td align="center">
				{$troupecomposition->getHero()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeHero))}
						<select id="listehero" name="hero" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Hero</option>
							{foreach from=$listeHero item=hero}
								<option value="{$hero->getId()}">{$hero->getNom()} ({$hero->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oHero
			</td>
			<td align="center">
				{if ($troupecomposition->getHero() > 0)}
					{$troupecomposition->getHeroObject()->getNom()}
					
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
				heros
			</td>
			<td align="center">
				{$troupecomposition->getHeros()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="heros" id="heros" value="{$troupecomposition->getheros()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oHeros
			</td>
			<td align="center">
				{if ($troupecomposition->getHeros() > 0)}
					{$troupecomposition->getHerosObject()->getNom()}
					
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
				{$troupecomposition->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$troupecomposition->getempty()}"/>				</td>
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


