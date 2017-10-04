	function extraitDonneesFormulaire(theFormId) {
		var elements = document.getElementById(theFormId);
		for (var i=0;i<elements.length; i++) {
			var element = elements[i];
			if (element.type=="checkbox" && element.checked == true) {
				alert(elements[i].name);
				alert(elements[i].id);
				alert(elements[i].value);
			}
			
		}
	}

	function proposeIA() {
		if (document.getElementById('nbJoueur').options[document.getElementById('nbJoueur').selectedIndex].value == 4) {
			document.getElementById('nbIA').selectedIndex = 0;
		} else if (document.getElementById('nbJoueur').options[document.getElementById('nbJoueur').selectedIndex].value == 2) {
			document.getElementById('nbIA').selectedIndex = 2;
		} else {
			//une IA par defaut
			document.getElementById('nbIA').selectedIndex = 1;
		}
	}

	function checkNewGame() {
		var nbJoueur = parseInt(document.getElementById('nbJoueur').options[document.getElementById('nbJoueur').selectedIndex].value);
		var nbIA = parseInt(document.getElementById('nbIA').options[document.getElementById('nbIA').selectedIndex].value);
		if ((nbJoueur + nbIA) > 4) {
			document.getElementById('infos').innerHTML = '<span style="background-color: red;">4 joueurs (IA comprise) maximum.</span>';
			return false;
		} else {
			document.getElementById('infos').innerHTML = '';
		}
		
	}
	
	function ejs_server_calc() {
		if (ejs_server_sec < 10) {
			ejs_server_sec = "0"+Math.round(ejs_server_sec);
		} else if(ejs_server_sec >= 60) {
			ejs_server_sec = "00";
			ejs_server_min++;
		}
		if (ejs_server_min < 10) {
			ejs_server_min = "0"+Math.round(ejs_server_min);
		} else if(ejs_server_min >= 60)	{
			ejs_server_min = "00";
			ejs_server_heu++;
		}
		if (ejs_server_heu < 10) {
			ejs_server_heu = "0"+Math.round(ejs_server_heu);
		} else if(ejs_server_heu >= 24) {
			ejs_server_heu = "00";
		}
		
		//ejs_server_texte = ejs_server_jou;
		ejs_server_texte = " "+((n<10)?"0":"") + n;
		ejs_server_texte += " " + ejs_server_moi;
		ejs_server_texte += " " + ejs_server_ann;
		ejs_server_texte += "<br/>" + ejs_server_heu;
		ejs_server_texte += ":" + ejs_server_min;
		ejs_server_texte += ":" + ejs_server_sec;

		if (document.getElementById) {
			document.getElementById("horloge").innerHTML=ejs_server_texte;
		}
		ejs_server_sec++;
	}
	
	function lanceLesDes() {
		var listeOrdres = new Array();
		var aLesDesChoisis = new Array('4','6','8','10','12','20','100');
		var i = 0;
		for (i=0;i<aLesDesChoisis.length; i++) {
			if (aLesDesChoisis[i].checked) {
				alert(aLesDesChoisis[i]);
				listeOrdres.push(document.getElementById('nombreD'+aLesDesChoisis[i]).value+'D'+aLesDesChoisis[i]);
			}
			
		}

		new Ajax.Updater(
			'resultatJetDeDes',
			URL_BASE+'lanceDes.php',
			{
				method: 'post',
				parameters: {
					listeOrdres: listeOrdres.toString(),
				}
			}
		);
	}
	