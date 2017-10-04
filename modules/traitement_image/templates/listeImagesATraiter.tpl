	<form id="init_form_list_images" name="init_form_list_images" action="{$URL_BASE}modules/traitement_image/templates/affiche_image.php" method="post">
		<select id="listeImages" name="listeImages" style="display:inline;">
			<option value="" selected>Choisissez une image &agrave; traiter</option>
			{html_options options=$listeImages}
		</select>
	    <input type="button" id="passe_init_concept" onclick="ModificationAfficheImage();" value="Charger"/><br>
	</form>