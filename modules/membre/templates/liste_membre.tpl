{*
	Template de liste des membres
*}
	{if (!empty($aListeMembres) && sizeof($aListeMembres) > 0)}
		<select id="listeMembres" name="listeMembres" style="display:inline;">
			<option value="-1" selected>Choisissez un Membre</option>
			{foreach from=$aListeMembres item=membre}
				<option value="{$membre->getId()}">{$membre->getPseudo()}</option>
			{/foreach}
		</select>
	{else}
		Aucun membre en base.
	{/if}