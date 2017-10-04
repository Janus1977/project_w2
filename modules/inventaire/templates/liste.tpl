	{if (!empty($listeEquipementDroite))}
		<form id="formListeDroite" action="" method="post">
			{foreach from=$listeEquipementDroite item=equipement}
				{if (isset($smarty.session.staffSession) && $smarty.session.staffSession == 1)}
					<input type="checkbox" name="equipementDroite[]" value="{$equipement->getId()}">{$equipement->getNom()} (ID {$equipement->getId()})<br/>
				{else}
					<input type="checkbox" name="equipementDroite[]" value="{$equipement->getId()}">{$equipement->getNom()}<br/>
				{/if}
			{/foreach}
		</form>
	{else}
		Pas d'&eacute;quipement disponible
	{/if}