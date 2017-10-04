//var taille_case_en_x = 30;
//var taille_case_en_y = 30;

	function affiche(idAAfficher) {
		alert(idAAfficher);
		document.getElementById(idAAfficher).display = "block";
	}

	function cache(idAAfficher) {
		alert(idAAfficher);
		document.getElementById(idAAfficher).display = "none";
	}
	
	//test pour une fonxtion generique AJAX
	function genericAjaxUpdater(divCible,urlScriptPhp,listeParametres) {
		new Ajax.Updater(
			divCible,
			urlScriptPhp,
			{
				method: 'post', //toujours en POST
				parameter: {
					
				},
				onComplete: function () {
					//TODO
				}
			}
		);
	}

	function afficheCarte(id,action,x,y) {
		if (!isNaN(id)) {
			new Ajax.Request(
				URL_MODULES_BASES+'carte/carte.php',
				{
					method: 'post',
					parameters: {
						id: id,
						action: action,
						x: x,
						y: y
					},
					onComplete:function(RETOUR){
						parent.document.getElementById('conteneur_carte').innerHTML = RETOUR.responseText;
						/* La mini carte */
						new Ajax.Updater(
							'conteneur_mini_carte',
							URL_MODULES_BASES+'mini_carte/mini_carte.php',
							{ 
								method: 'post',
								parameters: {
									id: id
								},
								onComplete: function() {
									/* La liste des plateaux de la carte pour eventuelle suppression */
									afficheListePlateauxCarte(id);
									
									/* Le bouton de suppression de la carte */
									document.getElementById('boutonSupprimeCarte').disabled = false;
									
									/* Affichage des actions sur zone */
									afficheActionsZone(id);
								}
							}
						);
					}
				}
			);
//			/* La liste des plateaux de la carte pour eventuelle suppression */
//			afficheListePlateauxCarte(id);
//			
//			/* Le bouton de suppression de la carte */
//			document.getElementById('boutonSupprimeCarte').disabled = false;
//			
//			/* Affichage des actions sur zone */
//			afficheActionsZone();
		}
	}
	
	function cacheDiv(idDiv) {
		document.getElementById(idDiv).innerHTML = '';
	}

function supprimeElement(divID) {
    elt = document.getElementById(divID);
    parent = elt.parentNode;
    parent.removeChild(elt);
    afficheCase(parent);
}
            
/*
 * Creation d'un objet XmlHttpRequest,
 * appele par les autres fonctions.
 */
function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest();
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}

function listeUnitesDispo(viewDiv,id) {
    var xhr = getXMLHttpRequest();

	if (xhr && xhr.readyState != 0) {
		xhr.abort();
		delete xhr;
	}

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200){
			document.getElementById(viewDiv).innerHTML = xhr.responseText;
		} else if (xhr.readyState == 3){
			document.getElementById(viewDiv).innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
		}
	};

	xhr.open("POST", "ajax/listeUnites.ajax.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
	xhr.send("idcamp="+id);
}

function afficheData(viewDiv,data,type) {
    var datas = data.split("_");
    var xhr = getXMLHttpRequest();

	if (xhr && xhr.readyState != 0) {
		xhr.abort();
		delete xhr;
	}

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200){
			document.getElementById(viewDiv).innerHTML = xhr.responseText;
		} else if (xhr.readyState == 3){
			document.getElementById(viewDiv).innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
		}
	};

	xhr.open("POST", "ajax/"+type+".ajax.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
	xhr.send("id"+type+"="+datas[0]+"&idcamp="+datas[2]);
}

function inscription(viewDiv){
	var xhr = getXMLHttpRequest();
	
	if (xhr && xhr.readyState != 0) {
		xhr.abort();
		delete xhr;
	}
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200){
			document.getElementById(viewDiv).innerHTML = xhr.responseText;
		} else if (xhr.readyState == 3){
			document.getElementById(viewDiv).innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
		}
	};
	
	xhr.open("POST", "inscription.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
	
	
	
	if (document.getElementById('pseudo') == null) {
		//Cas o� on arrive sur la page d'inscription pour s'inscrire
		xhr.send(null);
	} else {
		//Cas o� on envois les info � la page php
		//Les informations du formulaire
		pseudo = document.getElementById('pseudo').value;
		mdp = document.getElementById('pass').value;
		mdp2 = document.getElementById('pass2').value;
		mail = document.getElementById('adressemail').value;
		CGU = document.getElementById('CGU').value;
		
		xhr.send("pseudo="+pseudo+"&pass="+mdp+"&pass2="+mdp2+"&mail="+mail+"&CGU="+CGU);
	}
}

