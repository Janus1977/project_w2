<?php
    require("../config/config.php");
    
    echo '<br>nettoyage Unit&eacute;s';
    $aListeUnites = ManagerUnite::getInstance()->getById();
    foreach ($aListeUnites AS $oUnite) {
        echo '<br>Unit&eacute; '.$oUnite->getNom().' (ID'.$oUnite->getId().')';
        ManagerUnite::getInstance()->setUnitOutOfGame($oUnite);
        echo ' sortie de la carte';
    }
    
    echo '<br>nettoyage Unit&eacute;s Joueur';
    $aListeUnites = ManagerUnite_joueur::getInstance()->getById();
    foreach ($aListeUnites AS $oUnite) {
        echo '<br>Unit&eacute; '.$oUnite->getNom().' (ID'.$oUnite->getId().')';
        ManagerUnite_joueur::getInstance()->setUnitOutOfGame($oUnite);
        echo ' sortie de la carte';
    }
    