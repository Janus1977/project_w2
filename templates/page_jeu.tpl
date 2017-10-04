Bonjour {$user->getPseudo()}<br/><br/>

{if (sizeof($listeCartes) > 0)}
	<table>
		<tr>
			<td>				
				<table>
					<caption>Nouvelle partie</caption>
					<tr>
						<td>
							<table>
								<tr>
									<td>Nombre de joueur(s):</td>
									<td>
										<select size="1" name="nbJoueur" id="nbJoueur" onchange="javascript:proposeIA()">
										<option selected="selected" value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</td>
								</tr>
								<tr>
									<td>Nombre d'IA:</td>
									<td>
										<select size="1" name="nbIA" id="nbIA">
										<option selected="selected" value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
									</td>
								</tr>
								<tr>
									<td>Carte de jeu: </td>
									<td>
										<select id="nomCartePourJeu" name="nomCartePourJeu">
											<option selected>Choisissez dans la liste</option>
											{foreach from=$listeCartes item=carte}
											    <option value="{utf8_encode($carte->getId())}">{utf8_encode($carte->getNom())}({$carte->getNb_cases_x()}x{$carte->getNb_cases_y()})</option>
											{/foreach}
										</select>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
			{if ($user->getParties() > 0)}
				<td>
					<table>
						<caption>Continuer une partie</caption>
						<tr>
							<td>
								<select id="partieEnCours" id="partieEnCours" size="1">
									<option value="-1">Choisissez la partie &agrave; rejoindre</option>
									{foreach from=$listeParties item=partie}
										<option value="{$partie->getId()}">{$partie->getNom()}</option>
									{/foreach}
								</select>
							</td>
						</tr>
					</table>
				</td>
			{/if}
		</tr>

		<tr>
			{if ($user->getParties() == 0)}
				<td>
			{else}
				<td colspan="2" align="right">
			{/if}
				<input type="button" value="GO" onclick="javascript:checkNewGame()"/>
			</td>
		</tr>
	</table>
{else}
	Aucune carte disponible.
{/if}