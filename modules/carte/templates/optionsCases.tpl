{*
	Template Smarty pour les options d'une case dont un pleatau a ete afecte
*}
<fieldset>
{if ($EDITION_CARTE === true) }
	<legend>Les options disponbles pour la case <i>ID{$case->getId()}</i></legend>
	<table width="500px">
		{* Si la case est vide on peut seulement lui mettre un plateau de jeu *}
		{if ($case->getEtatCase() == 0)}
			<tr>
				<td>
					<table>
						<tr>
							<td align="left">
								<input 	type="radio"
										id="typeActif"
										name="typeActif"
										value="sol"
										onclick="activeTypeImage('plateau')"/>&nbsp;&nbsp;Plateau
							</td>
							<td align="right">
								<select id="image_plateau" name="image_plateau" style="display:inline;" disabled="disabled"
										onchange="afficheImage(this[this.selectedIndex].text,'plateau');">
									<option value="" selected>Choisir un plateau de jeu</option>
									{foreach from=$listePlateaux item=plateau}
									    <option value="{utf8_encode($plateau->getId())}">{utf8_encode($plateau->getNom())}</option>
									{/foreach}
								</select>
							</td>
						</tr>
						<tr>
							<td align="right" colspan="2">
								<input type="button" onclick="ajouteImageCarte({$case->getId()},{$case->getCarte()->getId()})" value="Ajouter le plateau &agrave; la carte"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		{else}
			{* Sinon on peut lui ajouter un decor, la bloquer...etc *}
			{* Si la case n'a pas de decor affecte ou si elle n'est pas recouverte par un decor multi-case *}
			{if ($case->getEtatCase() < $DECOR)}
				<tr>
					<td>
						<table>
							<tr>
								<td align="left">
									<input type="radio" id="typeActif" name="typeActif" value="decor" onclick="activeTypeImage('decor')"/>&nbsp;&nbsp;D&eacute;cor
								</td>
								<td align="right">
									<select id="image_decor" name="image_decor" style="display:inline;" disabled="disabled"
											onchange="afficheImage(this[this.selectedIndex].value,'decor');">
										<option value="" selected>Choisir un d&eacute;cor pour la case</option>
										{foreach from=$listeDecor item=decor}
										    <option value="{utf8_encode($decor->getId())}">{utf8_encode($decor->getNom())}</option>
										{/foreach}
									</select>
								</td>
								<td>
									<input type="button" id="but_decor_ok" value="OK"  disabled="disabled"
											onclick="ajouteDecorALaCase({$case->getId()},'case_{$case->getX()}_{$case->getY()}')"/>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{/if}
			{if ($case->getEtatCase() < $UNITE)}
				<tr>
					<td>
						<table>
							<tr>
								<td align="left">
									<input type="radio" id="typeActif" name="typeActif" value="unite" onclick="activeTypeImage('unite')"/>&nbsp;&nbsp;Unit&eacute;
								</td>
								<td align="right">
									<select id="image_unite" name="image_unite" style="display:inline;" disabled="disabled"
											onchange="afficheImage(this[this.selectedIndex].value,'unite');">
										<option value="" selected>Choisir une unit&eacute; pour la case</option>
										{foreach from=$listeUnite item=unite}
										    <option value="{utf8_encode($unite->getId())}">{utf8_encode($unite->getNom())}</option>
										{/foreach}
									</select>
								</td>
								<td>
									<input type="button" id="but_unite_ok" value="OK"  disabled="disabled"
											onclick="ajouteUniteALaCase({$case->getId()},'case_{$case->getX()}_{$case->getY()}')"/>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{/if}
			<tr>
				<td>
					<table width="500px">
						<tr>
							<td>
								{if ($case->getBloque())}
									{* identifiant div: "case_x_y" *}
									<input 	type="button" value="D&eacute;bloquer" 
											onclick="debloqueCase({$case->getId()},'case_{$case->getX()}_{$case->getY()}')"/>
								{else}
									<input 	type="button" value="Bloquer" 
											onclick="bloqueCase({$case->getId()},'case_{$case->getX()}_{$case->getY()}')"/>
								{/if}
							</td>
							<td>
								{if ($case->getEtatCase() == $LIEN)}
									<input type="button" value="Supprimer le lien de la case"
											onclick="supprimeCaseLiante({$case->getId()},'case_{$case->getX()}_{$case->getY()}',{$case->getCarteObject()->getId()})"/>
								{else}
									<input type="button" value="Cr&eacute;er une case liante"
											onclick="creeCaseLiante({$case->getId()},'case_{$case->getX()}_{$case->getY()}',{$case->getCarteObject()->getId()})"/>
								{/if}
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<div id="listes_creation_liens" name="listes_creation_liens">
									{include file="{$TEMPLATES_TRAITEMENT_CARTE}listes_creation_liens.tpl"}
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		{/if}
	</table>
{else}
les options dans le jeu
{/if}
</fieldset>
