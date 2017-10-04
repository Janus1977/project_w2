<?php

     //////////////////////////////////////
     //DEFINITION DES VARIABLES STATIQUES//
     //////////////////////////////////////
     /** La largeur d'une image miniature */
     define('_LARGEUR_MINIATURE_',200);
     
     /** La hauteur d'une image miniature */
     define('_HAUTEUR_MINIATURE_',200);
     
     /** La largeur d'une case */
     define('_TAILLE_CASE_X_',40);
     
     /** La hauteur d'une case */
     define('_TAILLE_CASE_Y_',40);
     
     /** La largeur maximum d'une dimension de carte (en nombre de cases) */
     define('_LARGEUR_MAX_CASES_CARTE_', 50);
     
     /** La hauteur maximum d'une dimension de carte (en nombre de cases) */
     define('_HAUTEUR_MAX_CASES_CARTE_',50);
     
     /** La taille maximum qu'une carte peut avoir (hauteur ou largeur)*/
     define('_TAILLE_MAX_CARTE_',max(array(_LARGEUR_MAX_CASES_CARTE_,_HAUTEUR_MAX_CASES_CARTE_)));
     
     /** La largeur d'un avatar */
     define('_LARGEUR_AVATAR_',150);
     
     /** La hauteur d'un avatar */
     define('_HAUTEUR_AVATAR_',250);
     
     /** La poids d'un avatar en ko */
     define('_POIDS_AVATAR_',25);
     
     /** La valeur minimale endomage pour pouvoir reparer */
     define('_DAMAGE_MIN_',30);
     
     /////////////////////////////////////////
     //DEFINITION DES ACTION DES PERSONNAGES//
     /////////////////////////////////////////
     /** deplacement */
     define('_DEPLACEMENT_',1);
     
     /** attaque */
     define('_ATTAQUE_',2);
     
     /** charge */
     define('_CHARGE_',3);
     
     //////////////////////////////////
     //DEFINITION DE L'ETAT DES CASES//
     //////////////////////////////////
     
     /*
      * Parametres d'occupation d'une case de la carte pour la partie edition (0->99)
      * edition = hors_edition - 100
      */
     define('_CASE_VIDE_',0);				//Valeur par defaut lors de l'insertion
     define('_CASE_PLATEAU_',1);			//avec une image plateau
     define('_CASE_DECOR_',2);				//avec une image plateau + decor
     define('_CASE_UNITE_',3);				//avec une image plateau + unite
     define('_CASE_DECOR_UNITE_',4);		//avec une image plateau + decor + unite
     
     define('_CASE_LIEN_',98);				//avec lien vers autre carte
     define('_CASE_BLOQUEE_',99);			//case inaccessible
     
     /*
      * Parametres d'occupation de la case hors edition (100->199)
      * hors_edition = edition + 100
      */
     define('_CASE_BLOQUEE_JEU_',199);	//case inaccessible
     
     define('_EDITION_CARTE_',false);
     
     /////////////////////////////////////////////
     // DEFINITION DES CHEMINS VERS LES CLASSES //
     /////////////////////////////////////////////
     if (!defined('_PROJET_')) {
     	//nom du projet
     	$aFolders = explode('\\', realpath(dirname(__FILE__)));
     	//Cas particulier des appels AJAX, le repertoire est CONFIG au lieu de PROJECT_W2
     	define('_PROJET_',$aFolders[sizeof($aFolders) - 2]);
     }
     if (!defined('_DOC_ROOT_')) {
     	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
//      		$docRoot = $_SERVER['DOCUMENT_ROOT'];
     		define('_DOC_ROOT_',$_SERVER['DOCUMENT_ROOT']);
     	} else {
//      		$docRoot = $_SERVER['DOCUMENT_ROOT'].'/';
     		define('_DOC_ROOT_',$_SERVER['DOCUMENT_ROOT'].'/');
     	}
     }
     /////////////////////////////////////////////////////////////////
     //DEFINITION DES CHEMINS DE L'APPLICATION SPECIFIQUE AU SERVEUR//
     /////////////////////////////////////////////////////////////////
     if (file_exists(_DOC_ROOT_._PROJET_.'/config/config.local.php')) {
     	// Serveur dev local
//      	require_once('config.local.php');
     	define('_DIR_BASE_',_DOC_ROOT_._PROJET_.'/');
     	define('_URL_BASE_', 'http://localhost/'._PROJET_.'/');
     } else {
     	/** Serveur de production */
     	require_once('config.prod.php');
     }
     
     define('_DIR_BASE_CLASS_',_DIR_BASE_.'/classes/');
     define('_DIR_CLASS_ACTION_',_DIR_BASE_CLASS_.'actions/');
     define('_DIR_CLASS_FACTORY_',_DIR_BASE_CLASS_.'factories/');
     define('_DIR_CLASS_MANAGER_',_DIR_BASE_CLASS_.'managers/');
     define('_DIR_CLASS_INTERFACE_',_DIR_BASE_CLASS_.'interfaces/');
     define('_DIR_CLASS_OBJ_',_DIR_BASE_CLASS_.'obj/');
     define('_DIR_CLASS_DB_',_DIR_BASE_CLASS_.'database/');
     define('_DIR_CLASS_VALIDATOR_',_DIR_BASE_CLASS_.'validator/');
     define('_DIR_CLASS_EXCEPTION_',_DIR_BASE_CLASS_.'exception/');
     define('_DIR_CLASS_COMPARATOR_',_DIR_BASE_CLASS_.'comparator/');
     
     define('_DIR_TEST_',_DIR_BASE_.'test/');
     
     //Ajout a l'include path
