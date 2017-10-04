{*
	Template auto genere pour la classe Armees
	AUTO-GENERATED FILE on 23/02/2017 14:21:07
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="armees"/>
	{/if}

	<table>
	<caption>{$armees->getNom()} (identifiant {$armees->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$armees->getChemin()}" alt="{$armees->getNom()}"/>
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
				{$armees->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$armees->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nom
			</td>
			<td align="center">
				{$armees->getNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nom" id="nom" value="{$armees->getnom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				description
			</td>
			<td align="center">
				{$armees->getDescription()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<textarea cols="20" rows="5" name="description" id="description">{$armees->getdescription()}</textarea>
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				idmembre
			</td>
			<td align="center">
				{$armees->getIdmembre()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="idmembre" id="idmembre" value="{$armees->getidmembre()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oIdmembre
			</td>
			<td align="center">
				{if ($armees->getIdmembre() > 0)}
					{$armees->getIdmembreObject()->getNom()}
					
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
				points
			</td>
			<td align="center">
				{$armees->getPoints()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="points" id="points" value="{$armees->getpoints()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_creation
			</td>
			<td align="center">
				{$armees->getDate_creation()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_creation" id="date_creation" value="{$armees->getdate_creation()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				date_modification
			</td>
			<td align="center">
				{$armees->getDate_modification()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="date_modification" id="date_modification" value="{$armees->getdate_modification()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$armees->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$armees->getempty()}"/>				</td>
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


