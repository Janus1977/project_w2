{*
	Template Smarty pour la gestion des avatars
*}
<table align="center">
	<tr>
		<td width="800">
			<input 	type="button"
					id="gereCompte"
					name="gereCompte"
					onclick="chargeModule('compte')"
					value="Gestion du compte"/>
		</td>
	</tr>
	<tr>
		<td>
			{if (isset($nombreAvatarsDispos) && $nombreAvatarsDispos < 5) }
				<div id="ajoutAvatar" style="border: 2px solid green;">
					<legend>Ajouter un avatar &agrave; votre liste</legend>
					Pour rappel:
					<ul type="circle">
						<li>Vous utilisez actuellement {$nombreAvatarsDispos} avatar(s) sur 5</li>
						<li>Largeur de l'avatar: {$largeurAvatar} pixels</li>
						<li>Hauteur de l'avatar: {$hauteurAvatar} pixels</li>
						<li>Poids de l'avatar: {$poidsAvatar} ko</li>
					</ul>
					<form enctype="multipart/form-data" method="post" action="{$URL_COMPTE}compte.php">
						<input id="monAvatar" name="monAvatar" type="file"/><br/>
						<input type="checkbox" id="redimensionner" name="redimensionner">&nbsp;Mettre aux dimensions<br/>
						<input type="submit" id="ajouteAvatar" name="ajouteAvatar" value="Ajouter un avatar">
					</form>
				</div>
			{else}
				Vous avez atteint le maximum autoris&eacute;.
			{/if}
		</td>
	</tr>
	<tr>
		<td>
			{if (isset($nombreAvatarsDispos) && $nombreAvatarsDispos > 0) }
				{* liste des avatars disponibles *}
				<div id="avatars" style="border: 2px solid black;
										/*width: {$nombreAvatarsDispos * 150}px; */
										height: {250 + 30}px;
										z-index: -1;">
					<legend>Choix d'un avatar &agrave; afficher</legend>
					{assign var="action" value="ajouter"}

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
				</div>
			{else}
				Pas d'avatar disponible<br/>
			{/if}
			
		</td>
	</tr>
	<tr>
		<td>
			{if (isset($nombreAvatarsDispos) && $nombreAvatarsDispos > 0 && $nombreAvatarsDispos < 5) }
				<div id="suppressionAvatar" style="border: 2px solid red;
										/*width: {$nombreAvatarsDispos * 150}px; */
										height: {250 + 30}px;
										z-index: -1;">
					<legend>Cliquez sur l'avatar &agrave; supprimer.</legend>
					{assign var="action" value="supprimer"}

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

				</div>
			{else}
				Pas d'avatar disponible.
			{/if}
		</td>
	</tr>
</table>