{*
	Template Smarty du point d'entree du module de traitement des images
*}
<!-- temporaire pour tests -->
		<script type="text/javascript" src="{$URL_BASE}lib/javascript/prototype.js"></script>
        <script type="text/javascript">var URL_BASE='{$URL_BASE}';</script>
<!-- fin temporaire pour tests -->
<script type="text/javascript" src="{$URL_BASE}modules/traitement_image/javascript/javascript.js"></script>
{*
	Formulaire de selection d'une image a modifier.
*}
<table width="1500px" height="800px" border="1">
		{* 
			Cote gauche on affiche les parametres
		*}
		<tr>
			<td id="aff_params" width="500px" valign="top">
				<table width="500px" border="1">
					<tr>
						<td colspan="2" align="left">
							Image &agrave; traiter:
						</td>
						<td colspan="2" align="right">
							<div id="listeImagesATraiter">
								{include file="{$MODULES_BASE}traitement_image/templates/listeImagesATraiter.tpl"}
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="left">
							R&eacute;pertoire de destination:
						</td>
						<td colspan="2" align="right">
							<select id="repertoireDestination" name="repertoireDestination" style="display:inline;">
								<option value="">Choisissez le r&eacute;pertoire de destination</option>
								{foreach from=$listeRepertoireDestination item=repertoireDestination}
								    <option value="{utf8_encode($repertoireDestination.nom)}">{utf8_encode($repertoireDestination.nom)}</option>
								{/foreach}
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="center">
							<input type="button" onclick="redimensionneImage();" value="Mettre aux dimensions (cases)"/>
						</td>
					</tr>
					<tr>
						<td colspan="4">ROTATIONS</td>
					</tr>
					<tr>
						<td align="center">
							<input type="button" id="moins90" style="width:100px; height: 100px;" value="-90" onclick="ModifieImage('-90');">
						</td>
						<td align="center">
							<input type="button" id="plus90" style="width:100px; height: 100px;" value="+90" onclick="ModifieImage('+90');">
						</td>
						<td align="center">
							<input type="button" id="180" style="width:100px; height: 100px;" value="180" onclick="ModifieImage('180');">
						</td>
						<td align="center">
							Rotation libre:<br/>
							<input type="text" id="rotationLibre" style="width:50px;">
							<input type="button" id="ok" style="width:30px; height: 30px;" value="OK" onclick="ModifieImage(document.getElementById('rotationLibre').value);">
						</td>
					</tr>
					<tr>
						<td colspan="4">MODIFICATION TAILLE</td>
					</tr>
					<tr>
						<td align="center">
							<input type="button" id="agrandit*2" style="width:100px; height: 100px;" value="Agrandit x2" onclick="ModifieImage('*2');">
						</td>
						<td align="center">
							<input type="button" id="zoom-" style="width:100px; height: 100px;" value="zoom-" onclick="ModifieImage('-90');">
						</td>
					</tr>
					<tr>
						<td colspan="4">MINIATURE</td>
					</tr>
					<tr>
						<td align="center">
							<input type="button" id="miniature_add" style="width:100px; height: 100px;" value="Cr&eacute;er" onclick="ModifieImage('miniature_add');">
						</td>
						<td align="center">
							<input type="button" id="miniature_del" style="width:100px; height: 100px;" value="Supprimer" onclick="ModifieImage('miniature_del');">
						</td>
					</tr>
					<tr>
						<td colspan="2" align="left">Nom de la nouvelle image:</td>
						<td colspan="2" align="right">
							<input type="text" id="nomNouvelleImage" name="nomNouvelleImage"/>
							<input type="button" id="nomNouvelleImageOk" value="Valide nouvelle image" onclick="sauveNouvelleImage();">
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<fieldset width="100%" height="100%">
							<legend>Information en retour</legend>
								<div id="infos" style="border: 1px solid black; width:490px; height:150px; overflow:auto;">
									
								</div>
							</fieldset>
						</td>
					</tr>
				</table>
			</td>
			
			{* 
				Cote droit on affiche le reste
			*}
			<td width="1000px" valign="top">
				<div id="chargement" style="display: none; position: absolute; right: 0px; top: 0px; color: red;">
			        Chargement...
			    </div>
				<div id="affichage">
				</div>
			</td>
		</tr>
</table>