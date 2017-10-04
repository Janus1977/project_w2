<?php

class Actionattaque {

	/** La categorie de l'arme utilisee passee au constructeur */
	private $_categorieArme;
	
	/** l'objet Unite attaquante */
	private $_uniteAttaquante;
	
	/** l'objet Unite attaquee */
	private $_uniteAttaquee;
	
	/** Le nombre de blessures de l'attaque */
	private $_blessures;
	
	/** Marqueur d'un "tir au jugé" */
	private $_juge; 	//boolean
	
	/** Marqueur d'un "tir soutenu" */
	private $_soutenu;	//boolean
	
    public function __construct($categorieArme='') {
    	$this->_categorieArme = $categorieArme;
    	$this->_blessures = 0;
    }
    
    public function attaque($attaquante,$attaquee,$juge=false,$soutenu=false) {
    	/* Verifications diverses */
    	if (empty($attaquante)) {
    		if ($attaquante instanceof Unite && $attaquante->getIngame() == 0) {
    			alerte("L'unite attaquante n'est pas d&eacute;finie ou hors jeu");
    		} else {
    			alerte("L'&eacute;quipement attaquant n'est pas d&eacute;finie ou hors jeu");
    		}
    		return;
    	}
    	if (empty($attaquee)) {
    		if ($attaquee instanceof Unite && $attaquee->getIngame() == 0) {
    			alerte("L'unite attaqu&eacute;e n'est pas d&eacute;finie ou hors jeu");
    		} else {
    			alerte("L'&eacute;quipement attaqu&eacute; n'est pas d&eacute;fini ou hors jeu");
    		}
    		
    		return;
    	}
    	// ok on peut lancer l'attaque
    	$this->_uniteAttaquante = $attaquante;
    	$this->_uniteAttaquee = $attaquee;
    	$this->_juge = $juge;
    	$this->_soutenu = $soutenu;
    	if ($this->_uniteAttaquante instanceof Unite) {
    		$this->_uniteAttaquante->chargeEquipements();
    	}
    	$this->_uniteAttaquee->chargeEquipements();
    	
    	////////////////////////////////////////////
    	// Chaque arme va agir selon sa categorie //
    	////////////////////////////////////////////
    	switch ($this->_categorieArme) {
    		case 'Arme de base': {return $this->tire();break;}
    		case 'Arme Lourde': {return $this->tire();break;}
    		case 'Grenades et Missiles': {if ($this->tire()) {$this->_blessures = 0;return $this->explose();};break;}
    		case 'Arme Corps a Corps': {return $this->frappe();break;}
    		case 'Mine et Pieges': {return $this->explose();break;}
    		default: {break;}
    	}
    }
    
    /*===============================================================*/
    /* Les differentes action d'une arme en fonction de sa categorie */
    /*===============================================================*/
    
    protected function applicqueModificateur($resultatDe,$type) {
    	if (strtolower($type) == 'att') {
    		if ($this->_uniteAttaquante instanceof Unite) {
    			////////////////////////////////////////////////////////////////
    			// Le modificateur d'attaque n'est applique que sur une unite //
    			////////////////////////////////////////////////////////////////
		    	if (ManagerTile::getInstance()->distanceEntre($this->_uniteAttaquante->getTileObject(), $this->_uniteAttaquee->getTileObject()) < 
		    		max(ManagerEquipement::getInstance()->getCourtePortee($this->_uniteAttaquante->getArme()))) {
		    		debug("on applique le modif courte portee",true);
		    		$modificateurArme = str_split($this->_uniteAttaquante->getArme()->getMtcp());
		    		if ($modificateurArme[0] == "+") {
		    			$resultatDe += $modificateurArme[1];
		    		} else if (sizeof($modificateurArme) == 2 && $modificateurArme[0] == "-") {
		    			$resultatDe -= $modificateurArme[1];    			
		    		}
		    	} else {
		    		if (ManagerTile::getInstance()->distanceEntre($this->_uniteAttaquante->getTileObject(), $this->_uniteAttaquee->getTileObject()) < 
		    		max(ManagerEquipement::getInstance()->getLonguePortee($this->_uniteAttaquante->getArme()))) {
		    			debug("on applique le modif longue portee",true);
			    		$modificateurArme = str_split($this->_uniteAttaquante->getArme()->getMtlp());
			    		if ($modificateurArme[0] == "+") {
			    			$resultatDe += $modificateurArme[1];
			    		} else if (sizeof($modificateurArme) == 2 && $modificateurArme[0] == "-") {
			    			$resultatDe -= $modificateurArme[1];    			
			    		}
		    		}
		    	}       			
    		} 		
    	} else if (strtolower($type) == 'svg') {
    		//Modificateur arme attaquant
    		if ($this->_uniteAttaquante instanceof Unite) {
	    		$modificateurArme = str_split($this->_uniteAttaquante->getArme()->getMsvg());
	    		if ($modificateurArme[0] == "+") {
	    			$resultatDe += $modificateurArme[1];
	    		} else if (sizeof($modificateurArme) == 2 && $modificateurArme[0] == "-") {
	    			$resultatDe -= $modificateurArme[1];    			
	    		}
    		}
    		//Modificateur Armure
    		$modificateurArmure = str_split($this->_uniteAttaquee->getEquipementarmureObject()->getMsvg());
    		if ($modificateurArmure[0] == "+") {
    			$resultatDe += $modificateurArmure[1];
    		} else if (sizeof($modificateurArmure) == 2 && $modificateurArmure[0] == "-") {
    			$resultatDe -= $modificateurArmure[1];    			
    		}
    	}
    }
    