//      set_include_path(get_include_path().PATH_SEPARATOR._DIR_BASE_CLASS_.PATH_SEPARATOR._DIR_CLASS_ACTION_.PATH_SEPARATOR._DIR_CLASS_FACTORY_.PATH_SEPARATOR._DIR_CLASS_MANAGER_.PATH_SEPARATOR._DIR_CLASS_OBJ_.PATH_SEPARATOR._DIR_CLASS_DB_.PATH_SEPARATOR._DIR_CLASS_VALIDATOR_.PATH_SEPARATOR._DIR_CLASS_EXCEPTION_.PATH_SEPARATOR._DIR_CLASS_COMPARATOR_);


     /** le repertoire 'include' basique */
     define('_DIR_INCLUDES_BASE_',_DIR_BASE_. 'includes/');
     
     /** URL 'include' basique */
     define('_URL_INCLUDES_BASE_',_URL_BASE_. 'includes/');
     
     require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
     spl_autoload_register('autoload');
     
	/** Les tutoriels */
	define('_URL_TUTOS_',_URL_BASE_. 'tutoriels/');
	
	/** Le repertoire des classes */
	define('_DIR_CLASS_',_DIR_BASE_.'classes/');
	
	/******************************/
	/* Les Extensions de fichiers */
	/******************************/
	/** extension d'un fichier classe */
	define('_CLASS_EXTENSION_','.class.php');
	
	/** extension d'un fichier test */
	define('_TEST_EXTENSION_','.test.php');
	
	/** extension d'un fichier Template Smarty */
	define('_TEMPLATE_EXTENSION_','.tpl');
	
	/** Le charset */
	define('_CHARSET_', 'ISO-8859-15');
	
	/**************************/
	/* Les parametres Smarty */
	/**************************/
	/** Emplacement du répertoire SMARTY */
	define('_SMARTY_BASE_',_DIR_BASE_.'lib/smarty/');

	/** Emplacement de la librairie SMARTY */
	define('_SMARTY_CLASS_',_SMARTY_BASE_.'Smarty.class.php');

	/** Emplacement du répertoire des templates SMARTY */
	define('_SMARTY_TEMPLATES_',_DIR_BASE_.'templates');
	
	/** Emplacement du répertoire des templates compliés SMARTY */
	define('_SMARTY_COMPILE_', _DIR_BASE_.'templates_c');

	/** Emplacement du répertoire de cache SMARTY */
	define('_SMARTY_CACHE_', _DIR_BASE_.'cache');
	
	/** Appel du script de chargement de la classe SMARTY */
	define('_SMARTY_LOAD_',_DIR_INCLUDES_BASE_.'smarty.inc.php');
	
	
	/** le logger log4php */
	define('_LOG4PHP_BASE_',_DIR_BASE_.'lib/log4php/');
	define('_LOG4PHP_CLASS_',_LOG4PHP_BASE_.'Logger.php');
	define('_LOG4PHP_LOAD_',_DIR_INCLUDES_BASE_.'log4php.inc.php');
	
	
	/** le repertoire des images */
	define('_DIR_IMGS_', _DIR_BASE_.'images/');
	/** l'URL des images */
	define('_URL_IMGS_', _URL_BASE_.'images/');
	
	/** le repertoire des images a redimensionner */
	define('_DIR_IMGS_BRUTES_', _DIR_IMGS_.'brutes/');
	/** l'URL des images a redimensionner */
	define('_URL_IMGS_BRUTES_', _URL_IMGS_.'brutes/');
	
	/** le repertoire des miniatures */
	define('_DIR_MINIATURES_', _DIR_IMGS_.'miniatures/');
	/** l'URL des miniatures */
	define('_URL_MINIATURES_', _URL_IMGS_.'miniatures/');	
	
	/** Le repertoire des images issues du jeu plateau */
	define('_DIR_IMGS_JEU_', _DIR_IMGS_.'jeu/');
	/** l'URL des images issues du jeu plateau */
	define('_URL_IMGS_JEU_', _URL_IMGS_.'jeu/');
	
