{* Template affichage details de l'armee *}
<input type="button" onclick="chargeModule('{$module}')" value="Back"/>
<br/>
{if (!empty($oArmee))}
	{if (!empty($oArmeeComposition))}
	<table>
		<caption>Composition de l'arm&eacute; {$oArmee->getNom()}</caption>
	</table>
	{else}
		La composition de l'arm&eacute;e n'est pas encore faite par le membre.
	{/if}
{else}
	Pas d'information sur l'arm&eacute;e recherch&eacute;e.
{/if}