{*
	Template Smarty d'affichage d'un equipement.
	<script type="text/javascript" src="{$URL_BASE}lib/javascript/prototype.js"></script>
	<script type="text/javascript" src="{{$URL_JAVASCRIPT_EQUIPEMENT}}javascript.js"></script>
    <script type="text/javascript">var URL_EQUIPEMENT='{$URL_EQUIPEMENT}';</script>
*}

	<div id="infos_equipement" name="infos_equipement"></div>
	{if (!isset($jeu) || !$jeu) }
		<table>
			<tr>
				<td align="center">
					<!--
					{* La liste des equipements basiques du jeu pour l'edition *}
					{*include file="{$TEMPLATES_EQUIPEMENT}listeEquipementAEditer.tpl"*}
					<select id="listeEquipements" name="listeEquipements" style="display:inline;">
						<option value="-1" selected>Choisissez un &eacute;quipement &agrave; traiter</option>
						{foreach from=$listeEquipements item=equipement}
							<option value="{$equipement->getId()}">{$equipement->getNom()}</option>
						{/foreach}
					</select>&nbsp;&nbsp;&nbsp;
					-->
			    	<input type="button" id="afficheEquipement" onclick="afficheEquipement();" value="Charger l'&eacute;quipement"/>&nbsp;&nbsp;&nbsp;
			    	<input type="button" id="supprimeEquipement" onclick="supprimeEquipement();" value="Supprimer l'&eacute;quipement"/>&nbsp;&nbsp;&nbsp;
			    	<input type="button" id="modifieEquipement" onclick="modifieEquipement();" value="Modifier l'&eacute;quipement"/>&nbsp;&nbsp;&nbsp;
			    	<input type="button" id="ajouteEquipement" onclick="ajouteEquipement();" value="Ajouter un &eacute;quipement"/>&nbsp;&nbsp;&nbsp;
					<input type="button" id="cloneEquipement" onclick="cloneEquipement();" value="Cl&ocirc;ner l'&eacute;quipement"/><br>
				</td>
			</tr>
			<tr>
				<td align="center">
					{* La liste des equipements du joueur pour l'edition *}
					{*include file="{$TEMPLATES_EQUIPEMENT}listeEquipementAEditer.tpl"*}
					<select id="listeEquipements" name="listeEquipements" style="display:inline;">
						<option value="-1" selected>Choisissez un &eacute;quipement &agrave; traiter</option>
						<option value="0">Ajoutez un &eacute;quipement</option>
						{foreach from=$listeEquipements item=equipement}
							<option value="{$equipement->getId()}">{$equipement->getNom()}</option>
						{/foreach}
					</select>&nbsp;&nbsp;&nbsp;
					<select id="listeEquipementsJoueur" name="listeEquipementsJoueur">
						<option value="-1" selected>Choisissez un &eacute;quipement de joueur &agrave; traiter</option>
						<option value="0">Ajoutez un &eacute;quipement de joueur</option>
						{assign var="memoJoueur" value=""}
						{foreach $listeEquipementsJoueur AS $equipementsJoueur}
							{if (strlen(trim($memoJoueur)) == 0)}
								<optgroup label="{$equipementsJoueur->getMembreObject()->getPseudo()|escape}">
								{assign var="memoJoueur" value=$equipementsJoueur->getMembreObject()->getPseudo()}
							{else}
								{if ($memoJoueur != $equipementsJoueur->getMembreObject()->getPseudo())}
									</optgroup>
									<optgroup label="{$equipementsJoueur->getMembreObject()->getPseudo()|escape}">
									{assign var="memoJoueur" value=$equipementsJoueur->getMembreObject()->getPseudo()}
								{/if}
							{/if}
							<option value="{$equipementsJoueur->getId()}">{$equipementsJoueur->getNom()}</option>
						{/foreach}
					</select>
					<!--
			    	<input type="button" id="afficheEquipement" onclick="afficheEquipement('equipement_joueur',parseInt(listeEquipementsJoueur[listeEquipementsJoueur.selectedIndex].value));" value="Charger l'&eacute;quipement"/>&nbsp;&nbsp;&nbsp;
			    	<input type="button" id="supprimeEquipement" onclick="supprimeEquipement('equipement_joueur',parseInt(listeEquipementsJoueur[listeEquipementsJoueur.selectedIndex].value));" value="Supprimer l'&eacute;quipement"/>&nbsp;&nbsp;&nbsp;
			    	<input type="button" id="ajouteEquipement" onclick="ajouteEquipement('equipement_joueur');" value="Ajouter un &eacute;quipement"/>&nbsp;&nbsp;&nbsp;
					<input type="button" id="cloneEquipement" onclick="cloneEquipement('equipement_joueur',parseInt(listeEquipementsJoueur[listeEquipementsJoueur.selectedIndex].value));" value="Cl&ocirc;ner l'&eacute;quipement"/><br>
					-->
				</td>
			</tr>
			<tr>
				<td>
					<div id="affichage" name="affichage"></div>
				</td>
			</tr>
		</table>
	{/if}