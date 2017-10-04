<?php
    session_start();
    
    require_once 'config/config.php';
    
    //Unit� 3
    $_SESSION['unite'] = ManagerUnite::getInstance()->getById(3);
    
    //MODE EDITION
    $_SESSION['EDITION_CARTE'] = false;
    
    //affectation de l'unit� � la case ID21860
    ManagerUnite::getInstance()->setUnitInGame($_SESSION['unite'], 21860);
    
    //Carte 35
    ManagerCarte::getInstance()->afficheCarte(35);
?>
