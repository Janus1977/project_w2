<form method="post">
<input type="radio" name="action" value="init"/>Init&nbsp;&nbsp;
<input type="radio" name="action" value="play"/>Action
<input type="submit" value="OK">
</form>
<?php
/*
 * Pseudo code pour gérer les unités dans le jeu.
 * 
 *  Pour toutes les unites présentes sur la carte en capacité de faire une action (SQL)
 *  faire
 *      si je peux attaquer, attaquer (dist ou CaC)
 *      sinon
 *          Se deplacer en fonction de la distance de tir de son arme,
 *          et/ou de la distance avec les unites qu'elle voit
 *      Finsi
 *  fin faire
 */
    require("../config/config.php");
    if (!empty($_POST)) {
        if (!empty($_POST['action'])) {
            if ($_POST['action'] == 'init') {
                debug("Pr&eacute;paration du test",true);
                debug("Carte ID 35 (chris)",true);
                
                debug("Unite ID 18 sur Case ID 21819",true);
                ManagerUnite::getInstance()->setUnitInGame(ManagerUnite::getInstance()->getById(18), 21819);
                ManagerUnite::getInstance()->getById(18)->setSestdeplacecetour(0);
                ManagerUnite::getInstance()->getById(18)->setAattaquecetour(0);
                debug("Unite ID 18 changement d'arme",true);
                ManagerUnite::getInstance()->switchWeapon(18, 3);
                
                debug("Unite_joueur ID 33 sur Case ID 21842",true);
                ManagerUnite_joueur::getInstance()->setUnitInGame(ManagerUnite_joueur::getInstance()->getById(33), 21842);
                ManagerUnite_joueur::getInstance()->getById(33)->setSestdeplacecetour(0);
                ManagerUnite_joueur::getInstance()->getById(33)->setAattaquecetour(0);
                
                debug("Unite ID 4 sur Case ID 21867",true);
                ManagerUnite::getInstance()->setUnitInGame(ManagerUnite::getInstance()->getById(4), 21867);
                ManagerUnite::getInstance()->getById(4)->setSestdeplacecetour(0);
                ManagerUnite::getInstance()->getById(4)->setAattaquecetour(0);
                
                debug("Unite ID 5 sur Case ID 21882",true);
                ManagerUnite::getInstance()->setUnitInGame(ManagerUnite::getInstance()->getById(5), 21882);
                ManagerUnite::getInstance()->getById(5)->setSestdeplacecetour(0);
                ManagerUnite::getInstance()->getById(5)->setAattaquecetour(0);
            }
            
            //Lancement du test avec 4 unites devant être autonomes
            // Pendant le tour l'unité doit
            if ($_POST['action'] == 'play') {
                try {
                    debug("Lancement traitement IA",true);
                    foreach (ManagerUnite::getInstance()->getPlayableUnitsForIA(35) AS $oUnite) {
                        debug(($oUnite->getAattaquecetour() + $oUnite->getSestdeplacecetour()),true);
                        debug("<ul>",true);
                        debug('<li>Tour de '.$oUnite->getNom().'('.$oUnite->getId().')</li>',true);
                        
                        /*
                         * Dans tous les cas, l'attaque de l'ennemi prévaut sur le déplacement.
                         * Le déplacement ne se fera que si le range de l'arme est trop court
                         * ou que l'arme est une arme de CaC (ce qui revient au cas ci dessus trop court)
                         */
                        while (($oUnite->getAattaquecetour() + $oUnite->getSestdeplacecetour()) < 2) {
                            debug("<ul>:",true);
                            debug("<li>Action ".($oUnite->getAattaquecetour() + $oUnite->getSestdeplacecetour() + 1).":</li><ul>",true);
                            $aListeCasesEnnemis = ManagerUnite::getInstance()->isThereEnnemies($oUnite->getTileObject(), $oUnite->getPorteeArme());
                            if (!empty($aListeCasesEnnemis)) {
                                //Il y a des ennemis à taper ^^
                                debug("<li>Nombre d'ennmis potentiel: ".sizeof($aListeCasesEnnemis)."</li>",true);
                                $caseAttaque = rand(0, sizeof($aListeCasesEnnemis)-1);
                                debug("<li>".$oUnite->getNom()." attaque</li>",true);
                                ManagerUnite::getInstance()->attaque($oUnite,$aListeCasesEnnemis[$caseAttaque]->getUniteSurCase());
                                $oUnite->setAattaquecetour($oUnite->getAattaquecetour()+1);
                            } else {
                                //Deplacement
                                debug("<li>Cherchons...</li>",true);
                                //                             new Actionmouvement();
                                $oUnite->setSestdeplacecetour($oUnite->getSestdeplacecetour()+1);
                            }
                            //                         //Sauvegarde
                            //                         //pas en test
                            //                         ManagerUnite::getInstance()->update($oUnite);
                            debug("</ul></ul>:",true);
                        }
                        debug("</ul>",true);
                    }
                } catch (Exception $e) {
                    debug($e->getMessage(),true);
                }
            }
        }
    }

    

    