{*

	Template Smarty pour le module "ARSENAL IMPERIAL" option "REPARATION"

*}
	<table>
		<caption>liste des objets a reparer</caption>
		{if (sizeof($listeObjets) > 0)}
			<tr>
				<td>Nom</td>
				<td>Usure</td>
				<td>Dur&eacute;e</td>
				<td>R&eacute;parer</td>
				<td>R&eacute;parer (Admin)</td>
			</tr>
			{foreach from=$listeObjets item=objet}
				<tr>
					<td>{$objet.nom}</td>
					<td>{$objet.pourcUsure} %</td>
					<td>{$objet.duree}</td>
					<td>
						<!--
						<input 
								type="button"
								id="repare_{$objet.id}"
								name="repare_{$objet.id}"
								value=""
								onclick="repare({$objet.id})"
						/>
						-->
						<a href="javascript:repare({$objet.id})">R&eacute;parer {$objet.nom}</a>
					</td>
					{if (isset($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
					<td>
						<a href="javascript:repareInstant({$objet.id})">R&eacute;paration instantan&eacute;e</a>
					</td>
					{/if}
				</tr>
			{/foreach}
		{else}
			<tr><td>La liste est vide</td></tr>
		{/if}
		
	</table>