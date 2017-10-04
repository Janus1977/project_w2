<?php
	/**
	 * Fichier centralisant la creation de l'objet $log4php et de seon parametrage
	 * A installer dans toutes les pages utilisant log4php
	 */
	
	// La bibliotheque
	require_once _LOG4PHP_CLASS_;
	
	//le fichier de configuration
	Logger::configure('./config/config.log4php.xml');
	
	//l'objet logger
	$log4php = Logger::getLogger('myLogger');
	
?>