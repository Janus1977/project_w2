{*
	Template Smarty d'affichage d'un avatar
*}
<div id="{$idDiv}" style="background:url('{$URL_IMAGE_COMPTE}?{$random}');
							position:relative;
							width: {$largeurAvatar}px;
							height: {$hauteurAvatar}px;
							{if (isset($top))}
								top: {$top}px;
							{else}
								top: 0px;
							{/if}
							{if (isset($left))}
								left: {$left}px;
							{else}
								left: 0px;
							{/if}
							{if (isset($yAvatar))}
								background-position: -{$xAvatar}px {$yAvatar}px;
							{else}
								background-position: -{$xAvatar}px 0px;
							{/if}
							background-repeat: no-repeat;"
				{if (!empty($nomAvatar))}
					onmouseover="BulleWrite('<div style=\'border:1px solid black; background-color:white;\'>{{$nomAvatar}}</div>',15,15)">
				{else}
					onmouseover="BulleWrite('<div style=\'border:1px solid black; background-color:white;\'>Sans Nom</div>',15,15)">
				{/if}

{if (isset($indiceAvatar))}
<input 	type="button"
		id="button_{$indiceAvatar}
		name="button_{$indiceAvatar}"
		{if (isset($indiceAvatar))}
			{if (isset($action) && $action == "supprimer")}
				onclick="supprimeAvatar({$smarty.session.compte->getId()},{$indiceAvatar},{$smarty.session.compte->getAvatar()});"
				value="Supprimer"
			{else}
				onclick="choisitAvatar({$smarty.session.compte->getId()},{$indiceAvatar});"
				value="Choisir"
			{/if}
		{/if}
/>
{/if}
</div>
