{*
	Template Smarty pour afficher une liste des avatars
*}
	{for $i = 0 to ($nombreAvatarsDispos - 1)}
		{if ($i == 0)}
			{assign var="top" value=0}
		{else}
			{assign var="top" value=0 - $i * $hauteurAvatar}
		{/if}
		{assign var="left" value=0 + $i * $largeurAvatar}
		{assign var="indiceAvatar" value=$i}
		{assign var="idDiv" value="avatar_$i"}
		{assign var="xAvatar" value=0 + $i * $largeurAvatar}
		{assign var="nomAvatar" value="Avatar $i"}
		{include file="{$TEMPLATES_COMPTE}avatar.tpl"}
	{/for}