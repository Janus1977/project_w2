{*
	Template auto genere pour la classe Gabarit
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="gabarit"/>
	{/if}

	<table>
	<caption>{$gabarit->getNom()} (identifiant {$gabarit->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$gabarit->getChemin()}" alt="{$gabarit->getNom()}"/>
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
				{$gabarit->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$gabarit->getid()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				nom
			</td>
			<td align="center">
				{$gabarit->getNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="nom" id="nom" value="{$gabarit->getnom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				x_depart
			</td>
			<td align="center">
				{$gabarit->getX_depart()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="x_depart" id="x_depart" value="{$gabarit->getx_depart()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				y_depart
			</td>
			<td align="center">
				{$gabarit->getY_depart()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="y_depart" id="y_depart" value="{$gabarit->gety_depart()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				x_arrivee
			</td>
			<td align="center">
				{$gabarit->getX_arrivee()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="x_arrivee" id="x_arrivee" value="{$gabarit->getx_arrivee()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				y_arrivee
			</td>
			<td align="center">
				{$gabarit->getY_arrivee()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="y_arrivee" id="y_arrivee" value="{$gabarit->gety_arrivee()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				taille
			</td>
			<td align="center">
				{$gabarit->getTaille()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="taille" id="taille" value="{$gabarit->gettaille()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$gabarit->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$gabarit->getempty()}"/>				</td>
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


