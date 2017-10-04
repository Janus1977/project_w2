{*
	Template auto genere pour la classe Listetableschamps
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="listetableschamps"/>
	{/if}

	<table>
	<caption>{$listetableschamps->getNom()} (identifiant {$listetableschamps->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$listetableschamps->getChemin()}" alt="{$listetableschamps->getNom()}"/>
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
				{$listetableschamps->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$listetableschamps->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nomTable
			</td>
			<td align="center">
				{$listetableschamps->getNomTable()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nomtable" id="nomtable" value="{$listetableschamps->getnomTable()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nomChamp
			</td>
			<td align="center">
				{$listetableschamps->getNomChamp()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nomchamp" id="nomchamp" value="{$listetableschamps->getnomChamp()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nomUsuel
			</td>
			<td align="center">
				{$listetableschamps->getNomUsuel()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nomusuel" id="nomusuel" value="{$listetableschamps->getnomUsuel()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$listetableschamps->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$listetableschamps->getempty()}"/>				</td>
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


