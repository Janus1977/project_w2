{include file="haut.tpl"}
<body>
	{if isset($smarty.session)}
	<!--
    <form method="post">
        <input type="hidden" name="initsession" value="1" />
        <input type="submit" value="Init Session" />
    </form>
    -->
    {/if}
    <!-- DEFINITION DE LA PAGE -->
	<table style="border: 1px solid yellow;width: 100%;height: 100%;">
		<tr>
			<td style="border: 1px solid red;width: 100%;height: 25%;">
				{if (!empty($smarty.session.user))}
					{include file="{$DIR_BASE}templates/menu.tpl"}
				{else}
					{include file="{$DIR_BASE}templates/identification.tpl"}
				{/if}
			</td>
		</tr>
		<tr>
			<td style="border: 1px solid red;width: 100%;height: 50%;">
				<table style="width:100%;">
					<tr>
						<td style="border: 1px solid black;width: 100%;height: 100%;"><div id="infos" name="infos"></div></td>
					</tr>
					<tr>
						<td style="border: 1px solid black;width: 100%;height: 100%;"><div id="affichageIndex" name="affichageIndex"></div></td>
					</tr>
					<tr>
						<td>
							<table>
								<tr>
									{if (isset($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
										<td style="border: 1px solid black;width: 25%;height: 100%;">
               			                 {include file="{$DIR_BASE}templates/menu_v_g.tpl"}
               			             </td>
									{/if}
									<td style="border: 1px solid black;width: *;height: 100%;">
									     <div id="centre">
               			                 {include file="{$DIR_BASE}templates/centre.tpl"}
               			             </div>
             			           </td>
									{if (isset($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
										<td style="border: 1px solid black;width: 25%;height: 100%;">
           			                     {include file="{$DIR_BASE}templates/menu_v_d.tpl"}
                            			</td>
									{/if}
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
{assign var="delta" value=microtime(true) - $smarty.session.initPage}
	<table>
		<tr>
			<td>copyright...</td>
		</tr>
		<tr>
			<td>page charg&eacute;e en {$delta} secondes</td>
			<td>Nombre de requ&ecirc;tes: {database::getInstance()->getNombreRequetes()}</td>
		</tr>
	</table>
</body>
</html>