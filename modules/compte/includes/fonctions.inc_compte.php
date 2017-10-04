<?php
/**
 * Fonctions specifiques au module des comptes
 * Un avaar a une taille predefinie dans la partie generique du site
 */
 
 	/**
 	 * Ajoute une image au sprite des avatar d'un compte
 	 */
 	function ajouteAvatarAuSprite($cheminVersImageAAjouter,$nomDeCompte='') {
 		if (strlen(trim($nomDeCompte)) > 0) {
 			/* on a un nom de compte */
 			$chemin = _DIR_IMGS_.$nomDeCompte.'.jpg';
 			$cheminTemp = _DIR_IMGS_.'temp.jpg';
 			if (file_exists($chemin)) {
 				/* dimensions image */
 				list($width,$height) = getimagesize($chemin);
 				$coef = floor($width / _LARGEUR_AVATAR_);
 				
 				/* image de destination */
 				$destination = ImageCreateTrueColor(($coef + 1) * _LARGEUR_AVATAR_, _HAUTEUR_AVATAR_)	or die ("Erreur pour cr&eacute;er l'image");
 				
 				/* Chargement de l' (des) avatar(s) */
 				$source = imagecreatefromjpeg($chemin);
 				list($largeurImageSource,$hauteurImageSource) = getimagesize($chemin);
 				
 				/* On merge les images */
 				imagecopymerge(	$destination,						//image de destination
		 						$source,							//image source (a integrer dans la destination)
		 						0,									//X coin sup gauche 
		 						0,									//Y coin sup gauche
		 						0,									//X depart dans la source
		 						0,									//Y depart dans la source
		 						$largeurImageSource,				//largeur de la source
		 						$hauteurImageSource,				//hauteur de la source
		 						100);								// taux <=> transparence
		 		/* L'enregistrement */ 
	 			imagejpeg($destination, $chemin);
	 			
	 			
 				/* Chargement de l'avatar supplementaire */
 				@move_uploaded_file($cheminVersImageAAjouter, $cheminTemp);
 				$source2 = imagecreatefromjpeg($cheminTemp);
 				list($largeurImageSource2,$hauteurImageSource2) = getimagesize($cheminTemp);
 				
 				/* On merge les images */
 				imagecopymerge(	$destination,						//image de destination
		 						$source2,							//image source (a integrer dans la destination)
		 						$coef * _LARGEUR_AVATAR_,			//X coin sup gauche 
		 						0,									//Y coin sup gauche
		 						0,									//X depart dans la source
		 						0,									//Y depart dans la source
		 						$largeurImageSource2,				//largeur de la source
		 						$hauteurImageSource2,				//hauteur de la source
		 						100);								// taux <=> transparence
		 						
		 		/* L'enregistrement */ 
	 			imagejpeg($destination, $chemin);
	 			
	 			/* Suppression de l'image temporaire */
	 			unlink($cheminTemp);
 			} else {
 				/* image non existante => creation d'une nouvelle image */
		        if (! move_uploaded_file($cheminVersImageAAjouter, $chemin)) {
		        	echo '<br/> Erreur dans la sauvegarde de l\'image <b><i>'.$nomDeCompte.'</i></b>';
		        }
 			}
 		} else {
 			/* Erreur */
 			echo '<br/>Il faut un nom de compte associ&eacute;';
 		}
 	}
 	
 	/**
 	 * Supprime une des image du sprite des avatar
 	 * @param id l'id de l'image a supprimer dans le sprite
 	 */
//  	function enleveAvatarAuSprite($cheminVersImageAvatars,&$nombreAvatarAvantSuppression,$indiceAvatarASupprimer) {
//  		debug("indice avatar a supp: ".$indiceAvatarASupprimer);
//  		$cheminTemp = _DIR_IMGS_.'temp.jpg';
//  		if (file_exists($cheminVersImageAvatars)) {
// 			/* dimensions initiale image */
// 			list($width,$height) = getimagesize($cheminVersImageAvatars);			
			
// 			/* image source */
// 			$source = imagecreatefromjpeg($cheminVersImageAvatars);
			
// 			/* image de destination */
// 			$destination = ImageCreateTrueColor((($nombreAvatarAvantSuppression - 1) * _LARGEUR_AVATAR_), _HAUTEUR_AVATAR_)	or die ("Erreur pour cr&eacute;er l'image");
			
// 			/* Maintenant, il faut charger l'image initiale, puis tourner et 
// 			 * remettre chaque avatar dans l'image si l'indice est different 
// 			 * de celui a supprimer
// 			 */
// 			 for ($i = 0; $i <= $nombreAvatarAvantSuppression; $i++) {
// 			 	debug($i.' / '.$indiceAvatarASupprimer);
// 			 	if ($i != $indiceAvatarASupprimer) {
// 			 		debug($i);
// 			 		debug('coin sup gauche source: '.$i * _LARGEUR_AVATAR_.' / 0');
// 				 	/* On merge les images */
// 	 				imagecopymerge(	$destination,						//image de destination
// 			 						$source,							//image source (a integrer dans la destination)
// 			 						$i * _LARGEUR_AVATAR_,				//X coin sup gauche 
// 			 						0,									//Y coin sup gauche
// 			 						$i * _LARGEUR_AVATAR_,				//X depart dans la source
// 			 						0,									//Y depart dans la source
// 			 						_LARGEUR_AVATAR_,					//largeur de la source
// 			 						_HAUTEUR_AVATAR_,					//hauteur de la source
// 			 						100);								// taux <=> transparence
// 			 		imagejpeg($destination, $cheminTemp);
			 		
// 			 		/* image source */
// 					$source2 = imagecreatefromjpeg($cheminTemp);
// 			 	}
// 			 }
			 
// 			/* on retire un avatar du nombre */
// 			$nombreAvatarAvantSuppression -= 1;
			
// 			/* L'enregistrement */ 
// 	 		imagejpeg($destination, $cheminVersImageAvatars);
//  		} else {
//  			echo '<br/>Mauvais chemin vers les avatars du comppte.';
//  		}
//  	}
?>