    /**
     * Methode utilisee pour un tir d'arme, retourne un booleen utilise 
     * pour les tir explosif tel que les grenades...
     * @return boolean
     */
    protected function tire() {
    	if ($this->_juge === true) {
    		return $this->resoudAttaque(jetPourToucherTir(1));
    	} else {
    		if ($this->_uniteAttaquante instanceof Unite) {
    			//Si la force de l'arme est supérieure à celle de l'unite, on utilise celle-ci
    			if ($this->_uniteAttaquante->getArme()->getFo() > $this->_uniteAttaquante->getFo()) {
    				return $this->resoudAttaque($this-> applicqueModificateur(jetPourToucherTir($this->_uniteAttaquante->getArme()->getFo()),'att'));
    			} else {    				
    				return $this->resoudAttaque($this-> applicqueModificateur(jetPourToucherTir($this->_uniteAttaquante->getFo()),'att'));
    			}    			
    		}
    		if ($this->_uniteAttaquante instanceof Equipement) {
    			return $this->resoudAttaque($this-> applicqueModificateur(jetPourToucherTir($this->_uniteAttaquante->getFo()),'att'));
    		}
    	}
    	
    }
    
    /**
     * Methode pour frapper au corps a corps
     */
    protected function frappe() {
    	debug("on tape",true);
    	return $this->resoudAttaque($this->applicqueModificateur(jetPourToucherCaC($this->_uniteAttaquante->getCac(),$this->_uniteAttaquee->getCac()),'att'));
    	// si c'est un vehicule, pas de combat melee => charge seulement
    	
    }
        
