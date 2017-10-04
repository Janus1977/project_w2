<div id="actionUnite">
<!--
	<table>
		<tr>
			<td><input type="button" name="HG_but" id="HG_but" value="HG"/></td>
			<td><input type="button" name="H_but" id="H_but" value="H"/></td>
			<td><input type="button" name="HD_but" id="HD_but" value="HD"/></td>
		</tr>
		<tr>
			<td><input type="button" name="G_but" id="G_but" value="G"/></td>
			<td></td>
			<td><input type="button" name="D_but" id="D_but" value="D"/></td>
		</tr>
		<tr>
			<td><input type="button" name="BG_but" id="BG_but" value="BG"/></td>
			<td><input type="button" name="B_but" id="B_but" value="B"/></td>
			<td><input type="button" name="BD_but" id="BD_but" value="BD"/></td>
		</tr>
	</table>
-->
	<table>
		<tr>
			<td>
				<input 	type="button" 
						name="depl_but" 
						id="depl_but" 
						onclick="javascript:deplace({$oUnite->getId()});"
						value="Se D&eacute;placer"/>
			</td>
			<td>
				{if ($corpsACorps === false)}
					{* Si aucune unite adverse n'est au contact => attaque à distance *}
					<table>
						<caption></caption>
						<tr>
							{if (sizeof($aListeUnitesEnnemies) > 1)}
								<td>Tirer sur une cible...</td>
								<td>
									<select size="1" name="cibleTir" onchange="javascript:attaque({$oUnite->getId()},parseInt(this[this.selectedIndex].value));">
										<option value="-1">Choisir la cible</option>
										{foreach from=$aListeUnitesEnnemies item=oUniteEnnemie}
											<option value="{$oUniteEnnemie->getId()}">{$oUniteEnnemie->getNom()}</option>
										{/foreach}
									</select>
								</td>
							{else}
								<td>Aucune cible disponible</td>
							{/if}
						</tr>
					</table>
				{else}
					<input 	type="button" 
							name="cac_but" 
							id="cac_but" 
							onclick="javascript:attaque({$oUnite->getId()});"
							value="Attaque Corps &Agrave; Corps"/>
				{/if}
			</td>
		</tr>
	</table>
</div>