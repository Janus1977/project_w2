<table border="1" style="width:600px;">
	<caption>
		<h1>Outils &agrave; disposition</h1>
	</caption>
	<tr>
		<td>
			<input type="button" id="moins90" style="width:100px; height: 100px;" value="-90" onclick="ModifieImage('
			{if (isset($IMG))}
				{$IMG}
			{/if}
			','-90')">
		</td>
		<td>
			<input type="button" id="plus90" style="width:100px; height: 100px;" value="+90">
		</td>
		<td>
			<input type="button" id="180" style="width:100px; height: 100px;" value="180">
		</td>
		<td>
			<input type="button" id="zoom+" style="width:100px; height: 100px;" value="zoom+">
		</td>
		<td>
			<input type="button" id="zoom-" style="width:100px; height: 100px;" value="zoom-">
		</td>
		<td>
			<input type="button" id="moins90" style="width:100px; height: 100px;" value="-90">
		</td>
	</tr>
</table>