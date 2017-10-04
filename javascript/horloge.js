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
