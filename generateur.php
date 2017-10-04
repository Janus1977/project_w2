<?php
	/*------------*/
	/*PARAMETRAGES*/
	/*------------*/
	date_default_timezone_set('Europe/Paris');
	
	//nom du projet
	$aFolders = explode('\\', realpath(dirname(__FILE__)));
	define('_PROJET_',$aFolders[sizeof($aFolders) - 1]);
	
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	    $docRoot = $_SERVER['DOCUMENT_ROOT'];
	} else {
	    $docRoot = $_SERVER['DOCUMENT_ROOT'].'/';
	}
	$path=$docRoot._PROJET_.'/config/config.php';

	require_once $path;
	
	if (isset($_SESSION['user'])) {
		$_SESSION['user']->setStaff(1);
	}	
	
	$_SESSION['tables'] = array();
	if (! $oPdo -> executeRequete("SHOW tables")) {
		debug('ERREUR SUR LE CHARGEMENT DES TABLES DE LA BASE '.$this -> _sDBName);
	} else {			
		while ($resultat1 = $oPdo -> fetch()) {
			$_SESSION['tables'][] = $resultat1[0];
		}
	}
?>
<form action="#" method="post">
	<table>
		<tr>
			<td colspan="2">
				<input type="submit" value="GO">
			</td>
			<td><input id="choix" name="choix" type="radio" value="testUnitaires"></td>
			<td>TESTS UNITAIRES</td>
			<td><input id="choix" name="choix" type="radio" value="testAvances"></td>
			<td>TESTS AVANC&Eacute;S</td>
			<td><input id="choix" name="choix" type="radio" value="compilation"></td>
			<td>COMPILATION&nbsp;
				<select id="table" name="table" size="1">
					<option value="">Tables...</option>
					<?php
						foreach ($_SESSION['tables'] AS $table) {
							echo '<option value="'.$table.'">'.$table.'</option>';
						}
					?>
				</select>
				<br/>recr&eacute;ation des classes
				<br/><input type="checkbox" id="creeFichierSQL" name="creeFichierSQL"/>Cr&eacute;&eacute; fichier SQL
				<br/><input type="checkbox" id="compilationObjets" name="compilationObjets" checked="checked">OBJETS
				&nbsp;&nbsp;<input type="checkbox" id="compilationFabriques" name="compilationFabriques" checked="checked">FABRIQUES
				&nbsp;&nbsp;<input type="checkbox" id="compilationManagers" name="compilationManagers" checked="checked">MANAGERS
				&nbsp;&nbsp;<input type="checkbox" id="compilationTemplates" name="compilationTemplates" checked="checked">TEMPLATES
			</td>
		</tr>
	</table>
</form>
<hr>
<form action="#" method="post">
	<table>
		<caption>GENERATEUR DES IMAGES BOUTONS</caption>
		<tr>
			<td colspan="2">
				<input type="submit" value="GO">
			</td>
	</table>
