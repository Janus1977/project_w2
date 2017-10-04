{*				
				{if (!empty($admin))}
					<a href="{$admin}admin.php">test admin</a>
					<br>
				{/if}
				{if (!empty($traitementCartes))}
					<a href="{$traitementCartes}traitement_carte.php">Traitement des cartes</a> (corrig&eacute;)
					<br>
				{/if}
				{if (!empty($traitementImages))}
					<a href="{$traitementImages}traitement_image.php">Traitement des images</a> (corrig&eacute;)
					<br>
				{/if}
				{if (!empty($compte))}
					<a href="{$compte}compte.php">compte</a>
					<br>
				{/if}
				<br/>
				Tentez votre chance !!!
				<br/>
				<table>
					<tr>
						<td align="center" colspan="7">Choisissez le type et le nombre de d&eacute; que vous voulez lancer</td>
					</tr>
					<tr>
						<td>
							<input type="text" id="nombreD4" name="nombreD4" size="2"/>
							<input type="checkbox" id="D4" name="typeDe" value="D4"/>D4, 
						</td>
					</tr>
					<tr>
						<td>							
							<input type="text" id="nombreD6" name="nombreD6" size="2"/>
							<input type="checkbox" id="D6" name="typeDe" value="D6"/>D6, 
						</td>
					</tr>
					<tr>
						<td>							
							<input type="text" id="nombreD8" name="nombreD8" size="2"/>
							<input type="checkbox" id="D8" name="typeDe" value="D8"/>D8, 
						</td>
					</tr>
					<tr>
						<td>							
							<input type="text" id="nombreD10" name="nombreD10" size="2"/>
							<input type="checkbox" id="D10" name="typeDe" value="D10"/>D10, 
						</td>
					</tr>
					<tr>
						<td>							
							<input type="text" id="nombreD12" name="nombreD12" size="2"/>
							<input type="checkbox" id="D12" name="typeDe" value="D12"/>D12, 
						</td>
					</tr>
					<tr>
						<td>							
							<input type="text" id="nombreD20" name="nombreD20" size="2"/>
							<input type="checkbox" id="D20" name="typeDe" value="D20"/>D20, 
						</td>
					</tr>
					<tr>
						<td>							
							<input type="text" id="nombreD100" name="nombreD100" size="2"/>
							<input type="checkbox" id="D100" name="typeDe" value="D100"/>D100
						</td>
					</tr>
					<tr>
						<td align="center" colspan="2">
							<input type="radio" id="somme" value="true" selected="selected">Somme
							&nbsp;&nbsp;
							<input type="radio" id="somme" value="false">individuel
						</td>
						<td align="right" colspan="5">
							<input type="button" onclick="lanceLesDes()" value="Lancer les d&eacute;s"/>
						</td>
					</tr>
					<tr>
						<td colspan="7">
							<div id="resultatJetDeDes"></div>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
*}