{*
	Template auto genere pour la classe Journal
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="journal"/>
	{/if}

	<table>
	<caption>{$journal->getNom()} (identifiant {$journal->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$journal->getChemin()}" alt="{$journal->getNom()}"/>
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
				{$journal->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$journal->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				idmembre1
			</td>
			<td align="center">
				{$journal->getIdmembre1()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="idmembre1" id="idmembre1" value="{$journal->getidmembre1()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oIdmembre1
			</td>
			<td align="center">
				{if ($journal->getIdmembre1() > 0)}
					{$journal->getIdmembre1Object()->getNom()}
					
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
				action
			</td>
			<td align="center">
				{$journal->getAction()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="action" id="action" value="{$journal->getaction()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				idmembre2
			</td>
			<td align="center">
				{$journal->getIdmembre2()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="idmembre2" id="idmembre2" value="{$journal->getidmembre2()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oIdmembre2
			</td>
			<td align="center">
				{if ($journal->getIdmembre2() > 0)}
					{$journal->getIdmembre2Object()->getNom()}
					
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
				date_heure
			</td>
			<td align="center">
				{$journal->getDate_heure()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_heure" id="date_heure" value="{$journal->getdate_heure()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$journal->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$journal->getempty()}"/>				</td>
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


