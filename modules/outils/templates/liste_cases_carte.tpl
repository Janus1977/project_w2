{*
	Template Smarty listant les cases d'une carte de jeu
*}
	{if (!empty($listeCasesCarte) && sizeof($listeCasesCarte) > 0)}
		<select id="caseCarte" name="caseCarte">
			<option selected>Choisissez dans la liste</option>
			{foreach from=$listeCasesCarte item=case}
			    <option value="{utf8_encode($case->getId())}">Case {$case->getX()}-{$case->getY()}</option>
			{/foreach}
		</select>
	{/if}