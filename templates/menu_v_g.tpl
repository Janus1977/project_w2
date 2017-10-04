{* Template menu vertical gauche *}
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
		<td>
		{if (isset($smarty.session.staffSession) && $smarty.session.staffSession == 1)}
				<a href="javascript:gereStaff();">Deco Staff
					{$idBouton="btnDecoStaff"}
					{$nomBouton="btnDecoStaff"}
				</a>
		{else}
				<a href="javascript:gereStaff();">Con Staff
					{$idBouton="btnCoStaff"}
					{$nomBouton="btnCoStaff"}
		{/if}
				{$widthBouton="100"}
				{$heightBouton="50"}
				{$image="blanc.png"}
				{include file="bouton.tpl"}
			</a>
		</td>
		
	</tr>
	<tr>
		{if (!empty($aListeModulesSmarty))}
				{counter assign=i start=1 print=false}
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
				{if ($i>1 && $i%2 == 0)}
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