function affichechat(viewDiv,table){
	var xhr = getXMLHttpRequest();
	
	if (xhr && xhr.readyState != 0) {
		xhr.abort();
		delete xhr;
	}
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200){
			document.getElementById(viewDiv).innerHTML = xhr.responseText;
		}
		// else if (xhr.readyState == 3){
		//	document.getElementById(viewDiv).innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
		//}
	};
	
	xhr.open("POST", "affichechat.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
	xhr.send(null);
}

function afficheInfoHero(viewDiv){
	var xhr = getXMLHttpRequest();
	
	//On r�cup�re le tableau des ID des h�ros
	var tab_idhero = document.getElementsByName('idhero');
	
	//On parcours ce tableau, lorsqu'on tombe sur une valeur � TRUE, on note sa valeur et on la m�morise et on sort
	for (var i=0; i<=tab_idhero.length; i++) {
		if (tab_idhero[i].checked) {
			idhero = tab_idhero[i].value;
			break;
		}
	}
	if (xhr && xhr.readyState != 0) {
		xhr.abort();
		delete xhr;
	}
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200){
			document.getElementById(viewDiv).innerHTML = xhr.responseText;
		}
		// else if (xhr.readyState == 3){
		//	document.getElementById(viewDiv).innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
		//}
	};
	
	xhr.open("POST", "includes/modules/espaceMembre/profil/includes/infohero.inc.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
	xhr.send("idhero="+idhero);
}

function inserechat(viewDiv){
	var xhr = getXMLHttpRequest();
	
	if (xhr && xhr.readyState != 0) {
		xhr.abort();
		delete xhr;
	}
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200){
			document.getElementById(viewDiv).innerHTML = xhr.responseText;
		}
// 		 else if (xhr.readyState == 3){
// 			document.getElementById(viewDiv).innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
// 		}
	};
	
	xhr.open("POST", "ajoutchat.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
	
	if (document.getElementById('textechatrapide') == null) {
		//Cas o� on arrive sur la page d'inscription pour s'inscrire
		xhr.send(null);
	} else {
		//Cas o� on envois les info � la page php
		//Les informations du formulaire
		message = document.getElementById('textechatrapide').value;
		
		xhr.send("message="+message);
	}
}

/**
 * Fonction permettant d'afficher, en mode admin, les options de la case cliquée (OBS)
 */
//function optionsCase(idCase) {
//    var xhr = getXMLHttpRequest();
//
//	if (xhr && xhr.readyState != 0) {
//		xhr.abort();
//		delete xhr;
//	}
//
//	xhr.onreadystatechange = function() {
//		if (xhr.readyState == 4 && xhr.status == 200){
//			document.getElementById('options').innerHTML = xhr.responseText;
//		} else if (xhr.readyState == 3){
//			document.getElementById('options').innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
//		}
//	};
//
//	xhr.open("POST", "ajax/optionscases.ajax.php", true);
//	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
//	xhr.send("idcase="+idCase);
//}

/**
 * Fonction permettant d'afficher, en mode admin, les options de la case cliquée (OBS)
 */
//function optionsUnite(idUnite) {
//    var xhr = getXMLHttpRequest();
//
//	if (xhr && xhr.readyState != 0) {
//		xhr.abort();
//		delete xhr;
//	}
//
//	xhr.onreadystatechange = function() {
//		if (xhr.readyState == 4 && xhr.status == 200){
//			document.getElementById('options').innerHTML = xhr.responseText;
//		} else if (xhr.readyState == 3){
//			document.getElementById('options').innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
//		}
//	};
//
//	xhr.open("POST", "ajax/optionsunites.ajax.php", true);
//	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
//	xhr.send("idunite="+idUnite);
//}

/**
 * Fonction permettant d'afficher les options de déplacement à partir de la case
 */
function optionsDeplacement(idCase) {
    var xhr = getXMLHttpRequest();

	if (xhr && xhr.readyState != 0) {
		xhr.abort();
		delete xhr;
	}

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200){
			document.getElementById('options').innerHTML = xhr.responseText;
		} else if (xhr.readyState == 3){
			document.getElementById('options').innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
		}
	};

	xhr.open("POST", "ajax/optionsdeplacement.ajax.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
	xhr.send("idcase="+idCase);
}

