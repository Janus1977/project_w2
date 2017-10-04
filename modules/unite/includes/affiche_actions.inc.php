<?php
    $path = '../../config/config.php';
    $i = 0;
    while (! file_exists($path)) {
        if ($i > 10) {
            echo 'Impossible de trouver les fichiers de configuration global,<br/>remplacement par celui du module';
            $path = 'config/config.php';
            break;
        }
        
        $path = '../' . $path;
        $i ++;
    }

    require_once $path;
    
    /* FONCTIONS GENERIQUES */
    require_once _DIR_INCLUDES_BASE_ . 'fonctions.inc.php';
    
    /* FONCTIONS SPECIFIQUES */
    require_once _INCLUDES_UNITE_ . 'fonctions.inc.php';
    
    /* Connexion Base de donnees */
    spl_autoload_register('autoload');
    require_once _DIR_INCLUDES_BASE_ . 'connexionBase.inc.php';

    /* LIBRAIRIE SMARTY */
    require_once _SMARTY_LOAD_;

    /*
     * AJAX ne fourni que l'identifiant de l'unite
     */
    
    //TEST
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_POST['table'] = 'unite';
    $_POST['idUnite'] = 5;
    
    //FIN TEST
    
    $_SESSION['aListeUnitesEnnemies'] = array();
    $corpsACorps = false;
    
    //Chargement de l'unite selectionnee et des cibles potentielles (tir+cac)
//     if (!empty($_POST['idUnite']) &&  ($_SESSION['unite']->getId() != $_POST['idUnite'])) {
        if (strpos($_POST['table'], 'joueur') > 0) {
            $_SESSION['unite'] = ManagerUnite_joueur::getInstance()->getById(intval($_POST['idUnite']));
            $_SESSION['aListeTilesUnitesEnnemies'] = ManagerUnite_joueur::getInstance()->isThereEnnemies($_SESSION['unite']->getTileObject(), $_SESSION['unite']->getPorteeArme());
        } else {
            $_SESSION['unite'] = ManagerUnite::getInstance()->getById(intval($_POST['idUnite']));
            $_SESSION['aListeTilesUnitesEnnemies'] = ManagerUnite::getInstance()->isThereEnnemies($_SESSION['unite']->getTileObject(), $_SESSION['unite']->getPorteeArme());
        }
//     }
   
    
    if (!empty($_POST['action'])) {
        if ($_SESSION['unite']->getId() != $_POST['idUnite']) {
            throw new Exception("Erreur mauvais identifiant");
        }
        if (strcmp(trim(strtolower($_POST['action'])),"attaque") == 0) {
            ManagerUnite::getInstance()->attaque($_SESSION['unite'],ManagerUnite::getInstance()->getById($_POST['idUnite']));
        }
    }
    
    //bascule tir/cac pour l'affichage
    if (sizeof($_SESSION['aListeTilesUnitesEnnemies']) > 1) {
        foreach ($_SESSION['aListeTilesUnitesEnnemies'] AS $oTileUniteEnnemie) {
            if ($_SESSION['unite']->getTileObject()->getId() != $oTileUniteEnnemie->getId()) {
                debug($oTileUniteEnnemie,true);
                if (ManagerTile::getInstance()->distanceEntre($_SESSION['unite']->getTileObject(), $oTileUniteEnnemie) == 1) {
                   $corpsACorps = true;
                   break;
                }                
            }
        }
    }
    
    $smarty->assign('URL_JAVASCRIPT_UNITE', _URL_JAVASCRIPT_UNITE_);
    $smarty->assign('URL_IMGS_UNITE', _URL_IMGS_UNITE_);
    $smarty->assign('oUnite', $_SESSION['unite']);
    $smarty->assign('corpsACorps', $corpsACorps);
    $smarty->assign('aListeUnitesEnnemies', $_SESSION['aListeUnitesEnnemies']);
    $smarty->display(_TEMPLATES_UNITE_.'action_unite.tpl');
?>