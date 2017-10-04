{*
	Template auto genere pour la classe Panier
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formPanier" action="#" method="post" onSubmit="creePanier()">
	{/if}

	<table>
	<caption>{$panier->getNom()} (identifiant {$->getId()})</cpation>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$panier->getChemin()}" alt="{$panier->getNom()}"/>
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
				
			</td>
			<td align="center">
				{$panier->getId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$panier->getId()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				
			</td>
			<td align="center">
				{$panier->getIdclient()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="idclient" id="idclient" value="{$panier->getIdclient()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				
			</td>
			<td align="center">
				{$panier->getIccontenu()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="iccontenu" id="iccontenu" value="{$panier->getIccontenu()}"/>				</td>
			{/if}
		</tr>
	</table>
	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<input type="button" name="formSubmitButton" value="Envoyer" onclick="creePanier()"/>
		</form>
	{/if}


	{*
		Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
		Il sera preserve lors de la reconstruction automatique.
	 *}
	{*[TAG1]*}	{*[/TAG1]*}