/**
 * Fonction permettant d'afficher les options de déplacement à partir de la case
 */
function optionsAttaque(idCase) {
    var xhr = getXMLHttpRequest();

	if (xhr && xhr.readyState != 0) {
		xhr.abort();
		delete xhr;
	}

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200){
			document.getElementById('options').innerHTML = xhr.responseText;
		} else if (xhr.readyState == 3){
			document.getElementById('options').innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
		}
	};

	xhr.open("POST", "ajax/optionsattaque.ajax.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
	xhr.send("idcase="+idCase);
}

//function afficheCarte(action,x,y) {
//    if (x > taille_carte_en_X || y > taille_carte_en_Y) {
//        if (!confirm("l'une des deux valeur est supérieure à la taille de la carte, continuer quand même ?")) {
//            return;
//        }
//    }
//    /*
//     * ANCIENNE POSITION DU H-G
//     */
//    positionHGActuelle = document.getElementById('carte').style.backgroundPosition;
//    positionHGActuelle = positionHGActuelle.split(" ");
//    anciennePositionHGX = positionHGActuelle[0].split("pt");
//    anciennePositionHGX = Math.floor(Math.abs(parseInt(anciennePositionHGX[0])) / taille_case_en_x);
//    anciennePositionHGY = positionHGActuelle[1].split("pt");
//    anciennePositionHGY = Math.floor(Math.abs(parseInt(anciennePositionHGY[0])) / taille_case_en_y);
//
//    /*
//     * CALCUL DU NOMBRE DE CASES POUR CHAQUE COORDONNEES
//     */
//    nombreCasesEnX = Math.floor(parseInt(document.getElementById('carte').style.maxWidth) / taille_case_en_x);
//    nombreCasesEnY = Math.floor(parseInt(document.getElementById('carte').style.maxHeight) / taille_case_en_y);
//
//    /*
//     * CALCUL DE LA POSITION DU CENTRE DE LA CARTE
//     */
////    if (x <= 0) {
////        centreX = Math.floor(anciennePositionHGX + (nombreCasesEnX / 2)) + 1; //car on commence à 1 pas à 0
////    } else if (x > 0 && x < 50) {
////        centreX = Math.floor(anciennePositionHGX + (nombreCasesEnX / 2));
////    } else if (x == 50) {
////        centreX = Math.floor(anciennePositionHGX + (nombreCasesEnX / 2)) - Math.floor(50 - (nombreCasesEnX / 2)); //car on commence à 1 pas à 0
////    }
////
////    if (y <= 0) {
////        centreY = Math.floor(anciennePositionHGY + (nombreCasesEnY / 2)) + 1; //car on commence à 1 pas à 0
////    } else if (y > 0 && x < 50) {
////        centreY = Math.floor(anciennePositionHGY + (nombreCasesEnY / 2));
////    } else if (y == 50) {
////        centreY = Math.floor(anciennePositionHGY + (nombreCasesEnY / 2)) - Math.floor(50 - (nombreCasesEnY / 2)); //car on commence à 1 pas à 0
////    }
//
//    if (x == 0 && y == 0) {
//        centreX = Math.floor(anciennePositionHGX + (nombreCasesEnX / 2)) + 1; //car on commence à 1 pas à 0
//        centreY = Math.floor(anciennePositionHGY + (nombreCasesEnY / 2)) + 1; //car on commence à 1 pas à 0
//    } else {
//        centreX = Math.floor(anciennePositionHGX + (nombreCasesEnX / 2));
//        centreY = Math.floor(anciennePositionHGY + (nombreCasesEnY / 2));
//    }
//
//    //alert("ancien centre"+centreX+"/"+centreY);
//    if (action == 'position') {
//        /*
//         * CALCUL DU NOUVEAU CENTRE DE LA CARTE
//         */
//        centreX = x;
//        if (centreX >= (taille_carte_en_X - nombreCasesEnX)) {
//            centreX = centreX - Math.floor(nombreCasesEnX / 2);
//            nouvellePositionX = (taille_carte_en_X - Math.floor(nombreCasesEnX / 2) > 0) ? taille_carte_en_X - nombreCasesEnX : 0;
//        } else {
//            nouvellePositionX = (centreX - Math.floor(nombreCasesEnX / 2) > 0) ? centreX - Math.floor(nombreCasesEnX / 2) : 0;
//        }
//        centreY = y;
//        if (centreY >= (taille_carte_en_Y - nombreCasesEnY)) {
//            centreY = centreY - Math.floor(nombreCasesEnY / 2);
//            nouvellePositionY = (taille_carte_en_Y - Math.floor(nombreCasesEnY / 2) > 0) ? taille_carte_en_Y - nombreCasesEnY : 0;
//        } else {
//            nouvellePositionY = (centreY - Math.floor(nombreCasesEnY / 2) > 0) ? centreY - Math.floor(nombreCasesEnY / 2) : 0;
//        }
//        action = '';
//    } else {
//        /*
//         * CALCUL DU NOUVEAU CENTRE DE LA CARTE
//         */
//        centreX = Math.floor(anciennePositionHGX + (nombreCasesEnX / 2)) + x;
//        centreY = Math.floor(anciennePositionHGY + (nombreCasesEnY / 2)) + y;
//        if (x == 0 && y == 0) {
//            centreX = centreX + 1;
//            centreY = centreY + 1;
//        }
//        nouvellePositionX = (centreX - Math.floor(nombreCasesEnX / 2) > 0) ? centreX - Math.floor(nombreCasesEnX / 2) : 0;
//        nouvellePositionY = (centreY - Math.floor(nombreCasesEnY / 2) > 0) ? centreY - Math.floor(nombreCasesEnY / 2) : 0;
//    }
//
//    if (x == 0 && y == 0) {
//        document.getElementById('carte').style.backgroundPosition = "0px 0px";
//    } else {
//        document.getElementById('carte').style.backgroundPosition = "-"+(nouvellePositionX * taille_case_en_x)+"px -"+(nouvellePositionY * taille_case_en_y)+"px";
//    }
//    
//    /*
//     * PARTIE XMLHTTPREQUEST
//     */
//    var xhr = getXMLHttpRequest();
//    if (xhr && xhr.readyState != 0) {
//            xhr.abort();
//            delete xhr;
//    }
//    xhr.onreadystatechange = function() {
//            if (xhr.readyState == 4 && xhr.status == 200){
//                    document.getElementById('carte').innerHTML = xhr.responseText;
//            } else if (xhr.readyState == 3){
//                    document.getElementById('carte').innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
//            }
//    }
//    //alert("nouveau centre"+centreX+"/"+centreY);
//    xhr.open("POST", "ajax/carte.ajax.php", true);
//    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
//    parametres = "";
//    if (typeof(idCaseAttaquee)=='number' && typeof(distance)=='number') {
//        parametres = "action="+action+"&x="+centreX+"&nombreCasesEnX="+nombreCasesEnX+"&y="+centreY+"&nombreCasesEnY="+nombreCasesEnY+"&idCaseAttaquee="+idCaseAttaquee+"&distance="+distance;
//        window['idCaseAttaquee'] = undefined;
//        window['distance'] = undefined;
//    } else {
//        parametres = "action="+action+"&x="+centreX+"&nombreCasesEnX="+nombreCasesEnX+"&y="+centreY+"&nombreCasesEnY="+nombreCasesEnY;
//    }
//    xhr.send(parametres);
//}

