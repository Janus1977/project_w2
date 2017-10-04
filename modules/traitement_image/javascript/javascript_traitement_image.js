
/*

 * http://blog.pascal-martin.fr/post/Afficher-message-chargement-pendant-requetes-Ajax-avec-prototype
 */

var myGlobalHandlers = {
        onCreate: function()
            {
                Element.show('chargement');
            },
        onComplete: function()
            {
                if(Ajax.activeRequestCount == 0){
                    Element.hide('chargement');
                }
            }
    };
Ajax.Responders.register(myGlobalHandlers);

//////////////////////////////
// PARTIE TRAITEMENT IMAGES //
//////////////////////////////
	/**
	 * fonction permettant de confirmer une action
	 * @return boolean
	 */
	function confirmation() {
		return confirm("Certain de faire cela ?");
	}
	
	/**
	 *
	 *
	 */
	function affiche(page,divCible) {
		if (page != "") {
			new Ajax.Updater(divCible, page, { method: 'get' });
	    	//return false;
		} else {
			alert("hé,hé...");
		}
	}

	function ModificationAfficheImage() {
		/* Le nom de l'image selectionnee par l'utilisateur */
		var listeImages = document.getElementById('listeImages');
	    
	    /* Affichage de la page */
		new Ajax.Updater(
	    	'affichage',
	        URL_BASE+'modules/traitement_image/includes/affiche_image.php',
	        {
	            method : 'get',
	            parameters: {
                    cheminImage : listeImages.options[listeImages.selectedIndex].value
                }
	        }
	    );
	}
	    
    function ModifieImage(action) {
		var listeImages = document.getElementById('listeImages');
    	if (listeImages.options[listeImages.selectedIndex].value != '') {
    		if (confirmation()) {
	    		/* Affichage image traitee */
				new Ajax.Updater(
			    	'imageTraitee',
			        URL_BASE+'modules/traitement_image/includes/affiche_image.php',
			        {
			            method : 'get',
			            parameters: {
			            	cheminImage : listeImages.options[listeImages.selectedIndex].value,
		                    action : action
		                }
			        }
			    );
    		}
    	} else {
    		alert("Vous devez choisir une image");
    	}
    }
	
	function redimensionneImage() {
		if (confirmation()) {
			var repertoireDestination = document.getElementById('repertoireDestination')[document.getElementById('repertoireDestination').selectedIndex].value;
			var imageSource = document.getElementById('listeImages')[document.getElementById('listeImages').selectedIndex].value;
			if (repertoireDestination.length > 0) {
				/* Traitement */
				new Ajax.Updater(
				    	'imageTraitee',
				        URL_BASE+'modules/traitement_image/includes/redimensionneImage.inc.php',
				        {
				            method : 'get',
				            parameters: {
				            	repertoireDestination : repertoireDestination,
				            	imageSource : imageSource
				            },
					    	onComplete: function() {
					    		new Ajax.Updater(
					    			'listeImagesATraiter',
					    			URL_BASE+'modules/traitement_image/includes/listeImagesATraiter.inc.php',
					    			{
							            method : 'get'
					    			}
					    		);
					    	}
				        }
				    );
				
//				/* Re-affichage */
//				new Ajax.Updater(
//				    	'imageTraitee',
//				        URL_BASE+'modules/traitement_image/includes/affiche_image.php',
//				        {
//				            method : 'get',
//				            parameters: {
//				            	cheminImage : imageSource
//			                }
//				        }
//				    );
			} else {
				alert("Vous devez choisir un répertoire de destination");
			}
		}
	}


	function sauveNouvelleImage() {
		if (document.getElementById('nomNouvelleImage').value != '') {
			if (confirmation()) {
				var nomNouvelleImage = document.getElementById('nomNouvelleImage').value;
				var repertoireDestination = document.getElementById('repertoireDestination')[document.getElementById('repertoireDestination').selectedIndex].value;
				var imageSource = document.getElementById('listeImages')[document.getElementById('listeImages').selectedIndex].value;
				new Ajax.Updater(
						'infos',
						URL_BASE+'modules/traitement_image/includes/sauveImage.inc.php',
						{
							method: 'post',
							parameters: {
								imageSource : imageSource,
								nomNouvelleImage : nomNouvelleImage,
								repertoireDestination : repertoireDestination
			                },
					    	onComplete: function () {
					    		affiche(URL_BASE+'includes/listeImagesATraiter.inc.php','listeImagesATraiter');
					    	}
						}
				);
			}
		}
	}