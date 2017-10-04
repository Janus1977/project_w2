<?php
	/**
	 * Cette fonction permet de fournir a l'appelant la liste des repertoire destination des images traitees
	 * @param string $repertoire le repertoire de depart de la recherche
	 * @param array listeRepertoireDestination la liste a remplir
	 */
	function listeRepertoireDestination($repertoire,&$listeRepertoireDestination) {
		$repertoiresInaccessibles = array('brutes','cartes','jeu');
		$ressource = opendir($repertoire) or die('Erreur de listage : le r&eacute;pertoire "'.$repertoire.'" n\'existe pas');
		while($element = readdir($ressource)) {
			/* Surtout ne pas supprimer le repertoire d'upload */
			if($element != '.' && $element != '..') {
				if (is_dir($repertoire.'/'.$element)) {
					/* Si c'est un repertoire */
					if (!in_array(strtolower($element),$repertoiresInaccessibles)) {
						$listeRepertoireDestination[] = array('chemin' => $repertoire.'/'.$element, 'nom' => $element);
					}					
				}
			}
		}	
		closedir($ressource);
//		return $listeRepertoireDestination;
	}
	
	/**
	 * Fonction retournant le couple [chemin / nom image] dans une liste pour les select
	 */
	if (!function_exists('listeImages')) {
		function listeImages($repertoire,&$listeImages) {
			$listeExtensions = array('jpg','jpeg','gif','png');
			$ressource = opendir($repertoire) or die('Erreur de listage : le r&eacute;pertoire "'.$repertoire.'" n\'existe pas');
			while($element = readdir($ressource)) {
				if($element != '.' && $element != '..' && $element != 'images' && $element != 'jeu' && $element != 'cartes' && $element != 'mini_cartes') {
					if (is_dir($repertoire.$element)) {
						/* Si c'est un repertoire */
						listeImages($repertoire.$element.'/',$listeImages);
					} else {
						/* Si c'est une image */
						$elements = explode(".",$element);
						if (in_array(strtolower($elements[1]),$listeExtensions)) {
							$listeImages[basename($repertoire)][$repertoire.$element] = $element;
						}
					}
				}
			}
			closedir($ressource);
		}
	}

	if (!function_exists('listeMiniatures')) {
		function listeMiniatures($repertoire,&$listeImages) {
			$listeExtensions = array('jpg','jpeg','gif','png');
			$ressource = opendir($repertoire) or die('Erreur de listage : le r&eacute;pertoire "'.$repertoire.'" n\'existe pas');
			while($element = readdir($ressource)) {
				if($element != '.' && $element != '..') {				
					if (is_dir($repertoire.'/'.$element)) {
						listeMiniatures($repertoire.'/'.$element,$listeImages);
					} else {
						
						/* Si c'est une image */
						$elements = explode(".",$element);
						if (in_array(strtolower($elements[1]),$listeExtensions)) {
							$datas = explode(".",$element);
							$listeImages[] = array(	'chemin' => $repertoire.$element,
													'nom' => str_replace("_"," ",$element),
													'id' => $datas[0]);
						}
					}
				}
			}	
			closedir($ressource);
	//		return $listeImages;
		}
	}
	
	/**
	 * Fonction permettant de faire pivoter une image d'un angle donne
	 */
	function rotate($cheminVersImageOriginale,$angleDeRotation) {
		$nomImage = basename($cheminVersImageOriginale);
		$data = explode(".",$nomImage);
		$extension = $data[1];
		if ($angleDeRotation < 0) {
			$angleDeRotation = 360 + $angleDeRotation;
		}
		if ($extension == 'jpg') {
			$extension = 'jpeg';
		}
		$fonction = 'imagecreatefrom'.$extension;
		$source = $fonction($cheminVersImageOriginale) or die('Error opening file '.$cheminVersImageOriginale);
	    imagealphablending($source, false);
	    imagesavealpha($source, true);
	    
	    $imageTraitee = imagerotate($source, $angleDeRotation, imageColorAllocateAlpha($source, 0, 0, 0, 127));
	    imagealphablending($imageTraitee, false);
	    imagesavealpha($imageTraitee, true);
	    
	    header('Content-type: image/'.$extension);
	    $fonction = 'image'.$extension;
	    if (is_file(_IMGS_TEMP_.$nomImage)) {
	    	unlink(_IMGS_TEMP_.$nomImage);
	    }
	    /* Sauvegarde de l'image dans le temporaire */
		$fonction($imageTraitee,_IMGS_TEMP_.$nomImage,100);
		imagedestroy($source);
		imagedestroy($imageTraitee);
		return str_replace (_DIR_BASE_ , _URL_BASE_ ,_IMGS_TEMP_.$nomImage);
	}
	
	function creeMiniature($cheminVersSource,$largeur,$hauteur) {
		$nomImage = basename($cheminVersSource);
		// Definition du chemin de la miniature
		$cheminVersMiniature = _DIR_MINIATURES_.$nomImage;
		
		// si l'image qu'on lit est déjà une miniature
		// on applique pas la fonction
		if (is_file($cheminVersMiniature)) {
		        return false;
		} else {			       
	        // Cacul des nouvelles dimensions proportionnelles
	        list($width_src, $height_src) =
	               getimagesize($cheminVersSource);
	       
	        if ($largeur && ($width_src < $height_src)) {
	           $largeur = ($hauteur / $height_src) * $width_src;
	        } else {
	           $hauteur = ($largeur / $width_src) * $height_src;
	        }
	       
	        // créé une image vide
	        $im = ImageCreateTrueColor ($largeur, $hauteur)	or die ("Erreur pour cr&eacute;er l'image");
	       
	        // lit l'image source
	        $source = ImageCreateFromJpeg($cheminVersSource);
	       
	        // on créé un cadre autour de la miniature
	        $blanc = ImageColorAllocate ($im, 255, 255, 255);
	        $gris[0] = ImageColorAllocate ($im, 69, 69, 69);
	        $gris[1] = ImageColorAllocate ($im, 82, 82, 82);
	        $gris[2] = ImageColorAllocate ($im, 97, 97, 97);
	        $gris[3] = ImageColorAllocate ($im, 107, 107, 107);
	        $gris[4] = ImageColorAllocate ($im, 120, 120, 120);
	        $gris[5] = ImageColorAllocate ($im, 134, 134, 134);
	        $gris[6] = ImageColorAllocate ($im, 145, 145, 145);
	
	        for ($i=0; $i<7; $i++) {
	               ImageFilledRectangle($im, $i, $i, $largeur-$i, $hauteur-$i, $gris[$i]);
	        }
	       
	        // créé la miniature : attention fonction lourde
	        ImageCopyResampled(	$im, $source, 8, 8, 0, 0,
	        					$largeur-(2*8), $hauteur-(2*8), $width_src, $height_src);
	        // ajoute une chaine d'info sur l'image
	        ImageString($im, 0, 12, $hauteur-18,
	        "$nomImage - ($width_src x $height_src)", $blanc);
	       
	        // sauvegarde du résultat
	        ImageJpeg($im, $cheminVersMiniature);
	    }
		return $cheminVersMiniature;
	}
	
	function supprimeMiniature($cheminVersMiniature) {
		return unlink($cheminVersMiniature);
	}
	
	/**
	  * @param string cheminVersImageAModifier
	  * @param int nouvelleLargeur nouvelle largeur en pixels
	  * @param int nouvelleHauteur nouvelle hauteur en pixels
	  */
	 function redimensionne($cheminVersImageAModifier,$nouvelleLargeur,$nouvelleHauteur) {
	 	/* Dimensions actuelles */
	 	list($largeurImageSource,$hauteurImageSource) = getimagesize($cheminVersImageAModifier);

	 	/* L'image vide de destination */
	 	$destination = ImageCreateTrueColor($nouvelleLargeur, $nouvelleHauteur)	or die ("Erreur pour cr&eacute;er l'image");
	 	
	 	/* La couleur de fond*/
	 	ImageColorAllocate ($destination, 0, 0, 0);
	 	
	 	/* lecture de l'image a redimensionner */
	 	$data = explode(".",basename($cheminVersImageAModifier));
	 	$fonction = 'imagecreatefrom'.$data[1];
        $source = $fonction($cheminVersImageAModifier);
        
        /* Redimensionnement */
	    ImageCopyResampled($destination, $source, 0, 0, 0, 0, $nouvelleLargeur, $nouvelleHauteur, $largeurImageSource, $hauteurImageSource);
        
	 	/* L'enregistrement */ 
	 	$fonction = 'image'.$data[1];
	 	$fonction($destination, $cheminVersImageAModifier);
	 }
?>
