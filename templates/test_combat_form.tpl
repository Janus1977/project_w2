{*
	Template du test pour les combats
*}
<fieldset>
<legend>Test combats</legend>
	<form method="post">
		<fieldset>
		<legend>Type de Test</legend>
		<input type="radio" name="typetest" id="typetest" value="armee"/>&nbsp;Arm&eacute;es
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" name="typetest" id="typetest" value="unite"/>&nbsp;Unit&eacute;es
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" name="typetest" id="typetest" value="grenade"/>&nbsp;Grenade
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" name="typetest" id="typetest" value="mine"/>&nbsp;Mine
		</fieldset>
		<fieldset>
		<legend>Options</legend>
		<input type="submit" name="init_session" id="init_session" value="OK"/> Reset Session
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" value="OK"/> Recharge la page (re-test avec les unit&eacute;s en session)
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" id="ingame" name="ingame" value="OK"/> Remise en jeu des arm&eacute;e / unit&eacute;s
		</fieldset>
		<fieldset>
		<legend>Choix des unit&eacute;s:</legend>
		Unit&eacute; 1:
		{include file="../modules/unite/templates/liste_unites.tpl"}
		&nbsp;&nbsp;&nbsp;&nbsp;
		Unit&eacute; 2:
		{include file="../modules/unite/templates/liste_unites_joueur.tpl"}
		</fieldset>
		<fieldset>
		<legend>Choix des arm&eacute;es:</legend>
		Arm&eacute;e 1:
		{include file="../modules/armee/templates/liste_armees.tpl"}
		&nbsp;&nbsp;&nbsp;&nbsp;
		Arm&eacute;e 2:
		{include file="../modules/armee/templates/liste_armees.tpl"}
		</fieldset>
		<input type="submit" name="ok" id="ok" value="ok" />
	</form>
</fieldset>