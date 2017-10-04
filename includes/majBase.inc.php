<?php
	/**
	 * Script centralisant les mise a jour / insertion / suppression dans la base de donnees
	 * appeles par AJAX
	 */
	/* Pas la peine de travailler pour rien ;-) */
	if (!empty($_POST)) {
		$path='config/config.php';
		$i=0;
		while (!file_exists($path)) {
		    if($i>10) {
//		        echo 'Impossible de trouver les fichiers de configuration';
		        alerte('Impossible de trouver les fichiers de configuration');
		        exit;
		    }
		    
		    $path='../'.$path;
		    $i++;
		}
		
		require_once $path;
		
		//deja fait dans le config => 20160808: commenté
// 		require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
// 		spl_autoload_register('autoload');
// 		require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';

		$_POST = protectionFormulaire($_POST);
		
		define('_SCRIPT_',__FILE__);
		/* Aiguillage */
		try {
			
			/* debut de la transaction */
			database::getInstance()->startTransaction();
			
			/*
			 * En simplifiant le bordel, j'ai reussi a appeler un script associe a une table
			 * sachant que les appels de ce script sont generalement unitaires (1 table) je peux
			 * me le permettre. 
			 */
			//A TESTER
			$table = $_POST['table'];
			//on supprime les elements inutiles de $_POST
			unset($_POST['table']);
			unset($_POST['formSubmitButton']);

			require_once 'classes/'.$table.'.inc.php';
			
			/* tout est OK => commit */
			database::getInstance()->commitTransaction();
			//20160503, CBA : information en berne pour retour
			//de l'identifiant attribue sur insertion / clonage
// 			informe('Modification de la table <i>'.$table.'</i> OK.');
		} catch (Exception $e) {
			/* erreur => rollback */
			database::getInstance()->rollbackTransaction();
// 			alerte('<br>Erreur dans la modification de la table <i>'.$table.'</i>.');
// 			debug($e->getMessage());
			echo $e->getMessage();
		}
	}
?> 