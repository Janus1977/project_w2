{if (empty($smarty.session.user))}
	{* include file="{$DIR_BASE}templates/msg_pastrouve.tpl" *}
{else}
	{*c'est ici qu'il faut basculer les modes de jeu => les affichages*}
	{include file="{$DIR_BASE}templates/page_jeu.tpl"}
{/if}