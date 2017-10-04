<?php
/*
 * Classe de gestion des gabarits du jeu
 * 
 */
class Actiongabarit {
	protected $_aListeCasesAffectees = array();
	protected $_idGabarit;
	protected $_oGabarit;
	
	public function __construct($idGabarit=0) {
		if (empty($idGabarit) || $idGabarit == 0) {
			throw  new Exception("Gabarit manquant pour l'action");
		}
		if (empty($this->_idGabarit)) {
			$this->_idGabarit = $idGabarit;
		}
		if ($this->_idGabarit != $idGabarit) {
			$this->_idGabarit = $idGabarit;
		}
	}
	
	protected function chargeGabarit() {
		$this->_oGabarit = ManagerGabarit::getInstance()->getById($this->_idGabarit);
	}
	
	public function chargeCoordonnees(Tile $caseDepart){
		//liste des cases affectees =
		//	- case cible/arrivee
		//	- cases adjacentes avec le rayon de la deflagration
		//	- cases du chemin pour le type "Souffle" uniquement
		$this->chargeGabarit();
		$this->_aListeCasesAffectees = array();
		
		//trouver la case destination du gabarit
		if ($this->_oGabarit->getX_arrivee() == 0 && $this->_oGabarit->getY_arrivee() == 0) {
			//Si c'est un gabarit d'explosion la case cible est la case de départ
			$oCaseArrivee = $caseDepart;
		} else {
			//si c'est un gabarit de souffle
			debug("souffle",true);
			$oCaseArrivee = ManagerTile::getInstance()->getCaseFromCoordonate(	$caseDepart->getCarte(),
																				$caseDepart->getX() + $this->_oGabarit->getX_arrivee(),
																				$caseDepart->getY() + $this->_oGabarit->getY_arrivee());
			$chemin = array();
			ManagerTile::getInstance()->trouveCheminVers($caseDepart, $oCcaseArrivee, $chemin);
			$this->_aListeCasesAffectees[] = $chemin;
		}
		
		$this->_aListeCasesAffectees[] = $oCaseArrivee;
		ManagerTile::getInstance()->setCasesAdjacentes($oCaseArrivee,$oCaseArrivee->getCarte(),$this->_oGabarit->getTaille());
		foreach (ManagerTile::getInstance()->getCasesAdjacentes() AS $oCase) {
			$this->_aListeCasesAffectees[] = $oCase;
		}		
	}
	
	public function getListeCasesgabarit(Tile $caseDepart) {
		if (empty($this->_aListeCasesAffectees)) {
			$this->chargeCoordonnees($caseDepart);
		}
		return $this->_aListeCasesAffectees;
	}
}
?>




