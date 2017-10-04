{*
	Template auto genere pour la classe Fantassins
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="fantassins"/>
	{/if}

	<table>
	<caption>{$fantassins->getNom()} (identifiant {$fantassins->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$fantassins->getChemin()}" alt="{$fantassins->getNom()}"/>
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
				fantassinId
			</td>
			<td align="center">
				{$fantassins->getFantassinId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassinid" id="fantassinid" value="{$fantassins->getfantassinId()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				fantassinNom
			</td>
			<td align="center">
				{$fantassins->getFantassinNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassinnom" id="fantassinnom" value="{$fantassins->getfantassinNom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				fantassinDesc
			</td>
			<td align="center">
				{$fantassins->getFantassinDesc()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassindesc" id="fantassindesc" value="{$fantassins->getfantassinDesc()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				fantassinType
			</td>
			<td align="center">
				{$fantassins->getFantassinType()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassintype" id="fantassintype" value="{$fantassins->getfantassinType()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oFantassinType
			</td>
			<td align="center">
				{if ($fantassins->getFantassinType() > 0)}
					{$fantassins->getFantassinTypeObject()->getNom()}
					
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
				fantassinVie
			</td>
			<td align="center">
				{$fantassins->getFantassinVie()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassinvie" id="fantassinvie" value="{$fantassins->getfantassinVie()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				fantassinAttaque
			</td>
			<td align="center">
				{$fantassins->getFantassinAttaque()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassinattaque" id="fantassinattaque" value="{$fantassins->getfantassinAttaque()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				fantassinDefense
			</td>
			<td align="center">
				{$fantassins->getFantassinDefense()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassindefense" id="fantassindefense" value="{$fantassins->getfantassinDefense()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				fantassinMouvement
			</td>
			<td align="center">
				{$fantassins->getFantassinMouvement()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="fantassinmouvement" id="fantassinmouvement" value="{$fantassins->getfantassinMouvement()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$fantassins->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$fantassins->getempty()}"/>				</td>
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


