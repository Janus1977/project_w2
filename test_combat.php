<?php

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
	

	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_UNITE_.'fonctions.inc.php';
	
	if (!empty($_POST)) {
		
		//////////////////
		// INIT SESSION //
		//////////////////
		if (!empty($_POST['init_session'])) {
			$_SESSION = array();
		}
		
		///////////////////
		// REMISE EN JEU //
		///////////////////
		if (!empty($_POST['ingame'])) {
			try {
// 				if ($_POST['typetest'] == "mine") {
					if (!empty($_SESSION['mine'])) {
						ManagerEquipement::getInstance()->setEquipementInGame($_SESSION['mine'], 9);
					} else {
						ManagerEquipement::getInstance()->setEquipementInGame(ManagerEquipement::getInstance()->getById(18), 9);
					}
// 				} else if ($_POST['typetest'] == "grenade") {
					if (!empty($_SESSION['grenade'])) {
						ManagerEquipement::getInstance()->setEquipementInGame($_SESSION['grenade'], 9);
					} else {
						ManagerEquipement::getInstance()->setEquipementInGame(ManagerEquipement::getInstance()->getById(17), 9);
					}
// 				} else if ($_POST['typetest'] == "armee") {
					
// 				} else if ($_POST['typetest'] == "unite") {
					if (!empty($_SESSION['unite'])) {
						if (ManagerUnite::getInstance()->setUnitInGame($_SESSION['unite'],10)) {
							//Maj donnee session
							$_SESSION['unite']->setTile(10);
							$_SESSION['unite']->setIngame(1);
							debug("Unit&eacute; ".$_SESSION['unite']->getNom()." remise en jeu",true);
						} else {
							debug("ERREUR remise en jeu unit&eacute; ".$_SESSION['unite']->getNom(),true);
						}
					} else {
						debug("Pas d'unit&eacute; &agrave; remettre en jeu",true);
					}
						
					if (!empty($_SESSION['uniteJoueur'])) {
						if (ManagerUnite_joueur::getInstance()->setUnitInGame($_SESSION['uniteJoueur'],15)) {
							//Maj donnee session
							$_SESSION['uniteJoueur']->setTile(11);
							$_SESSION['uniteJoueur']->setIngame(1);
							debug("Unit&eacute; joueur ".$_SESSION['uniteJoueur']->getNom()." remise en jeu",true);
						} else {
							debug("ERREUR remise en jeu unit&eacute; ".$_SESSION['uniteJoueur']->getNom(),true);
						}
						// 					debug($_SESSION['uniteJoueur'],true);
					} else {
						debug("Pas d'unit&eacute; joueur &agrave; remettre en jeu",true);
					}
// 				} else {
// 					alerte("Vous devez choisir un type de test.");
// 				}
			} catch (Exception $e) {
				debug($e->getMessage(),true);
			}
		} //fin INGAME option
		
		if (!empty($_POST['typetest'])) {
			
			$_SESSION['typetest'] = $_POST['typetest'];
			
			// Preparation de l'unite 1
			if ((empty( $_SESSION ['unite'] ) || (!empty ( $_SESSION ['unite'] ) && $_SESSION ['unite']->getId () != intval ( $_POST ['listeUnites'] ))) && (!empty ( $_POST ['listeUnites'] ) && intval ( $_POST ['listeUnites'] ) > 0)) {
				$_SESSION ['unite'] = ManagerUnite::getInstance ()->getById ( intval ( $_POST ['listeUnites'] ) );
				// Assignation PdV
				if ($_SESSION ['unite']->getPdv() <= 0) {
					$_SESSION ['unite']->setPdv (1);
				}
				$_SESSION ['unite']->save ();
				debug ($_SESSION ['unite']->getNom()." cr&eacute;&eacute; ou mise &agrave; jour", true );
				// debug($_SESSION['unite'],true);
			}
			
			// Preparation de l'unite 2
			if ((empty( $_SESSION ['uniteJoueur'] ) || (!empty( $_SESSION ['uniteJoueur'] ) && $_SESSION ['uniteJoueur']->getId () != intval ( $_POST ['listeUnitesJoueur'] ))) && (!empty ( $_POST ['listeUnitesJoueur'] ) && intval ( $_POST ['listeUnitesJoueur'] ) > 0)) {
				$_SESSION ['uniteJoueur'] = ManagerUnite_joueur::getInstance ()->getById ( intval ( $_POST ['listeUnitesJoueur'] ) );
				// Assignation PdV
				if ($_SESSION ['uniteJoueur']->getPdv() <= 0) {
					$_SESSION ['uniteJoueur']->setPdv (1);
				}
				$_SESSION ['uniteJoueur']->save ();
				debug ($_SESSION ['uniteJoueur']->getNom()." cr&eacute;&eacute; ou mise &agrave; jour", true );
				// debug($_SESSION['uniteJoueur'],true);
			}
			// Preparation de la grenade
			if (empty($_SESSION['grenade'])) {
				debug("TEST grenade",true);
				$_SESSION['grenade'] = ManagerEquipement::getInstance()->getById(17);
				debug($_SESSION['grenade']);
				ManagerEquipement::getInstance()->setEquipementInGame($_SESSION['grenade'], 9);
				debug($_SESSION['grenade']);
// 				$_SESSION ['grenade']->save();
				debug ($_SESSION ['grenade']->getNom()." cr&eacute;&eacute; ou mise &agrave; jour", true );
			}
			// Preparation de la mine
			if (empty($_SESSION['mine'])) {
				$_SESSION['mine'] = ManagerEquipement::getInstance()->getById(18);
				$_SESSION ['mine']->save ();
				ManagerEquipement::getInstance()->setEquipementInGame($_SESSION['mine'], 9);
				debug ($_SESSION ['mine']->getNom()." cr&eacute;&eacute; ou mise &agrave; jour", true );
			}
		} else {
			if (empty($_SESSION['typetest'])) {
				alerte("Vous devez choisir un type de test.");
			}
		}
	}
	$_POST = array();

	//pour test le staff est a true
	// 	$_SESSION['staffSession'] = 1;
	
	//la liste des unites du jeu
	$smarty->assign('listeUnites',ManagerUnite::getInstance()->getById());
	
	//la liste des unites de joueurs du jeu
	$smarty->assign('listeUnitesJoueurs',ManagerUnite_joueur::getInstance()->getById());

	//la liste des armees du jeu
	$smarty->assign('listeArmees',ManagerArmee::getInstance()->getById());
	
	$smarty->assign('TEMPLATES_UNITE',_TEMPLATES_UNITE_);
	
	//Affichage du formulaire
	$smarty->display(_TEMPLATES_BASE_.'test_combat_form.tpl');
	
	if (!empty($_SESSION['unite'])) {
		debug('Unit&eacute; 1: '.$_SESSION['unite']->getNom().','.$_SESSION['unite']->getPdv().'pdv');
	}

	if (!empty($_SESSION['uniteJoueur'])) {
		debug('Unit&eacute; 2: '.$_SESSION['uniteJoueur']->getNom().','.$_SESSION['uniteJoueur']->getPdv().'pdv');
	}

	debug("<hr>",true);
	
	
	if (!empty($_SESSION['typetest']) && $_SESSION['typetest'] == "unite" && !empty($_SESSION['unite']) && !empty($_SESSION['uniteJoueur'])) {
		//partie "je te tape tu me tapes"
		debug("<h2>TEST UNITE CONTRE UNITE</h2>",true);
		$tour = 1;
		$_SESSION['unite']->chargeEquipements();
		$_SESSION['uniteJoueur']->chargeEquipements();
		
		do {
			debug("<u>Tour ".$tour."</u>",true);
			debug("<u>Unit&eacute; 2 attaque Unit&eacute; 1</u>",true);
			ManagerUnite_joueur::getInstance()->attaque($_SESSION['uniteJoueur'],$_SESSION['unite']);
			debug("<u>Unit&eacute; 1 attaque Unit&eacute; 2</u>",true);
			ManagerUnite::getInstance()->attaque($_SESSION['unite'],$_SESSION['uniteJoueur']);
			debug("Fin de tour PdV U1: ".$_SESSION['unite']->getPdv().", PdV U2: ".$_SESSION['uniteJoueur']->getPdv(),true);
			debug("<hr>",true);
			if ($_SESSION['unite']->getPdv() <= 0) {
				break;
			}
			if ($_SESSION['uniteJoueur']->getPdv() <= 0) {
				break;
			}
			$tour += 1;
		} while ($tour<=10); 
	}
	if (!empty($_SESSION['typetest']) && $_SESSION['typetest'] == "grenade" && !empty($_SESSION['grenade']) && !empty($_SESSION['unite'])) {
		debug("<h2>TEST GRENADE CONTRE UNITE</h2>",true);
		$aAttaqueGrenade = new Actionattaque('Grenades et Missiles');
		$aAttaqueGrenade->attaque(ManagerEquipement::getInstance()->getById(17), $_SESSION['unite']);
		debug("Nb blessures: ".$aAttaqueGrenade->getBlessures(),true);
	}
	if (!empty($_SESSION['typetest']) && $_SESSION['typetest'] == "mine" && !empty($_SESSION['mine']) && !empty($_SESSION['unite'])) {
		debug("<h2>TEST MINE CONTRE UNITE</h2>",true);
		ManagerEquipement::getInstance()->attaque($_SESSION['mine'], $_SESSION['unite']);
	}
	exit;
	
	
