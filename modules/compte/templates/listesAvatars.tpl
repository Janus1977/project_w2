{*
	Template Smarty pour l'affichage des listes des avatars (sélection / suppression)
*}
	{if (isset($nombreAvatarsDispos) && $nombreAvatarsDispos > 0) }
	
		{* avatar actuel associe au compte *}
		{assign var="idDiv" value="avatarEnCours"}
		Votre avatar actuel:<br/>
		{include file="{$TEMPLATES_COMPTE}avatar.tpl"}
		<br/>
		{* liste des avatars disponibles *}
		<div id="avatars" style="border: 1px solid blue;
								width: {$nombreAvatarsDispos * 150}px;
								height: {250 + 30}px;
								z-index: -1;">
			<legend>Les avatars dont vous disposez</legend>
			{assign var="action" value="ajouter"}
			{include file="{$TEMPLATES_COMPTE}listeAvatars.tpl"}
			
		</div>
	{else}
		Pas d'avatar disponible<br/>
	{/if}
	
	{if (isset($nombreAvatarsDispos) && $nombreAvatarsDispos > 0 && $nombreAvatarsDispos < 5) }
		<div id="suppressionAvatar">
			<legend>Cliquez sur l'avatar &agrave; supprimer.</legend>
			{assign var="action" value="supprimer"}
			{include file="{$TEMPLATES_COMPTE}listeAvatars.tpl"}
		</div>
	{/if}