function attaqueCase(caseID,distance,x,y) {
    /*on appelle l'affichage de la carte*/
    window['idCaseAttaquee'] = caseID;
    window['distance'] = distance;
    afficheCarte('attaque',x,y);
}

//function deplaceCarte(x,y) {
//    positionActuelle = document.getElementById('carte2').style.backgroundPosition;
//    if (positionActuelle.length == 0) {
//        document.getElementById('carte').style.backgroundPosition = x+"px "+y+"px";
//    } else {
//        tabPosition = positionActuelle.split(" ");
//        positionX = tabPosition[0].split("px");
//        nouvellePositionX = parseInt(positionX[0]) + parseInt(x);
//        positionY = tabPosition[1].split("px");
//        nouvellePositionY = parseInt(positionY[0]) + parseInt(y);
//        document.getElementById('carte2').style.backgroundPosition = nouvellePositionX+"px "+nouvellePositionY+"px";
//    }
//}

function appel (fonction,viewDiv) {
	switch (fonction) {
		case 0:
			//INSCRIPTION
			inscription(viewDiv);
			break;
		case 1:
			affichechat(viewDiv);
			
			//Raffra�chissement toutes les 15 secondes
			setTimeout("appel(1,'chatrapide')", 15000);
			break;
		case 2:
			inserechat(viewDiv);
			break;
		case 3:
		//Affichage info du h�ro s�lectionn�
			afficheInfoHero(viewDiv);
			break;
		default:
			break;
	}
}


