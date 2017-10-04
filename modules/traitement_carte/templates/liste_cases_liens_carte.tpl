{*
	Template Smarty listant les cases lien d'une carte de jeu
*}
	{if (!empty($listeCasesLienCarte) && sizeof($listeCasesLienCarte) > 0)}
		<select id="caseLienCarte" name="caseLienCarte">
			<option selected>Choisissez dans la liste</option>
			{foreach from=$listeCasesLienCarte item=case}
			    <option value="{utf8_encode($case->getId())}">Case {$case->getX()}-{$case->getY()}</option>
			{/foreach}
		</select>
	{/if}