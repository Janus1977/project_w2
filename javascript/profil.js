function confirmeSuppression () {
		if ( document.getElementById('delete').checked == true ) {
			choix = confirm('Vous �tes sur le point de supprimer votre compte. �tes-vous s�r ?');
		}
		if (choix == false) {
			document.getElementById('delete').checked = 0;
		}
	}

	function confirmeVacances () {
		if ( document.getElementById('vacances').checked == true ) {
			choix = confirm('Vous �tes sur le point de mettre votre compte en mode vacances. Il sera actif pour 48 heures au MINIMUM. �tes-vous s�r ?');
		}
		if (choix == false) {
			document.getElementById('vacances').checked = 0;
		}
	}

	function upload(nom_de_la_page, nom_interne_de_la_fenetre,largeur,hauteur) {
		propriete = "top="+screen.height/3+",left="+screen.width/3+",resizable=no, navbar=yes,status=no, directories=no, addressbar=no, toolbar=no, scrollbars=no, menubar=no, location=no, statusbar=no";
		propriete += ",width="+largeur+",height="+hauteur;
		win = window.open(nom_de_la_page,nom_interne_de_la_fenetre, propriete);
	}

    var tabHeros = new Array();
    function afficheHero (idHero) {
        var leDiv = document.getElementById('infoHero');
        var leHero = tabHeros[idHero];
        var chaine = '<table border="1" align="center">';
        chaine = chaine.concat('<table border="1" align="center">');
        chaine = chaine.concat('	<tr>');
        chaine = chaine.concat('		<td width="50%" align="left">'+ leHero[0] +'</td>');
        chaine = chaine.concat('		<td width="50%" align="right"><u>Exp&eacute;rience:</u>&nbsp;'+ leHero[1] +'</td>');
        chaine = chaine.concat('	</tr>');
        chaine = chaine.concat('	<tr>');
        chaine = chaine.concat('		<td colspan="2" align="center">'+ leHero[2] +'</td>');
        chaine = chaine.concat('	</tr>');
        chaine = chaine.concat('</table>');
        leDiv.innerHTML = chaine;
    }

    function changeProfil(formAEnvoyer){
        alert(formAEnvoyer.elements[0].value);
        formAEnvoyer.submit();
    }