function modifieChampBase(table,idObjet,champ,valeur,type) {
	if (confirmation()) {
		new Ajax.Updater(
			'infos',
			URL_INCLUDES_BASE+'majBase.inc.php',
			{
				method: 'post',
				parameters: {
					table: table,
					action: 'modification',
					id: idObjet,
					champ: champ,
					valeur: valeur,
					type: type
				}
			}
		);
	}
}

function chargeModule(nomModule,template) {
	if (nomModule == 'index') {
		window.location = 'index.php';
	} else {
		var url = '';
		if (nomModule == 'modules') {
			url = URL_MODULES_BASES+'/'+nomModule+'.php';
		} else {
			url = URL_MODULES_BASES+nomModule+'/'+nomModule+'.php';
		}
		new Ajax.Updater(
			'centre',
			url,
			{
				method: 'post',
				parameters: {
					acces:'menu',
					template: template
				}
	//				,
	//			parameters: {
	//				table: table,
	//				action: 'modification',
	//				id: idObjet,
	//				champ: champ,
	//				valeur: valeur,
	//				type: type
	//			}
			}
		);
	}
}

function goBack(module) {
	chargeModule(module);
}

function connecteMembre() {
	new Ajax.Request(
		URL_INCLUDES_BASE+'identification.inc.php',
		{
			method: 'post',
			parameters : {
				table: 'membre',
				action: 'identification',
				data: Form.serialize('connexionForm')
			},
			onComplete: function () {
				chargeModule('index');
			}
		}
	);
}
//OBS
//function connecteStaff() {
//	new Ajax.Updater(
//		'divmenu',
//		URL_MODULE_MENU+'menu.php',
//		{
//			method: 'post',
//			parameters : {
//				staffSession: 1
////			},
////			onComplete: function () {
////				chargeModule('index');
//			}
//		}
//	);
//}

function gereStaff() {
	new Ajax.Request(
		URL_BASE+'index.php',
		{
			method: 'post',
			parameters : {
				staffSession: 0
//			},
//			onComplete: function () {
//				chargeModule('index');
			}
		}
	);
}

function motDePasseOublie(demande) {
	if (demande == 1) {
		new Ajax.Updater(
			'centre',
			URL_INCLUDES_BASE+'motDePasseOublie.inc.php',
			{
				method: 'post',
				parameters: {
					emailMotDePasseOublie: document.getElementById('emailMotDePasseOublie').value
				}
			}
		);
	} else {
		new Ajax.Updater(
			'centre',
			URL_INCLUDES_BASE+'motDePasseOublie.inc.php',
			{
				method: 'post'
			}
		);
	}
}


//$("formNewObject").observe(
//	"submit",
//	function(e){
//		// on stoppe l'�v�nement
//		e.stop();
//		// on recupere l'element qui a g�n�r� l'�v�nement (le formulaire):
//		var theForm = e.element();
//		// on fait directement appel � theForm pour l'action de la requ�te 
//		// et pour g�n�rer les param�tres par s�rialisation du formulaire
//		new Ajax.Updater(
//				div,
//				URL_INCLUDES_BASE+'majBase.inc.php',
//				{
//					parameters: theForm.serialize(true)
//				}
//		);
//	}
//);

function creeObjet(table,div) {
	if (confirmation()) {
		var theForm = document.getElementById('formNewObject');
		new Ajax.Updater(
			div,
			URL_INCLUDES_BASE+'majBase.inc.php',
			{
				method: 'post',
				parameters: theForm.serialize(true)
			}
		);
	}
}

/////////////////////////////////


function allowDrop(ev){
	ev.preventDefault();
}

function drag(ev){
	ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev){
	ev.preventDefault();
	var data=ev.dataTransfer.getData("Text");
	document.getElementById(ev.target.id).appendChild(document.getElementById(data));
}