{*
	Template Smarty pour la presentation des modules...
*}
<!-- temporaire pour tests -->
		<script type="text/javascript" src="{$URL_BASE}lib/javascript/prototype.js"></script>
		<script type="text/javascript" src="{$URL_MODULES}javascript/javascript.js"></script>
<!-- fin temporaire pour tests -->

<table width="600px" align="center">
	<tr>
		<td colspan="5" align="center" style="border: 2px solid blue;">Ajouter un module</td>
	</tr>
	<tr>
		<td colspan="2" align="center">Nom du module:</td>
		<td colspan="2" align="center"><input type="text" id="newModuleName" name="newModuleName"/></td>
	</tr>
	<tr>
		<td colspan="5" align="right">
			<input type="button"
					id="sbmNewModuleName"
					name="sbmNewModuleName"
					onclick="actionModule(document.getElementById('newModuleName').value,'actif',0);"
					value="Cr&eacute;er le module"/>
		</td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" colspan="5" style="border: 2px solid blue;">Gestion des modules du site</td>
	</tr>
	<tr>
		<td align="center" colspan="5">
			<div id="infos_modules" nom="infos_modules" height="16px" style="overflow=auto;"></div>
		</td>
	</tr>
	{foreach from=$listeModules item=module}
		<tr>
			<td width="200px">{str_replace('_', ' ', $module->getNom())}</td>
			<td width="270px">
				{if ($module->getActif() == 0)}
					<span style="font-weight: bold; color: blue;">En d&eacute;veloppement</span>
				{else if ($module->getActif() == 1) }
					<span style="font-weight: bold; color: red;">Inactif</span>
				{else if ($module->getActif() == 2) }
					<span style="font-weight: bold; color: green;">Actif</span>
				{/if}
			</td>
			<td width="50px" align="center">
				<input 	type="button" 
						id="activeDesactiveModule_{$module->getId()}"
						{if ($module->getActif() == 0)}
							onclick="actionModule({$module->getId()},'actif',1);"
							style="background-color: blue; color: white; font-weight: bold; width: 100px;"
							value="Publier"/>
						{else if ($module->getActif() == 1) }
							onclick="actionModule({$module->getId()},'actif',2);"
							style="background-color: green; color: white; font-weight: bold; width: 100px;"
							value="Activer"/>
						{else if ($module->getActif() == 2) }
							onclick="actionModule({$module->getId()},'actif',1);"
							style="background-color: red; font-weight: bold; width: 100px;"
							value="D&eacute;sactiver"/>
						{/if}
			</td>
			<td width="50px" align="center">
				{if ($module->getActif() == 1)}
					<input 	type="button"
							id="supprimeModule_{$module->getId()}"
							onclick="actionModule({$module->getId()},'actif',0);"
							style="background-color: blue; color: white; font-weight: bold; width: 110px;"
							value="Passer en D&eacute;v"/>
				{else}
					&nbsp;
				{/if}
			</td>
			<td width="50px" align="center">
				<input 	type="button"
						id="supprimeModule_{$module->getId()}"
						onclick="actionModule({$module->getId()},'actif',-1);"
						style="background-color: black; color: white; font-weight: bold; width: 100px;"
						value="Supprimer"/>
			</td>
		</tr>
	{/foreach}
</table>