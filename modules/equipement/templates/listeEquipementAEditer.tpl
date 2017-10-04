{*
	Le template pour la liste des equipements basique pouvant etre modifies
*}
<form id="init_form_list_equipements" name="init_form_list_equipements" action="" method="post">
	<select id="listeImages" name="listeImages" style="display:inline;">
		<option value="" selected>Choisissez un &eacute;quipement &agrave; traiter</option>
		{foreach from=$listeEquipements item=equipement}
			<option value="{$equipement->getID()}">{$equipement->getNom()}</option>
		{/foreach}
	</select>&nbsp;&nbsp;&nbsp;
    <input type="button" id="passe_init_concept" onclick="afficheEquipement();" value="Charger"/><br>
    <input type="button" id="passe_init_concept" onclick="afficheEquipement();" value="Charger"/><br>
</form>