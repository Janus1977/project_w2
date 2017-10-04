{*
	Template auto genere pour la classe Joueur
	AUTO-GENERATED FILE on 23/02/2017 14:21:08
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="joueur"/>
	{/if}

	<table>
	<caption>{$joueur->getNom()} (identifiant {$joueur->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$joueur->getChemin()}" alt="{$joueur->getNom()}"/>
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
				joueurId
			</td>
			<td align="center">
				{$joueur->getJoueurId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="joueurid" id="joueurid" value="{$joueur->getjoueurId()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oJoueurId
			</td>
			<td align="center">
				{if ($joueur->getJoueurId() > 0)}
					{$joueur->getJoueurIdObject()->getNom()}
					
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
				joueurPseudo
			</td>
			<td align="center">
				{$joueur->getJoueurPseudo()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="joueurpseudo" id="joueurpseudo" value="{$joueur->getjoueurPseudo()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oJoueurPseudo
			</td>
			<td align="center">
				{if ($joueur->getJoueurPseudo() > 0)}
					{$joueur->getJoueurPseudoObject()->getNom()}
					
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
				joueurPwd
			</td>
			<td align="center">
				{$joueur->getJoueurPwd()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="joueurpwd" id="joueurpwd" value="{$joueur->getjoueurPwd()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oJoueurPwd
			</td>
			<td align="center">
				{if ($joueur->getJoueurPwd() > 0)}
					{$joueur->getJoueurPwdObject()->getNom()}
					
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
				joueurMail
			</td>
			<td align="center">
				{$joueur->getJoueurMail()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="joueurmail" id="joueurmail" value="{$joueur->getjoueurMail()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oJoueurMail
			</td>
			<td align="center">
				{if ($joueur->getJoueurMail() > 0)}
					{$joueur->getJoueurMailObject()->getNom()}
					
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
				privilegeId
			</td>
			<td align="center">
				{$joueur->getPrivilegeId()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="privilegeid" id="privilegeid" value="{$joueur->getprivilegeId()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oPrivilegeId
			</td>
			<td align="center">
				{if ($joueur->getPrivilegeId() > 0)}
					{$joueur->getPrivilegeIdObject()->getNom()}
					
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
				joueurXPos
			</td>
			<td align="center">
				{$joueur->getJoueurXPos()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="joueurxpos" id="joueurxpos" value="{$joueur->getjoueurXPos()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oJoueurXPos
			</td>
			<td align="center">
				{if ($joueur->getJoueurXPos() > 0)}
					{$joueur->getJoueurXPosObject()->getNom()}
					
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
				joueurYPos
			</td>
			<td align="center">
				{$joueur->getJoueurYPos()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="joueurypos" id="joueurypos" value="{$joueur->getjoueurYPos()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oJoueurYPos
			</td>
			<td align="center">
				{if ($joueur->getJoueurYPos() > 0)}
					{$joueur->getJoueurYPosObject()->getNom()}
					
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
				idAlliance
			</td>
			<td align="center">
				{$joueur->getIdAlliance()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="idalliance" id="idalliance" value="{$joueur->getidAlliance()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oIdAlliance
			</td>
			<td align="center">
				{if ($joueur->getIdAlliance() > 0)}
					{$joueur->getIdAllianceObject()->getNom()}
					
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
				joueurDateInscription
			</td>
			<td align="center">
				{$joueur->getJoueurDateInscription()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="joueurdateinscription" id="joueurdateinscription" value="{$joueur->getjoueurDateInscription()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oJoueurDateInscription
			</td>
			<td align="center">
				{if ($joueur->getJoueurDateInscription() > 0)}
					{$joueur->getJoueurDateInscriptionObject()->getNom()}
					
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
				joueurDateDerniereConnexion
			</td>
			<td align="center">
				{$joueur->getJoueurDateDerniereConnexion()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="joueurdatederniereconnexion" id="joueurdatederniereconnexion" value="{$joueur->getjoueurDateDerniereConnexion()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oJoueurDateDerniereConnexion
			</td>
			<td align="center">
				{if ($joueur->getJoueurDateDerniereConnexion() > 0)}
					{$joueur->getJoueurDateDerniereConnexionObject()->getNom()}
					
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
				ressource1
			</td>
			<td align="center">
				{$joueur->getRessource1()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ressource1" id="ressource1" value="{$joueur->getressource1()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				production1
			</td>
			<td align="center">
				{$joueur->getProduction1()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="production1" id="production1" value="{$joueur->getproduction1()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ressource2
			</td>
			<td align="center">
				{$joueur->getRessource2()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ressource2" id="ressource2" value="{$joueur->getressource2()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				production2
			</td>
			<td align="center">
				{$joueur->getProduction2()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="production2" id="production2" value="{$joueur->getproduction2()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ressource3
			</td>
			<td align="center">
				{$joueur->getRessource3()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ressource3" id="ressource3" value="{$joueur->getressource3()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				production3
			</td>
			<td align="center">
				{$joueur->getProduction3()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="production3" id="production3" value="{$joueur->getproduction3()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ressource1base
			</td>
			<td align="center">
				{$joueur->getRessource1base()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ressource1base" id="ressource1base" value="{$joueur->getressource1base()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ressource2base
			</td>
			<td align="center">
				{$joueur->getRessource2base()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ressource2base" id="ressource2base" value="{$joueur->getressource2base()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				ressource3base
			</td>
			<td align="center">
				{$joueur->getRessource3base()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="ressource3base" id="ressource3base" value="{$joueur->getressource3base()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				test
			</td>
			<td align="center">
				{$joueur->getTest()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					{if (!empty($listeTest))}
						<select id="listetest" name="test" style="display:inline;">
							<option value="-1" selected>Choisissez un(e) Test</option>
							{foreach from=$listeTest item=test}
								<option value="{$test->getId()}">{$test->getNom()} ({$test->getId()})</option>
							{/foreach}
						</select>
					{/if}
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				oTest
			</td>
			<td align="center">
				{if ($joueur->getTest() > 0)}
					{$joueur->getTestObject()->getNom()}
					
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
				{$joueur->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$joueur->getempty()}"/>				</td>
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