// 	/** Le repertoire des cartes du jeu */
// 	define('_DIR_IMGS_CARTES_',_DIR_IMGS_.'cartes/');
// 	/** l'URL des cartes du jeu */
// // 	define('_URL_IMGS_CARTES_',_URL_IMGS_.'cartes/');
	
// 	/** Le repertoire des mini cartes du jeu */
// 	define('_DIR_IMGS_MINI_CARTES_',_DIR_IMGS_.'mini_cartes/');
// 	/** l'URL des mini cartes du jeu */
// 	define('_URL_IMGS_MINI_CARTES_',_URL_IMGS_.'mini_cartes/');
	
	/** Le repertoire des images de decors */
	define('_DIR_IMGS_DECORS_', _DIR_IMGS_.'decor/');
	/** l'URL des decors du jeu */
	define('_URL_IMGS_DECORS_', _URL_IMGS_.'decor/');
	
	/** Le repertoire des images d'unite */
// 	define('_DIR_IMGS_UNITE_', _DIR_IMGS_.'unites/');
	/** l'URL des images d'unite du jeu */
// 	define('_URL_IMGS_UNITE_', _URL_IMGS_.'unites/');
	
// 	/** Le repertoire des images d'equipement */
// 	define('_DIR_IMGS_EQUIPEMENT_', _DIR_IMGS_.'equipement/');
// 	/** l'URL des images d'equipement du jeu */
// 	define('_URL_IMGS_EQUIPEMENT_', _URL_IMGS_.'equipement/');

	/** le repertoire de base des images 'equipement' */
	define('IMG_EQU', 'images/equipements/');
	
	/** Le repertoire des images de plateaux */
	define('_DIR_IMGS_PLATEAUX_', _DIR_IMGS_.'plateaux/');
	/** l'URL des images de plateaux du jeu */
	define('_URL_IMGS_PLATEAUX_', _URL_IMGS_.'plateaux/');
	
	/** Le repertoire des differents templates */
	define('_TEMPLATES_BASE_', _DIR_BASE_.'templates/');
	/** l'URL des differents templates du jeu */
	define('_URL_TEMPLATES_BASE_', _URL_BASE_.'templates/');
	
	/** Le repertoire des differents modules */
	define('_DIR_MODULES_BASES_', _DIR_BASE_.'modules/');
	define('_MODULES_BASES_', _DIR_BASE_.'modules/'); //utilisé => nettoyage a faire
	/** l'URL des differents modules du jeu */
	define('_URL_MODULES_BASES_', _URL_BASE_.'modules/');
	
	/** Chemin vers image temporaire de traitement d'image */
	define('_IMGS_TEMP_', _DIR_MODULES_BASES_.'traitement_image/images_temporaires/');
	define('_URL_IMGS_TEMP_', _URL_MODULES_BASES_.'traitement_image/images_temporaires/');
	
//	/** Module Carte */
//	define('_TPL_CARTE_', _MODULES_BASES_.'carte/templates/');
//	define('_URL_TPL_CARTE_', _URL_MODULES_BASES_.'carte/templates/');
//	
//	/** Module Mini Carte */
//	define('_TPL_MINI_CARTE_', _MODULES_BASES_.'mini_carte/templates/');
//	define('_URL_TPL_MINI_CARTE_', _URL_MODULES_BASES_.'mini_carte/templates/');
	
	/* FONCTIONS GENERIQUES */
// 	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';


	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;

	/*****************************/
	/* Connexion Base de donnees */
	/*****************************/
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';

	/***********************************************/
	/* Chargement des sessions ici car ce fichier  */
	/* est appelé même par AJAX PHP 5.4+           */
	/***********************************************/
	if (!isset($_SESSION)) {
		if (PHP_VERSION_ID > 50400) {
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
		} else {
			session_start();
		}
	}
	
	/* Statistiques chargement */
	$_SESSION['initPage'] = microtime(true);

	/************************/
	/* MULTIPLICATEUR TEMPS */
	/************************/
	$multiplicateurTempsReparationCategorie = array(
			'1' => 1,
			'2' => 1.2,
			'3' => 0.8,
			'4' => 1.8,
			'5' => 2,
			'6' => 2.5
	);
	
	
	/**************************/
	/* Chargement des modules */
	/**************************/
	try {
		$data = ManagerModule::getInstance()->getById();
		foreach ($data AS $oModule) {
			$_SESSION['MODULES'][strtoupper(trim($oModule->getNom()))] = $oModule->getActif();
			if (file_exists(_DIR_MODULES_BASES_.trim($oModule->getNom()).'/config/config.mod.php')) {
				require_once _DIR_MODULES_BASES_.trim($oModule->getNom()).'/config/config.mod.php';
			}
		}
	} catch (Exception $e) {
		debug($e->getMessage());
	}
?>