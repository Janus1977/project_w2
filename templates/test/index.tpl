{*
	Template Smarty pour la page d'index des tests
*}
<script type="text/javascript"><!--
    function nettoieTables() {
        alert("nettoieTables()");
    }
    
    function lanceTest(nomScriptTest) {
        url="{$URL_TEST}"+nomScriptTest;
        alert("lancement de "+url);
    }
--></script>
<table width="600px">
	<caption>Lancement des scripts de test du r&eacute;pertoire</caption>
	<tr>
		<td>
			<fieldset>
				<legend>Nettoyage des tables</legend>
					<div id="affiche_netoyage_table"></div>
					<input type="button" onclick="nettoieTables()" value="Nettoyage"/>
			</fieldset>
		</td>
	</tr>
	<tr>
		{assign var="cpt" value=0}
		{foreach from=$aListeFichiersTests item=fichierTest}
		    {if ($cpt == 2)}
		        </tr>
		        <tr>
		    {/if}
		    <td><input type="button" onclick="lanceTest('{$fichierTest[0]}')" value="{$fichierTest[0]}"/></td>
		    {$cpt++}
		{/foreach}
	</tr>
</table>