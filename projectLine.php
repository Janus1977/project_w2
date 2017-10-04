<?php

//	function debug ($text) {
//		if (is_array($text) || is_object($text)) {
//			echo '<pre>'.print_r($text,true).'</pre>'.PHP_EOL;
//		} else {
//			echo '<br/>'.$text.PHP_EOL;
//		}
//	}
    
    /**
     *
     * @param string $dir Le chemin complet vers le répertoire à explorer
     * @param integer $nombreLignes Adresse mémoire de la variable mise à jour par la fonction
     * @param integer $nombreFichier Adresse mémoire de la variable mise à jour par la fonction
     */
    function compteLigne($dir,&$nombreLignes,&$nombreFichier) {
    	$listeRepertoireNonLus = array(
    			'branches',
    			'cache',
    			'downloads',
    			'images',
    			'lib',
    			'miniatures',
    			'scripts',
    			'sql',
    			'tags',
    			'templates_c',
    			'trunk',
    			'tutoriels'
    			
    	);
        if (is_dir($dir)) {
            $filelist = new DirectoryIterator($dir);
            foreach ($filelist AS $file) {
                /*
                 * SI . OU .. on continue
                 */
                if ($file->isDot()) {
                    continue;
                }
                if($file->isDir()) {
                    /*
                     * SI REPERTOIRE, ON ENTRE
                     */
                    if (!in_array($file,$listeRepertoireNonLus)) {
                        compteLigne($file -> getRealPath(),$nombreLignes,$nombreFichier);
                    }                    
                } else {
                    /*
                     * SI UN FICHIER, ON COMPTE LE NOMBRE DE LIGNE
                     */
                    $aFile = explode(".",$file ->getFilename());
                    $extension = $aFile[(sizeof($aFile) - 1)];
                    if (!empty($extension) && in_array($extension,array('php','js','tpl','css'))) {
                        $nombreFichier[$extension] += 1;

                        //Chargement du fichier
                        $fichier = file_get_contents($file -> getRealPath());

                        //Travail sur les commentaires documentants
                        // => /** */ devient \/\*\* \*\/
//                         preg_match_all("/\\/\*+(.+?)\s+\*\\//s", $fichier, $matchCommDocu);
                        preg_match_all("/\/\*\*+(.+?)\s+\*\//s", $fichier, $matchCommDocu);
                        $nombreLignesDocumentationFichier = 0;
                        foreach ($matchCommDocu[1] AS $commDocu) {
                            $tab = explode("*",$commDocu);
                            $nombreLignesDocumentationFichier += (sizeof($tab) - 1);
                        }
                        
                        //Commentaire simple => // devient \/\/
                        preg_match_all('/\/\//', $fichier, $matchComm);
                        $nombreLignesCommentairesFichier = sizeof($matchComm[0]);
                        
                        //Comptage du nombre de ligne du fichier
                        $handle = fopen($file -> getRealPath(),"r");
                        $nombreLigneFichier = 0;
                        while (!feof($handle)) {
                            $ligne = fgets($handle);
                            $nombreLigneFichier += 1;
                        }
                        fclose($handle);

                        //les lignes de code
                        $nombreLignesCodeFichier = $nombreLigneFichier - ($nombreLignesCommentairesFichier + $nombreLignesDocumentationFichier);

                        $nombreLignes['commentaire'] += $nombreLignesCommentairesFichier;
                        $nombreLignes['documentation'] += $nombreLignesDocumentationFichier;
                        $nombreLignes['code'] += $nombreLignesCodeFichier;

                    }
                }
            }
        } else {
            throw new Exception("<br/>Dossier ".$dir." inexistant");
        }
    }
    
    //Tableau contenant les nombres de lignes de chaque type recherches
    $nombreTotalDeLigne = array(
        'commentaire' => 0,
        'documentation' => 0,
        'code' => 0
    );

    //Tableau contenant le nombre de fichier de chaque type recherches
    $nombreTotalFichier = array(
        'php' => 0,
        'js' => 0,
        'tpl' => 0,
        'css' => 0
    );
    
    $dir = "/";
    try {

    	//nom du projet
    	$aFolders = explode('\\', realpath(dirname(__FILE__)));
//     	define('_PROJET_',$aFolders[sizeof($aFolders) - 1]);
        $projectName = $aFolders[sizeof($aFolders) - 1]; // "project_w2";
//        compteLigne("c:\\personnel\\wamp2\\www\\".$projectName."\\",$nombreTotalDeLigne,$nombreTotalFichier);
		echo 'R&eacute;pertoire de base: '.__DIR__;
        compteLigne(__DIR__,$nombreTotalDeLigne,$nombreTotalFichier);
        $totalLignes = 0;
        foreach ($nombreTotalDeLigne AS $typeLigne) {
            $totalLignes += $typeLigne;
        }
        echo '<br>Nombre de lignes projet '.$projectName.': '.$totalLignes.PHP_EOL;
        echo '<br>Nombre de lignes par type:'.PHP_EOL;
        echo '<ul>'.PHP_EOL;
        foreach ($nombreTotalDeLigne AS $typeLigne => $nombre) {
            echo '  <li> '.strtoupper($typeLigne).': '.$nombre.PHP_EOL;
        }
        echo '</ul>'.PHP_EOL;
        $totalFichiers = 0;
        foreach ($nombreTotalFichier AS $typeFichier => $nombre) {
            $totalFichiers += $nombre;
        }
        echo '<br>Nombre de fichiers lus: '.$totalFichiers.PHP_EOL;
        echo '<ul>'.PHP_EOL;
        foreach ($nombreTotalFichier AS $typeFichier => $nombre) {
            echo '  <li> '.strtoupper($typeFichier).': '.$nombre.PHP_EOL;
        }
        echo '</ul>'.PHP_EOL;
        echo '<br>Nombre moyen de lignes par fichier: '.floor($totalLignes / $totalFichiers).PHP_EOL;
        echo '<br>Pourcentage de documentation par rapport au code: '.round(($nombreTotalDeLigne['documentation'] / $nombreTotalDeLigne['code']) * 100,2).'%';
    } catch (Exception $e) {
        echo '<br>'.$e -> getMessage().PHP_EOL;
    }
?>