    /**
     * Methode pour les explosions. Appelle la resolution des attaques avec un parametrage particulier.
     */
    protected function explose() {
    	debug("on explose",true);
    	//Pour une explosion je divise par deux    	
    	return $this->resoudAttaque($this->applicqueModificateur(jetPourToucherTir(ceil($this->_uniteAttaquante->getFo() / 2)),'att'));
    	//penser au souffle de l'explosion sur rayon mais avec une force moindre
    	
    }
    
    
    /**
     * Methode permettant de savoir si une attaque permet de faire des blessures
     * qui seront recupere par la suite.
     * @param unknown $jetPourToucher
     * @return boolean
     */
    protected function resoudAttaque($jetPourToucher) {
    	//D'abord on verifie que l'on touche bien la cible,
    	$lancerPourToucher = lanceDes2(array('1D6'));
    	
    	if ($lancerPourToucher == 1) {
    		alerte("&Eacute;chec de tentative de toucher.");
    		return false;
    	}
    	
    	if ($lancerPourToucher >= $jetPourToucher) {
    		debug("Touch&eacute;",true);
//     		debug("maintenant on tente de blesser");
    		//Une fois touche, il faut tenter de blesser la cible
    		$lancerPourBlesser = lanceDes2(array('1D6'));
    		
    		if ($lancerPourBlesser == 1) {
    		    alerte("&Eacute;chec de tentative de blesser.");
    		    return false;
    		}
    		
    		if ($this->_uniteAttaquante instanceof Equipement) {
    			$this->_uniteAttaquante->chargeCategorie();
    			
    			if ($this->_uniteAttaquante->getCategorieObject()->getNom() == 'Mine et Pieges') {
    				$jetPourBlesser = jetPourBlesser($this->_uniteAttaquante->getFo(), $this->_uniteAttaquee->getEndurance());
    				if ($lancerPourBlesser >= $jetPourBlesser) {
    					debug("[EQUIPEMENT mine et piege] Jet de ".$lancerPourBlesser." sur ".$jetPourBlesser." donc bless&eacute;",true);
    					$lancerSauvegarde = lanceDes2(array('1D6'));
//     					$sauvegarde = (($this->_uniteAttaquee->getEquipementarmure() > 0) ? $this->_uniteAttaquee->getEquipementarmureObject()->getSauvegarde() : $this->_uniteAttaquee->getSauvegarde());
    					$sauvegarde = $this->_uniteAttaquee->getValeurSauvegarde();
    					if ($lancerSauvegarde < $sauvegarde) {
    						debug("Jet de ".$lancerSauvegarde." sur ".$sauvegarde." donc pas de sauvegarde",true);
    						//il faut savoir combien de blessure
    						// 1D non sauvegarde == 1 blessure
    						$this->_blessures += 1;
    					} else {
    						debug("Jet de ".$lancerSauvegarde." sur ".$sauvegarde." sauvegarde r&eacute;ussie",true);
    					}
    				} else {
    					debug("Jet de ".$lancerPourBlesser." sur ".$jetPourBlesser." donc pas bless&eacute;",true);
    				}
    			} else {
    				$jetPourBlesser = jetPourBlesser($this->_uniteAttaquante->getFo(), $this->_uniteAttaquee->getEndurance());
					if ($lancerPourBlesser >= $jetPourBlesser) {
    					debug("[EQUIPEMENT autre]Jet de ".$lancerPourBlesser." sur ".$jetPourBlesser." donc bless&eacute;",true);
    					$lancerSauvegarde = lanceDes2(array('1D6'));
    					$sauvegarde = (($this->_uniteAttaquee->getEquipementarmure() > 0) ? $this->_uniteAttaquee->getEquipementarmureObject()->getSauvegarde() : $this->_uniteAttaquee->getSauvegarde());
    					if ($lancerSauvegarde < $sauvegarde) {
    						debug("Jet de ".$lancerSauvegarde." sur ".$sauvegarde." donc pas de sauvegarde",true);
    						$this->_blessures += 1;
    					} else {
	    					debug("Jet de ".$lancerSauvegarde." sur ".$sauvegarde." donc sauvegarde r&eacute;ussie",true);
	    				}
    				} else {
    					debug("Jet de ".$lancerPourBlesser." sur ".$jetPourBlesser." donc pas bless&eacute;",true);
    				}
    			}
    		} else if ($this->_uniteAttaquante instanceof Unite) {
    			$jetPourBlesser = jetPourBlesser($this->_uniteAttaquante->getArme()->getFo(), $this->_uniteAttaquee->getEndurance());
    			
    			if ($lancerPourBlesser >= $jetPourBlesser) {
    				debug("[UNITE] Jet de ".$lancerPourBlesser." sur ".$jetPourBlesser." donc bless&eacute;",true);
    				$lancerSauvegarde = lanceDes2(array('1D6'));
    				
    				
    				$sauvegarde = (($this->_uniteAttaquee->getEquipementarmure() > 0) ? $this->_uniteAttaquee->getEquipementarmureObject()->getSauvegarde() : $this->_uniteAttaquee->getSauvegarde());
    				if ($lancerSauvegarde >= $sauvegarde) {
    					debug("Jet de ".$lancerSauvegarde." sur ".$sauvegarde." donc pas de sauvegarde",true);
    					$this->_blessures += 1;
    				} else {
    					debug("Jet de ".$lancerSauvegarde." sur ".$sauvegarde." donc sauvegarde r&eacute;ussie",true);
    				}
    			} else {
    				debug("[UNITE] Jet de ".$lancerPourBlesser." sur ".$jetPourBlesser." donc pas bless&eacute;",true);
    			}
    		}
    		return true;
    	} else {
    		alerte("Tentative pour toucher <b><i>".$this->_uniteAttaquee->getNom()."</i></b> manqu&eacute;e");
    		return false;
    	}
    }
    
    /**
     * retourne le nombre de blessures stockées
     * @return nombre de blessures de l'attaque
     */
    public function getBlessures() {
    	return $this->_blessures;
    }
}
?>