<?php

class Actionmouvement {

    public function __construct() {
    }
    
    /**
     * le deplacement est le principal mode de trajet pour les unites, meme pour les unites volante.
     * @param unknown $caseDepart
     * @param unknown $caseArrivee
     */
    public function delpacement($caseDepart,$caseArrivee) {
    	//TODO
    }
    
    /**
     * La course ne diminue pas la distance parcourue mais augmente la difficulte d'atteindre
     * l'unite en mode course, en contre partie l'unite en mode course ne peut pas tirer et 
     * ne peut realiser qu'un mauvais tir au juge par la suite.
     * La course est impossible pour les unite "marcheurs" (a voir comment les definir)
     */
    public function courir() {
    	//TODO
    }
    
    /**
     * action de deplacement pres de l'unite designee a proteger
     */
    public function protection() {
    	//TODO
    }
    
    /**
     * le repli peut etre utilise apres un mauvais jet de commandement
     */
    public function repli() {
    	//TODO
    }
    
    /**
     * La charge est un deplcament de l'unite au contact utilisable uniquement apres un tir
     */
    public function charge() {
    	//TODO
    }
}
?>