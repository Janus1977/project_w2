{*
	Template auto genere pour la classe Carteedit
	AUTO-GENERATED FILE on 23/02/2017 14:21:07
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="carteedit"/>
	{/if}

	<table>
	<caption>{$carteedit->getNom()} (identifiant {$carteedit->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$carteedit->getChemin()}" alt="{$carteedit->getNom()}"/>
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
				{$carteedit->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$carteedit->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nom
			</td>
			<td align="center">
				{$carteedit->getNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nom" id="nom" value="{$carteedit->getnom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nb_cases_x
			</td>
			<td align="center">
				{$carteedit->getNb_cases_x()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nb_cases_x" id="nb_cases_x" value="{$carteedit->getnb_cases_x()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nb_cases_y
			</td>
			<td align="center">
				{$carteedit->getNb_cases_y()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nb_cases_y" id="nb_cases_y" value="{$carteedit->getnb_cases_y()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$carteedit->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$carteedit->getempty()}"/>				</td>
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


