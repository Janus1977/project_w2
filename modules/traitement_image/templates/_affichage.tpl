<table border="1" style="width:1200px;">
	<tr>
		<td style="width:600px; height: 50px;"><h2>Image initiale</h2></td>
		<td style="width:600px; height: 50px;"><h2>Image trait&eacute;e</h2></td>
	</tr>
	<tr>
		<td style="width:600px; height: 600px;">
			<div id="imageInit" style="border: 1px solid red; width:600px; height: 600px; overflow:auto; z-index:1000;">
				{include file="{$TPL_BASE}affiche_image.tpl"}
			</div>
		</td>
		<td style="width:600px; height: 600px;">
			<div id="imageTraitee" style="border: 1px solid blue; width:600px; height: 600px; overflow:auto; z-index:1000;">
				{include file="{$TPL_BASE}affiche_image.tpl"}
			</div>
		</td>
	</tr>
</table>