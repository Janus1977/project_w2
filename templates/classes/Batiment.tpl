{*
	Template auto genere pour la classe Batiment
	AUTO-GENERATED FILE on 23/02/2017 14:21:07
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="batiment"/>
	{/if}

	<table>
	<caption>{$batiment->getNom()} (identifiant {$batiment->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$batiment->getChemin()}" alt="{$batiment->getNom()}"/>
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
				batimentId
			</td>
			<td align="center">
				{$batiment->getBatimentId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="batimentid" id="batimentid" value="{$batiment->getbatimentId()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oBatimentId
			</td>
			<td align="center">
				{if ($batiment->getBatimentId() > 0)}
					{$batiment->getBatimentIdObject()->getNom()}
					
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
				batimentNom
			</td>
			<td align="center">
				{$batiment->getBatimentNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="batimentnom" id="batimentnom" value="{$batiment->getbatimentNom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oBatimentNom
			</td>
			<td align="center">
				{if ($batiment->getBatimentNom() > 0)}
					{$batiment->getBatimentNomObject()->getNom()}
					
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
				batimentDesc
			</td>
			<td align="center">
				{$batiment->getBatimentDesc()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="batimentdesc" id="batimentdesc" value="{$batiment->getbatimentDesc()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oBatimentDesc
			</td>
			<td align="center">
				{if ($batiment->getBatimentDesc() > 0)}
					{$batiment->getBatimentDescObject()->getNom()}
					
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
				batimentVie
			</td>
			<td align="center">
				{$batiment->getBatimentVie()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="batimentvie" id="batimentvie" value="{$batiment->getbatimentVie()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oBatimentVie
			</td>
			<td align="center">
				{if ($batiment->getBatimentVie() > 0)}
					{$batiment->getBatimentVieObject()->getNom()}
					
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
				batimentDefense
			</td>
			<td align="center">
				{$batiment->getBatimentDefense()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="batimentdefense" id="batimentdefense" value="{$batiment->getbatimentDefense()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oBatimentDefense
			</td>
			<td align="center">
				{if ($batiment->getBatimentDefense() > 0)}
					{$batiment->getBatimentDefenseObject()->getNom()}
					
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
				batimentBouclier
			</td>
			<td align="center">
				{$batiment->getBatimentBouclier()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="batimentbouclier" id="batimentbouclier" value="{$batiment->getbatimentBouclier()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oBatimentBouclier
			</td>
			<td align="center">
				{if ($batiment->getBatimentBouclier() > 0)}
					{$batiment->getBatimentBouclierObject()->getNom()}
					
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
				production
			</td>
			<td align="center">
				{$batiment->getProduction()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="production" id="production" value="{$batiment->getproduction()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$batiment->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$batiment->getempty()}"/>				</td>
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


