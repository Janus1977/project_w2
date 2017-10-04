{*
	Template Smarty pour le module 'DECOR'
*}
{if (isset($smarty.session.staffSession) && $smarty.session.staffSession == 1 &&
	isset($listeDecor) && isset($listeImagesDecor))}
	<div id="info_decor"></div>
	<table>
		<caption>Gestion des d&eacute;cors</caption>
		<tr>
			<td>
				Charge les d&eacute;cors du r&eacute;pertoire en base &nbsp;=>&nbsp;
				<input type="button" id="chargeDecor" value="Charge" onclick="chargeDecorEnBase();" />
			</td>
		</tr>
		<tr>
			<td align="center">
				<h1>Ajouter un d&eacute;cor</h1>
			</td>
		</tr>
		<tr>
			<td align="center">
				<form id="addDecorForm">
					<table>
					<tr>
							<td>Nom</td>
							<td><input type="text" name="decorName" id="decorName"/></td>
							<td>Description</td>
							<td><textarea height="10" width="20" name="decorDescription" id="decorDescription"></textarea></td>
						</tr>
						<tr>
							<td>Image:</td>
							<td colspan="2">
								<select id="imageDecor" name="imageDecor" size="1">
									<option value="-1" selected="selected">Choisissez l'image associ&eacute;e au d&eacute;cor</option>
									{foreach from=$listeImagesDecor item=imagesDecor}
										<option value="{$imagesDecor.nom}">{$imagesDecor.nom}</option>
									{/foreach}
								</select>
							</td>
							<td align="right"><input type="button" name="submit" id="submit" value="Ajouter" onclick="ajouteDecor();"/></td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
		<tr>
			<td align="center">
				<h1>Liste des d&eacute;cors en base</h1>
			</td>
		</tr>
		<tr>
			<td align="center">
				<table>
					<tr>
					{assign var=cpt value=0}
					{foreach from=$listeDecor item=decor}
						{*Tableau de largeur 5*}
						{if ($cpt > 0 && $cpt%5 == 0)}
							</tr>
							<tr>
						{/if}
						<td align="center">
							{$decor->getNom()}<br/>
							<img src="{$URL_IMGS_DECOR}{$decor->getChemin()}" width="40" height="40"/><br/>
							{*
							<input type="button" value="Jouer" onclick="joueCarte('{$smarty.session.user->getId()}','{$carte->getId()}');"/>
							{if ($carte->getEdition() == 0)}
								<input type="button" value="&Eacute;diter" onclick="editeCarte('{$carte->getId()}');"/>
							{else}
								<input type="button" value="Publier" onclick="publieCarte('{$carte->getId()}');"/>
							{/if}
							*}
						</td>
						{assign var=cpt value=$cpt+1}
					{/foreach}
					</tr>
				</table>
			</td>
		</tr>
	</table>
{else}
	<div
		id="decor_{$case->getId()}_{$case->getDecorObject()->getId()}"
		style="position: absolute;
		top: {$top}px;
		left: {$left}px;
		background-image: url({$URL_IMGS_DECORS}{$case->getDecorObject()->getChemin()});
		background-repeat:no-repeat;
		z-index: 2;
		width:   {$width}px;
		height:  {$height}px;"
	>
	{if ($EDITION_CARTE === false)}
		<a 	onmouseover="BulleWrite('<div style=\'border:1px solid black; background-color:white;\'>{$case->donneInfoCase($EDITION_CARTE)}</div>',15,15);"
		href="javascript:montreOptionsCase({$case->getId()})">
			<img src="{$URL_IMGS}spacer_{$TAILLE_CASE_X}_{$TAILLE_CASE_Y}.gif" style="width: {$TAILLE_CASE_X}px; height: {$TAILLE_CASE_Y}px;" alt="test spacer"/>
		</a>
	{/if}
	</div>
{/if}