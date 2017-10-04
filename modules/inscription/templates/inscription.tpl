			{if ($inscriptionOK == 2)}
				{*<form action="{$URL_BASE}index.php" method="post">*}
					<table>
						<caption align="center">INSCRIVEZ-VOUS</caption>
						<tr>
							<td align="center" colspan="2">
								<div id="infos_inscription" name="info_inscription"></div>
							</td>
						</tr>
						<tr>
							<td>Pseudo</td>
							<td><input type="text" id="userpseudo" name="userpseudo" size="40" onblur="checkPseudo()"></td>
						</tr>
						<tr>
							<td>Mot de passe</td>
							<td><input type="password" id="userpassword" name="userpassword" size="40"></td>
						</tr>
						<tr>
							<td>Confirmation</td>
							<td><input type="password" id="userconfirm" name="userconfirm" size="40" onblur="checkMotDePasse()"></td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td><input type="text" id="usermail" name="usermail" size="40"></td>
						</tr>
						<tr>
							<td>Confirmation</td>
							<td><input type="text" id="usermailconfirm" name="usermailconfirm" size="40" onblur="checkMail()"></td>
						</tr>
						<tr>
							<td colspan="2">
								Recopiez le mot<br/>(cliquez sur l'image si vous n'arrivez pas &agrave; lire):
            					<table>
                					<tr>
         					           <td>
       						           		<img	id="captcha"
       						                  		src="{$URL_INCLUDES_INSCRIPTION}captcha.inc.php"
       						                 		onclick="this.src='{$URL_INCLUDES_INSCRIPTION}captcha.inc.php?' + (Math.random()*1000000);"
       						                		style="cursor:pointer;display:inline;width:170px;height:35px;"
       						               			alt="Captcha"/>
       						           	</td>
										<td>
       										<input type="text" id="captchaconfirm" name="captchaconfirm" size="10">
       									</td>
       								</tr>
       							</table>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="submit" value="S'inscrire">
								<input type="button" id="inscription" name="inscription" value="S'inscrire" onclick="inscritNouveauMembre()">
							</td>
        				</tr>
					</table>
				{*</form>*}
			{else}
				<span style="color:red; font-weight: bold; font-size: 24px;">Les inscriptions sont d&eacute;sactiv&eacute;es.</span> 
			{/if}