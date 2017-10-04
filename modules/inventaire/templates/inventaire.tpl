{*
	Template Smarty pour le module 'INVENTAIRE'
*}
	<div id="infos_inventaire"></div>
	<table>
		<caption align="center">Gestion de l'inventaire</caption>
		<tr>
			<td align="left">
				{if (isset($smarty.session.staffSession) && $smarty.session.staffSession == 1)}
					<select id="membre"
							name="membre"
							size="1"
							onChange="afficheInventaire()">
						<option value="-1" selected="selected">Choisissez un Membre</option>
						{foreach from=$listeMembres item=membre}
							<option value="{$membre->getId()}">{$membre->getPseudo()}</option>
						{/foreach}
					</select>&nbsp;&nbsp;&nbsp;&nbsp;
					<select id="unite"
							name="unite"
							size="1"
							onChange="afficheInventaire()">
						<option value="-1" selected="selected">Choisissez une unit&eacute;</option>
						{foreach from=$listeUnites item=unite}
							<option value="{$unite->getId()}">{$unite->getNom()}</option>
						{/foreach}
					</select>&nbsp;&nbsp;&nbsp;&nbsp;
				{/if}
				<select id="unite_joueur"
						name="unite_joueur"
						size="1"
						onChange="afficheInventaire()">
					<option value="-1" selected="selected">Choisissez une unit&eacute; de joueur</option>
					{if (isset($smarty.session.staffSession) && $smarty.session.staffSession == 1)}
						{assign var="memoJoueur" value=""}
						{foreach $listeUnitesJoueurs AS $unitesJoueur}
							{if (strlen(trim($memoJoueur)) == 0)}
								<optgroup label="{$unitesJoueur->getMembreObject()->getPseudo()}">
								{assign var="memoJoueur" value=$unitesJoueur->getMembreObject()->getPseudo()}
							{else}
								{if ($memoJoueur != $unitesJoueur->getMembreObject()->getPseudo())}
									</optgroup>
									<optgroup label="{$unitesJoueur->getMembreObject()->getPseudo()}">
									{assign var="memoJoueur" value=$unitesJoueur->getMembreObject()->getPseudo()}
								{/if}
							{/if}
							<option value="{$unitesJoueur->getId()}">{$unitesJoueur->getNom()}</option>
						{/foreach}
					{else}
						{foreach from=$listeUnitesJoueurs item=uniteJoueur}
							<option value="{$uniteJoueur->getId()}">{$uniteJoueur->getNom()}</option>
						{/foreach}
					{/if}
				</select>
			</td>
		</tr>
		<tr>
			<td align="center">
				<table border="1">
					<tr>
						<td width="300px" align="center">
							{if (isset($smarty.session.staffSession) && $smarty.session.staffSession == 1)}
								GLOBAL
							{else}
								SAC
							{/if}
						</td>
						<td width="100px" align="center">ACTION</td>
						<td width="300px" align="center">
							UNIT&Eacute;
							{if (isset($smarty.session.staffSession) && $smarty.session.staffSession == 1)}
								/ JOUEUR
							{/if}
						</td>
					</tr>
					<tr>
						<td valign="top" align="center">
							<div 	id="listegauche"
									style="border:1px solid red;overflow:auto;text-align:left;height:300px;">
							{if (!empty($listeEquipementGauche))}
								<form id="formListeGauche">
									{foreach from=$listeEquipementGauche item=equipement}
										<input type="checkbox" name="equipementGauche[]" id="{$equipement->getId()}" value="{$equipement->getId()}">{$equipement->getNom()}<br/>
									{/foreach}
								</form>
							{else}
								Pas d'&eacute;quipement disponible
							{/if}
							</div>
						</td>
						<td valign="top" align="center">
							<div>
								<input 	type="button"
										value="=>"
										title="Transf&eacute;rer s&eacute;lection"
										onClick="transfereVersListeDroite();"
								/><br/>
								<input 	type="button"
										value="+>"
										title="Ajouter s&eacute;lection"
										onClick="ajouteVersListeDroite();"
								/><br/>
								<input 	type="button"
										value="<="
										title="Supprimer s&eacute;lection"
										onClick="supprimeDeListeDroite();"
								/><br/>
								<input 	type="button"
										value="<<"
										title="Supprimer tout"
										onClick="supprimeToutListeDroite();"
								/>
							</div>
						</td>
						<td valign="top" align="center">
							<div 	id="listedroite"
									style="border:1px solid red;overflow:auto;text-align:left;height:300px;">
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
{if (isset($smarty.session.staffSession) && $smarty.session.staffSession == 1)}
{else}
{/if}