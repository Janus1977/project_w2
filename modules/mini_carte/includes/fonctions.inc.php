<?php

	function creeMiniCarte($nomCarte) {
		/* le chemin vers la carte */
		$cheminVersPlateauCarte = _DIR_IMGS_CARTES_.$nomCarte.'.jpg';
		
		/* Les dimensions initiales en pixel */
		list($largeurPlateauJeu,$hauteurPlateauJeu) = getimagesize($cheminVersPlateauCarte);
		
		/* Calcul des dimensions finales, 1 case 40x40px <=> 4x4px */
		$largeurMiniCarte = $largeurPlateauJeu / 10;
		$hauteurMiniCarte = $hauteurPlateauJeu / 10;
		
		/* Image mini carte*/
		$image = ImageCreateTrueColor ($largeurMiniCarte, $hauteurMiniCarte) or die ("Erreur pour cr&eacute;er l'image mini carte");
		
		/* lecture image source */
		$source = ImageCreateFromJpeg($cheminVersPlateauCarte);
		
		/* Creation effective mini carte */
		ImageCopyResampled($image, $source, 0, 0, 0, 0, $largeurMiniCarte, $hauteurMiniCarte, $largeurPlateauJeu, $hauteurPlateauJeu);
		
		// sauvegarde du résultat
	    ImageJpeg($image, _DIR_IMGS_MINI_CARTES_.$nomCarte.'.jpg');
	}
?>
