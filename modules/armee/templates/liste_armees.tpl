{*
	Template Smarty listant les unites du jeu
*}
	{if (!empty($listeArmees) && sizeof($listeArmees) > 0)}
		<select id="listeArmees" name="listeArmees" style="display:inline;">
			<option value="-1" selected>Choisissez une Arm&eacute;e &agrave; traiter</option>
			<option value="0">Ajoutez une Arm&eacute;e</option>
			{foreach from=$listeArmees item=armee}
				<option value="{$armee->getId()}">{$armee->getNom()}</option>
			{/foreach}
		</select>
	{else}
		Aucune arm&eacute;e en base.
	{/if}