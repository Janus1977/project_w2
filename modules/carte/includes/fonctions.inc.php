<?php
	/**
	 * La librairie de fonctions affectees a la carte.
	 */
	 
	 /**
	  * Fonction permettant de creer un plateau de jeu pour la carte donnee.
	  * Cette image de depart est blanche, vide quoi ;-p
	  * @param string nomCarte	le nom de la carte => du plateau de jeu avec l'extension
	  * @param int largeur		la largeur en pixels si la carte n'existe pas
	  * @param int hauteur		la hauteur en pixels si la carte n'existe pas
	  * @param array $plateauxCarte
	  */
	 function creePlateauCarte($cheminVersPlateauCarte,$largeur,$hauteur,array $plateauxCarte) {
	 	/* 1) creation image vide */
	 	/* Suppression */
	 	if (unlink($cheminVersPlateauCarte)) {
	 		//rien faire
	 	}
	 	
		/* Creation */
	 	$imageVide = ImageCreateTrueColor($largeur, $hauteur)	or die ("Erreur pour cr&eacute;er l'image");
	 	ImageColorAllocate ($imageVide, 255, 0, 0);
	 	imagejpeg($imageVide, $cheminVersPlateauCarte);

		/* 2) creation de l'image definitive */
	 	/* Dimension de l'image */
	 	list($largeurImageDestination,$hauteurImageDestination) = getimagesize($cheminVersPlateauCarte);
	 	
	 	
	 	/* L'image vide pour la nouvelle destination */
	 	$im = ImageCreateTrueColor($largeurImageDestination, $hauteurImageDestination)	or die ("Erreur pour cr&eacute;er l'image");
	 	
	 	/* lecture de l'image destination */
        $destination = imagecreatefromjpeg($cheminVersPlateauCarte);
        
	 	/* La couleur de fond*/
	 	ImageColorAllocate ($im, 0, 0, 0);
	 	
	 	/* Placement des elements du plateau */
	 	foreach ($plateauxCarte AS $plateau) {
	 		$imgPlateau = searchFile(_DIR_IMGS_PLATEAUX_,$plateau['nom'].'.jpg');
	 		list($largeurImageSource,$hauteurImageSource) = getimagesize($imgPlateau);
	 		$source = imagecreatefromjpeg($imgPlateau);
	 		imagecopymerge(	$destination,								//image de sdestination
	 						$source,									//image source (a integrer dans la destination)
	 						(($plateau['x'] - 1) * _TAILLE_CASE_X_),	//X coin sup gauche 
	 						(($plateau['y'] - 1) * _TAILLE_CASE_Y_),	//Y coin sup gauche
	 						0,											//X depart dans la source
	 						0,											//Y depart dans la source
	 						$largeurImageSource,						//largeur de la source
	 						$hauteurImageSource,						//hauteur de la source
	 						100);										// taux <=> transparence
	 	}	 	
	 	
	 	/* L'enregistrement */ 
	 	imagejpeg($destination, $cheminVersPlateauCarte);
	 }
?>
