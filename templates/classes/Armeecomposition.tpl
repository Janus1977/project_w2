{*
	Template auto genere pour la classe Armeecomposition
	AUTO-GENERATED FILE on 23/02/2017 14:21:07
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="armeecomposition"/>
	{/if}

	<table>
	<caption>{$armeecomposition->getNom()} (identifiant {$armeecomposition->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$armeecomposition->getChemin()}" alt="{$armeecomposition->getNom()}"/>
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
				{$armeecomposition->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$armeecomposition->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				armee
			</td>
			<td align="center">
				{$armeecomposition->getArmee()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeArmee))}
						<select id="listearmee" name="armee" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Armee</option>
							{foreach from=$listeArmee item=armee}
								<option value="{$armee->getId()}">{$armee->getNom()} ({$armee->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oArmee
			</td>
			<td align="center">
				{if ($armeecomposition->getArmee() > 0)}
					{$armeecomposition->getArmeeObject()->getNom()}
					
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
				troupe
			</td>
			<td align="center">
				{$armeecomposition->getTroupe()}
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
				{if ($armeecomposition->getTroupe() > 0)}
					{$armeecomposition->getTroupeObject()->getNom()}
					
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
				{$armeecomposition->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$armeecomposition->getempty()}"/>				</td>
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


