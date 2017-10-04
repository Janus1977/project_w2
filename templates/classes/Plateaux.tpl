{*
	Template auto genere pour la classe Plateaux
 *}

	{if ($smarty.session.user.admin === true)}
		<form id="formPlateaux" action="#" method="post">
	{/if}

	<table>
	<caption>{$plateaux->getNom()} (identifiant {$plateaux->getId()})</cpation>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
			{if ($smarty.session.user.admin === true)}
				Caract&eacute;ristiques actuelles
				</td>
				<td>
				Caract&eacute;ristiques &agrave; appliquer
			{else}
				Caract&eacute;ristiques
			{/if}
			</td>
		</tr>
		<tr>
			<td align="left">
				
			</td>
			<td align="center">
				{$plateaux->getId()}
			</td>
			{if ($smarty.session.user.admin === true)}
				<td align="center">
					<input type="text" name="id" id="id" value="{$plateaux->getId()}"/>
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				
			</td>
			<td align="center">
				{$plateaux->getNom()}
			</td>
			{if ($smarty.session.user.admin === true)}
				<td align="center">
					<input type="text" name="nom" id="nom" value="{$plateaux->getNom()}"/>
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				
			</td>
			<td align="center">
				{$plateaux->getDescription()}
			</td>
			{if ($smarty.session.user.admin === true)}
				<td align="center">
					<textarea cols="20" rows="5" name="description" id="description">{$plateaux->getDescription()}</textarea>
				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				
			</td>
			<td align="center">
				{$plateaux->getChemin()}
			</td>
			{if ($smarty.session.user.admin === true)}
				<td align="center">
					<input type="text" name="chemin" id="chemin" value="{$plateaux->getChemin()}"/>
				</td>
			{/if}
		</tr>
	</table>
	{if ($smarty.session.user.admin === true)}
		<input type="submit" name="formSubmitButton" value="Envoyer"/>
		</form>
	{/if}


	{*
		Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
		Il sera preserve lors de la reconstruction automatique.
	 *}
	{*[TAG1]*}	{*[/TAG1]*}


