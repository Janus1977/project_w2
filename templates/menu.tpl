{*
	Template Smarty pour le menu a partir des modules installes
	puis dans un deuxieme temps activation des droit utilisateurs
*}
<!-- <div id="divmenu" name="divmenu">{include file="{$DIR_BASE}modules/menu/templates/menu.tpl"}</div> -->

	{*mise en commmentaire car reporte dans le module/menu*}



	<table style="border: 1px solid;width: 100%;">
		<tr>
			<td rowspan="2">
				<div
					id="horloge"
					name="horloge"
					style="	text-align: center;
							width:100px;
							height:100px;">
				</div>
			</td>
			<td style="width: 90%;">
				<table border="1">
					<tr>
						<td>
							<table>
								<tr>
									<td>
										<a href="javascript:chargeModule('index');">
											{$idBouton="btnAccueil"}
											{$nomBouton="btnAccueil"}
											{$widthBouton="100"}
											{$heightBouton="50"}
											{$image="accueil.png"}
											{include file="bouton.tpl"}
										</a>
									</td>
									
									{if (isset($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
										{if (isset($smarty.session.staffSession) && $smarty.session.staffSession == 1)}
											<td>
												<a href="javascript:gereStaff();">deco Staff
													{$idBouton="btnDecoStaff"}
													{$nomBouton="btnDecoStaff"}
													{$widthBouton="100"}
													{$heightBouton="50"}
													{$image="blanc.png"}
													{include file="bouton.tpl"}
												</a>
											</td>
										{else}
											<td>
												<a href="javascript:gereStaff();">Con Staff
													{$idBouton="btnCoStaff"}
													{$nomBouton="btnCoStaff"}
													{$widthBouton="100"}
													{$heightBouton="50"}
													{$image="blanc.png"}
													{include file="bouton.tpl"}
												</a>
											</td>
										{/if}
										
										{if (isset($smarty.session.staffSession) && $smarty.session.staffSession == 1)}
												{if (!empty($aListeModulesSmarty))}
													{counter assign=i start=0 print=false}
													{foreach from=$aListeModulesSmarty item=module}
														<td>
															<a href="javascript:chargeModule('{$module->getNom()}');">
																{$module->getNom()}
																{$idBouton="{'btn'|cat: ucfirst({$module->getNom()})}"}
																{$nomBouton="{'btn'|cat: ucfirst({$module->getNom()})}"}
																{$widthBouton="100"}
																{$heightBouton="50"}
																{$image="blanc.png"}
																{include file="bouton.tpl"}
															</a>
														</td>
														{if ($i>1 && $i%8 == 0)}
															</tr>
															<tr>
														{/if}
														{counter}
													{/foreach}
												{else}
													<td>Aucun module actif</td>
												{/if}
											
											
											<td>
												<a href="javascript:chargeModule('modules');">
													{$idBouton="btnModule"}
													{$nomBouton="btnModule"}
													{$widthBouton="100"}
													{$heightBouton="50"}
													{$image="module.png"}
													{include file="bouton.tpl"}
												</a>
											</td>
										{/if}
									{else}
										
									{/if}
									{if ((isset($smarty.session.user) && $smarty.session.user->getStaff() == 1) &&
											(isset($smarty.session.staffSession) && $smarty.session.staffSession == 1))}
										<td>
											<a href="javascript:chargeModule('modules');">
												{$idBouton="btnModule"}
												{$nomBouton="btnModule"}
												{$widthBouton="100"}
												{$heightBouton="50"}
												{$image="blanc.png"}
												{include file="bouton.tpl"}
											</a>
										</td>
									{/if}
									<td>
										<a href="javascript:chargeModule('modules');">
											{$idBouton="btnModule"}
											{$nomBouton="btnModule"}
											{$widthBouton="100"}
											{$heightBouton="50"}
											{$image="blanc.png"}
											{include file="bouton.tpl"}
										</a>
									</td>
								</tr>
							</table>

						</td>
						<td>
						</td>
					</tr>
					<tr>
						<td>
							<a href="javascript:chargeModule('index');">
								<div
									id="btnAccueil"
									name="btnAccueil"
									style="	text-align: center;
											width:100px;
											height:50px;">
								</div>
							</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		
	</table>
*}
garde pour test:

	<table border="1">
		<tr>
			<td colspan="8">
				<input 	type="button"
						value="Accueil"
						onclick="chargeModule('index');"/>

				<input 	type="button"
						value="Modules"
						onclick="chargeModule('modules');"/>
						
				{if (!empty($user))}
					{* bouton deconnexion *}
					<form action="#" method="post" style="display:inline;">
						<input 	type="submit"
								id="deconnexion"
								name="deconnexion"
								value="D&eacute;connexion"
								style="background-color: green; color: white;"
						/>
					</form>
				{/if}
				{if (!empty($user) && $user->getStaff() == 1)}
					{* on fait parti du staff *}
					{if (isset($smarty.session.staffSession) && $smarty.session.staffSession == 0)}
						{* bouton connexion *}
						<form action="#" method="post" style="display:inline;">
							<input type="hidden" name="staffSession" value="1"/>
							<input 	type="submit"
									id="connexionStaff"
									name="connexionStaff"
									value="Connexion Staff"
									style="background-color: red; color: black;"
							/>
						</form>
					{else}
						{* bouton deconnexion Staff*}
						<form action="#" method="post" style="display:inline;">
							<input type="hidden" name="staffSession" value="0"/>
							<input 	type="submit"
									id="connexionStaff"
									name="connexionStaff"
									value="D&eacute;connexion Staff"
									style="background-color: green; color: white;"
							/>
						</form>
					{/if}
				{else}
					{* on ne fait pas parti du staff *}
					{* bouton candidature *}
					<form action="#" method="post" style="display:inline;">
						<input type="hidden" name="staffCandidate" value="1"/>
						<input 	type="submit"
								id="candidateStaff"
								name="candidateStaff"
								value="Candidater au Staff"
								style="background-color: green; color: white;"
						/>
					</form>
				{/if}
			</td>
		</tr>
		<tr>
			{if (!empty($aListeModulesSmarty))}
				{counter assign=i start=0 print=false}
				{foreach from=$aListeModulesSmarty item=module}
					<td>
						{*
						<input 	type="button"
								value="{$module->getNom()}"
								onclick="chargeModule('{$module->getNom()}');"/>
						<br>
						*}
						<a href="javascript:chargeModule('{$module->getNom()}');">{$module->getNom()}</a>
					</td>
					{if ($i>1 && $i%5 == 0)}
						</tr>
						<tr>
					{/if}
					{counter}
				{/foreach}
			{else}
				<td>Aucun module actif</td>
			{/if}
		</tr>
	</table>
