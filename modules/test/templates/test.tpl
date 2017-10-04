<h1>partie Test</h1>
{if (!empty($listeModuleTestables))}
	<table>
	{foreach from=$listeModuleTestables item=moduleATester}
		<tr>
			<td>{$moduleATester->getNom()}</td>
			<td><input type="button" 
						id="creeTest{$moduleATester->getNom()}" 
						value="Cr&eacute;e Test {$moduleATester->getNom()}" 
						onclick="creeTest('{$moduleATester->getNom()}')"
						/></td>
		</tr>
	{/foreach}
	</table>
	<div id="centreTest"></div>
{else}
	Aucun module dans la phase de d&eacute;veloppement testable.
{/if}