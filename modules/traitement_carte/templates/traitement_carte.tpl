{*
	Template Smarty pour l'outil de traitement des cartes.
*}
<!-- temporaire pour tests -->
		<script type="text/javascript" src="{$URL_BASE}lib/javascript/prototype.js"></script>
		<script type="text/javascript" src="{$URL_BASE}javascript/gfbulle.js"></script>
		<script type="text/javascript" src="{$URL_BASE}modules/traitement_carte/javascript/ajax.js"></script>
        <script type="text/javascript">var URL_BASE='{$URL_BASE}';</script>
        <script type="text/javascript">var URL_MINIATURE='{$URL_MINIATURE}';</script>
        <script type="text/javascript">var URL_IMGS_DECORS='{$URL_IMGS_DECORS}';</script>
        <script type="text/javascript">var URL_IMGS_SOL='{$URL_IMGS_SOL}';</script>
        <script type="text/javascript">var URL_INCLUDES='{$URL_INCLUDES}';</script>
        <script type="text/javascript">var URL_MODULES='{$URL_MODULES}';</script>
<!-- fin temporaire pour tests -->

<table width="800px" height="800px" border="1">
	<tr>
		{* 
			Cote gauche on affiche les parametres
		*}
		<td id="aff_params" width="200px" height="798px" valign="top">
			<div style="overflow: auto; height: 796px;">
				<table width="180px" border="1">
					<tr>
						<td align="center" colspan="2">
							<a href="{$URL_TUTOS}tutoriel.html" target="_blank">Aide</a>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<fieldset width="100%" height="100%">
							<legend>Mini Carte</legend>
								<div id="conteneur_mini_carte" style="overflow: auto; width: 450px; height: 200px;">
									{*include file="{$TPL_MINI_CARTE}mini_carte.tpl"*}
								</div>
							</fieldset>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<fieldset width="100%" height="100%">
							<legend>Information en retour</legend>
								<div id="infos_traitement_carte" name="infos_traitement_carte" style="border: 1px solid black; width:490px; height:50px; overflow:auto;">
									{$info}
								</div>
							</fieldset>
						</td>
					</tr>
					<tr>
						<td align="left">Nom de la carte:</td>
						<td align="right">
							<span style="text-align:left; ">Pour une nouvelle carte => </span>
							<input type="text" id="nomNouvelleCarte" name="nomNouvelleCarte" value="">
							<br/>
							<div id="liste_cartes">
								{include file="liste_cartes_edition.tpl"}
							</div>
						</td>
					</tr>
					<tr>
						<td align="left">Taille de la carte:</td>
						<td align="left">
							<select id="tailleCarte" name="tailleCarte" style="display:inline;">
								<option selected="selected">Choisissez...</option>
								{foreach $listeDimensionsCarte as $dimension}
									<option value="{$dimension->getId()}">{$dimension->getNom()}</option>
								{/foreach}
							</select>
						</td>
					</tr>
					<tr>
						<td align="right" colspan="2">
							<input type="button" id="boutonSupprimeCarte" onclick="supprimeCarte();" value="Supprimer la carte s&eacute;lectionn&eacute;e" disabled="disabled"/>
							&nbsp;&nbsp;
							<input type="button" onclick="creeCarteVide();" value="Cr&eacute;er une carte vide"/>
						</td>
					</tr>
					<tr>
						<td align="center" colspan="2">
							<!--DEPLACEMENT DE LA CARTE PAR SECTION-->
						    <div id="afficheCarte" style="border: 1px solid red;z-index: 0;">
						        <table>
						            <caption>Se d&eacute;placer la carte vers...</caption>
						            <tr>
						                <td align="left">
						                    <select name="deplacement" size="1">
						                        <option selected="selected">Haut-Gauche</option>
						                        <option onclick="afficheCarte('',1,1);">1 case</option>
						                        <option onclick="afficheCarte('',5,5);">5 cases</option>
						                        <option onclick="afficheCarte('',10,10);">10 cases</option>
						                    </select>
						                </td>
						                <td align="center">
						                    <select name="deplacement" size="1">
						                        <option selected="selected">Haut</option>
						                        <option onclick="afficheCarte('',0,1);">1 case</option>
						                        <option onclick="afficheCarte('',0,5);">5 cases</option>
						                        <option onclick="afficheCarte('',0,10);">10 cases</option>
						                    </select>
						                </td>
						                <td align="right">
						                    <select name="deplacement" size="1">
						                        <option selected="selected">Haut-Droite</option>
						                        <option onclick="afficheCarte('',-1,1);">1 case</option>
						                        <option onclick="afficheCarte('',-5,5);">5 cases</option>
						                        <option onclick="afficheCarte('',-10,10);">10 cases</option>
						                    </select>
						                </td>
						            </tr>
						            <tr>
						                <td align="left">
						                    <select name="deplacement" size="1">
						                        <option selected="selected">Gauche</option>
						                        <option onclick="afficheCarte('',1,0);">1 case</option>
						                        <option onclick="afficheCarte('',5,0);">5 cases</option>
						                        <option onclick="afficheCarte('',10,0);">10 cases</option>
						                    </select>
						                </td>
						                <td align="center">
						                    X: <select size="1" name="coord_x" id="coord_x">
						                    	{foreach from=$nbCasesDimensionX item=coord_x}
						                    		{if ($coord_x == $smarty.session.parametres_carte.nb_cases_en_x)}
						                    			<option value="{$coord_x}" selected="selected">{$coord_x}</option>
						                    		{else}
						                    			<option value="{$coord_x}">{$coord_x}</option>
						                    		{/if}
						                    	{/foreach}
						                       </select>&nbsp;
						                    Y: <select size="1" name="coord_y" id="coord_y">
						                    	{foreach from=$nbCasesDimensionY item=coord_y}
						                    		{if ($coord_y == $smarty.session.parametres_carte.nb_cases_en_y)}
						                    			<option value="{$coord_y}" selected="selected">{$coord_y}</option>
						                    		{else}
						                    			<option value="{$coord_y}">{$coord_y}</option>
						                    		{/if}
						                    	{/foreach}
						                       </select>&nbsp;
						                    <button onclick="afficheCarte('position',document.getElementById('coord_x').value,document.getElementById('coord_y').value);document.getElementById('coord_x').value = '';document.getElementById('coord_y').value = '';">Affiche</button>
						                </td>
						                <td align="right">
						                    <select name="deplacement" size="1">
						                        <option selected="selected">Droite</option>
						                        <option onclick="afficheCarte('',-1,0);">1 case</option>
						                        <option onclick="afficheCarte('',-5,0);">5 cases</option>
						                        <option onclick="afficheCarte('',-10,0);">10 cases</option>
						                    </select>
						                </td>
						            </tr>
						            <tr>
						                <td align="left">
						                    <select name="deplacement" size="1">
						                        <option selected="selected">Bas-Gauche</option>
						                        <option onclick="afficheCarte('',1,-1);">1 case</option>
						                        <option onclick="afficheCarte('',5,-5);">5 cases</option>
						                        <option onclick="afficheCarte('',10,-10);">10 cases</option>
						                    </select>
						                </td>
						                <td align="center">
						                    <select name="deplacement" size="1">
						                        <option selected="selected">Bas</option>
						                        <option onclick="afficheCarte('',0,-1);">1 case</option>
						                        <option onclick="afficheCarte('',0,-5);">5 cases</option>
						                        <option onclick="afficheCarte('',0,-10);">10 cases</option>
						                    </select>
						                </td>
						                <td align="right">
						                    <select name="deplacement" size="1">
						                        <option selected="selected">Bas-Droite</option>
						                        <option onclick="afficheCarte('',-1,-1);">1 case</option>
						                        <option onclick="afficheCarte('',-5,-5);">5 cases</option>
						                        <option onclick="afficheCarte('',-10,-10);">10 cases</option>
						                    </select>
						                </td>
						            </tr>
						        </table>
						    </div>
						    <!--FIN DEPLACEMENT DE LA CARTE-->
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<div id="supprime_plateau_carte"></div>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							{* Previsualisation des images a integrer *}
							<fieldset width="100%" height="100%">
							<legend>Preview images</legend>
								<span id="preview_image">{$previewImage}</span>
							</fieldset>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<div id="actionZone"></div>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<div id="optionsCase"></div>
						</td>
					</tr>
				</table>
			</div>
		</td>
		
		{* 
			Cote droit on affiche la carte
		*}
		<td width="600px" height="790px" valign="top">
			<div id="conteneur_carte" style="top:100px;
											 left:0px;
											 overflow: auto;
											 width: 1000px;
											 height: 100%;
											 z-index: -1; 
											 border: 1px solid blue;">
				{include file="{$TPL_CARTE}carte.tpl"}
			</div>
		</td>
	</tr>
</table>