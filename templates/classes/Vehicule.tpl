{*
	Template auto genere pour la classe Vehicule
	AUTO-GENERATED FILE on 23/02/2017 14:21:09
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="vehicule"/>
	{/if}

	<table>
	<caption>{$vehicule->getNom()} (identifiant {$vehicule->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$vehicule->getChemin()}" alt="{$vehicule->getNom()}"/>
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
				vehiculeId
			</td>
			<td align="center">
				{$vehicule->getVehiculeId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="vehiculeid" id="vehiculeid" value="{$vehicule->getvehiculeId()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oVehiculeId
			</td>
			<td align="center">
				{if ($vehicule->getVehiculeId() > 0)}
					{$vehicule->getVehiculeIdObject()->getNom()}
					
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
				vehiculeNom
			</td>
			<td align="center">
				{$vehicule->getVehiculeNom()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="vehiculenom" id="vehiculenom" value="{$vehicule->getvehiculeNom()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oVehiculeNom
			</td>
			<td align="center">
				{if ($vehicule->getVehiculeNom() > 0)}
					{$vehicule->getVehiculeNomObject()->getNom()}
					
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
				vehiculeDesc
			</td>
			<td align="center">
				{$vehicule->getVehiculeDesc()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="vehiculedesc" id="vehiculedesc" value="{$vehicule->getvehiculeDesc()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oVehiculeDesc
			</td>
			<td align="center">
				{if ($vehicule->getVehiculeDesc() > 0)}
					{$vehicule->getVehiculeDescObject()->getNom()}
					
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
				vehiculeType
			</td>
			<td align="center">
				{$vehicule->getVehiculeType()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="vehiculetype" id="vehiculetype" value="{$vehicule->getvehiculeType()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oVehiculeType
			</td>
			<td align="center">
				{if ($vehicule->getVehiculeType() > 0)}
					{$vehicule->getVehiculeTypeObject()->getNom()}
					
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
				vehiculeVie
			</td>
			<td align="center">
				{$vehicule->getVehiculeVie()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="vehiculevie" id="vehiculevie" value="{$vehicule->getvehiculeVie()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oVehiculeVie
			</td>
			<td align="center">
				{if ($vehicule->getVehiculeVie() > 0)}
					{$vehicule->getVehiculeVieObject()->getNom()}
					
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
				vehiculeAttaque
			</td>
			<td align="center">
				{$vehicule->getVehiculeAttaque()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="vehiculeattaque" id="vehiculeattaque" value="{$vehicule->getvehiculeAttaque()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oVehiculeAttaque
			</td>
			<td align="center">
				{if ($vehicule->getVehiculeAttaque() > 0)}
					{$vehicule->getVehiculeAttaqueObject()->getNom()}
					
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
				vehiculeDefense
			</td>
			<td align="center">
				{$vehicule->getVehiculeDefense()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="vehiculedefense" id="vehiculedefense" value="{$vehicule->getvehiculeDefense()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oVehiculeDefense
			</td>
			<td align="center">
				{if ($vehicule->getVehiculeDefense() > 0)}
					{$vehicule->getVehiculeDefenseObject()->getNom()}
					
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
				vehiculeDeplacement
			</td>
			<td align="center">
				{$vehicule->getVehiculeDeplacement()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="vehiculedeplacement" id="vehiculedeplacement" value="{$vehicule->getvehiculeDeplacement()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oVehiculeDeplacement
			</td>
			<td align="center">
				{if ($vehicule->getVehiculeDeplacement() > 0)}
					{$vehicule->getVehiculeDeplacementObject()->getNom()}
					
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
				{$vehicule->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$vehicule->getempty()}"/>				</td>
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


