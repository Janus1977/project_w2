<html>
<head>
<script type="text/javascript" src="{$URL_BASE}lib/javascript/prototype.js"></script>
<script type="text/javascript" src="{$URL_BASE}javascript/ajax.js"></script>
<script type="text/javascript">
	function sendData() {
			var theDropDiv = document.getElementById('drop');
			var lesDivs = theDropDiv.getElementsByTagName("img");
			var ids = ""
			for (var i = 0; i < lesDivs.length; i++) {
				ids = ids +lesDivs[i].id+ ",";
			}
			new Ajax.Updater(
				"tutu",
				"localhost/project_w2/test/test_d_n_d.php",
				{
					method: 'post',
					parameters: {
						ids: ids
					}
				}
			);
	}

</script>
</head>
<body>
<div id="tutu"></div>
<form method="post">
<table>
	<tr>
		<td>
			<div id="drag" style="border:1px solid blue; width:250px; height:600px; overflow:auto;"
						   ondrop="drop(event);"
						   ondragover="allowDrop(event);">
				{foreach from=$listeMiniatures item=image}
				    <img	id="{$image.id}"
				    		src="{$image.chemin}"
				    		alt="{$image.nom}"
				    		draggable="true" 
	 						ondragstart="drag(event)"
	 						style="border:1px solid red;width: 100px; height: 100px;"
				    		/>
				{/foreach}
				
				    <!-- <div 	id="mur" 
				    		draggable="true" 
	 						ondragstart="drag(event)" style="border:1px solid red;">
				    		<img src="http://localhost/project_w2/images/plateau/murs.jpg" alt="image"/>
	 				</div>
	 				<div 	id="plateau_raccordement_eldar" 
				    		draggable="true" 
	 						ondragstart="drag(event)" style="border:1px solid red;">
				    		<img src="http://localhost/project_w2/images/plateau/plateau_raccordement_eldar.jpg" alt="image"/>
	 				</div> -->
			</div>
		</td>
		<td>
			<div id="drop" style="border:1px solid red; width:250px; height:600px; overflow:auto;"
						   ondrop="drop(event);"
						   ondragover="allowDrop(event);">
			</div>
		</td>
	</tr>
</table>
<button onclick="sendData()" id="OK" value="OK"/>
</form>
</body>
</html>