{*
	Template auto genere pour la classe Technologie
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="technologie"/>
	{/if}

	<table>
	<caption>{$technologie->getNom()} (identifiant {$technologie->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$technologie->getChemin()}" alt="{$technologie->getNom()}"/>
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
				technologieId
			</td>
			<td align="center">
				{$technologie->getTechnologieId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="technologieid" id="technologieid" value="{$technologie->gettechnologieId()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oTechnologieId
			</td>
			<td align="center">
				{if ($technologie->getTechnologieId() > 0)}
					{$technologie->getTechnologieIdObject()->getNom()}
					
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
				technologieNom
			</td>
			<td align="center">
				{$technologie->getTechnologieNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="technologienom" id="technologienom" value="{$technologie->gettechnologieNom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oTechnologieNom
			</td>
			<td align="center">
				{if ($technologie->getTechnologieNom() > 0)}
					{$technologie->getTechnologieNomObject()->getNom()}
					
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
				technologieDesc
			</td>
			<td align="center">
				{$technologie->getTechnologieDesc()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="technologiedesc" id="technologiedesc" value="{$technologie->gettechnologieDesc()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oTechnologieDesc
			</td>
			<td align="center">
				{if ($technologie->getTechnologieDesc() > 0)}
					{$technologie->getTechnologieDescObject()->getNom()}
					
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
				{$technologie->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$technologie->getempty()}"/>				</td>
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


