<div id="identification" width="600" style="border: 2px solid red;">
	<table>
		<tr>
			{* PARTIE IDENTIFICATION *}
			<td valign="top" align="center">
				<form id="connexionForm" name="connexionForm" action="{$URL_BASE}index.php" method="post">
					<table>
						<caption align="center">CONNECTEZ-VOUS</caption>
						<tr>
							<td align="center" colspan="2">
								<div id="infos_connexion" name="info_connexion"></div>
							</td>
						</tr>
						<tr>
							<td align="left"><label for="identifiant">Login:</label></td>
							<td align="right"><input type="text" name="identifiant"></td>
						</tr>
						<tr>
							<td align="left"><label for="motDePasse">Mot de passe:</label></td>
							<td align="right"><input type="password" name="motDePasse"></td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<span style="font-size: 11px;">
									<a href="javascript:motDePasseOublie()">mot de passe oubli&eacute;</a>
								</span>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="submit" id="identification" name="identification" value="S'identifier">
							</td>
						</tr>
					</table>
				</form>
			</td>
			
			{* PARTIE INSCRIPTION *}
			<td valign="top" align="center">
				{include file="{$TEMPLATE_INSCRIPTION}inscription.tpl"}
			</td>
		</tr>
	</table>


</div>