</form>
<hr>
<?php
/*
 * PARTIE MAIN TEST
 */
	/**
	 * Generateur de classes associees aux bases de donnees
	 */
	if (!empty($_POST['choix'])) {
		debug('PARAM&Eacute;TRAGES');
		debug('Time Zone par d&eacute;faut: '.date_default_timezone_get());
		
		//Definition des chemins
		define('_OBJ_DIR_',_DIR_CLASS_OBJ_);
		define('_DAO_DIR_','test/classes/dao/');
		define('_TEST_DIR_',_DIR_TEST_);
		define('_FACTORY_DIR_',_DIR_CLASS_FACTORY_);
		define('_MANAGER_DIR_',_DIR_CLASS_MANAGER_);
		define('_INTERFACE_DIR_',_DIR_CLASS_INTERFACE_);
		
		debug(date("D-M-Y H:i:s",time()));
		debug('R&eacute;pertoire de travail: '._DIR_BASE_);
		debug('R&eacute;pertoire des objets: '._DIR_CLASS_OBJ_);
		debug('R&eacute;pertoire des factories: '._DIR_CLASS_FACTORY_);
		debug('R&eacute;pertoire des managers: '._DIR_CLASS_MANAGER_);
		debug('R&eacute;pertoire des interfaces: '._DIR_CLASS_INTERFACE_);
		debug('<hr>');
		
		try {
			if ($_POST['choix'] == 'testUnitaires') {
				debug("TESTS UNITAIRES");
// 				require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
				require_once('/test/index.php');
				exit;
			} else if ($_POST['choix'] == 'testAvances') {
				debug("TESTS AVANC&Eacute;S",true);
				debug("<hr>",true);
				debug('test chemin',true);
				$oCaseDepart = ManagerTile::getInstance()->getById(3904);
				$oCaseArrivee = ManagerTile::getInstance()->getById(3946);
				$chemin[] = $oCaseDepart;
				ManagerTile::getInstance()->trouveCheminVers($oCaseDepart,$oCaseArrivee,17,$chemin);
				debug('ID Depart: '.$oCaseDepart->getId(),true);
				debug('ID Arrivee: '.$oCaseArrivee->getId(),true);
				debug('chemin le plus court:',true);
				foreach ($chemin AS $case) {
					debug($case->getId(),true);
				}
				debug("<hr>",true);
				debug('test2',true);
				//ManagerUnite_joueur::getInstance()->setConnexion();
				
				/* L'unite de joueur ID33 */
				$oUnite = ManagerUnite_joueur::getInstance()->getById(33);
//				$oUnite->save();
				debug($oUnite);
				$oUnite->affiche();
				ManagerUnite_joueur::getInstance()->attaque();
				
				
//				/* L'unite de joueur ID35 */
//				$oUnite = $oMagnagerUniteJoueur->getById(35);
////				$oUnite->save();
//				debug($oUnite);
//				$oUnite->attaque();

				debug("<hr>",true);
				/* les unites du joueur ID28 */
				$oUnites = $oMagnagerUniteJoueur->getByJoueurId(28);
				debug($oUnites);
				exit;
			} else if ($_POST['choix'] == 'compilation') {
				debug("COMPILATION",true);
				if (!empty($_POST['table'])) {
					debug('compilation de la table '.$_POST['table'],true);
					$tables[] = $_POST['table'];
				} else {
					debug('compilation de toutes les tables',true);
					$tables = $_SESSION['tables'];
				}
//				/* generation des classes interfaces */
//				/*
//				 * Parcours des fichiers interface pour creer les classe specifiques strategy
//				 */
//				$listeFichiersInterface = array();
//				if ($dossier = opendir(_INTERFACE_DIR_)) {
//					while (false !== ($fichier = readdir($dossier))) {		
//						if (substr($fichier,0,1) == 'i' && substr($fichier,-18) == 'Strategy.class.php') {
//							$listeFichiersInterface[] = $fichier;
//						}
//					}
//				}
//			
//				foreach ($listeFichiersInterface AS $fichierInterface) {
//					$oInterfaceGenerator = new InterfaceGenerator();
//					$oInterfaceGenerator -> setDocRoot($docRoot);
//					debug($fichierInterface);
//					$oInterfaceGenerator -> generate($fichierInterface);
//				}
//				require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
				
//				//1) les tables de la base
//				$tables = array();
//				if (! $oPdo -> executeRequete("SHOW tables")) {
//					debug('ERREUR SUR LE CHARGEMENT DES TABLES DE LA BASE '.$this -> _sDBName);
//				} else {			
//					while ($resultat1 = $oPdo -> fetch()) {
//						$tables[] = $resultat1[0];
//					}
//				}
				
				//2.a) les colonnes des tables
				$listeChamps = array();
				foreach ($tables AS $table) {
					$oPdo  -> executeRequete("SHOW COLUMNS FROM `".$table."`");
					$listeChamps[$table] = $oPdo  -> getTableauResultat();
				}
				

				if (!empty($_POST['creeFichierSQL']) && $_POST['creeFichierSQL'] === 'on') {
					$fichierTableChamps = fopen('listeTablesChamps.sql','w');
					fwrite($fichierTableChamps,"TRUNCATE TABLE listeTablesChamps;\n");
					fwrite($fichierTableChamps,"INSERT INTO listeTablesChamps (nomTable,nomChamp,nomUsuel) VALUES \n");
					$requete = "";
					foreach ($listeChamps AS $nomTable => $nomsChamps) {
//						if (!in_array($nomTable,array('aaa','listeTablesChamps'))) {
							foreach ($nomsChamps as $key => $nomChamp) {
								$requete .= "('".$nomTable."','".$nomChamp['Field']."','vide'),\n";
							}						
//						}
					}
					fwrite($fichierTableChamps,substr($requete,0,strlen($requete)-2));
					fwrite($fichierTableChamps,";");
					fclose($fichierTableChamps);
				}

				//2.b) les noms usuels
				$oPdo  -> executeRequete("SELECT nomTable,nomChamp,nomUsuel FROM listeTablesChamps order by nomTable ASC,nomChamp ASC,nomUsuel ASC");
				$liste = $oPdo  -> getTableauResultat();
				$listeTablesChamps = array();
				foreach ($liste AS $data) {
					$listeTablesChamps[$data['nomTable']][$data['nomChamp']] = $data['nomUsuel'];
				}

				
				if (!empty($_POST['compilationFabriques']) && $_POST['compilationFabriques'] === 'on') {
					//Generation des Fabriques
					debug('<hr>G&eacute;n&eacute;ration des Fabriques<hr>',true);
					debug(date("D-M-Y H:i:s",time()),true);
					$oFactoriesGenerator = new FactoryGenerator();
					$oFactoriesGenerator -> setDocRoot($docRoot._PROJET_);
					$oFactoriesGenerator -> generate($tables,$listeChamps);
					debug(date("D-M-Y H:i:s",time()),true);		
				}
				if (!empty($_POST['compilationObjets']) && $_POST['compilationObjets'] === 'on') {
					//Generation des objets techniques
					debug('<hr>G&eacute;n&eacute;ration des Objets<hr>',true);
					debug(date("D-M-Y H:i:s",time()),true);
					$oObjectGenerator = new ObjectGenerator();
					$oObjectGenerator -> setDocRoot($docRoot._PROJET_);
					$oObjectGenerator -> setListeTablesChamps($listeTablesChamps);
					$oObjectGenerator -> generate($tables,$listeChamps);
					debug(date("D-M-Y H:i:s",time()),true);
				}
				if (!empty($_POST['compilationManagers']) && $_POST['compilationManagers'] === 'on') {
					//Generation des Managers
					debug('<hr>G&eacute;n&eacute;ration des Managers<hr>',true);
					debug(date("D-M-Y H:i:s",time()),true);
					$oManagerGenerator = new ManagerGenerator();
					$oManagerGenerator -> setDocRoot($docRoot._PROJET_);
					$oManagerGenerator -> generate($tables,$listeChamps);
					debug(date("D-M-Y H:i:s",time()),true);
				}
				if (!empty($_POST['compilationTemplates']) && $_POST['compilationTemplates'] === 'on') {
					//Generation des templates
					debug('<hr>G&eacute;n&eacute;ration des Templates<hr>',true);
					debug(date("D-M-Y H:i:s",time()),true);
					$oTemplateGenerator = new TemplateGenerator();
					$oTemplateGenerator -> setDocRoot($docRoot._PROJET_);
					$oTemplateGenerator -> setListeTablesChamps($listeTablesChamps);
					$oTemplateGenerator -> generate($tables,$listeChamps);
					debug(date("D-M-Y H:i:s",time()),true);
				}
				debug("Termin&eacute;",true);
				exit;
			}
		} catch (PDOException $pdoE) {
			debug($pdoE,true);
		} catch (Exception $e) {
			debug($e->getMessage(),true);
		}
	}
?>        