//==========================
//==========================
	if (!empty($_POST)) {
		$_POST = protectionFormulaire($_POST);
		if (isset($_POST['init_session'])) {
			$_SESSION = array();
		}
		
		if (!empty($_POST['ingame'])) {
			try {
				debug("remise en jeu de l'unit&eacute; (1)",true);
				ManagerUnite::getInstance()->setUnitInGame(ManagerUnite::getInstance()->getById($_SESSION['idUniteChoisie']),10);
				debug("remise en jeu de l'unit&eacute; joueur (2)",true);
				ManagerUnite_joueur::getInstance()->setUnitInGame(ManagerUnite_joueur::getInstance()->getById($_SESSION['idUniteJoueurChoisie']),11);
			} catch (Exception $e) {
				debug($e->getMessage());
			}
		}
		
		if (isset($_POST['idArmeUnite']) && intval($_POST['idArmeUnite']) > 0) {
			ManagerUnite::getInstance()->switchWeapon($_POST['idUnite'], $_POST['idArme']);
		}
		
		if (isset($_POST['idArmureUnite']) && intval($_POST['idArmureUnite']) > 0) {
			ManagerUnite::getInstance()->switchWeapon($_POST['idUnite'], $_POST['idArmureUnite']);
		}
		
		if (isset($_POST['idArmeUniteJoueur']) && intval($_POST['idArmeUniteJoueur']) > 0) {
			ManagerUnite_joueur::getInstance()->switchWeapon($_POST['idUniteJoueur'], $_POST['idArmeUniteJoueur']);
		}
		
		if (isset($_POST['idArmureUniteJoueur']) && intval($_POST['idArmureUniteJoueur']) > 0) {
			ManagerUnite_joueur::getInstance()->switchWeapon($_POST['idUniteJoueur'], $_POST['idArmureUniteJoueur']);
		}
	}
	
	
	$requeteRandom = 'SELECT id from unite';
	database::getInstance()->executeRequete($requeteRandom);
	$_SESSION['listeIdUnite'] = database::getInstance()->getTableauResultat();
	(!isset($_SESSION['idUniteChoisie'])) ? $_SESSION['idUniteChoisie'] = $_SESSION['listeIdUnite'][mt_rand(0, sizeof($_SESSION['listeIdUnite'])-1)]['id'] : '';
	$_SESSION['uniteChoisie'] = ManagerUnite::getInstance()->getById($_SESSION['idUniteChoisie']);
	
	$requeteRandom = 'SELECT id from unite_joueur';
	database::getInstance()->executeRequete($requeteRandom);
	$_SESSION['listeIdUniteJoueur'] = database::getInstance()->getTableauResultat();
	(!isset($_SESSION['idUniteJoueurChoisie'])) ? $_SESSION['idUniteJoueurChoisie'] = $_SESSION['listeIdUniteJoueur'][mt_rand(0, sizeof($_SESSION['listeIdUniteJoueur'])-1)]['id'] : '';
	$_SESSION['uniteJoueurChoisie'] = ManagerUnite_joueur::getInstance()->getById($_SESSION['idUniteJoueurChoisie']);

	
	$aListeArmes = ManagerEquipement::getInstance()->getFromExtTableType(ManagerType::getInstance()->getByType('arme')->getId());
	$aListeArmure = ManagerEquipement::getInstance()->getFromExtTableType(ManagerType::getInstance()->getByType('armure')->getId());
