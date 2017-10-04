{*
	Template auto genere pour la classe Aaa
	AUTO-GENERATED FILE on 23/02/2017 14:21:07
 *}

	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		<form id="formNewObject">
			<input type="hidden" name="table" value="aaa"/>
	{/if}

	<table>
	<caption>{$aaa->getNom()} (identifiant {$aaa->getId()})</caption>
		<tr>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
			<td align="center" colspan="3">
			{else}
			<td align="center" colspan="2">
			{/if}
				<img src="{$URL_IMGS_EQUIPEMENT}{$aaa->getChemin()}" alt="{$aaa->getNom()}"/>
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
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
				tpe
			</td>
			<td align="center">
				{$aaa->getTpe()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="tpe" id="tpe" value="{$aaa->gettpe()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				sme
			</td>
			<td align="center">
				{$aaa->getSme()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="sme" id="sme" value="{$aaa->getsme()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				mme
			</td>
			<td align="center">
				{$aaa->getMme()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="mme" id="mme" value="{$aaa->getmme()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				e
			</td>
			<td align="center">
				{$aaa->getE()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="e" id="e" value="{$aaa->gete()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				bge
			</td>
			<td align="center">
				{$aaa->getBge()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="bge" id="bge" value="{$aaa->getbge()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				dec
			</td>
			<td align="center">
				{$aaa->getDec()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="dec" id="dec" value="{$aaa->getdec()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				flt
			</td>
			<td align="center">
				{$aaa->getFlt()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="flt" id="flt" value="{$aaa->getflt()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				dbl
			</td>
			<td align="center">
				{$aaa->getDbl()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="dbl" id="dbl" value="{$aaa->getdbl()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				bool
			</td>
			<td align="center">
				{$aaa->getBool()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="bool" id="bool" value="{$aaa->getbool()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				eumer
			</td>
			<td align="center">
				{$aaa->getEumer()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="eumer" id="eumer" value="{$aaa->geteumer()}"/>				</td>
			{/if}
		</tr>
		<tr>
			<td align="left">
				empty
			</td>
			<td align="center">
				{$aaa->getEmpty()}
			</td>
			{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
				<td align="center">
					<input type="text" name="empty" id="empty" value="{$aaa->getempty()}"/>				</td>
			{/if}
		</tr>
	</table>
	{if (!empty($smarty.session.user) && $smarty.session.user->getStaff() == 1)}
		</form>
	{/if}


	{*
		Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
		Il sera preserve lors de la reconstruction automatique.
	 *}
	{*[TAG1]*}	{*[/TAG1]*}