?>
<form action="" method="post" style="display: inline;">
	<input type="submit" name="recharge_page" id="recharge_page" value="Recharge page"/>
</form>
<form action="" method="post" style="display: inline;">
	<input type="submit" name="init_session" id="init_session" value="Init Session => unit&eacute; tir&eacute;es au sort"/>
</form>

<form action="" method="post">
	<input type="hidden" name="idUnite" value="<?php echo $_SESSION['idUniteChoisie']; ?>"/>
	<input type="hidden" name="idUniteJoueur" value="<?php echo $_SESSION['uniteJoueurChoisie']; ?>"/>
	
	<table>
		<caption>Modification Unit&eacute; 1 (ID<?php echo $_SESSION['idUniteChoisie']; ?>)</caption>
		<tr>
			<td>Remise en jeu</td>
			<td>
				<input type="checkbox" id="ingame" name="ingame"/>
			</td>
		</tr>
		<tr>
			<td>Arme:</td>
			<td><?php echo $_SESSION['uniteChoisie']->getArme()->getNom(); ?></td>
			<td> changer par </td>
			<td>
				<select id="idArmeUnite" name="idArmeUnite" size="1">
					<option selected="selected" disable="disable">Choisissez une arme</option>
				<?php
					foreach ($aListeArmes AS $oArme) {
						echo '<option value="'.$oArme->getId().'">'.$oArme->getNom().'</option>'.PHP_EOL;
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Armure:</td>
			<td><?php echo $_SESSION['uniteChoisie']->getEquipementarmureObject()->getNom(); ?></td>
			<td> changer par </td>
			<td>
				<select id="idArmureUnite" name="idArmureUnite" size="1">
					<option selected="selected" disable="disable">Choisissez une armure</option>
				<?php
					foreach ($aListeArmure AS $oArmure) {
						echo '<option value="'.$oArmure->getId().'">'.$oArmure->getNom().'</option>'.PHP_EOL;
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" value="Modifier Unit&eacute;"/></td>
		</tr>
	</table>
	
	<table>
		<caption>Modification Unit&eacute; joueur 2 (ID<?php echo $_SESSION['idUniteJoueurChoisie']; ?>)</caption>
		<tr>
			<td>Remise en jeu</td>
			<td>
				<input type="checkbox" id="ingame" name="ingame"/>
			</td>
		</tr>
		<tr>
			<td>Arme:</td>
			<td><?php echo $_SESSION['uniteJoueurChoisie']->getArme()->getNom(); ?></td>
			<td> changer par </td>
			<td>
				<select id="idArmeUniteJoueur" name="idArmeUniteJoueur" size="1">
					<option selected="selected" disable="disable">Choisissez une arme</option>
				<?php
					foreach ($aListeArmes AS $oArme) {
						echo '<option value="'.$oArme->getId().'">'.$oArme->getNom().'</option>'.PHP_EOL;
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Armure:</td>
			<td><?php echo $_SESSION['uniteJoueurChoisie']->getEquipementarmureObject()->getNom(); ?></td>
			<td> changer par </td>
			<td>
				<select id="idArmureUniteJoueur" name="idArmureUniteJoueur" size="1">
					<option selected="selected" disable="disable">Choisissez une armure</option>
				<?php
					foreach ($aListeArmure AS $oArmure) {
						echo '<option value="'.$oArmure->getId().'">'.$oArmure->getNom().'</option>'.PHP_EOL;
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" value="Modifier Unit&eacute; Joueur"/></td>
		</tr>
	</table>
</form>
<hr>
<?php exit;
	try {
		debug("test sur 2 unit&eacute;s",true);
		
		$oUnite1 = ManagerUnite::getInstance()->getById(3);
		debug("Unit&eacute; 1 cr&eacute;&eacute;e",true);
// 		echo $oUnite1;
		
		$oUnite2 = ManagerUnite::getInstance()->getById(4);
		debug("Unit&eacute; 2 cr&eacute;&eacute;e",true);
		
		$oUnite3 = clone $oUnite2;
		
		debug($oUnite3,true);
		debug($oUnite2,true);
		
		$oUnite1->chargeEquipements();

		$oUnite2->chargeEquipements();
		
		debug("Unit&eacute; 2 attaque Unit&eacute; 1",true);
		ManagerUnite::getInstance()->attaque($oUnite2,$oUnite1);
		
		debug("<hr>",true);
		debug("Unit&eacute; 1 attaque Unit&eacute; 2",true);
		ManagerUnite::getInstance()->attaque($oUnite1,$oUnite2);
		
		debug("<hr>",true);
		debug("Test tir etat alerte",true);
		$aAttaqueTir = new Actionattaque('Arme de base');
		$aAttaqueTir->attaque(ManagerEquipement::getInstance()->getById(17), $oUnite2,true);
		debug("Nb blessures: ".$aAttaqueTir->getBlessures(),true);
		
		
		debug("<hr>",true);
		debug("test Grenade",true);
		$aAttaqueGrenade = new Actionattaque('Grenades et Missiles');
		$aAttaqueGrenade->attaque(ManagerEquipement::getInstance()->getById(17), $oUnite2);
		debug("Nb blessures: ".$aAttaqueGrenade->getBlessures(),true);
		
		debug("<hr>",true);
		debug("test Mine",true);
		$oMine = ManagerEquipement::getInstance()->getById(18);
		ManagerEquipement::getInstance()->attaque(ManagerEquipement::getInstance()->getById(18), $oUnite2);
		
// 			$aAttaqueExplosive = new Actionattaque('Mine et Pieges');
// 			$aAttaqueExplosive->attaque(ManagerEquipement::getInstance()->getById(18), $oUnite2);
// 			$aAttaqueExplosive->attaque(ManagerEquipement::getInstance()->getById(18), $oUnite2);
// 			debug("Nb blessures: ".$aAttaqueExplosive->getBlessures());
	} catch (Exception $e) {
		echo '<br/>'.$e->getMessage();
	}
?>

